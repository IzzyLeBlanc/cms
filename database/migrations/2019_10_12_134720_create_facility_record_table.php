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
            $table->string('studentid');
            $table->string('facilityid');
            $table->string('programName')->nullable();
            $table->string('status');
            $table->dateTime('start_date');
            $table->dateTime('start_time');
            $table->dateTime('end_date');
            $table->dateTime('end_time');
            $table->string('receiptNo');
            $table->string('rejectReason');
            $table->string('staffid')->nullable();
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
