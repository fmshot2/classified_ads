<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
<<<<<<< HEAD
            $table->increments('id');
            $table->integer('service_id');
            $table->string('description');
            $table->unsignedInteger('buyer_id')->nullable();
=======
             $table->increments('id');
            $table->string('user_id');
            $table->integer('service_id');
            $table->text('description');
>>>>>>> d52b3cacfc0719ef01ead77ecc8f5ad582b204a7
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
        Schema::dropIfExists('messages');
    }
}
