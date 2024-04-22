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
        Schema::create('targets', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->year('year')->unique();
            $table->json('data');
            $table->boolean('is_lab')->default(0);
            $table->tinyInteger('laboratory_id')->unsigned()->nullable();
            $table->foreign('laboratory_id')->references('id')->on('list_dropdowns')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
                // $table->decimal('samples',12)->default(0);
            // $table->decimal('tests',12)->default(0);
            // $table->decimal('served',12)->default(0);
            // $table->decimal('new',12)->default(0);
            // $table->decimal('firms',12)->default(0);
            // $table->decimal('assistance',12)->default(0);
            // $table->decimal('test_wp',12)->default(0);
            // $table->decimal('test_wop',12)->default(0);
    public function down(): void
    {
        Schema::dropIfExists('targets');
    }
};
