<?php

namespace Modules\Bill\Entities;

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

}
