<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommunicationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('communication', function (Blueprint $table) {
            $table->increments('id');
            $table->string('loction');
            $table->date('date');
            //person
            $table->string('name');
            $table->string('phone');
            $table->string('phone1');
            $table->string('phone2');
            $table->string('type');
            $table->string('wokername');
            $table->string('wokerphone');
            //communication
            $table->string('lloction');
            $table->string('Local');
            $table->string('Sub-office');
            $table->string('City');
            $table->string('Square');
            $table->string('House-number');
            $table->string('description');
            $table->string('Type-communication');
            $table->string('Details-communication');


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
        Schema::dropIfExists('_communication');
    }
}
