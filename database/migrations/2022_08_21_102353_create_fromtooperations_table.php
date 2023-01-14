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
        Schema::create('fromtooperations', function (Blueprint $table) {
            $table->id();

            $table->unsignedInteger('area_id');
            $table->unsignedInteger('sector_id');

            $table->date('from');
            $table->date('to');
            
            $table->unsignedInteger('day');
            $table->unsignedInteger('month');
            $table->unsignedInteger('year');

            $table->string('refrence_number');

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
        Schema::dropIfExists('fromtooperations');
    }
};
