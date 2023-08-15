<?php

namespace Modules\Bill\Entities;

use Illuminate\Database\Schema\Blueprint;
use Modules\Base\Entities\BaseModel;

class AccountDetail extends BaseModel
{
    /**
     * The fields that can be filled
     *
     * @var array<string>
     */
    protected $fillable = ['bill_no', 'trn_no', 'trn_date', 'particulars', 'debit', 'credit'];

    /**
     * The fields that are to be render when performing relationship queries.
     *
     * @var array<string>
     */
    public $rec_names = ['bill_no', 'trn_no'];

    /**
     * List of tables names that are need in this model during migration.
     *
     * @var array<string>
     */
    public array $migrationDependancy = [];

    /**
     * The fields that can be filled
     *
     * @var string
     */
    protected $table = "bill_account_detail";

    /**
     * List of fields to be migrated to the datebase when creating or updating model during migration.
     *
     * @param Blueprint $table
     * @return void
     */
    public function fields(Blueprint $table = null): void
    {
        $this->fields = $table ?? new Blueprint($this->table);
        
        $this->fields->increments('id');
        $this->fields->integer('bill_no')->nullable()->html('text');
        $this->fields->integer('trn_no')->nullable()->html('text');
        $this->fields->date('trn_date')->nullable()->html('date');
        $this->fields->string('particulars')->nullable()->html('text');
        $this->fields->decimal('debit', 20, 2)->default(0.00)->html('amount');
        $this->fields->decimal('credit', 20, 2)->default(0.00)->html('amount');

      
    }

      /**
         * List of structure for this model.
         */
        public function structure($structure): array
        {
            $structure = [
                'table' => ['bill_no', 'trn_no', 'trn_date', 'debit', 'credit'],
                'filter' => ['bill_no', 'trn_no', 'trn_date',],
            ];
    
            return $structure;
        }

}
