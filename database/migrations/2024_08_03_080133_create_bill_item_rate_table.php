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
        Schema::create('bill_item_rate', function (Blueprint $table) {
            $table->id();

            $table->string('title');
            $table->string('slug');
            $table->foreignId('rate_id')->constrained('account_rate')->onDelete('cascade')->index('rate_id');
            $table->foreignId('bill_item_id')->constrained('bill_item')->onDelete('cascade')->index('bill_item_id');
            $table->enum('method', ['+', '+%', '-', '-%'])->default('+');
            $table->decimal('value', 20, 2)->default(0.00);
            $table->string('params')->nullable();
            $table->tinyInteger('ordering')->nullable();
            $table->tinyInteger('on_total')->default(false);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bill_item_rate');
    }
};
