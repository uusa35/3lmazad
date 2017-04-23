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
        Schema::create('field_form', function (Blueprint $table) {
            $table->integer('field_id')->unsigned()->index();
            $table->foreign('field_id')->references('id')->on('field')->onDelete('cascade');
            $table->integer('form_id')->unsigned()->index();
            $table->foreign('form_id')->references('id')->on('form')->onDelete('cascade');
            $table->primary(['field_id', 'form_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('field_form');
    }
}
