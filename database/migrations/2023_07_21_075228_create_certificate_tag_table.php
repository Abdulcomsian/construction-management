<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCertificateTagTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('certificate_tag', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('designer_certificate_id');
            $table->unsignedBigInteger('tag_id');
            $table->timestamps();
            $table->foreign('designer_certificate_id')->references('id')->on('designer_certificates')->onDelete('cascade');
            $table->foreign('tag_id')->references('id')->on('tags')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('certificate_tag');
    }
}
