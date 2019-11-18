<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReportSubTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('report_sub_types', function (Blueprint $table) {
            $table->smallIncrements('id');
            $table->string('name', 50);
            $table->tinyInteger('report_type_id')->unsigned();
            $table->timestamps();

            $table->foreign('report_type_id')
                ->references('id')
                ->on('report_types')
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
        Schema::dropIfExists('report_sub_types');
    }
}
