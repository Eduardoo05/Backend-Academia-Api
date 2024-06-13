<?php

namespace Database\Seeders;

use App\Models\Options;
use App\Models\Questions;
//use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class QuestionOptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Questions::factory()->create(['statement' => 'Which of these is an American Country?']);
        Questions::factory()->create(['statement' => 'Which of these is an European Country?']);
        Questions::factory()->create(['statement' => 'Which of these is an Asian Country?']);
        Questions::factory()->create(['statement' => 'What is the most remote inhabited place in the world?']);
        Questions::factory()->create(['statement' => 'What is the largest island in the world?']);
        Questions::factory()->create(['statement' => 'Which of these is the capital of Netherlands?']);
        Questions::factory()->create(['statement' => 'Which of these is NOT part of the United Kingdom?']);
        Questions::factory()->create(['statement' => 'What continent is the Baltic Sea located on?']);
        Questions::factory()->create(['statement' => 'How many oceans are there?']);
        Questions::factory()->create(['statement' => 'What is the deepest place in the ocean?']);

        // Seeding options
        Options::factory()->create(['question_id' => 1, 'text' => 'Iceland', 'is_correct' => false]);
        Options::factory()->create(['question_id' => 1, 'text' => 'Belgium', 'is_correct' => false]);
        Options::factory()->create(['question_id' => 1, 'text' => 'Canada', 'is_correct' => true]);
        Options::factory()->create(['question_id' => 1, 'text' => 'Australia', 'is_correct' => false]);

        Options::factory()->create(['question_id' => 2, 'text' => 'Iceland', 'is_correct' => true]);
        Options::factory()->create(['question_id' => 2, 'text' => 'Brazil', 'is_correct' => false]);
        Options::factory()->create(['question_id' => 2, 'text' => 'Canada', 'is_correct' => false]);
        Options::factory()->create(['question_id' => 2, 'text' => 'China', 'is_correct' => false]);

        Options::factory()->create(['question_id' => 3, 'text' => 'Norway', 'is_correct' => false]);
        Options::factory()->create(['question_id' => 3, 'text' => 'El Salvador', 'is_correct' => false]);
        Options::factory()->create(['question_id' => 3, 'text' => 'New Zealand', 'is_correct' => false]);
        Options::factory()->create(['question_id' => 3, 'text' => 'Japan', 'is_correct' => true]);

        Options::factory()->create(['question_id' => 4, 'text' => 'Point Nemo', 'is_correct' => false]);
        Options::factory()->create(['question_id' => 4, 'text' => 'Tristan da Cunha', 'is_correct' => true]);
        Options::factory()->create(['question_id' => 4, 'text' => 'Bouvet Island', 'is_correct' => false]);
        Options::factory()->create(['question_id' => 4, 'text' => 'Rapa Nui', 'is_correct' => false]);

        Options::factory()->create(['question_id' => 5, 'text' => 'New Guinea', 'is_correct' => false]);
        Options::factory()->create(['question_id' => 5, 'text' => 'Madagascar', 'is_correct' => false]);
        Options::factory()->create(['question_id' => 5, 'text' => 'Greenland', 'is_correct' => true]);
        Options::factory()->create(['question_id' => 5, 'text' => 'Borneo', 'is_correct' => false]);

        Options::factory()->create(['question_id' => 6, 'text' => 'Berlin', 'is_correct' => false]);
        Options::factory()->create(['question_id' => 6, 'text' => 'Amsterdam', 'is_correct' => true]);
        Options::factory()->create(['question_id' => 6, 'text' => 'Brussels', 'is_correct' => false]);
        Options::factory()->create(['question_id' => 6, 'text' => 'Warsaw', 'is_correct' => false]);

        Options::factory()->create(['question_id' => 7, 'text' => 'Wales', 'is_correct' => false]);
        Options::factory()->create(['question_id' => 7, 'text' => 'Scotland', 'is_correct' => false]);
        Options::factory()->create(['question_id' => 7, 'text' => 'England', 'is_correct' => false]);
        Options::factory()->create(['question_id' => 7, 'text' => 'Ireland', 'is_correct' => true]);

        Options::factory()->create(['question_id' => 8, 'text' => 'Europe', 'is_correct' => true]);
        Options::factory()->create(['question_id' => 8, 'text' => 'Asia', 'is_correct' => false]);
        Options::factory()->create(['question_id' => 8, 'text' => 'America', 'is_correct' => false]);
        Options::factory()->create(['question_id' => 8, 'text' => 'Africa', 'is_correct' => false]);

        Options::factory()->create(['question_id' => 9, 'text' => '8', 'is_correct' => false]);
        Options::factory()->create(['question_id' => 9, 'text' => '6', 'is_correct' => false]);
        Options::factory()->create(['question_id' => 9, 'text' => '5', 'is_correct' => true]);
        Options::factory()->create(['question_id' => 9, 'text' => '7', 'is_correct' => false]);
        
        Options::factory()->create(['question_id' => 10, 'text' => 'Puerto Rico Trench', 'is_correct' => false]);
        Options::factory()->create(['question_id' => 10, 'text' => 'Japan Trench', 'is_correct' => false]);
        Options::factory()->create(['question_id' => 10, 'text' => 'Mariana Trench', 'is_correct' => true]);
        Options::factory()->create(['question_id' => 10, 'text' => 'Peru-Chile Trench', 'is_correct' => false]);
    }
}
