<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Estudiante;
use Illuminate\Support\Facades\Validator;
class EstudianteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $estudiantes = Estudiante::all();
        return response()->json(
            [
                "status"=>true,
                "message" => "Obtener todos los estudiantes",
                "data"=> $estudiantes], 200
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function register(Request $request)
    {
        /*
        $validatedData = $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:estudiantes'
        ]);
    */
        $estudiante = Estudiante::create($request->all());
    
        return response()->json(
            ["status" => true,
            "message"=> "Se guardo exitosamente",
            "data"=> $estudiante], 201
        );
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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
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
    public function destroy(string $id)
    {
        //
    }
}
