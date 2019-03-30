<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentCvTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_cv', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('student_id');
            $table->string('name');
            $table->string('lastname');
            $table->string('mobile');
            $table->string('email');
            $table->date('date_of_birth')->nullable();
            $table->string('city');
            $table->string('photo')->nullable();
            $table->json('education_date')->nullable();
            $table->json('education_place')->nullable();
            $table->json('science_area')->nullable();
            $table->json('degree')->nullable();
            $table->json('specialty')->nullable();
            $table->json('job_date')->nullable();
            $table->json('job_company')->nullable();
            $table->json('job_position')->nullable();
            $table->json('event_date')->nullable();
            $table->json('event_name')->nullable();
            $table->json('event_organizators')->nullable();
            $table->json('sertificate')->nullable();
            $table->json('languages')->nullable();
            $table->text('personal_qualities')->nullable();
            $table->text('hobby')->nullable();
            $table->boolean('driver_license')->nullable();
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
        Schema::dropIfExists('student_cv');
    }
}
