<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categorias = Categoria::all();
        return view('categoria.index', compact('castegorias'));

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
        $categorias= new Categoria;
        $categorias->nombre=$request->input ('nombre');
        $categorias->descripcion=$request->input ('descripcion');
        $categorias->save();
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Categoria $categoria)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $categorias=Categoria::find($id);
        $categorias->nombre=$request->input ('nombre');
        $categorias->descripcion=$request->input ('descripcion');
        $categorias->update();
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $categorias=Categoria::find($id);
        $categorias->delete();
        return redirect()->back();
        
    }
}
