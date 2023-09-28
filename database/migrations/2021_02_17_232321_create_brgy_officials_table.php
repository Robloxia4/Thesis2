<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBrgyOfficialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('brgy_officials', function (Blueprint $table) {
            $table->id('official_id');

            $table->string('name',255)->nullable();
            $table->string('position',255)->nullable();
            $table->string('official_committe',255)->nullable();
            $table->integer('year_of_service')->unsigned()->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('brgy_officials');
    }
}
