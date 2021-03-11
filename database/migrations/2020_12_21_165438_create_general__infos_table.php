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
        Schema::create('general__infos', function (Blueprint $table) {
            $table->id();

            $table->string('site_name')->nullable();
            $table->string('hot_line')->nullable();
            $table->string('hot_line_2')->nullable();
            $table->string('hot_line_3')->nullable();
            $table->string('address')->nullable();
            $table->string('logo')->nullable();
            $table->string('header_email')->nullable();
            $table->string('header_phone')->nullable();
            $table->string('footer_phone2')->nullable();
            $table->string('footer_address')->nullable();
            $table->string('footer_sitename')->nullable();
            $table->longText('register_section_1')->nullable();
            $table->longText('register_section_2')->nullable();
            $table->longText('register_section_3')->nullable();
            $table->string('register_section_1_title')->nullable();
            $table->string('register_section_2_title')->nullable();
            $table->string('register_section_3_title')->nullable();
            $table->string('facebook')->nullable();
            $table->string('instagram')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('twitter')->nullable();
            $table->string('support_email')->nullable();

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
        Schema::dropIfExists('general__infos');
    }
}
