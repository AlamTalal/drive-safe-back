<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLocalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('local', function (Blueprint $table) {

            // Columns:
            // id, code, object_id, object_type, key, text, audio, 
            // enabled, created_at, updated_at, deleted_at
            $table->id();
            $table->string('code');
            $table->bigInteger('object_id', false, true);
            $table->string('object_type')->comment = 'values in [ap, ls, gp, qz, qs, ht, ch]';
            $table->string('key');
            $table->text('text');
            $table->string('audio')->nullable();
            $table->timestamps();

            $table->unique(['code', 'object_id', 'object_type', 'key', 'enabled', 'deleted_at']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('local');
    }
}
