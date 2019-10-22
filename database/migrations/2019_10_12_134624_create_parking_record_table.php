<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParkingRecordTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parking_record', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('studentid');
            $table->string('parkingid');
            $table->string('receiptNo');
            $table->string('plateNo');
            $table->string('carModel');
            $table->string('carColor');
            $table->string('status');
            $table->date('end');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('parking_record');
    }
}
