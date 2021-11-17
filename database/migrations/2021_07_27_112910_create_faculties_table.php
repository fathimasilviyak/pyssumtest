<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFacultiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('faculties', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->date('dob')->nullable();
            $table->string('gender')->nullable();
            $table->string('aadhar')->nullable();
            $table->string('guardian')->nullable();
            $table->string('qualification')->nullable();
            $table->date('date_appoinment')->nullable();
            $table->string('designation')->nullable();
            $table->string('nature_appoinment')->nullable();
            $table->string('specialized_in')->nullable();
            $table->string('pan')->nullable();
            $table->string('mobile')->nullable();
            $table->text('permenent_address')->nullable();
            $table->text('local_address')->nullable();
            $table->date('date_leaving')->nullable();
            $table->string('photo')->nullable();
            $table->foreignId('user_id')->constrained()
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
        Schema::dropIfExists('faculties');
    }
}
