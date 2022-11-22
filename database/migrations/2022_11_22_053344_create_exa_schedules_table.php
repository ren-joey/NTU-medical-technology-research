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
        Schema::create('exa_schedules', function (Blueprint $table) {
            $table->string('RequestSheetNo')->unique()->comment('檢查檢驗單號');
            $table->string('UnitPerformCode')->comment('檢查室代碼');
            $table->date('ServiceDatetime')->comment('日期');
            $table->enum('ShiftType', ['1', '2'])->comment('上下午');
            $table->string('ExaOrderCode')->comment('檢查醫令碼');
            $table->integer('ServiceSeqNo')->comment('檢查序號');
            $table->enum('PatientClassCode', ['I', 'O', 'E'])->comment('門診住院急診(I:住院 O:門診 E:急診)');
            $table->string('AcountID')->comment('身分證字號');
            $table->string('AccountIDSE')->comment('帳號流水號');
            $table->dateTime('RegisterTime')->comment('病人應到之預約時間');
            $table->primary('RequestSheetNo');
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
        Schema::dropIfExists('exa_schedules');
    }
};
