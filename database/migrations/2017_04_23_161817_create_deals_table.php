<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDealsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deals', function (Blueprint $table) {
            $table->increments('id');
            $table->decimal('final_price',6,2)->unsigned()->nullable();
            $table->integer('duration')->nullable();
            $table->decimal('total_amount',6,2)->unsigned()->nullable();

            $table->integer('ad_id')->unsigned()->index()->nullable();
            $table->foreign('ad_id')->references('id')->on('ads');

            $table->integer('user_id')->unsigned()->index()->nullable();
            $table->foreign('user_id')->references('id')->on('users');

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
        Schema::drop('deals');
    }
}
