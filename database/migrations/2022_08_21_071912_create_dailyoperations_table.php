<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dailyoperations', function (Blueprint $table) {
            $table->id();

            $table->unsignedInteger('area_id');
            $table->unsignedInteger('sector_id');

            $table->string('name');
            $table->string('type');
            $table->integer('price');
            $table->string('status')->default('active');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dailyoperations');
    }
};
