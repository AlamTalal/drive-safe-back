<?php

namespace Database\Seeders;

use App\Models\File;
use App\Models\Hint;
use App\Models\Quiz;
use App\Models\CBond;
use App\Models\Group;
use App\Models\Local;
use App\Models\QBond;
use App\Models\Choice;
use App\Models\License;
use App\Models\Question;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder {
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run() {

        // \App\Models\User::factory(10)->create();
        //$this->call([
        //    LicenseSeeder::class,
        //    QuizSeeder::class,
        //]);

        // Columns:
        // id, name, extension, type, url, original_path, 
        // enabled, created_at, updated_at, deleted_at
        // object_file Columns:
        // id, file, object_id, object_type, enabled, created_at, updated_at, deleted_at

        $licenses = License::factory()->count(2)->sequence(['order' => 1, ], ['order' => 2, ])->create();

        foreach($licenses as $license) {

            Local::factory()->count(4)->sequence(
                ['code' => 'en', 'object_id' => $license->id, 'object_type' => 'ls', 'key' => 'name', 'text' => Local::factory()->shortText(5), ], 
                ['code' => 'sv', 'object_id' => $license->id, 'object_type' => 'ls', 'key' => 'name', 'text' => Local::factory()->shortText(5), ], 
                ['code' => 'en', 'object_id' => $license->id, 'object_type' => 'ls', 'key' => 'desc', ], 
                ['code' => 'sv', 'object_id' => $license->id, 'object_type' => 'ls', 'key' => 'desc', ], )->create();

            $files = File::factory()->count(2)->sequence(
               ['name' => 'license_image', 'extension' => 'png', 'kind' => 'image', 'url' => 'storage\\images', 'original_path' => 'downloads\\images'],
               ['name' => 'license_video', 'extension' => 'mp4', 'kind' => 'video', 'url' => 'storage\\videos', 'original_path' => 'downloads\\videos'])->create();

            foreach($files as $file) DB::table('object_file')->insert([
                'file'  => $file->id,
                'object_id' => $license->id, 
                'object_type' => 'ls', 
            ]);

            $groups = Group::factory()->count(2)->sequence(
                ['license' => $license->id, 'level' => 1, 'order' => 1, ],
                ['license' => $license->id, 'level' => 2, 'order' => 2, ],)->create();

            foreach($groups as $group) {

                Local::factory()->count(4)->sequence(
                    ['code' => 'en', 'object_id' => $group->id, 'object_type' => 'gp', 'key' => 'name', 'text' => Local::factory()->shortText(5), ], 
                    ['code' => 'sv', 'object_id' => $group->id, 'object_type' => 'gp', 'key' => 'name', 'text' => Local::factory()->shortText(5), ], 
                    ['code' => 'en', 'object_id' => $group->id, 'object_type' => 'gp', 'key' => 'desc', ], 
                    ['code' => 'sv', 'object_id' => $group->id, 'object_type' => 'gp', 'key' => 'desc', ], )->create();

                $files = File::factory()->count(2)->sequence(
                    ['name' => 'group_image', 'extension' => 'png', 'kind' => 'image', 'url' => 'storage\\images', 'original_path' => 'downloads\\images'],
                    ['name' => 'group_video', 'extension' => 'mp4', 'kind' => 'video', 'url' => 'storage\\videos', 'original_path' => 'downloads\\videos'])->create();
        
                foreach($files as $file) DB::table('object_file')->insert([
                    'file'  => $file->id,
                    'object_id' => $group->id, 
                    'object_type' => 'gp', 
                ]);
                
                $quizzes = Quiz::factory()->count(2)->sequence(
                    ['group' => $group->id, 'level' => 1, 'order' => 1, ], 
                    ['group' => $group->id, 'level' => 2, 'order' => 2, ], )->create();
        
                foreach($quizzes as $quiz) {
        
                    Local::factory()->count(4)->sequence(
                        ['code' => 'en', 'object_id' => $quiz->id, 'object_type' => 'qz', 'key' => 'name', 'text' => Local::factory()->shortText(5), ], 
                        ['code' => 'sv', 'object_id' => $quiz->id, 'object_type' => 'qz', 'key' => 'name', 'text' => Local::factory()->shortText(5), ], 
                        ['code' => 'en', 'object_id' => $quiz->id, 'object_type' => 'qz', 'key' => 'desc', ], 
                        ['code' => 'sv', 'object_id' => $quiz->id, 'object_type' => 'qz', 'key' => 'desc', ], )->create();

                    $files = File::factory()->count(2)->sequence(
                        ['name' => 'quiz_image', 'extension' => 'png', 'kind' => 'image', 'url' => 'storage\\images', 'original_path' => 'downloads\\images'],
                        ['name' => 'quiz_video', 'extension' => 'mp4', 'kind' => 'video', 'url' => 'storage\\videos', 'original_path' => 'downloads\\videos'])->create();
                    
                    foreach($files as $file) DB::table('object_file')->insert([
                        'file'  => $file->id,
                        'object_id' => $quiz->id, 
                        'object_type' => 'qz', 
                    ]);

                    $level = 2;
                    $hints = Hint::factory()->count(10)->create();

                    $hints->each(function ($hint, $hintKey) use ($quiz, $level) {

                        Local::factory()->count(2)->sequence(
                            ['code' => 'en', 'object_id' => $hint->id, 'object_type' => 'ht', 'key' => 'content', ], 
                            ['code' => 'sv', 'object_id' => $hint->id, 'object_type' => 'ht', 'key' => 'content', ], )->create();

                        $files = File::factory()->count(2)->sequence(
                            ['name' => 'hint_image', 'extension' => 'png', 'kind' => 'image', 'url' => 'storage\\images', 'original_path' => 'downloads\\images'],
                            ['name' => 'hint_video', 'extension' => 'mp4', 'kind' => 'video', 'url' => 'storage\\videos', 'original_path' => 'downloads\\videos'])->create();
                        
                        foreach($files as $file) DB::table('object_file')->insert([
                            'file'  => $file->id,
                            'object_id' => $hint->id, 
                            'object_type' => 'ht', 
                        ]);

                        $level = ($level === 1)? 2 : 1;
                        $question = Question::factory()->create(['hint' => $hint->id, 'level' => $level]);

                        Local::factory()->count(2)->sequence(
                            ['code' => 'en', 'object_id' => $question->id, 'object_type' => 'qs', 'key' => 'content', ], 
                            ['code' => 'sv', 'object_id' => $question->id, 'object_type' => 'qs', 'key' => 'content', ], )->create();

                        $QBond = QBond::factory()->create([
                            'quiz'      => $quiz->id,
                            'question'  => $question->id,
                            'kind'      => 'SC',
                            'order'     => $hintKey,
                        ]);

                        $files = File::factory()->count(2)->sequence(
                            ['name' => 'question_image', 'extension' => 'png', 'kind' => 'image', 'url' => 'storage\\images', 'original_path' => 'downloads\\images'],
                            ['name' => 'question_video', 'extension' => 'mp4', 'kind' => 'video', 'url' => 'storage\\videos', 'original_path' => 'downloads\\videos'])->create();
                        
                        foreach($files as $file) DB::table('object_file')->insert([
                            'file'  => $file->id,
                            'object_id' => $QBond->id, 
                            'object_type' => 'qs', 
                        ]);

                        $choices = Choice::factory()->count(4)->create();
        
                        $choices->each(function ($choice, $choiceKey) use ($QBond) {
        
                            Local::factory()->count(2)->sequence(
                                ['code' => 'en', 'object_id' => $choice->id, 'object_type' => 'ch', 'key' => 'content', 'text' => Local::factory()->shortText(10), ], 
                                ['code' => 'sv', 'object_id' => $choice->id, 'object_type' => 'ch', 'key' => 'content', 'text' => Local::factory()->shortText(10), ], )->create();
        
                            $CBond = CBond::factory()->create([
                                'question'  => $QBond->id,
                                'choice'    => $choice->id,
                                'order'     => $choiceKey,
                                'correct'   => (fmod($choiceKey + 1, 4) === 0.0)? 1 : 0,
                            ]);

                            $files = File::factory()->count(2)->sequence(
                                ['name' => 'choice_image', 'extension' => 'png', 'kind' => 'image', 'url' => 'storage\\images', 'original_path' => 'downloads\\images'],
                                ['name' => 'choice_video', 'extension' => 'mp4', 'kind' => 'video', 'url' => 'storage\\videos', 'original_path' => 'downloads\\videos'])->create();
                            
                            foreach($files as $file) DB::table('object_file')->insert([
                                'file'  => $file->id,
                                'object_id' => $CBond->id, 
                                'object_type' => 'ch', 
                            ]);
                        });
                    });
                }
            }
        }
    }
}
