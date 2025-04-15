<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class CarritoController extends Controller
{
    public function verCarrito()
    {
        $carrito = session()->get('carrito', []);
        return view('carrito.dashboard', compact('carrito'));
    }

    public function agregarAlCarrito($id)
    {
        $producto = Producto::find($id);

        if (!$producto) {
            return redirect()->route('carrito.dashboard')->with('error', 'Producto no encontrado.');
        }

        $carrito = session()->get('carrito', []);

        if (isset($carrito[$id])) {
            $carrito[$id]['cantidad']++;
        } else {
            $carrito[$id] = [
                'nombre'      => $producto->nombre,
                'precio'      => $producto->precio,
                'descripcion' => $producto->descripcion,
                'cantidad'    => 1,
                'imagen'      => $producto->imagen ? asset('storage/' . $producto->imagen) : null,
            ];
        }

        session()->put('carrito', $carrito);

        return redirect()->route('carrito.dashboard')->with('success', 'Producto agregado al carrito.');
    }

    public function eliminarDelCarrito($id)
    {
        $carrito = session()->get('carrito', []);

        if (isset($carrito[$id])) {
            unset($carrito[$id]);
        }

        session()->put('carrito', $carrito);

        return redirect()->route('carrito.dashboard')->with('success', 'Producto eliminado del carrito.');
    }

    public function checkout(Request $request)
    {
        // Aquí podrías guardar el pedido en base de datos, enviar email, etc.
        // Por ahora solo simulamos una compra exitosa

        // Limpiar el carrito
        session()->forget('carrito');

        return redirect()->route('carrito.dashboard')->with('success', '¡Compra realizada con éxito!');
    }
}
