<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddBranchToStudentClassesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('student_classes', function (Blueprint $table) {
            $table->foreignId('branch_id')
            ->nullable()
            ->after('type')
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
        Schema::table('student_classes', function (Blueprint $table) {
            $table->dropForeign('student_classes_branch_id_foreign');
            $table->dropColumn('branch_id');
        });
    }
}
