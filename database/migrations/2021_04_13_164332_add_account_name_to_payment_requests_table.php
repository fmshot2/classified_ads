<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAccountNameToPaymentRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('payment_requests', function (Blueprint $table) {
            $table->string('account_name')->after('user_type')->nullable();
            $table->string('account_number')->after('account_name')->nullable();
            $table->string('bank_name')->after('account_number')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('payment_requests', function (Blueprint $table) {
            $table->dropColumn('account_name');
            $table->dropColumn('account_number');
            $table->dropColumn('bank_name');
        });
    }
}
