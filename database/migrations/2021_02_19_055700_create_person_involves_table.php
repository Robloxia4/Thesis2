<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonInvolvesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('person_involves', function (Blueprint $table) {
            $table->id('person_id');
            $table->bigInteger('blotter_id')->unsigned();
            $table->bigInteger('resident_id')->unsigned();
            $table->string('person_involve')->nullable();
            $table->string('involvement_type')->nullable();
            $table->foreign('resident_id')
                ->references('resident_id')
                ->on('resident_infos')
                ->onDelete('cascade');

            $table->foreign('blotter_id')
                ->references('blotter_id')
                ->on('blotters')
                ->onDelete('cascade');
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
        Schema::dropIfExists('person_involves');
    }
}
