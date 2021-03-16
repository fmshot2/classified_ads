<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddBenefitOfEfcontactToPagesContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('page_contents', function (Blueprint $table) {
            $table->text('benefit_of_efcontact')->after('privacy_policy')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('page_contents', function (Blueprint $table) {
            $table->dropColumn('benefit_of_efcontact');
        });
    }
}
