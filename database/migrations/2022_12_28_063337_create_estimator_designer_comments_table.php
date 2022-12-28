<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstimatorDesignerCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estimator_designer_comments', function (Blueprint $table) {
            $table->id();

            $table->text('comment')->nullable();
            $table->string('comment_email')->nullable();
            $table->string('comment_date')->nullable();
            $table->text('reply')->nullable();
            $table->string('reply_email')->nullable();
            $table->string('reply_date')->nullable();

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
        Schema::dropIfExists('estimator_designer_comments');
    }
}
