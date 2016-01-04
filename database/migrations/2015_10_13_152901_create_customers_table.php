<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function(Blueprint $table) {
            $table->increments('id');
            $table->string('phone')->nullable();
            $table->string('street');
            $table->integer('city_id')->unsigned()->nullable();
            $table->timestamps();
            $table->softDeletes();

        });

        Schema::table('customers', function(Blueprint $table) {
           $table->foreign('city_id')->references('id')->on('municipalities')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customers');
    }
}
