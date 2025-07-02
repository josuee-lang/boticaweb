<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        $productos = Producto::with('presentacion')->get(); // o ->paginate(6)
        return view('welcome', compact('productos'));
    }
}
