<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateSpecialStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('special_students', function (Blueprint $table) {
            $table->dropColumn('class');
            $table->foreignId('student_class_id')
                  ->nullable()
                  ->after('present_complaint')
                  ->constrained();
            $table->foreignId('class_section_id')
                  ->nullable()
                  ->after('student_Class_id')
                  ->constrained();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('special_students', function (Blueprint $table) {
            $table->dropForeign('special_students_student_class_id_foreign');
            $table->dropColumn('student_class_id');
            $table->dropForeign('special_students_class_section_id_foreign');
            $table->dropColumn('class_section_id');
            $table->string('class')->nullable()->after('present_complaint');
        });
    }
}
