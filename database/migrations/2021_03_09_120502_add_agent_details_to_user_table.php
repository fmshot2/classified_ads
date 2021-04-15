<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAgentDetailsToUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('is_agent')->default(0)->nullable();
            $table->string('agent_code')->unique()->nullable();
            $table->string('lga')->nullable();
        });
    }

    /**>after('status')
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('is_agent');
            $table->dropColumn('agent_code');
            $table->dropColumn('lga');
        });
    }
}
