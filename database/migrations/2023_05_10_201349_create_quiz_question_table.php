<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuizQuestionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quiz_question', function (Blueprint $table) {

            // Columns:
            // id, quiz, question, kind, order, enabled, created_at, updated_at, deleted_at
            $table->id();
            $table->foreignId('quiz')->constrained('quiz');
            $table->foreignId('question')->constrained('question');
            $table->string('kind');
            $table->integer('order')->nullable();
            $table->timestamps();

            $table->unique(['quiz', 'question', 'kind', 'deleted_at']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('quiz_question');
    }
}
