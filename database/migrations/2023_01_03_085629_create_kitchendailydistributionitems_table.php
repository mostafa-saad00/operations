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
        Schema::create('kitchendailydistributionitems', function (Blueprint $table) {
            $table->id();

            $table->unsignedInteger('area_id');
            $table->unsignedInteger('sector_id');
            
            $table->unsignedInteger('kitchendailydistribution_id');
            $table->foreignId('kitchenitem_id')->constrained();

            $table->date('date');

            $table->float('mokrar_officer', 8, 3);
            $table->float('mokrar_amen', 8, 3);
            $table->float('mokrar_solider', 8, 3);

            $table->float('before_quantity', 11, 3);
            $table->float('after_quantity', 11, 3);
            $table->float('total_distribution', 11, 3);

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
        Schema::dropIfExists('kitchendailydistributionitems');
    }
};
