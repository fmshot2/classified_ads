<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubscriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subscriptions', function (Blueprint $table) {
            $table->id();
            $table->string('email');
            $table->string('user_registration_date')->nullable();
            $table->string('last_amount_paid')->nullable();
            $table->string('subscription_end_date')->nullable();
            $table->string('last_subscription_starts')->nullable();
            $table->string('sub_type')->nullable();
            $table->string('slug')->unique()->nullable();
            $table->integer('subscriptionable_id')->nullable();
            $table->integer('subscriptionable_type')->nullable();            
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
        Schema::dropIfExists('subscriptions');
    }
}
