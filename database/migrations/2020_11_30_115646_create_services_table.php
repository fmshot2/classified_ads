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
            $table->text('description')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('streetAddress')->nullable();
            $table->string('closestBusstop')->nullable();
            $table->string('category')->nullable();
            $table->string('thumbnail')->default('noserviceimage.png')->nullable();
            $table->string('address')->nullable();
            $table->string('experience')->nullable();
            $table->string('phone')->nullable();
            $table->string('video_link')->nullable();
            $table->string('min_price')->nullable();
            $table->string('max_price')->nullable();
            $table->boolean('is_featured')->default(0);
            $table->integer('paid_featured')->default(0);
            $table->boolean('is_approved')->default(0);
            $table->string('slug')->unique();
            $table->boolean('status')->default(0);
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('category_id');
            $table->integer('subcategory_id')->nullable();
            $table->string('badge_type')->default(4);
            $table->decimal('latitude', 10, 7)->nullable();
            $table->decimal('longitude', 11, 8)->nullable();
            $table->string('subscription_end_date')->nullable();
            $table->string('featured_end_date')->default(0);
            $table->softDeletes();
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
