<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpecialStudentActivityMastersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('special_student_activity_masters', function (Blueprint $table) {
            $table->id();
            $table->string('group')->nullable();
            $table->integer('activity_number')->nullable();
            $table->float('max_mark')->nullable();
            $table->text('name')->nullable();
            $table->foreignId('student_class_id')
                    ->nullable()
                    ->constrained();
            $table->foreignId('class_section_id')
                    ->nullable()
                    ->constrained();
            $table->foreignId('branch_id')
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
        Schema::dropIfExists('special_student_activity_masters');
    }
}
