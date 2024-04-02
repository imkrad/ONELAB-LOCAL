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
        Schema::create('tsr_analyses', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('id');
            $table->tinyInteger('status_id')->unsigned()->index();
            $table->foreign('status_id')->references('id')->on('list_statuses')->onDelete('cascade');
            $table->integer('testservice_id')->unsigned()->index();
            $table->foreign('testservice_id')->references('id')->on('list_testservices')->onDelete('cascade');
            $table->bigInteger('sample_id')->unsigned()->index();
            $table->foreign('sample_id')->references('id')->on('tsr_samples')->onDelete('cascade');
            $table->bigInteger('analyst_id')->unsigned()->index();
            $table->foreign('analyst_id')->references('id')->on('users')->onDelete('cascade');
            $table->dateTime('start')->nullable();
            $table->dateTime('end')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tsr_analyses');
    }
};
