<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTownsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('towns', function (Blueprint $table) {
            $table->smallIncrements('id');
            $table->string('name');
            $table->smallInteger('city_id')->unsigned()->comment('المدينة الكبرى');
            $table->smallInteger('locality_id')->unsigned()->comment('المحلية');
            $table->smallInteger('office_id')->unsigned()->comment('المكتب');
            $table->timestamps();

            $table->foreign('city_id')
                ->references('id')
                ->on('cities')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('locality_id')
                ->references('id')
                ->on('localities')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('office_id')
                ->references('id')
                ->on('offices')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('towns');
    }
}
