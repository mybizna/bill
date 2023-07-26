<?php

namespace Modules\Bill\Entities;

use Modules\Base\Entities\BaseModel;
use Illuminate\Database\Schema\Blueprint;
use Modules\Base\Classes\Migration;

use Modules\Core\Classes\Views\ListTable;
use Modules\Core\Classes\Views\FormBuilder;

class Bill extends BaseModel
{

    protected $fillable = [
        'voucher_no', 'vendor_id', 'vendor_name', 'address', 'trn_date',
        'due_date', 'ref', 'amount', 'particulars', 'status', 'attachments'
    ];
    public $migrationDependancy = ['partner'];
    protected $table = "bill";


    public function listTable(){
        // listing view fields
        $fields = new ListTable();

        $fields->name('voucher_no')->type('text')->ordering(true);
        $fields->name('vendor_id')->type('recordpicker')->table('partner')->ordering(true);
        $fields->name('vendor_name')->type('text')->ordering(true);
        $fields->name('address')->type('text')->ordering(true);
        $fields->name('trn_date')->type('datetime')->ordering(true);
        $fields->name('due_date')->type('datetime')->ordering(true);
        $fields->name('amount')->type('text')->ordering(true);
        $fields->name('status')->type('switch')->ordering(true);


        return $fields;

    }
    
    public function formBuilder(){
        // listing view fields
        $fields = new FormBuilder();

        $fields->name('voucher_no')->type('text')->group('w-1/2');
        $fields->name('vendor_id')->type('recordpicker')->table('partner')->group('w-1/2');
        $fields->name('vendor_name')->type('text')->group('w-1/2');
        $fields->name('address')->type('text')->group('w-1/2');
        $fields->name('trn_date')->type('datetime')->group('w-1/2');
        $fields->name('due_date')->type('datetime')->group('w-1/2');
        $fields->name('ref')->type('text')->group('w-full');
        $fields->name('amount')->type('text')->group('w-1/2');
        $fields->name('particulars')->type('text')->group('w-1/2');
        $fields->name('status')->type('switch')->group('w-1/2');
        $fields->name('attachments')->type('text')->group('w-1/2');

        return $fields;

    }

    public function filter(){
        // listing view fields
        $fields = new FormBuilder();

        $fields->name('voucher_no')->type('text')->group('w-1/6');
        $fields->name('vendor_id')->type('recordpicker')->table('partner')->group('w-1/6');
        $fields->name('vendor_name')->type('text')->group('w-1/6');
        $fields->name('address')->type('text')->group('w-1/6');
        $fields->name('trn_date')->type('datetime')->group('w-1/6');
        $fields->name('due_date')->type('datetime')->group('w-1/6');
        $fields->name('amount')->type('text')->group('w-1/6');
        $fields->name('status')->type('switch')->group('w-1/6');

        return $fields;

    }
    /**
     * List of fields for managing postings.
     *
     * @param Blueprint $table
     * @return void
     */
    public function migration(Blueprint $table)
    {
        $table->increments('id');
        $table->integer('voucher_no')->nullable();
        $table->foreignId('partner_id')->nullable();
        $table->string('partner_name')->nullable();
        $table->string('address')->nullable();
        $table->date('trn_date')->nullable();
        $table->date('due_date')->nullable();
        $table->string('ref')->nullable();
        $table->decimal('amount', 20, 2)->default(0.00);
        $table->string('particulars')->nullable();
        $table->integer('status')->nullable();
        $table->string('attachments')->nullable();
    }

    public function post_migration(Blueprint $table)
    {
        Migration::addForeign($table, 'partner', 'partner_id');
    }
}
