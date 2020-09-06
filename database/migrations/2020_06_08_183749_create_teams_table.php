<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teams', function (Blueprint $table) {
            $table->id();

            $table->string('en_username');
            $table->string('ar_username');

            $table->string('en_job_title');
            $table->string('ar_job_title');

            $table->string('en_fullname');
            $table->string('ar_fullname');

            $table->string('email');

            $table->string('en_education');
            $table->string('ar_education');

            $table->string('en_language');
            $table->string('ar_language');

            $table->string('en_skills');
            $table->string('ar_skills');

            $table->string('logo');


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
        Schema::dropIfExists('teams');
    }
}
