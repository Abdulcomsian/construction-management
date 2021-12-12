<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsActionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments_actions', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('scaffolding_id');
            $table->foreign('scaffolding_id')->references('id')->on('scaffoldings');

            $table->string('no')->nullable();
            $table->string('comments_actions')->nullable();
            $table->date('action_date')->nullable();

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
        Schema::dropIfExists('comments_actions');
    }
}
