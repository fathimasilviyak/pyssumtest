<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddBranchToInclusiveStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('inclusive_students', function (Blueprint $table) {
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
        Schema::table('inclusive_students', function (Blueprint $table) {
            $table->dropForeign('inclusive_students_branch_id_foreign');
            $table->dropColumn('branch_id');
        });
    }
}
