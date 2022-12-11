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
        Schema::create('officers', function (Blueprint $table) {
            $table->id();

            $table->unsignedInteger('gehat_id');
            $table->unsignedInteger('pistol_id');
            $table->string('rank');
            $table->string('name');
            $table->string('nick_name');
            $table->unsignedInteger('tarteb');
            $table->unsignedInteger('year_of_graduate');

            $table->string('what_he_do');
            $table->string('address');
            $table->string('city');
            $table->string('religion');
            $table->string('status');
            $table->string('phone1');
            $table->string('phone2')->nullable();

            $table->string('health');

            $table->unsignedInteger('height')->nullable();
            $table->unsignedInteger('weight')->nullable();
            $table->bigInteger('age')->nullable();
            

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
        Schema::dropIfExists('officers');
    }
};
