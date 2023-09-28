<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSessionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sessions', function (Blueprint $table) {
            $table->id('session_id');
            $table->bigInteger('user_id')->unsigned();
            $table->string('username',255);
            $table->timestampTz("login_at");
            

            // $table->foreign('user_id','username')
            //     ->references('account_id','username')
            //     ->on('accounts','accounts')
            //     ->onDelete('cascade','cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sessions');
    }
}
