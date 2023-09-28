<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
class CreateCertificateRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('certificate_requests', function (Blueprint $table) {
            $table->id('request_id');
            $table->BigInteger('resident_id')->unsigned();
            $table->string('name')->nullable();
            $table->string('description')->nullable();

            $table->string('age')->nullable();
            $table->string('gender')->nullable();
            $table->string('paid')->nullable();
            $table->string('price')->nullable();
            $table->BigInteger('cert_id')->unsigned();
            $table->string('request_type')->nullable();
            $table->foreign('resident_id')
            ->references('resident_account_id')
            ->on('resident_accounts')
            ->onDelete('cascade');
            $table->foreign('cert_id')
            ->references('certificate_list_id')
            ->on('certificate_lists')
            ->onDelete('cascade');
            $table->timestamps();
        });
        DB::statement('ALTER TABLE certificate_requests AUTO_INCREMENT = 100000;');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('certificate_requests');
    }
}
