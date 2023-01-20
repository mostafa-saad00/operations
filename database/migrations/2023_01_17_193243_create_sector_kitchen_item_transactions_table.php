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
        Schema::create('sector_kitchen_item_transactions', function (Blueprint $table) {
            $table->id();

            $table->unsignedInteger('area_id');
            $table->unsignedInteger('sector_id');
            $table->unsignedInteger('kitchenitem_id');

            $table->unsignedInteger('kitchendailydistribution_id')->nullable();
            $table->unsignedInteger('kitchenreceipt_id')->nullable();

            $table->boolean('in_out');

            $table->date('date');

            $table->float('before_quantity', 11, 3);
            $table->float('after_quantity', 11, 3);
            $table->float('transaction_quantity', 11, 3);

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
        Schema::dropIfExists('sector_kitchen_item_transactions');
    }
};
