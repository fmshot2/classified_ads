<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeekingWorksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seeking_works', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('fullname');
            $table->string('phone');
            $table->string('job_type');
            $table->string('job_title');
            $table->string('slug')->unique();
            $table->string('job_experience');
            $table->string('still_studying')->nullable();
            $table->string('gender');
            $table->string('age');
            $table->string('marital_status')->nullable();
            $table->string('employment_status');
            $table->string('highest_qualification');
            $table->string('expected_salary');
            $table->string('user_state');
            $table->string('user_lga');
            $table->string('address')->nullable();
            $table->longText('work_experience')->nullable();
            $table->longText('education');
            $table->longText('certifications')->nullable();
            $table->longText('skills');
            $table->string('picture');
            $table->integer('status')->default(0);
            $table->integer('category_id');
            $table->integer('is_featured')->default(0)->nullable();
            $table->integer('paid_featured')->default(0);
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
        Schema::dropIfExists('seeking_works');
    }
}
