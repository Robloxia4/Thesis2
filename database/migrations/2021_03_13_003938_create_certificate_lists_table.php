<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCertificateListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('certificate_lists', function (Blueprint $table) {
            $table->id('certificate_list_id');
            $table->string('content_1')->nullable();
            $table->string('content_2')->nullable();
            $table->string('content_3')->nullable();
            $table->string('certificate_name')->nullable();
            $table->bigInteger('price')->nullable()->unsigned();
            $table->string('certificate_type')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('certificate_lists');
    }
}
