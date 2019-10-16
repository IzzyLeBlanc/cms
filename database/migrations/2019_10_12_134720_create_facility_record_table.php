<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFacilityRecordTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('facility_record', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('programName')->nullable();
            $table->string('status');
            $table->dateTime('start');
            $table->dateTime('end');
            $table->string('receiptNo');
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
        Schema::dropIfExists('facility_record');
    }
}
