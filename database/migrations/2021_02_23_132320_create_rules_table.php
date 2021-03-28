<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rules', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained('users')->after('id');
            $table->string('rule1');
            $table->string('condition');
            $table->string('rule2');
            $table->text('description');
            $table->string('rule_action');
            $table->string('advance_opt1')->nullable();
            $table->string('advance_opt2')->nullable();
            $table->string('advance_opt3')->nullable();
            $table->string('advance_opt4')->nullable();
            $table->boolean('status')->default(0);
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
        Schema::dropIfExists('rules');
    }
}
