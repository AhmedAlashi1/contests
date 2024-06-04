<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('contests', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 255)->nullable();
            $table->string('image', 255)->nullable();
            $table->string('question', 255)->nullable();
            $table->string('answer_1', 255)->nullable();
            $table->string('answer_2', 255)->nullable();
            $table->string('answer_3', 255)->nullable();
            $table->string('answer_4', 255)->nullable();
            $table->string('correct_answer', 255)->nullable();
            $table->dateTime('start_time')->nullable();
            $table->dateTime('end_time')->nullable();
            $table->boolean('status')->default(0);
            $table->string('suggested_competitions');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contests');
    }
};
