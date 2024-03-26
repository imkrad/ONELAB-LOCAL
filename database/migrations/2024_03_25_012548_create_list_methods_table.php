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
        Schema::create('list_methods', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->decimal('fee',12,2);
            $table->tinyInteger('laboratory_type')->unsigned()->index();
            $table->foreign('laboratory_type')->references('id')->on('list_dropdowns')->onDelete('cascade');
            $table->bigInteger('method_id')->unsigned()->index();
            $table->foreign('method_id')->references('id')->on('list_names')->onDelete('cascade');
            $table->bigInteger('reference_id')->unsigned()->index();
            $table->foreign('reference_id')->references('id')->on('list_names')->onDelete('cascade');
            $table->boolean('is_active')->default(1);
            $table->boolean('is_synced')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('list_methods');
    }
};
