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
        Schema::create('ma2moryats', function (Blueprint $table) {
            $table->id();

            $table->unsignedInteger('officer_id');
            $table->unsignedInteger('dailyoperation_id');
            $table->date('date')->nullable();
            $table->unsignedInteger('day')->nullable();
            $table->unsignedInteger('month')->nullable();
            $table->unsignedInteger('year')->nullable();

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
        Schema::dropIfExists('ma2moryats');
    }
};
