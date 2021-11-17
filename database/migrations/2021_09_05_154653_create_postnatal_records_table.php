<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostnatalRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('postnatal_records', function (Blueprint $table) {
            $table->id();
            $table->string('exanthemata')->nullable();
            $table->string('infection')->nullable();
            $table->string('injury')->nullable();
            $table->string('convulsions')->nullable();
            $table->string('jaundice')->nullable();
            $table->string('nutritional_disorders')->nullable();
            $table->string('any_other')->nullable();
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
        Schema::dropIfExists('postnatal_records');
    }
}
