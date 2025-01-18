<?php

namespace Modules\Bill\Models;

use Modules\Account\Models\Ledger;
use Modules\Base\Models\BaseModel;
use Modules\Bill\Models\Bill;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Item extends BaseModel
{

    /**
     * The fields that can be filled
     *
     * @var array<string>
     */
    protected $fillable = [
        'title', 'bill_id', 'ledger_id', 'price', 'amount', 'quantity',
        'module', 'model', 'item_id',
    ];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = "bill_item";

    /**
     * Add relationship to Bill
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function bill(): BelongsTo
    {
        return $this->belongsTo(Bill::class);
    }

    /**
     * Add relationship to Ledger
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function ledger(): BelongsTo
    {
        return $this->belongsTo(Ledger::class);
    }

    public function migration(Blueprint $table): void
    {

        $table->string('title');
        $table->foreignId('bill_id')->nullable()->constrained(table: 'bill_bill')->onDelete('set null');
        $table->foreignId('ledger_id')->nullable()->constrained(table: 'account_ledger')->onDelete('set null');
        $table->integer('price')->default(0);
        $table->integer('amount')->default(0);
        $table->string('module')->nullable();
        $table->string('model')->nullable();
        $table->bigInteger('item_id')->nullable();
        $table->integer('quantity')->nullable();

    }
}
