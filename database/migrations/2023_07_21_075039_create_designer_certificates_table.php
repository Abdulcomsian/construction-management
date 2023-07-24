<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDesignerCertificatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('designer_certificates', function (Blueprint $table) {
            $table->id();
            $table->string('certificate_element');
            $table->string('design_document');
            $table->string('created_by');
            $table->string('designer_signature')->nullable();
            $table->string('checker_signature')->nullable();
            $table->unsignedBigInteger('temporary_work_id');
            $table->timestamps();
            $table->foreign('temporary_work_id')->references('id')->on('temporary_works')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('designer_certificates');
    }
}
