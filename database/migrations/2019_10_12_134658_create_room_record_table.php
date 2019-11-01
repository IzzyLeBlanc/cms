<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomRecordTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('room_record', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('user_id');
            $table->string('room');
            $table->string('floor');
            $table->string('block');
            $table->string('sem');
            $table->timestamp('checkout');
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
        Schema::dropIfExists('room_record');
    }
}
