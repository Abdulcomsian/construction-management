<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTemporaryWorkRejectedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('temporary_work_rejecteds', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('temporary_work_id');
            $table->foreign('temporary_work_id')->references('id')->on('temporary_works');
            $table->text('comment')->nullable();
            $table->string('pdf_url')->nullable();
            $table->string('email')->nullable();
            $table->string('rejected_by')->nullable();
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
        Schema::dropIfExists('temporary_work_rejecteds');
    }
}
