<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpecialStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('special_students', function (Blueprint $table) {
            $table->id();

            $table->date('date_register')->nullable();
            $table->string('register_number')->nullable();
            $table->string('bill_number')->nullable();
            $table->string('reffered_by')->nullable();
            $table->string('name')->nullable();
            $table->string('gender')->nullable();
            $table->date('dob')->nullable();
            $table->string('age')->nullable();
            $table->string('language_spoken')->nullable();
            $table->string('father_name')->nullable();
            $table->text('address')->nullable();
            $table->string('occupation')->nullable();
            $table->string('family_status')->nullable();
            $table->string('living_area')->nullable();
            $table->string('religion')->nullable();
            $table->string('caste')->nullable();
            $table->string('informant_name')->nullable();
            $table->string('informant_relationship')->nullable();
            $table->string('contact_duration')->nullable();
            $table->string('present_complaint')->nullable();
            $table->string('class')->nullable();
            $table->string('contact_number')->nullable();
            $table->string('tfeec')->nullable();
            $table->string('tcno')->nullable();
            $table->string('pinv')->nullable();
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
        Schema::dropIfExists('special_students');
    }
}
