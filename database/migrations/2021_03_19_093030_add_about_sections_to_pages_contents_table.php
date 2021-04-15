<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAboutSectionsToPagesContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('page_contents', function (Blueprint $table) {
            $table->text('about_site_section_1')->nullable();
            $table->text('about_site_section_2')->nullable();
            $table->text('about_site_section_3')->nullable();
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
            $table->dropColumn('about_site_section_1');
            $table->dropColumn('about_site_section_2');
            $table->dropColumn('about_site_section_3');
        });
    }
}
