<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->increments('id');
            $table->string('number')->comment('رقم متابعة البلاغ')->nullable();
            $table->tinyInteger('location_id')->unsigned()->comment('مكان البلاغ');
            $table->date('date')->nullable();
            $table->string('name')->nullable()->comment('اسم المبلغ');
            $table->string('phone1')->nullable()->comment('رقم هاتف المبلغ');
            $table->string('phone2')->nullable()->comment('رقم هاتف المبلغ');
            $table->smallInteger('category_id')->unsigned()->comment('نوع الجهة المبلغة');
            $table->string('manager_name')->nullable()->comment('مدير الصيانة');
            $table->string('manager_phone')->nullable()->comment('رقم هاتف مدير الصيانة');
            $table->smallInteger('city_id')->unsigned()->comment('المدينة الكبرى');
            $table->smallInteger('locality_id')->unsigned()->comment('المحلية');
            $table->smallInteger('office_id')->unsigned()->comment('المكتب');
            $table->smallInteger('town_id')->unsigned()->comment('المدينة');
            $table->integer('square_id')->unsigned()->comment('المربع');

            $table->string('house_number')->nullable()->comment('رقم المنزل');
            $table->string('house_description')->nullable()->comment('وصف المنزل');

            $table->tinyInteger('report_type_id')->unsigned()->comment('نوع البلاغ	');
            $table->smallInteger('report_sub_type_id')->unsigned()->comment('تفصيل البلاغ الفرعي');
            $table->smallInteger('report_sub_detail_id')->unsigned()->comment('تفصيل البلاغ	');

            $table->tinyInteger('report_status_id')->unsigned()->comment('حالة البلاغ');

            $table->string('report_action_description')->nullable()->comment('وصف ما تم عمله في البلاغ');

            $table->smallInteger('createby')->nullable()->unsigned()->comment('');
            $table->smallInteger('updateby')->nullable()->unsigned()->comment('');

            $table->timestamps();


            $table->foreign('location_id')
                ->references('id')
                ->on('locations')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('category_id')
                ->references('id')
                ->on('categories')
                ->onDelete('cascade')
                ->onUpdate('cascade');
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

            $table->foreign('town_id')
                ->references('id')
                ->on('towns')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('square_id')
                ->references('id')
                ->on('squares')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('report_type_id')
                ->references('id')
                ->on('report_types')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('report_sub_type_id')
                ->references('id')
                ->on('report_sub_types')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('report_sub_detail_id')
                ->references('id')
                ->on('report_sub_details')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('report_status_id')
                ->references('id')
                ->on('report_statuses')
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
        Schema::dropIfExists('reports');
    }
}
