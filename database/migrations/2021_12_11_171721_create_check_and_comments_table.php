<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCheckAndCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('check_and_comments', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('scaffolding_id');
            $table->foreign('scaffolding_id')->references('id')->on('scaffoldings');

            $table->text('radio_checks')->nullable();
            $table->text('comments')->nullable();

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
        Schema::dropIfExists('check_and_comments');
    }
}
