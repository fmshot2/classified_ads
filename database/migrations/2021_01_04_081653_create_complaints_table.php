<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComplaintsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('complaints', function (Blueprint $table) {
              $table->increments('id');
            $table->integer('service_id')->nullable();
            $table->unsignedInteger('service_user_id');
            $table->string('buyer_name')->nullable();
            $table->string('buyer_email')->nullable();
            $table->string('phone')->nullable();
           
            $table->unsignedInteger('buyer_id')->nullable();
            $table->text('description');
            $table->string('reply')->default('no');
            $table->string('slug')->nullable();
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
        Schema::dropIfExists('complaints');
    }
}
