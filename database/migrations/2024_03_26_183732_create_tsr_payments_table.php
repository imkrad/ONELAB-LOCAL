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
        Schema::create('tsr_payments', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('id');
            $table->decimal('total',12,2)->default(0.00);
            $table->decimal('discount',12,2)->default(0.00);
            $table->string('or_number')->nullable();
            $table->boolean('is_paid')->default(0);
            $table->tinyInteger('discount_id')->unsigned()->index();
            $table->foreign('discount_id')->references('id')->on('list_discounts')->onDelete('cascade');
            $table->tinyInteger('payment_id')->unsigned()->nullable();
            $table->foreign('payment_id')->references('id')->on('list_dropdowns')->onDelete('cascade');
            $table->tinyInteger('collection_id')->unsigned()->nullable();
            $table->foreign('collection_id')->references('id')->on('list_dropdowns')->onDelete('cascade');
            $table->tinyInteger('status_id')->unsigned()->index();
            $table->foreign('status_id')->references('id')->on('list_statuses')->onDelete('cascade');
            $table->bigInteger('tsr_id')->unsigned()->index();
            $table->foreign('tsr_id')->references('id')->on('tsrs')->onDelete('cascade');
            $table->datetime('paid_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tsr_payments');
    }
};
