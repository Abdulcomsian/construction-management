<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmailExtrasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('email_extras', function (Blueprint $table) {
            $table->id();
            $table->text('attachment')->nullable();
            $table->text('cc_emails')->nullable();
            $table->unsignedBigInteger('mailable_id');
            $table->string('mailable_type');
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
        Schema::dropIfExists('email_extras');
    }
}
