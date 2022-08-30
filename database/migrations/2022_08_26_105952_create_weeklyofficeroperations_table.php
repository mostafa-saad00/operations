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
        Schema::create('weeklyofficeroperations', function (Blueprint $table) {
            $table->id();

            $table->unsignedInteger('officer_id');
            $table->unsignedInteger('fromtooperation_id');
            $table->unsignedInteger('dailyoperation_id');
            $table->string('day');

            $table->timestamps();

            $table->foreign('officer_id')->references('id')->on('officers')->onDelete('cascade');
            $table->foreign('fromtooperation_id')->references('id')->on('fromtooperations')->onDelete('cascade');
            $table->foreign('dailyoperation_id')->references('id')->on('dailyoperations')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('weeklyofficeroperations');
    }
};
