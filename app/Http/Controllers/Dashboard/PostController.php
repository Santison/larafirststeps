<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Faltas;
use App\Models\Post;
use App\Models\Profesor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {


        // $post = Post::find(1); 
        // dd($post->CODPROFESOR);

        


        // $post = Post::find(1);

        // $post = Post::find(3)->delete();

        // $post -> Post::delete(3);

   

        // $post-> update(
        //     [
        //         'DESCRIPCION' => 'Controlador Nuevisimo',
        //         'TIPO' => 'Controlador Mas Nuevo',

                
        //     ]
        // );













        // Post::create(
        //     [
        //         'DESCRIPCION' => 'MALO',
        //         'TIPO' => 'COVID',
        //         'ESTADO'=> '1',
        //     ]
        // );


        //  Profesor::create(
        //      [
        //          'NOMBRE' => 'Victorsito',
        //      ]
        //      );

        //  Faltas::create(
        //      [
        //          'CODPROFESOR' => 1,
        //          'DIA_INICIO' => "2025-04-10",
        //          'DIA_FIN' => "2025-04-10",
        //          'MOTIVO' => 1, // ID de un registro en la tabla LOV
        //      ]
        //  );



        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Obtener los profesores y motivos desde la base de datos
        $profesores = Profesor::all(); // Lista de profesores
        $motivos = DB::table('LOV')->get(); // Lista de motivos desde la tabla LOV

        

    // Pasar las variables a la vista
    return view('dashboard.post.create', compact('profesores', 'motivos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Faltas::create(
            [
                'CODPROFESOR' => $request->input('CODPROFESOR'), // Correcto
                'DIA_INICIO' => $request->input('DIA_INICIO'),
                'DIA_FIN' => $request->input('DIA_FIN'),
                'MOTIVO' => $request->input('MOTIVO'),
            ]
        );
        // Redirigir a la vista de índice después de guardar
        return redirect()->route('dashboard.post.index')->with('success', 'Post created successfully.');

        
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }
}
