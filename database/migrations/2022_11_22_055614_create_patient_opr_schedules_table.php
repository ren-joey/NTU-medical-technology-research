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
        Schema::create('patient_opr_schedules', function (Blueprint $table) {
            $table->string('OpScheduleIDSE')->unique()->comment('手術排程流水號');
            $table->string('DeptCode')->comment('科別');
            $table->string('AcountID')->comment('身分證字號');
            $table->string('AccountIDSE')->comment('帳號流水號');
            $table->date('OpDateTime')->comment('手術日期');
            $table->string('OpRoomNo')->comment('手術房號');
            $table->string('OpSeqNo')->comment('手術序號');
            // $table->dateTime('EstiStartDateTime')->comment('預估起時');
            // $table->string('EstiSpendTime')->comment('預估費時');
            $table->enum('OpSource', ['I', 'O', 'E'])->comment('手術來源(I:住院 O:門診 E:急診)');
            $table->primary('OpScheduleIDSE');

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
        Schema::dropIfExists('patient_opr_schedules');
    }
};
