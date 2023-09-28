<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlottersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blotters', function (Blueprint $table) {
            $table->id('blotter_id');
            $table->string('incident_type', 255)->nullable();
            $table->string('status')->nullable();
            $table->string('schedule')->nullable();
            $table->date('schedule_date')->nullable();
            // $table->time('schedule_time')->nullable();
            $table->date('date_reported')->nullable();
            $table->time('time_reported')->nullable();
            $table->date('date_incident')->nullable();
            $table->time('time_incident')->nullable();
            $table->string('incident_location', 255)->nullable();
            $table->longText('incident_narrative')->nullable();


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
        Schema::dropIfExists('blotters');
    }
}
