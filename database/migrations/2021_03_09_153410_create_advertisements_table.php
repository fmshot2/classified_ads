<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdvertisementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('advertisements', function (Blueprint $table) {
            $table->id();
            $table->string('brand_name');
            $table->string('website_link')->nullable();
            $table->string('banner_img');
            $table->string('client_name');
            $table->string('client_email');
            $table->string('client_phone');
            $table->string('client_address')->nullable();
            $table->integer('advert_location');
            $table->string('location_name')->nullable();
            $table->string('start_date');
            $table->string('end_date');
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
        Schema::dropIfExists('advertisements');
    }
}
