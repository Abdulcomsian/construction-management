<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanyProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_profiles', function (Blueprint $table) {
            $table->id();

            $table->string('company_name')->nullable();
            $table->string('comapny_email')->nullable();
            $table->text('company_address')->nullable();
            $table->text('company_description')->nullable();
            $table->date('year_established')->nullable();
            $table->string('phone')->nullable();
            $table->text('website')->nullable();
            $table->string('logo')->nullable();
            $table->string('company_cv')->nullable();
            $table->string('indemnity_insurance')->nullable();
            $table->text('other_files')->nullable();

            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users');
            
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
        Schema::dropIfExists('company_profiles');
    }
}
