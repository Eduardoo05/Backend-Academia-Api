<?php

namespace Database\Seeders;

use App\Models\Answers;
use App\Models\Estudiante;
use App\Models\EstudianteQuestions;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $this->call([
            QuestionOptionSeeder::class
        ]);

        Estudiante::factory()->create([
            'nombres' => 'Vladimir',
            'apellidos' => 'Putin',
            'is_questioned' => true,
            'is_tested' => true
        ]);
        Estudiante::factory()->create([
            'nombres' => 'Donald',
            'apellidos' => 'Trump',
            'is_questioned' => true,
            'is_tested' => true
        ]);

        EstudianteQuestions::factory()->create(['id' => 1, 'question_id' => 1]);
        EstudianteQuestions::factory()->create(['id' => 1, 'question_id' => 2]);
        EstudianteQuestions::factory()->create(['id' => 1, 'question_id' => 3]);
        EstudianteQuestions::factory()->create(['id' => 1, 'question_id' => 4]);
        EstudianteQuestions::factory()->create(['id' => 1, 'question_id' => 5]);

        EstudianteQuestions::factory()->create(['id' => 2, 'question_id' => 1]);
        EstudianteQuestions::factory()->create(['id' => 2, 'question_id' => 2]);
        EstudianteQuestions::factory()->create(['id' => 2, 'question_id' => 3]);
        EstudianteQuestions::factory()->create(['id' => 2, 'question_id' => 4]);
        EstudianteQuestions::factory()->create(['id' => 2, 'question_id' => 5]);

        Answers::factory()->create(['id' => 1, 'option_id' => 1]);
        Answers::factory()->create(['id' => 1, 'option_id' => 5]);
        Answers::factory()->create(['id' => 1, 'option_id' => 12]);
        Answers::factory()->create(['id' => 1, 'option_id' => 13]);
        Answers::factory()->create(['id' => 1, 'option_id' => 19]);

        Answers::factory()->create(['id' => 2, 'option_id' => 3]);
        Answers::factory()->create(['id' => 2, 'option_id' => 5]);
        Answers::factory()->create(['id' => 2, 'option_id' => 12]);
        Answers::factory()->create(['id' => 2, 'option_id' => 14]);
        Answers::factory()->create(['id' => 2, 'option_id' => 19]);
    }
}
