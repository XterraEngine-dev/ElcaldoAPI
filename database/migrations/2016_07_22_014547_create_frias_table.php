<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('frias', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre')->default('');
            $table->string('ingredientes')->default('');
            $table->string('preparacion')->default('');
            $table->string('imagen')->default('');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('frias');
    }
}
