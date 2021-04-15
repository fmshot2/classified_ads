<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAgentIdToRefererlinksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('refererlinks', function (Blueprint $table) {
            $table->string('agent_id')->nullable()->after('agent_code');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('refererlinks', function (Blueprint $table) {
            $table->dropColumn('agent_id');
        });
    }
}
