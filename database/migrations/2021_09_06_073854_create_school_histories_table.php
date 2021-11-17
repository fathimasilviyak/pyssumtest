<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSchoolHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('school_histories', function (Blueprint $table) {
            $table->id();
            $table->string('school_attended')->nullable();
            $table->string('school_nature')->nullable();
            $table->text('school_address')->nullable();
            $table->date('date_joining')->nullable();
            $table->string('attendance')->nullable();
            $table->string('irregularity_reason')->nullable();
            $table->text('teacher_report')->nullable();
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
        Schema::dropIfExists('school_histories');
    }
}
