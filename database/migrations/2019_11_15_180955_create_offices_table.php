<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOfficesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offices', function (Blueprint $table) {
            $table->smallIncrements('id');
            $table->string('name');
            $table->smallInteger('city_id')->unsigned()->comment('المدينة الكبرى');
            $table->smallInteger('locality_id')->unsigned()->comment('المحلية');
            $table->string('manager_name')->comment('مدير المكتب');
            $table->string('manager_phone');
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
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('offices');
    }
}
