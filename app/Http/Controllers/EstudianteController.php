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
                "status" => true,
                "message" => "Obtener todos los estudiantes",
                "data" => $estudiantes
            ],
            200
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function register(Request $request){
        //Validate if 'correo' is not repeated
        
        // Define las reglas de validación
    $rules = [
        'nombres' => 'required|string|max:50',
        'apellidos' => 'required|string|max:50',
        'correo' => 'required|email|unique:estudiantes,correo',
    ];

    // Mensajes de error personalizados (opcional)
    $messages = [
        'nombres.required' => 'El nombre es obligatorio.',
        'apellidos.required' => 'El nombre es obligatorio.',
        'correo.required' => 'El correo electrónico es obligatorio.',
        'correo.email' => 'Debe ser un correo electrónico válido.',
        'correo.unique' => 'Este correo electrónico ya está registrado.',
    ];
         // Realiza la validación
    $validator = Validator::make($request->all(), $rules, $messages);

    // Comprueba si la validación falla
    if ($validator->fails()) {
        return response()->json([
            'status'=> false,
            'message'=> $validator->errors()->first()
        ],409);
    }
  
        //Validate data, avoid a mass asignmente like this use, key-value pairs instead.
      
        $estudiante = Estudiante::create($request->all());

        return response()->json(
            [
                "status" => true,
                "message" => "Estudiante registered",
                "data" => [
                    'user_id' => $estudiante->id
                ]
            ],
            201
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
