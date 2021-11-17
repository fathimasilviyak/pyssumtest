<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImmunizationRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('immunization_records', function (Blueprint $table) {
            $table->id();
            $table->string('primary_polio')->nullable();
            $table->string('primary_diptheria')->nullable();
            $table->string('primary_pertusis')->nullable();
            $table->string('primary_bcg')->nullable();
            $table->string('primary_measles')->nullable();
            $table->string('primary_typhoid')->nullable();
            $table->string('primary_cholera')->nullable();
            $table->string('booster_polio')->nullable();
            $table->string('booster_diptheria')->nullable();
            $table->string('booster_pertusis')->nullable();
            $table->string('booster_bcg')->nullable();
            $table->string('booster_measles')->nullable();
            $table->string('booster_typhoid')->nullable();
            $table->string('booster_cholera')->nullable();
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
        Schema::dropIfExists('immunization_records');
    }
}
