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
            $table->string('address');
            $table->string('category');
            //$table->string('phone')->nullable();
            $table->string('image');
            $table->string('experience');
            //$table->string('state');
            $table->boolean('is_featured')->nullable()->default(true);
            //$table->string('slug')->unique();

            $table->unsignedInteger('user_id')->nullable();
            //$table->unsignedInteger('category_id');

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
