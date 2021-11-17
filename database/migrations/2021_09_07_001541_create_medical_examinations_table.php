<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicalExaminationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medical_examinations', function (Blueprint $table) {
            $table->id();
            $table->string('observed_by')->nullable();
            $table->text('general_appearance')->nullable();
            $table->text('sensory_motor_disabilities')->nullable();
            $table->text('clinical_impressions')->nullable();
            $table->text('provisonal_diagnosis')->nullable();
            $table->text('recommendations')->nullable();
            $table->foreignId('special_student_id')->constrained()
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
        Schema::dropIfExists('medical_examinations');
    }
}
