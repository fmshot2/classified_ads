<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRefererlinksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('refererlinks', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('refererlink')->nullable();
            $table->integer('user_id')->nullabe();
            $table->integer('recipient_id')->nullabe();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('refererlinks');
    }
}
