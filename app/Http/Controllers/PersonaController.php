<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Personas;
class PersonaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
            $personas = Personas::all();

            return view('index', compact('personas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            $validatedData = $request->validate([
                'nombre' => 'required|max:255',
                'apellido' => 'required',
                'telefono' => 'required',
                'email' => 'required',
                'direccion' => 'required',
            ]);
            $show = Personas::create($validatedData);
       
            return redirect('/personas')->with('success', 'Persona grabada correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
            $personas = Personas::findOrFail($id);

            return view('edit', compact('personas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
            $validatedData = $request->validate([
                'nombre' => 'required|max:255',
                'apellido' => 'required',
                'telefono' => 'required',
                'email' => 'required',
                'direccion' => 'required',
            ]);
            Personas::whereId($id)->update($validatedData);

            return redirect('/personas')->with('success', 'Persona actualizada correctamente en la base de datos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
            $personas = Personas::findOrFail($id);
            $personas->delete();

            return redirect('/personas')->with('success', 'Persona eliminada correctamente');
    }
}
