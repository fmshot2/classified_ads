<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGeneralInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('general_infos', function (Blueprint $table) {
            $table->id();
            $table->string('site_name');
            $table->string('header_logo');
            $table->string('header_email');
            $table->string('header_phone');
            $table->string('footer_phone2');
            $table->string('footer_address');
            $table->string('footer_sitename');
            $table->longText('register_section1');
            $table->longText('register_section2');
            $table->longText('register_section3');
            $table->string('facebook');
            $table->string('instagram');
            $table->string('linkedin');
            $table->string('support_email');
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
        Schema::dropIfExists('general_infos');
    }
}
