<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChangeEmailHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('change_email_histories', function (Blueprint $table) {
            $table->id();
            $table->string('email')->nullable();
            $table->string('type')->nullable();
            $table->tinyInteger('status')->default(0);
            $table->integer('foreign_idd')->nullable();
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
        Schema::dropIfExists('change_email_histories');
    }
}
