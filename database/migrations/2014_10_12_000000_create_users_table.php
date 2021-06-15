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
            $table->string('is_agent')->default(0);
            $table->string('agent_code')->unique()->default(0);
            $table->string('role')->default('buyer');
            $table->integer('is_ef_marketer')->default(0);
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('image')->nullable();
            $table->string('phone')->nullable();
            $table->string('about')->nullable();
            $table->string('address')->nullable();
            $table->string('state')->nullable();
            $table->string('slug')->nullable();
            $table->string('refererLink')->nullable();
            $table->integer('idOfReferer')->nullable();
            $table->integer('refererAmount')->nullable();
            $table->boolean('status')->default(true);
            $table->string('bank_name')->nullable();
            $table->string('account_number')->nullable();
            $table->string('account_name')->nullable();
            $table->integer('badges')->default(4);
            $table->integer('badgetype')->default(0);
            $table->integer('hasUploadedService')->default(0);
            $table->integer('requestMade')->default(0);
            $table->decimal('latitude', 10, 7)->nullable();
            $table->decimal('longitude', 11, 8)->nullable();
            $table->string('idOfAgent')->nullable();
            $table->string('lga')->nullable();
            $table->string('identification_type')->nullable();
            $table->string('identification_id')->unique()->nullable();
            $table->timestamp('last_seen')->nullable();
            $table->integer('is_paid')->nullable();
            $table->string('group_code')->nullable();
            $table->string('level1')->nullable();
            $table->string('level2')->nullable();
            $table->string('level3')->nullable();
            $table->string('level4')->nullable();
            $table->string('sub_has_ended')->default(0);
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
