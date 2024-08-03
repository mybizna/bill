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
        'title', 'bill_no', 'partner_id', 'due_date', 'module', 'model', 'status',
        'description', 'is_posted', 'total',
    ];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = "bill";

    /**
     * Set if model is visible from frontend.
     *
     * @var bool
     */
    public bool $show_frontend = true;

    /**
     * List of fields to be migrated to the datebase when creating or updating model during migration.
     *
     * @param Blueprint $table
     * @return void
     */
    public function fields(Blueprint $table = null): void
    {
        $this->fields = $table ?? new Blueprint($this->table);

        $statuses = ['draft' => 'Draft', 'pending' => 'Pending', 'partial' => 'Partial', 'paid' => 'Paid', 'closed' => 'Closed', 'void' => 'Void'];
        $statuses_color = ['draft' => 'gray', 'pending' => 'sky', 'partial' => 'indigo', 'paid' => 'green', 'closed' => 'orange', 'void' => 'red'];

        $this->fields->increments('id')->html('hidden');
        $this->fields->string('title')->html('text');
        $this->fields->char('bill_no', 100)->html('text');
        $this->fields->foreignId('partner_id')->html('recordpicker')->relation(['partner']);
        $this->fields->date('due_date')->useCurrent()->html('datetime');
        $this->fields->string('module')->default('Account')->html('text');
        $this->fields->string('model')->default('Invoice')->html('text');
        $this->fields->enum('status', array_keys($statuses))->html('switch')->default('draft')->options($statuses)->color($statuses_color)->nullable();
        $this->fields->string('description')->nullable()->html('textarea');
        $this->fields->tinyInteger('is_posted')->default(0)->html('switch');
        $this->fields->decimal('total', 20, 2)->nullable()->html('amount');
    }




}
