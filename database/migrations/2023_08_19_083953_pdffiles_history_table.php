<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PdffilesHistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('pdf_files_history', function (Blueprint $table) {
            $table->id();
            $table->string('pdf_name')->nulable();;
            $table->bigInteger('tempwork_id')->unsigned()->nulable();
            $table->foreign('tempwork_id')->references('id')->on('temporary_works');
            $table->string('twc_id_no')->nullable();
            $table->enum('type', ['pre_con', 'design_brief']);
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
        //
        Schema::dropIfExists('pdf_files_history');
    }
}
