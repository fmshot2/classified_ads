<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAdvertReferralNameToAdvertRequestsForms extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('advert_requests_forms', function (Blueprint $table) {
            $table->string('advert_referral_name')->after('message')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('advert_requests_forms', function (Blueprint $table) {
            $table->dropColumn('advert_referral_name');
        });
    }
}
