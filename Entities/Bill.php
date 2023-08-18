<?php

namespace Modules\Bill\Entities;

use Illuminate\Database\Schema\Blueprint;
use Modules\Base\Classes\Migration;
use Modules\Base\Entities\BaseModel;

class Bill extends BaseModel
{
    /**
     * The fields that can be filled
     *
     * @var array<string>
     */
    protected $fillable = [
        'voucher_no', 'vendor_id', 'vendor_name', 'address', 'trn_date',
        'due_date', 'ref', 'amount', 'particulars', 'status', 'attachments',
    ];

    /**
     * The fields that are to be render when performing relationship queries.
     *
     * @var array<string>
     */
    public $rec_names = ['voucher_no', 'amount', 'status'];

    /**
     * List of tables names that are need in this model during migration.
     *
     * @var array<string>
     */
    public array $migrationDependancy = ['partner'];

    /**
     * The fields that can be filled
     *
     * @var string
     */
    protected $table = "bill";

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
        $this->fields->integer('voucher_no')->nullable()->html('text');
        $this->fields->foreignId('partner_id')->nullable();
        $this->fields->string('partner_name')->nullable()->html('text');
        $this->fields->string('address')->nullable()->html('textarea');
        $this->fields->date('trn_date')->nullable()->html('datetime');
        $this->fields->date('due_date')->nullable()->html('datetime');
        $this->fields->string('ref')->nullable()->html('textarea');
        $this->fields->decimal('amount', 20, 2)->default(0.00)->html('amount');
        $this->fields->string('particulars')->nullable()->html('textarea');
        $this->fields->integer('status')->nullable()->html('switch');
        $this->fields->string('attachments')->nullable()->html('files');
    }

    /**
     * List of structure for this model.
     */
    public function structure($structure): array
    {
            $structure  ['table'] = ['voucher_no', 'vendor_id', 'vendor_name', 'trn_date', 'due_date', 'amount', 'status'];
            $structure  ['form'] = [
                ['label' => 'Title', 'class' => 'col-span-full', 'fields' => ['voucher_no']],
                ['label' => 'Bill', 'class' => 'col-span-6', 'fields' => ['vendor_id', 'vendor_name']],
                ['label' => 'Bill Date', 'class' => 'col-span-6', 'fields' => ['trn_date', 'due_date']],
                ['label' => 'Amount', 'class' => 'col-span-6', 'fields' => ['amount', 'status']],
            ];
            $structure  ['filter'] = ['voucher_no', 'vendor_id', 'vendor_name', 'trn_date', 'status'];

        return $structure;
    }

}
