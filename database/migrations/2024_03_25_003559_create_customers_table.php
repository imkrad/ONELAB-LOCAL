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
        Schema::create('customers', function (Blueprint $table) {
            $table->engine = 'InnoDB'; 
            $table->bigIncrements('id');
            $table->string('code')->unique();
            $table->string('email')->unique();
            $table->string('name');
            $table->string('contact_no');
            $table->boolean('is_main')->default(1);
            $table->boolean('is_active')->default(1);
            $table->boolean('is_synced')->default(0);
            $table->tinyInteger('bussiness_id')->unsigned()->index();
            $table->foreign('bussiness_id')->references('id')->on('list_dropdowns')->onDelete('cascade');
            $table->tinyInteger('industry_id')->unsigned()->index();
            $table->foreign('industry_id')->references('id')->on('list_dropdowns')->onDelete('cascade');
            $table->tinyInteger('classification_id')->unsigned()->index();
            $table->foreign('classification_id')->references('id')->on('list_dropdowns')->onDelete('cascade');
            $table->bigInteger('name_id')->unsigned()->index();
            $table->foreign('name_id')->references('id')->on('customer_names')->onDelete('cascade');
            $table->bigInteger('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
