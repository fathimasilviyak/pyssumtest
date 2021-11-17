<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlayBehavioursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('play_behaviours', function (Blueprint $table) {
            $table->id();
            $table->string('nature')->nullable();
            $table->string('plays_with')->nullable();
            $table->string('plays_govern_rules')->nullable();
            $table->string('prefers_play')->nullable();
            $table->text('leisure_time_activities')->nullable();
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
        Schema::dropIfExists('play_behaviours');
    }
}
