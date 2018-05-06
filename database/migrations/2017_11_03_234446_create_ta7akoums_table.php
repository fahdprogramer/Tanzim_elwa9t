<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTa7akoumsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ta7akoums', function (Blueprint $table) {
            $table->increments('id');
			$table->text('name');
            $table->string('Sunday')->nullable();
            $table->string('Monday')->nullable();
            $table->string('Tuesday')->nullable();
            $table->string('Wednesday')->nullable();
            $table->string('Thursday')->nullable();
            $table->string('Friday')->nullable();
            $table->string('Saturday')->nullable();
			$table->integer('id_user')->unsigned();
            $table->foreign('id_user')->references('id')->on('users');
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
        Schema::dropIfExists('ta7akoums');
    }
}
