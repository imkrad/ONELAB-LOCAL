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
        Schema::create('list_package_lists', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('package_id')->unsigned()->index();
            $table->foreign('package_id')->references('id')->on('list_packages')->onDelete('cascade');
            $table->integer('testservice_id')->unsigned()->index();
            $table->foreign('testservice_id')->references('id')->on('list_testservices')->onDelete('cascade');
            $table->boolean('is_synced')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('list_package_lists');
    }
};
