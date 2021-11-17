<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEarlyInterventionRegistrationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('early_intervention_registrations', function (Blueprint $table) {
            $table->id();  
            $table->string('name')->nullable();
            $table->date('dob')->nullable();
            $table->string('gender')->nullable();
            $table->string('aadhar')->nullable();
            $table->string('reffered_by')->nullable();
            $table->string('father_name')->nullable();
            $table->string('father_occupation')->nullable();
            $table->string('father_contact')->nullable();
            $table->string('mother_name')->nullable();
            $table->string('mother_occupation')->nullable();
            $table->string('mother_contact')->nullable();
            $table->text('address')->nullable();
            $table->text('present_complaints')->nullable();
            $table->string('head_control')->nullable();
            $table->string('sitting')->nullable();
            $table->string('standing')->nullable();
            $table->string('walking')->nullable();
            $table->string('first_meaningfull_word')->nullable();
            $table->string('bowel_bladder_control')->nullable();
            $table->text('child_hear')->nullable();
            $table->text('child_talk')->nullable();
            $table->text('understand_child')->nullable();
            $table->text('like_other')->nullable();
            $table->text('family_history')->nullable();
            $table->text('child_vision')->nullable();
            $table->text('medical_problems')->nullable();
            $table->text('worries')->nullable();
            $table->text('motor_development')->nullable();
            $table->text('language_development')->nullable();
            $table->text('social_development')->nullable();
            $table->text('cognitive_development')->nullable();
            $table->date('date')->nullable();
            $table->string('photo')->nullable();
            $table->string('city')->nullable();
            $table->string('academic_session')->nullable();
            $table->foreignId('branch_id')
                    ->nullable()
                    ->constrained();
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
        Schema::dropIfExists('early_intervention_registrations');
    }
}
