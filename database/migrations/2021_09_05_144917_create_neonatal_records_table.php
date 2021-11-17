<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNeonatalRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('neonatal_records', function (Blueprint $table) {
            $table->id();
            $table->string('baby_color')->nullable();
            $table->string('respiratory_distress')->nullable();
            $table->string('baby_activity')->nullable();
            $table->string('feeding_by')->nullable();
            $table->string('feeding_on')->nullable();
            $table->string('disease')->nullable();
            $table->text('any_other')->nullable();
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
        Schema::dropIfExists('neonatal_records');
    }
}
