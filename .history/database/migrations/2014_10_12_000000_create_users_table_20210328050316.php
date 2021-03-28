<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('username');
            $table->string('f_name');
            $table->string('l_name')->nullable();
            $table->string('email')->unique();
            $table->string('phn')->nullable();
            $table->string('address')->nullable();
            $table->string('password');
            $table->string('city')->nullable();
            $table->string('country->nullable();
            $table->string('state')->nullable();
            $table->string('post_code')->nullable();
            $table->string('company')->nullable();
            $table->string('company_url')->nullable();
            $table->string('position')->nullable();
            $table->string('private_test_key')->nullable();
            $table->string('public_test_key')->nullable();
            $table->string('type')->default('user');
            $table->string('verified')->nullable();
            $table->string('verification_token')->nullable();
            $table->boolean('status')->default(0);
            $table->string('edit_count')->nullable();
            $table->string('duration')->nullable();
            $table->string('icon_name')->nullable();
            $table->string('icon')->nullable();
            $table->string('payment')->nullable();
            $table->boolean('is_block')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
