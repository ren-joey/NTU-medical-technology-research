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
        Schema::create('clinic_patient_accounts', function (Blueprint $table) {
            $table->string('AccountIDSE')->unique()->comment('帳號流水號');
            $table->string('AcountID')->comment('身分證字號');
            $table->string('DeptCode')->comment('科別');
            $table->date('ComeClinicDate')->comment('看診日期');
            $table->integer('PatientVisitIDSE')->comment('預約流水號');
            $table->primary('AccountIDSE');

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
        Schema::dropIfExists('clinic_patient_accounts');
    }
};
