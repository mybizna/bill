<?php
namespace Modules\Bill\Models;

use Base\Casts\Money;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Schema\Blueprint;
use Modules\Base\Models\BaseModel;
use Modules\Partner\Models\Partner;

class Bill extends BaseModel
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
        'title', 'bill_no', 'partner_id', 'due_date', 'module', 'model', 'status',
        'description', 'is_posted', 'total',
    ];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = "bill_bill";

    /**
     * Add relationship to Partner
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function partner(): BelongsTo
    {
        return $this->belongsTo(Partner::class);
    }

    public function migration(Blueprint $table): void
    {

        $table->string('title');
        $table->char('bill_no', 100);
        $table->foreignId('partner_id')->nullable()->constrained(table: 'partner_partner')->onDelete('set null');
        $table->date('due_date');
        $table->string('module')->default('Account');
        $table->string('model')->default('Invoice');
        $table->enum('status', ['draft', 'pending', 'partial', 'paid', 'closed', 'void'])->default('draft');
        $table->string('description')->nullable();
        $table->tinyInteger('is_posted')->default(0);
        $table->integer('total')->nullable();
        $table->string('currency')->default('USD');

    }

}
