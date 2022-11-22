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
        Schema::create('admission_patient_accounts', function (Blueprint $table) {
            $table->id();
            $table->string('AccountIDSE')->comment('帳號流水號');
            $table->string('AcountID')->comment('身分證字號');
            $table->string('DeptCode')->comment('科別');
            $table->dateTime('InDate')->comment('住院日期');
            $table->dateTime('OutDate')->nullable()->comment('出院日期');

            $table->foreign('AcountID')->references('AccountID')->on('patient_infos');
            $table->foreign('AccountIDSE')->references('AccountIDSE')->on('clinic_patient_accounts');

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
        Schema::dropIfExists('admission_patient_accounts');
    }
};
