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
        Schema::create('schedule_times', function (Blueprint $table) {
            $table->id();
            $table->string('OpScheduleIDSE')->comment('手術排程流水號');
            // $table->dateTime('STime')->nullable()->comment('預計開始時間');
            // $table->dateTime('ETime')->nullable()->comment('預計結束時間');
            $table->dateTime('ASTime')->nullable()->comment('實際開始時間');
            $table->dateTime('AETime')->nullable()->comment('實際結束時間');

            $table->foreign('OpScheduleIDSE')->references('OpScheduleIDSE')->on('patient_opr_schedules');

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
        Schema::dropIfExists('schedule_times');
    }
};
