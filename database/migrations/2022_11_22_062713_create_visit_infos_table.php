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
        Schema::create('visit_infos', function (Blueprint $table) {
            $table->increments('VisitIDSE')->comment('預約流水號');
            $table->string('ChartNo')->comment('被探訪者病歷號');
            $table->string('AccountIDSE')->comment('被探訪者帳號流水號');
            $table->string('VisitPersonID')->comment('訪客身份證字號');
            // $table->string('VisitPersonName')->comment('訪客姓名');
            $table->date('VisitStartDate')->comment('陪探病開始時間');
            $table->date('VisitEndDate')->comment('陪探病結束時間');
            $table->enum('PatientClassCode', ['I', 'O', 'E'])->comment('門診住院急診(I:住院 O:門診 E:急診)');
            $table->string('DeptCode')->comment('科別');

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
        Schema::dropIfExists('visit_infos');
    }
};
