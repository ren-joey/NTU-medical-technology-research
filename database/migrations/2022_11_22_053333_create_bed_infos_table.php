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
        Schema::create('bed_infos', function (Blueprint $table) {
            $table->string('BedIDSE')->unique()->comment('床位流水號');
            $table->string('WardCode')->comment('病房代碼');
            $table->string('RoomCode')->comment('病室代碼');
            $table->string('BedNo')->comment('床位代碼');
            $table->primary('BedIDSE');
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
        Schema::dropIfExists('bed_infos');
    }
};
