<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateInclusiveStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('inclusive_students', function (Blueprint $table) {
            $table->foreignId('student_class_id')
                  ->nullable()
                  ->after('mother_income')
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
        Schema::table('inclusive_students', function (Blueprint $table) {
            $table->dropForeign('inclusive_students_student_class_id_foreign');
            $table->dropColumn('student_class_id');
            $table->dropForeign('inclusive_students_class_section_id_foreign');
            $table->dropColumn('class_section_id');
        });
    }
}
