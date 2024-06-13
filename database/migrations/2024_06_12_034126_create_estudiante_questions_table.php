<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use function Laravel\Prompts\table;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('estudiante_questions', function (Blueprint $table) {
            $table->id('eq_id')->autoIncrement();
            $table->foreignId('id')->constrained(table:'estudiantes', column:'id')->cascadeOnDelete();
            $table->foreignId('question_id')->constrained(table:'questions', column:'question_id')->cascadeOnDelete();
            $table->unique(['id', 'question_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('estudiante_questions');
    }
};
