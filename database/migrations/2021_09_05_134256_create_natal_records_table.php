<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNatalRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('natal_records', function (Blueprint $table) {
            $table->id();
            $table->string('labour')->nullable();
            $table->string('abnormal')->nullable();
            $table->string('delivery_term')->nullable();
            $table->string('delivery_place')->nullable();
            $table->string('delivery_type')->nullable();
            $table->string('maternal')->nullable();
            $table->string('birth_cry')->nullable();
            $table->string('birth_weight')->nullable();
            $table->string('disease')->nullable();
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
        Schema::dropIfExists('natal_records');
    }
}
