<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdvertsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adverts', function (Blueprint $table) {
            $table->id();
            $table->string('email')->nullable();
            $table->string('amount')->nullable();
            $table->string('seller_id')->nullable();
            $table->string('seller_name')->nullable();
            $table->string('phone')->nullable();
            $table->string('ref_no')->nullable();
            $table->timestamps();
             $table->string('image')->nullable();
             $table->string('links')->nullable();
            $table->string('startDate')->nullable();
            $table->string('endDate')->nullable();
            $table->string('category')->nullable();
            $table->string('service_id')->nullable();
            $table->string('user_id')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('adverts');
    }
}
