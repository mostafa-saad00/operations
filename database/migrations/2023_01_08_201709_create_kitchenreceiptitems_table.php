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
        Schema::create('kitchenreceiptitems', function (Blueprint $table) {
            $table->id();

            $table->unsignedInteger('area_id');
            $table->unsignedInteger('sector_id');

            $table->foreignId('kitchenreceipt_id')->constrained();
            $table->foreignId('kitchenitem_id')->constrained();

            $table->date('date');
            
            $table->float('before_quantity', 11, 3);
            $table->float('after_quantity', 11, 3);
            $table->float('quantity', 11, 3);

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
        Schema::dropIfExists('kitchenreceiptitems');
    }
};
