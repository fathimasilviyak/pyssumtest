<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrenatalRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prenatal_records', function (Blueprint $table) {
            $table->id();
            $table->string('pregnancy')->nullable();
            $table->string('father_age')->nullable();
            $table->string('mother_age')->nullable();
            $table->string('exposure')->nullable();
            $table->string('rh_incompatibility')->nullable();
            $table->string('abortion')->nullable();
            $table->string('maternal_illness')->nullable();
            $table->string('foetal_movement')->nullable();
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
        Schema::dropIfExists('prenatal_records');
    }
}
