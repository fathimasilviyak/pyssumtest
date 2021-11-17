<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddBranchToTrainingStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('training_students', function (Blueprint $table) {
            $table->foreignId('branch_id')
            ->nullable()
            ->after('academic_session')
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
        Schema::table('training_students', function (Blueprint $table) {
            $table->dropForeign('training_students_branch_id_foreign');
            $table->dropColumn('branch_id');
        });
    }
}
