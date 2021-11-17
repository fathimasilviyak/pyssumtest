<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrainingStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('training_students', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('father_name')->nullable();
            $table->string('guardian')->nullable();
            $table->string('mother_name')->nullable();
            $table->date('dob')->nullable();
            $table->string('age')->nullable();
            $table->string('gender')->nullable();
            $table->string('marital_status')->nullable();
            $table->string('aadhar')->nullable();
            $table->string('nationality')->nullable();
            $table->string('domicile')->nullable();
            $table->string('category')->nullable();
            $table->string('income')->nullable();
            $table->text('correspondance_address')->nullable();
            $table->text('permanent_address')->nullable();
            $table->string('state')->nullable();
            $table->string('pincode')->nullable();
            $table->string('contact_number')->nullable();
            $table->string('email')->nullable();
            $table->string('ssc_board')->nullable();
            $table->string('ssc_year_passing')->nullable();
            $table->string('ssc_total_marks')->nullable();
            $table->string('ssc_marks_obtained')->nullable();
            $table->string('ssc_percentage_obtained')->nullable();
            $table->string('ssc_subject')->nullable();
            $table->string('hsc_board')->nullable();
            $table->string('hsc_year_passing')->nullable();
            $table->string('hsc_total_marks')->nullable();
            $table->string('hsc_marks_obtained')->nullable();
            $table->string('hsc_percentage_obtained')->nullable();
            $table->string('hsc_subject')->nullable();
            $table->string('examination_board_university')->nullable();
            $table->string('examination_year_passing')->nullable();
            $table->string('examination_total_marks')->nullable();
            $table->string('examination_marks_obtained')->nullable();
            $table->string('examination_percentage_obtained')->nullable();
            $table->string('examination_subject')->nullable();
            $table->date('date')->nullable();
            $table->text('extra_curricular_activities')->nullable();
            $table->text('course_reason')->nullable();
            $table->string('photo')->nullable();
            $table->string('statement_marks')->nullable();
            $table->string('character_certificate')->nullable();
            $table->string('birth_certificate')->nullable();
            $table->string('experience_certificate')->nullable();
            $table->string('fee_document')->nullable();
            $table->string('city')->nullable();
            $table->string('academic_session')->nullable();
            $table->foreignId('user_id')->constrained()
            ->onDelete('cascade');

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
        Schema::dropIfExists('training_students');
    }
}
