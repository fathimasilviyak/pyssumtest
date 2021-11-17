<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVocationalStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vocational_students', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('gender')->nullable();
            $table->string('father_name')->nullable();
            $table->string('mother_name')->nullable();
            $table->string('dob')->nullable();
            $table->string('contact_number')->nullable();
            $table->text('address')->nullable();
            $table->string('marital_status')->nullable();
            $table->string('nationality')->nullable();
            $table->string('languages')->nullable();
            $table->string('main_stream_school')->nullable();
            $table->string('special_school')->nullable();
            $table->string('vocational_training')->nullable();
            $table->string('any_other')->nullable();
            $table->string('organization')->nullable();
            $table->string('work_type')->nullable();
            $table->string('salary')->nullable();
            $table->boolean('epilepsy')->nullable();
            $table->boolean('physically_handicapped')->nullable();
            $table->boolean('visually_handicapped')->nullable();
            $table->boolean('psychological_problems')->nullable();
            $table->boolean('psychiatric_features')->nullable();
            $table->text('major_challenges')->nullable();
            $table->string('birth_certificate')->nullable();
            $table->string('cmo_certificate')->nullable();
            $table->string('address_proof')->nullable();
            $table->string('date')->nullable();
            $table->string('photo')->nullable();
            $table->string('city')->nullable();
            $table->string('academic_session')->nullable();
            $table->string('branch_id')->nullable();
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
        Schema::dropIfExists('vocational_students');
    }
}
