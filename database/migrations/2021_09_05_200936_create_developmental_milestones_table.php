<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDevelopmentalMilestonesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('developmental_milestones', function (Blueprint $table) {
            $table->id();
            $table->string('smiling')->nullable();
            $table->string('head_control')->nullable();
            $table->string('rolling_over')->nullable();
            $table->string('sitting')->nullable();
            $table->string('crawling')->nullable();
            $table->string('standing')->nullable();
            $table->string('bowel_bladder_control')->nullable();
            $table->string('walking')->nullable();
            $table->string('teething')->nullable();
            $table->string('babbling')->nullable();
            $table->string('first_meaningful_word')->nullable();
            $table->string('small_phrases')->nullable();
            $table->string('fluent_speech')->nullable();
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
        Schema::dropIfExists('developmental_milestones');
    }
}
