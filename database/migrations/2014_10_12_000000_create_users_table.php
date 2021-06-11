<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('role')->default('buyer');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('image')->nullable();
            $table->string('phone')->nullable();
            $table->string('about')->nullable();
            $table->string('address')->nullable();
            $table->string('state')->nullable();
            $table->string('slug')->unique()->nullable();
            $table->string('refererLink')->nullable();
            $table->integer('idOfReferer')->nullable();
            $table->integer('refererAmount')->nullable();            
            $table->boolean('status')->default(true);
            $table->rememberToken();
            $table->timestamps();
            $table->integer('hasUploadedService')->default(0);
            $table->integer('requestMade')->default(0);
            $table->decimal('latitude', 10, 7)->nullable();
            $table->decimal('longitude', 11, 8)->nullable();
            $table->string('idOfAgent')->nullable();   
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
