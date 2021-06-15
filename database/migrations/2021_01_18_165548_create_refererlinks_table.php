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
            $table->integer('user_id')->nullable();
            $table->integer('recipient_id')->nullable();
            $table->string('agent_id')->nullable();
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
