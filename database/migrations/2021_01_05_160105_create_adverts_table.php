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
            $table->string('email'); 
            $table->string('amount');            
            $table->string('seller_id'); 
            $table->string('seller_name');            
            $table->string('phone');            
            $table->string('ref_no');
            $table->timestamps();
             $table->string('image');            
            $table->string('startDate');
            $table->string('endDate'); 
            $table->string('category');
            $table->string('service_id');
            $table->string('user_id');

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
