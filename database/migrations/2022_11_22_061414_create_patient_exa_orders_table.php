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
        Schema::create('patient_exa_orders', function (Blueprint $table) {
            $table->increments('ExaOrderIDSE')->comment('病患檢查醫令主流水號');
            $table->string('DeptCode')->comment('科別');
            $table->enum('PatientClassCode', ['I', 'O', 'E'])->comment('門診住院急診(I:住院 O:門診 E:急診)');
            $table->string('AcountID')->comment('身分證字號');
            $table->string('AccountIDSE')->comment('帳號流水號');
            $table->string('RequestSheetNo')->comment('檢查檢驗單號');
            // $table->string('ExaOrderCode')->comment('檢查醫令碼');
            $table->dateTime('RegisterDateTime')->comment('報到時間');
            $table->dateTime('ExecuteCompleteDatetime')->comment('執行完成時間');
            // $table->string('ExaOrderFullName')->comment('檢查醫令全名稱');
            $table->date('PlanExecuteDateTime')->comment('預計執行日期');

            $table->foreign('AcountID')->references('AccountID')->on('patient_infos');
            $table->foreign('RequestSheetNo')->references('RequestSheetNo')->on('exa_schedules');

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
        Schema::dropIfExists('patient_exa_orders');
    }
};
