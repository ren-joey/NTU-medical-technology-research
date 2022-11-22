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
        Schema::create('patient_e_r_s', function (Blueprint $table) {
            $table->increments('PatientVisitIDSE')->comment('預約流水號');
            $table->string('AccountIDSE')->comment('帳號流水號');
            $table->dateTime('TriageDatetime')->nullable()->comment('檢傷時間');
            $table->dateTime('RegisterDatetime')->nullable()->comment('掛號時間');
            $table->dateTime('DiagnisisDatetime')->nullable()->comment('診斷時間');
            $table->dateTime('ObserveStartDatetime')->nullable()->comment('開始暫留時間');
            // $table->dateTime('AllowDischargeDatetime')->nullable()->comment('准許離部時間');
            $table->dateTime('DischargeDatetime')->nullable()->comment('離部時間');
            $table->string('InPatientAccountIDSE')->comment('住院帳號');
            $table->string('InPatientBedIDSE')->comment('住院病床(病房床位流水號)');
            $table->string('AccompanyCount')->comment('陪病證數量');

            $table->foreign('InPatientBedIDSE')->references('BedIDSE')->on('bed_infos');

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
        Schema::dropIfExists('patient_e_r_s');
    }
};
