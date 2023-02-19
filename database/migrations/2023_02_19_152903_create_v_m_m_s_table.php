<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVMMSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('v_m_m_s', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->integer('lifetime')->default(0);
            $table->integer('minimum_invest');
            $table->integer('distribute_coin');
            $table->integer('prepration_time');
            $table->dateTime('start_time');
            $table->string('status');
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
        Schema::dropIfExists('v_m_m_s');
    }
}
