<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patient_visit_extends', function (Blueprint $table) {
            $table->increments('PatientVisitIDSE')->comment('預約流水號');
            $table->string('DeptCode')->comment('科別');
            $table->string('ClinicCode')->comment('門診代碼');
            $table->string('ClinicNo')->comment('診別');
            $table->string('AcountID')->comment('身分證字號');
            $table->string('ChartNo')->comment('病歷號');
            $table->string('SequenceNo')->comment('病人診號');
            $table->enum('AmPmCode', ['1', '2'])->comment('上下午');
            $table->string('StartDateTime')->comment('看診日期時間');
            $table->string('OperationTypeCode')->nullable()->comment('手術代碼(若無手術則空)');
            $table->string('OperationStartTimeChar')->nullable()->comment('手術預計到診時間(若無手術則空)');
            $table->string('OperationNeedTime')->nullable()->comment('手術所需時間(若無手術則空)');
            $table->string('OproomType')->nullable()->comment('手術房號(若無手術則空)');

            $table->foreign('AcountID')->references('AccountID')->on('patient_infos');

            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('patient_visit_extends');
    }
};
