<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSingleChoiceQuestionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('single_choice_question', function (Blueprint $table) {

            // Columns:
            // id, question, choice, order, correct, enabled, created_at, updated_at, deleted_at
            $table->id();
            $table->foreignId('question')->constrained('quiz_question');
            $table->foreignId('choice')->constrained('choice');
            $table->integer('order')->nullable();
            $table->boolean('correct')->default(false);
            $table->timestamps();
            
            $table->unique(['question', 'choice', 'deleted_at']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('single_choice_question');
    }
}
