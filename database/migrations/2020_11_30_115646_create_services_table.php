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
            $table->string('state')->nullable();
            $table->string('streetAddress')->nullable();
            $table->string('closestBusstop')->nullable();
            $table->string('category')->nullable();
            $table->string('thumbnail')->default('noserviceimage.png')->nullable();
            $table->string('address');
            $table->string('experience');
            $table->string('phone');
            $table->string('video_link')->nullable();
            $table->string('min_price')->nullable();
            $table->string('max_price')->nullable();
            $table->boolean('is_featured')->nullable()->default(true);
            $table->boolean('is_approved')->nullable()->default(true);
            $table->string('slug')->unique()->nullable();
            $table->boolean('status')->default(false);
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('category_id')->nullable();
            $table->timestamps();
            $table->string('badge_type')->nullable()->default('basic');
            $table->decimal('latitude', 10, 7)->nullable();
            $table->decimal('longitude', 11, 8)->nullable();

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
