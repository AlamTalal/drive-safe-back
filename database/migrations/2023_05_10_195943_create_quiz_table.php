<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuizTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quiz', function (Blueprint $table) {

            // Columns:
            // id, group, order, rand, level, duration, enabled, created_at, updated_at, deleted_at
            $table->id();
            $table->foreignId('group')->constrained('group');
            $table->integer('order')->nullable();
            $table->integer('rand')->default(0);
            $table->integer('level')->default(1);
            $table->integer('duration')->default(100);
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
        Schema::dropIfExists('quiz');
    }
}
