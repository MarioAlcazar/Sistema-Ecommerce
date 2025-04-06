<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Categoria;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
   
    public function index()
    {
        $productos = Producto::all();
        $categorias= Categoria::all();
        return view('producto.index', compact('productos', 'categorias'));
    }

    
    public function create()
    {
        
    }

    public function store(Request $request)
    {
        $producto = new Producto;
        $producto->categoria_id = $request->input('categoria_id');
        $producto->codigo = $request->input('codigo');
        $producto->nombre = $request->input('nombre');
        $producto->precio = $request->input('precio');
        $producto->descripcion = $request->input('descripcion');
        $producto->imagen = $request->input('imagen');
        $producto->estado = $request->input('estado');
        $producto->save();

        return redirect()->back();
    }

    
    public function show(Producto $producto)
    {
        
    }

    
    public function edit($id)
    {
        
    }

    public function update(Request $request, $id)
    {
        $producto = Producto::find($id);
        $producto->categoria_id = $request->input('categoria_id');
        $producto->codigo = $request->input('codigo');
        $producto->nombre = $request->input('nombre');
        $producto->precio = $request->input('precio');
        $producto->descripcion = $request->input('descripcion');
        $producto->imagen = $request->input('imagen');
        $producto->estado = $request->input('estado');
        $producto->update();
        return redirect()->back();
    }

 
    public function destroy($id)
    {
        $producto = Producto::find($id);
        $producto->delete();
        return redirect()->back();
    }
}
