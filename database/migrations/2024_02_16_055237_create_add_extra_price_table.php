<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddExtraPriceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('add_extra_price', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('temporary_work_id');
            $table->integer('price');
            $table->string('description')->nullable();
            $table->date('payment_date')->nullable();
            $table->string('status')->default('0');
            $table->unsignedBigInteger('adminDesigner_id');
            $table->foreign('temporary_work_id')->references('id')->on('temporary_works')->cascadeOnDelete();
            $table->foreign('adminDesigner_id')->references('id')->on('users')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /*
    Table Name:
    ->price
    ->description
    ->payment_date
    ->temporary_work_id
    ->adminDesigner_id
    ->status
    */

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('add_extra_price');
    }
}
