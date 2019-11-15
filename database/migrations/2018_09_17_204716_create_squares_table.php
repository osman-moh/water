<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSquaresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('squares', function (Blueprint $table) {

                $table->increments('id');
                $table->string('name');
                $table->Integer('Lloction_id');
                $table->Integer('regional_id');
                $table->Integer('suboffices_id');
                $table->Integer('cities_id');
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
        Schema::dropIfExists('squares');
    }
}
