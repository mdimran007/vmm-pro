<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserInvestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_invests', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('vmm_id');
            $table->integer('invest_ammount')->default(0);
            $table->integer('bolus_count')->default(0);
            $table->integer('bolus_ammount')->default(0);
            $table->enum('status', array('running', 'finished'));
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
        Schema::dropIfExists('user_invests');
    }
}
