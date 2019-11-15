<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddStatsCommunicationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('communication', function (Blueprint $table) {
            //

            $table->integer('stats');
            $table->integer('createby');
            $table->integer('updateby');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('communication', function (Blueprint $table) {
            //
        });
    }
}
