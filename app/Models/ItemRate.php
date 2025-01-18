<?php
namespace Modules\Bill\Models;

use Base\Casts\Money;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Schema\Blueprint;
use Modules\Account\Models\Rate;
use Modules\Base\Models\BaseModel;
use Modules\Bill\Models\Item;

class ItemRate extends BaseModel
{

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'total' => Money::class, // Use the custom MoneyCast
    ];

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

        $table->string('title');
        $table->string('slug');
        $table->foreignId('rate_id')->nullable()->constrained(table: 'account_rate')->onDelete('set null');
        $table->foreignId('bill_item_id')->nullable()->constrained(table: 'bill_item')->onDelete('set null');
        $table->enum('method', ['+', '+%', '-', '-%'])->default('+');
        $table->integer('value')->default(0);
        $table->string('currency')->default('USD');
        $table->string('params')->nullable();
        $table->tinyInteger('ordering')->nullable();
        $table->tinyInteger('on_total')->default(false);

    }

}
