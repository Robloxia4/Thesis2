<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBarangayimagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barangayimages', function (Blueprint $table) {
            $table->id('barangay_id');
            $table->string('barangay_name')->nullable();
            $table->string('image')->nullable();
            $table->string('url')->nullable();
            $table->text('city')->nullable();
            $table->text('province')->nullable();
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
        Schema::dropIfExists('barangayimages');
    }
}
