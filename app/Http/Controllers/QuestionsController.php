<?php

namespace App\Http\Controllers;

use App\Models\Options;
use App\Models\Questions;
use Illuminate\Http\Request;

class QuestionsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function get(Request $request)
    {
        if (!isset($request->user_id)) {
            return response()->json([
                'status' => true,
                'message' => "user_id not found",
                'data' => null
            ]);
        }

        $questions = Questions::select(['question_id', 'statement'])->inRandomOrder()->limit(5)->get()->toArray();

        foreach ($questions as $key => $value) {
            $options = Options::select(['option_id', 'text'])->where('question_id', '=', $value['question_id'])->get()->toArray();
            $questions[$key]['options'] = $options;
        }

        return response()->json([
            'status' => true,
            'message' => "Questions has been sent",
            'data' => [
                'user_id' => $request->user_id,
                'questions' => $questions
            ]
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
    public function show(Questions $questions)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Questions $questions)
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
    public function destroy(Questions $questions)
    {
        //
    }
}
