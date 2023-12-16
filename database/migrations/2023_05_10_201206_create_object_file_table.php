<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateObjectFileTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('object_file', function (Blueprint $table) {
            
            // Columns:
            // id, file, object_id, object_type, enabled, created_at, updated_at, deleted_at
            $table->id();
            $table->foreignId('file')->constrained('file');
            $table->bigInteger('object_id', false, true);
            $table->string('object_type')->comment = 'values in [ap, ls, gp, qz, qs, ht, ch]';
            $table->timestamps();

            $table->unique(['file', 'object_id', 'object_type', 'deleted_at']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('object_file');
    }
}
