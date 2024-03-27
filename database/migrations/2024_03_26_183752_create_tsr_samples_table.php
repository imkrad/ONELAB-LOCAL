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
        Schema::create('tsr_samples', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('id');
            $table->string('code')->unique();
            $table->string('name'); 
            $table->string('description');
            $table->string('customer_description');
            $table->bigInteger('sampletype_id')->unsigned()->index();
            $table->foreign('sampletype_id')->references('id')->on('list_names')->onDelete('cascade');
            $table->bigInteger('tsr_id')->unsigned()->index();
            $table->foreign('tsr_id')->references('id')->on('tsrs')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tsr_samples');
    }
};
