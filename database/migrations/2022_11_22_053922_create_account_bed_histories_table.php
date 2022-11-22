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
        Schema::create('account_bed_histories', function (Blueprint $table) {
            $table->id();
            $table->string('AccountIDSE')->comment('帳號流水號');
            $table->string('BedIDSE')->comment('床位流水號');
            $table->dateTime('TransferInDate')->comment('轉入日');
            $table->dateTime('TransferOutDate')->comment('轉出日');
            $table->string('DeptCode')->comment('轉入科別');

            $table->foreign('AccountIDSE')->references('AccountIDSE')->on('clinic_patient_accounts');
            $table->foreign('BedIDSE')->references('BedIDSE')->on('bed_infos');

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
        Schema::dropIfExists('account_bed_histories');
    }
};
