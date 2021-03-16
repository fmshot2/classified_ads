<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTermOfUseToPageContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('page_contents', function (Blueprint $table) {
            $table->text('term_of_use')->after('benefit_of_efcontact')->nullable();
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
            $table->dropColumn('term_of_use');
        });
    }
}
