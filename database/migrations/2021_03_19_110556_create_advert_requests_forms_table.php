<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdvertRequestsFormsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('advert_requests_forms', function (Blueprint $table) {
            $table->id();
            $table->string('requester_name');
            $table->string('email');
            $table->string('phone');
            $table->string('advert_type');
            $table->string('subject');
            $table->text('message');
            $table->string('advert_referral_name')->nullable();
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
        Schema::dropIfExists('advert_requests_forms');
    }
}
