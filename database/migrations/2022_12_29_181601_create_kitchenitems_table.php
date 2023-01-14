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
        Schema::create('kitchenitems', function (Blueprint $table) {
            $table->id();

            $table->unsignedInteger('kitchensupplier_id');
            $table->string('storage')->default('storage_1');
            $table->string('name');
            $table->string('unit');

            $table->float('current_quantity', 11, 3);

            $table->float('saturday_winter_officer', 8, 3);
            $table->float('saturday_summer_officer', 8, 3);

            $table->float('saturday_winter_solider', 8, 3);
            $table->float('saturday_summer_solider', 8, 3);

            $table->float('saturday_winter_amen', 8, 3);
            $table->float('saturday_summer_amen', 8, 3);

            $table->float('sunday_winter_officer', 8, 3);
            $table->float('sunday_summer_officer', 8, 3);

            $table->float('sunday_winter_solider', 8, 3);
            $table->float('sunday_summer_solider', 8, 3);

            $table->float('sunday_winter_amen', 8, 3);
            $table->float('sunday_summer_amen', 8, 3);

            $table->float('monday_winter_officer', 8, 3);
            $table->float('monday_summer_officer', 8, 3);

            $table->float('monday_winter_solider', 8, 3);
            $table->float('monday_summer_solider', 8, 3);

            $table->float('monday_winter_amen', 8, 3);
            $table->float('monday_summer_amen', 8, 3);

            $table->float('tuesday_winter_officer', 8, 3);
            $table->float('tuesday_summer_officer', 8, 3);

            $table->float('tuesday_winter_solider', 8, 3);
            $table->float('tuesday_summer_solider', 8, 3);

            $table->float('tuesday_winter_amen', 8, 3);
            $table->float('tuesday_summer_amen', 8, 3);

            $table->float('wednesday_winter_officer', 8, 3);
            $table->float('wednesday_summer_officer', 8, 3);

            $table->float('wednesday_winter_solider', 8, 3);
            $table->float('wednesday_summer_solider', 8, 3);

            $table->float('wednesday_winter_amen', 8, 3);
            $table->float('wednesday_summer_amen', 8, 3);

            $table->float('thursday_winter_officer', 8, 3);
            $table->float('thursday_summer_officer', 8, 3);

            $table->float('thursday_winter_solider', 8, 3);
            $table->float('thursday_summer_solider', 8, 3);

            $table->float('thursday_winter_amen', 8, 3);
            $table->float('thursday_summer_amen', 8, 3);

            $table->float('friday_winter_officer', 8, 3);
            $table->float('friday_summer_officer', 8, 3);

            $table->float('friday_winter_solider', 8, 3);
            $table->float('friday_summer_solider', 8, 3);

            $table->float('friday_winter_amen', 8, 3);
            $table->float('friday_summer_amen', 8, 3);

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
        Schema::dropIfExists('kitchenitems');
    }
};
