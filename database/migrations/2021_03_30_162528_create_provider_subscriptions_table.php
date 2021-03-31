<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProviderSubscriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('provider_subscriptions', function (Blueprint $table) {
            $table->id();
             $table->integer('user_id')->nullable();
            $table->string('user_registration_date')->nullable();
            $table->string('last_amount_paid')->nullable();
            $table->string('subscription_end_date')->nullable();
            $table->string('last_subscription_starts')->nullable();
            $table->string('slug')->unique()->nullable();
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
        Schema::dropIfExists('provider_subscriptions');
    }
}
