<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agents', function (Blueprint $table) {
            $table->id();
            $table->string('email')->unique();
            $table->string('password')->nullable();
            $table->string('name')->nullable();
            $table->string('phone')->nullable();
            $table->string('state')->nullable();
            $table->string('identification_type')->nullable();
            $table->string('identification_id')->nullable();
            $table->string('agent_code')->nullable();
            $table->string('referer_id')->nullable();
            $table->text('refererAmount')->nullable();
            $table->integer('is_paid')->default(0);
            $table->double('total_paid')->default(0);
            $table->boolean('status')->default(true)->nullable();
            $table->string('lga')->nullable();
            $table->string('address')->nullable();
            $table->string('bankname')->nullable();
            $table->string('accountname')->nullable();
            $table->string('accountno')->nullable();
            $table->string('level3')->nullable();
            $table->string('level4')->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('agents');
    }
}
