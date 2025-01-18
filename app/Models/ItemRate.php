<?php

namespace Modules\Bill\Models;

use Modules\Base\Models\BaseModel;
use Modules\Bill\Models\Item;
use Modules\Bill\Models\Rate;
use Illuminate\Database\Schema\Blueprint;

class ItemRate extends BaseModel
{

    /**
     * The fields that can be filled
     *
     * @var array<string>
     */
    protected $fillable = [
        'title', 'slug', 'rate_id', 'bill_item_id', 'method', 'value', 'params', 'ordering', 'on_total',
    ];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = "bill_item_rate";

    /**
     * Add relationship to Item
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function item(): BelongsTo
    {
        return $this->belongsTo(Item::class);
    }

    /**
     * Add relationship to Rate
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function rate(): BelongsTo
    {
        return $this->belongsTo(Rate::class);
    }

    public function migration(Blueprint $table): void
    {
        $table->id();

        $table->string('title');
        $table->string('slug');
        $table->foreignId('rate_id')->nullable()->constrained(table: 'account_rate')->onDelete('set null');
        $table->foreignId('bill_item_id')->nullable()->constrained(table: 'bill_item')->onDelete('set null');
        $table->enum('method', ['+', '+%', '-', '-%'])->default('+');
        $table->decimal('value', 20, 2)->default(0.00);
        $table->string('params')->nullable();
        $table->tinyInteger('ordering')->nullable();
        $table->tinyInteger('on_total')->default(false);

    }

}
