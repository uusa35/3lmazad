<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class App\ extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ad_deal', function (Blueprint $table) {
            $table->integer('ad_id')->unsigned()->index();
            $table->foreign('ad_id')->references('id')->on('ad')->onDelete('cascade');
            $table->integer('deal_id')->unsigned()->index();
            $table->foreign('deal_id')->references('id')->on('deal')->onDelete('cascade');
            $table->primary(['ad_id', 'deal_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('ad_deal');
    }
}
