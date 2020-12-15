<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {

            $table->id();

            $table->string('name');
            $table->text('description');
            $table->string('city');
            $table->string('state');
            $table->string('streetAddress');
            $table->string('closestBusstop');
            $table->string('streetAddress')->nullable();
            $table->string('closestBusstop')->nullable();
            //$table->string('category');
            //$table->string('phone')->nullable();

            $table->string('image_1');
            $table->string('image_2');
            $table->string('image_3');
            $table->string('image_4');
            $table->string('image_5');
            $table->string('image_6');

            $table->string('experience');
            $table->string('phone');
            $table->string('video_link')->nullable();

            $table->float('min_price', 10, 2);
            $table->float('max_price', 10, 2);
            $table->unsignedInteger('price')->nullable();
            $table->integer('min_price')->nullable();
            $table->interger('max_price')->nullable();
            //$table->unsignedInteger('price');


            $table->boolean('is_featured')->nullable()->default(true);
            $table->boolean('is_approved')->nullable()->default(true);
            $table->string('slug')->unique()->nullable();
            $table->boolean('status')->default(false);

            $table->unsignedInteger('user_id');
            //$table->unsignedInteger('like_id');
            $table->unsignedInteger('category_id');

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
        Schema::dropIfExists('services');
    }
}
