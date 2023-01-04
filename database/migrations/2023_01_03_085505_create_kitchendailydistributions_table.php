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
        Schema::create('kitchendailydistributions', function (Blueprint $table) {
            $table->id();

            $table->date('date');
            $table->string('day');
            $table->string('officers_number');
            $table->string('amens_number');
            $table->string('soliders_number');
            
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
        Schema::dropIfExists('kitchendailydistributions');
    }
};
