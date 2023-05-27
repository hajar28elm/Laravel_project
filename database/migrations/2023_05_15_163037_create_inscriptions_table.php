<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInscriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inscriptions', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('student_id');
            $table->unsignedInteger('course_id');
            $table->timestamp('date_inscription')->default(\DB::raw('CURRENT_TIMESTAMP'));
            $table->enum('status',['before','approved','rejected'])->default('before');
            $table->timestamps();
            $table->foreign('course_id')->references('id')->on('courses');
            $table->foreign('student_id')->references('id')->on('students');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inscriptions');
    }
}
