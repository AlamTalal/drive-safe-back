<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFileTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('file', function (Blueprint $table) {
            
            // Columns:
            // id, name, extension, kind, url, original_path, 
            // enabled, created_at, updated_at, deleted_at
            $table->id();
            $table->string('name');
            $table->string('extension');
            $table->string('kind');
            $table->string('url');
            $table->string('original_path');
            $table->timestamps();

            $table->unique(['url', 'deleted_at']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('file');
    }
}
