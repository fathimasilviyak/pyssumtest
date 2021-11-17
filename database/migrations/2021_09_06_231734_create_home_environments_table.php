<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHomeEnvironmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('home_environments', function (Blueprint $table) {
            $table->id();
            $table->string('physical_space')->nullable();
            $table->string('accomodation_type')->nullable();
            $table->string('number_rooms')->nullable();
            $table->string('personal_needs')->nullable();
            $table->string('educational_needs')->nullable();
            $table->string('activity')->nullable();
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
        Schema::dropIfExists('home_environments');
    }
}
