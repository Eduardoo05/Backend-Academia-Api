<?php

namespace App\Http\Controllers;

use App\Models\Answers;
use App\Models\Estudiante;
use App\Models\EstudianteQuestions;
use App\Models\Options;
use Illuminate\Http\Request;

class AnswersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        if (!isset($request->user_id)) {
            return response()->json([
                'status' => false,
                'message' => "user_id not found in request",
                'data' => null
            ], 400);
        }

        $student = Estudiante::find($request->user_id);
        if (!$student) {
            return response()->json([
                'status' => false,
                'message' => "Student not found",
                'data' => null
            ], 404);
        }

        if (!$student->is_questioned) {
            return response()->json([
                'status' => false,
                'message' => "No questions have been submitted for this Student",
                'data' => null
            ], 403);
        }

        if ($student->is_tested) {
            return response()->json([
                'status' => false,
                'message' => "This Student has already been tested, no more tries allowed",
                'data' => null
            ], 403);
        }

        if (!isset($request->answers)) {
            return response()->json([
                'status' => false,
                'message' => "answers not found in request",
                'data' => null
            ], 400);
        }

        $data = $request->answers;

        /*This validation is 'unnecessary', we could accept empty arrays and grade them as 0, 
        and only grade the first 5 given answers (discussion)*/
        if (count($data) > 5 || count($data) === 0) {
            return response()->json([
                'status' => false,
                'message' => "Answers should be at least 1 and maximum 5",
                'data' => null
            ], 400);
        }

        /* Here goes a 'huge' validation to see if the answers given by the client 
        match those sent by the server, provided by EstudianteQuestions table */
        $student_questions = EstudianteQuestions::where('id', '=', $request->user_id)->get();
        $answered_questions = Options::whereIn('option_id', $request->answers)->get();

        $match = [];
        foreach ($student_questions as $question) {
            $ite = 0;
            foreach ($answered_questions as $answer) {
                if ($question['question_id'] === $answer['question_id']) {
                    $ite++;
                    if ($ite > 1) {
                        array_pop($match);
                        break;
                    } else {
                        $match[] = $answer['option_id'];
                    }
                }
            }
        }

        foreach ($match as $value) {
            $answers = new Answers();
            $answers->id = $request->user_id;
            $answers->option_id = $value;
            $answers->save();
        }

        $student->is_tested = true;
        $student->save();

        //Now perform functions that mark students and send emails.
        $correct_rows = Answers::join('options', 'answers.option_id', '=', 'options.option_id')
        ->where('answers.id', '=', $request->user_id)
        ->where('options.is_correct', '=', true)->get();

        $mark = count($correct_rows) * 2;
    
        return response()->json([
            'status' => true,
            'message' => "Test has been sent and graded, check your email for information",
            'data' => null
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Answers $answers)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Answers $answers)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Answers $answers)
    {
        //
    }
}
