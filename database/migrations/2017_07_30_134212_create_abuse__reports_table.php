<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAbuseReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('abuse_reports', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('ad_id')->unsigned()->index()->nullable();
            $table->foreign('ad_id')->references('id')->on('ads');

            $table->integer('abuser_id')->unsigned()->index()->nullable();
            $table->foreign('abuser_id')->references('id')->on('users');

            $table->integer('reporter_id')->unsigned()->index()->nullable();
            $table->foreign('reporter_id')->references('id')->on('users');

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
        Schema::drop('abuse_reports');
    }
}
