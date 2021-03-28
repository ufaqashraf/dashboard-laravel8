<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDevicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('devices', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained('users');
            $table->string('form_id');
            $table->string('f_name');
            $table->string('l_name');
            $table->string('street');
            $table->string('city');
            $table->string('post_code');
            $table->string('country');
            $table->string('tel_num');
            $table->string('no');
            $table->string('email');
            $table->string('device_name');
            $table->string('serial_num');
            $table->string('type');
            $table->string('assigned');
            $table->string('status');
            $table->string('user_location');
            $table->string('user_position');
            $table->string('dept');
            $table->string('device_encription');
            $table->string('date_assigned');
            $table->string('date_returned');
            $table->string('staff_sign');
            $table->string('staff_image');
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
        Schema::dropIfExists('devices');
    }
}
