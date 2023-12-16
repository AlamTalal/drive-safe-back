<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLanguageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('language', function (Blueprint $table) {
            
            // Columns:
            // id, code, name, voice_code, voice_type, voice_name, voice_gender, voice_profile,
            // enabled, created_at, updated_at, deleted_at
            $table->id();
            $table->string('name');
            $table->string('code');
            $table->string('voice_code')->nullable();
            $table->string('voice_type')->nullable();
            $table->string('voice_name')->nullable();
            $table->string('voice_gender')->nullable();
            $table->string('voice_profile')->nullable();
            $table->timestamps();

            $table->unique(['code', 'enabled', 'deleted_at']);
        });

        DB::table('language')->insert([
            
            [   'name' => 'Swedish',
                'code' => 'sv',
                'voice_code' => 'sv-SE',
                'voice_type' => 'Standard',
                'voice_name' => 'sv-SE-Standard-A',
                'voice_gender' => 'FEMALE',
                'voice_profile' => 'handset-class-device'],
            [   'name' => 'English',
                'code' => 'en',
                'voice_code' => 'en-US',
                'voice_type' => 'Standard',
                'voice_name' => 'en-US-Standard-I',
                'voice_gender' => 'MALE',
                'voice_profile' => 'handset-class-device'],
            [   'name' => 'Arabic',
                'code' => 'ar',
                'voice_code' => 'ar-XA',
                'voice_type' => 'Standard',
                'voice_name' => 'ar-XA-Standard-C',
                'voice_gender' => 'FEMALE',
                'voice_profile' => 'handset-class-device'],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('language');
    }
}
