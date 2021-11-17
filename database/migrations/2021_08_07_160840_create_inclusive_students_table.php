<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInclusiveStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inclusive_students', function (Blueprint $table) {
            $table->id();

            $table->string('name')->nullable();
            $table->date('dob')->nullable();
            $table->string('gender')->nullable();
            $table->string('aadhar')->nullable();
            $table->string('father_name')->nullable();
            $table->string('father_profession')->nullable();
            $table->string('father_contact')->nullable();
            $table->string('father_income')->nullable();
            $table->string('mother_name')->nullable();
            $table->string('mother_profession')->nullable();
            $table->string('mother_contact')->nullable();
            $table->string('mother_income')->nullable();
            $table->text('address')->nullable();
            $table->date('date')->nullable();
            $table->string('photo')->nullable();
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
        Schema::dropIfExists('inclusive_students');
    }
}
