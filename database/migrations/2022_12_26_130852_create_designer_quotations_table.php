<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDesignerQuotationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('designer_quotations', function (Blueprint $table) {
            $table->id();

            $table->double('price');
            $table->text('description');
            $table->date('date');
            $table->string('email');
            $table->unsignedBigInteger('estimator_designer_list_id');
            $table->foreign('estimator_designer_list_id')->references('id')->on('estimator_designer_lists');
            $table->unsignedBigInteger('temporary_work_id');
            $table->foreign('temporary_work_id')->references('id')->on('temporary_works');
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
        Schema::dropIfExists('designer_quotations');
    }
}
