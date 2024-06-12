<?php

namespace App\Http\Controllers;

use App\Models\Answers;
use App\Models\Estudiante;
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

        $data = $request->all();
        unset($data['user_id']);

        if (count($data) > 5 || count($data) === 0) {
            return response()->json([
                'status' => false,
                'message' => "Answers should be at least 1 and maximum 5",
                'data' => null
            ], 400);
        }

        /* Here goes a 'huge' validation to see if the answers given by the client 
        match those sent by the server, provided by EstudianteQuestions table */

        foreach ($data as $value) {
            $answers = new Answers();
            $answers->id = $request->user_id;
            $answers->option_id = $value;
            $answers->save();
        }

        //Now perform functions that mark students and send emails.

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
