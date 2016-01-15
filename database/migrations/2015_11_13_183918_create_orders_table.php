<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('ordered_by')->unsigned()->nullable();
            $table->integer('acquired_by')->unsigned()->nullable();
            $table->integer('state_id')->unsigned()->nullable();
            $table->float('shipping', 5, 2);
            $table->float('price', 6, 2);
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('orders', function(Blueprint $table) {
            $table->foreign('ordered_by')->references('id')->on('customers')->onDelete('cascade');
            $table->foreign('acquired_by')->references('id')->on('employees')->onDelete('cascade');
            $table->foreign('state_id')->references('id')->on('order_states')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
