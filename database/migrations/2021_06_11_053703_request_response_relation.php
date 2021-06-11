<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RequestResponseRelation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('coordinates_queries', function (Blueprint $table) {
            $table->bigInteger('response_id')->unsigned()->nullable();
            $table->foreign('response_id')->references('id')->on('responses');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::table('coordinates_queries', function (Blueprint $table) {
            $table->dropForeign(['response_id']);
            $table->dropColumn(['response_id']);
        });
    }
}
