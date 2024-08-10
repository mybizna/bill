<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('bill_bill', function (Blueprint $table) {
            $table->id();

            $table->string('title');
            $table->char('bill_no', 100);
            $table->foreignId('partner_id')->constrained('partner_partner')->onDelete('cascade')->index('partner_id');
            $table->date('due_date');
            $table->string('module')->default('Account');
            $table->string('model')->default('Invoice');
            $table->enum('status', ['draft', 'pending', 'partial', 'paid', 'closed', 'void'])->default('draft');
            $table->string('description')->nullable();
            $table->tinyInteger('is_posted')->default(0);
            $table->decimal('total', 20, 2)->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bill_bill');
    }
};
