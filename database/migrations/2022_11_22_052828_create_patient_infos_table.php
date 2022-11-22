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
        Schema::create('patient_infos', function (Blueprint $table) {
            $table->string('AccountID')->comment('身分證字號');
            // $table->string('FamilyName')->comment('姓氏');
            // $table->string('GivenName')->comment('名字');
            $table->enum('Sex', ['M', 'F'])->comment('性別');
            $table->string('ChartNo')->comment('病歷號');
            $table->Date('Birthday')->comment('出生年月日');
            // $table->string('RegisterAddress')->comment('戶籍住址');
            // $table->string('ContactAddress')->comment('聯絡地址');
            $table->primary('AccountID');
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
        Schema::dropIfExists('patient_infos');
    }
};
