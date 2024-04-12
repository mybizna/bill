<?php

namespace Modules\Bill\Entities;

use Illuminate\Database\Schema\Blueprint;
use Modules\Base\Classes\Migration;
use Modules\Base\Entities\BaseModel;

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
     * The fields that are to be render when performing relationship queries.
     *
     * @var array<string>
     */
    public $rec_names = ['title'];

    /**
     * List of tables names that are need in this model during migration.
     *
     * @var array<string>
     */
    public array $migrationDependancy = ['bill_item', 'account_rate'];
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = "bill_item_rate";

    /**
     * List of fields to be migrated to the datebase when creating or updating model during migration.
     *
     * @param Blueprint $table
     * @return void
     */
    public function fields(Blueprint $table = null): void
    {

        $this->fields = $table ?? new Blueprint($this->table);

        $methods = ['+' => '+', '+%' => '+%', '-' => '-', '-%' => '-%'];

        $this->fields->increments('id')->html('hidden');
        $this->fields->integer('title')->html('text');
        $this->fields->integer('slug')->html('text');
        $this->fields->foreignId('rate_id')->html('recordpicker')->relation(['account', 'rate']);
        $this->fields->foreignId('bill_item_id')->html('recordpicker')->relation(['bill', 'item']);
        $this->fields->enum('method', array_keys($methods))->default('+')->html('select')->options($methods);
        $this->fields->decimal('value', 20, 2)->default(0.00)->html('amount');
        $this->fields->string('params')->nullable()->html('text');
        $this->fields->tinyInteger('ordering')->nullable()->html('text');
        $this->fields->tinyInteger('on_total')->default(false)->html('switch');
    }

    /**
     * List of structure for this model.
     */
    public function structure($structure): array
    {
        $structure['table'] = ['title', 'slug', 'rate_id', 'bill_item_id', 'method', 'value', 'ordering', 'on_total'];
        $structure['form'] = [
            ['label' => 'Bill Item Rate Title', 'class' => 'col-span-full', 'fields' => ['title']],
            ['label' => 'Bill Item Rate Detail', 'class' => 'col-span-full  md:col-span-6 md:pr-2', 'fields' => ['slug', 'rate_id', 'bill_item_id', 'method']],
            ['label' => 'Other Bill Item Setting', 'class' => 'col-span-full  md:col-span-6 md:pr-2', 'fields' => ['value', 'ordering', 'on_total']],
        ];
        $structure['filter'] = ['title', 'slug', 'rate_id', 'bill_item_id', 'method'];

        return $structure;
    }

    /**
     * Define rights for this model.
     *
     * @return array
     */
    public function rights(): array
    {
        $rights = parent::rights();

        $rights['staff'] = ['view' => true];
        $rights['registered'] = [];
        $rights['guest'] = [];

        return $rights;
    }
}
