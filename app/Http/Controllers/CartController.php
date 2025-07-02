<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;

class CartController extends Controller
{
    public function agregar(Request $request, $id)
    {
        $producto = Producto::findOrFail($id);
        $carrito = session()->get('carrito', []);

        if (isset($carrito[$id])) {
            $carrito[$id]['cantidad'] += $request->input('cantidad', 1);
        } else {
            $carrito[$id] = [
                "nombre" => $producto->nombre,
                "cantidad" => $request->input('cantidad', 1),
                "precio" => $producto->pvp1,
                "imagen" => $producto->imagen ? asset('storage/' . $producto->imagen) : null
            ];
        }

        session()->put('carrito', $carrito);

        return redirect()->back()->with('success', 'Producto agregado al carrito');
    }

    public function mostrar()
    {
        $carrito = session()->get('carrito', []);
        return view('carrito.sidebar', compact('carrito'));
    }

    public function eliminar(Request $request, $id)
    {
        $carrito = session()->get('carrito', []);

        if (isset($carrito[$id])) {
            unset($carrito[$id]);
            session()->put('carrito', $carrito);
        }

        // Usamos redirect()->back() o lo que venga como parámetro
        $redirect = $request->input('redirect_back', url('/'));

        // Al eliminar, también activamos el flag para abrir el sidebar
        return redirect($redirect)
            ->with('success', 'Producto eliminado del carrito')
            ->with('abrir_sidebar', true);
    }
}
