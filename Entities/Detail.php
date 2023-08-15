<?php

namespace Modules\Bill\Entities;

use Illuminate\Database\Schema\Blueprint;
use Modules\Base\Classes\Migration;
use Modules\Base\Entities\BaseModel;

class Detail extends BaseModel
{
    /**
     * The fields that can be filled
     *
     * @var array<string>
     */
    protected $fillable = ['trn_no', 'ledger_id', 'particulars', 'amount'];

    /**
     * The fields that are to be render when performing relationship queries.
     *
     * @var array<string>
     */
    public $rec_names = ['trn_no'];

    /**
     * List of tables names that are need in this model during migration.
     *
     * @var array<string>
     */
    public array $migrationDependancy = ['account_ledger'];

    /**
     * The fields that can be filled
     *
     * @var string
     */
    protected $table = "bill_detail";

    /**
     * List of fields to be migrated to the datebase when creating or updating model during migration.
     *
     * @param Blueprint $table
     * @return void
     */
    public function fields(Blueprint $table = null): void
    {
        $this->fields = $table ?? new Blueprint($this->table);

        $this->fields->increments('id')->html('text');
        $this->fields->integer('trn_no')->nullable()->html('text');
        $this->fields->foreignId('ledger_id')->nullable()->html('recordpicker')->relation(['account', 'ledger']);
        $this->fields->string('particulars')->nullable()->html('text');
        $this->fields->decimal('amount', 20, 2)->default(0.00)->html('amount');
    }

    /**
     * List of structure for this model.
     */
    public function structure($structure): array
    {
        $structure = [
            'table' => ['trn_no', 'ledger_id', 'amount'],
            'filter' => ['trn_no', 'ledger_id'],
        ];

        return $structure;
    }

}
