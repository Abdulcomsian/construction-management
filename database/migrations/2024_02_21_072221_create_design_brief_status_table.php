<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDesignBriefStatusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('design_brief_status', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('temporary_work_id');
            $table->string('status')->default('0');
            $table->foreign('temporary_work_id')->references('id')->on('temporary_works')->cascadeOnDelete();
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
        Schema::dropIfExists('design_brief_status');
    }
}
