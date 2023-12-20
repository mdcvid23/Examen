<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Producto;
use PhpParser\Node\Expr\Cast\String_;

class ProductoController extends Controller
{
    public function index()
    {
        $productos = Producto::orderBy('nombre')->get();
        $producto = Producto::where('habilitar', true)->get();
        return view('index', compact('productos'));
    }

    public function create()
    {
        return view('productos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'precio' => 'required|numeric',
            'cantidad' => 'required|integer',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $request['sku'] = $this -> generaSku($request ->input('nombre'));;
        $request['habilitar'] = true;
        Producto::create($request->all());
        $producto = Producto::orderBy('nombre')->get();
        $producto = Producto::where('habilitar', true)->get();
        return view('create')->with('productos', $producto);
    }

    public function filter(Request $request)
    {

        $precioMin = $request->input('premin');
        $precioMax = $request->input('premax');

        $query = Producto::query();


        if ($precioMin) {
            $query->where('precio', '>=', $precioMin);
        }

        if ($precioMax) {
            $query->where('precio', '<=', $precioMax);
        }


        $producto = $query->get();


        return view('create')->with('productos', $producto);
    }

    public function destroy($id)
    {
        $producto = Producto::findOrFail($id);
        echo "<script>console.log({$producto})</script>";
        $producto->update(['habilitar' => false]);
        $producto->save();
        $producto = Producto::orderBy('nombre')->get();
        $producto = Producto::where('habilitar', true)->get();
        return view('create')->with('productos', $producto);
    }

    public function update(Request $request, $id)
    {
        $producto = Producto::find($id);
        $producto -> nombre = $request ->input('nombre');
        $producto -> descripcion = $request ->input('descripcion');
        $producto -> precio = $request ->input('precio');
        $producto -> cantidad = $request ->input('cantidad');
        $producto -> sku = $this -> generaSku($request ->input('nombre'));
        
        $producto->save();

        $producto = Producto::findOrFail($id);
        $producto = Producto::orderBy('nombre')->get();
        $producto = Producto::where('habilitar', true)->get();
        return view('create')->with('productos', $producto);
      
    }

    public function generaSku($nombre): String {
        $prefijo = "pro-";
        $numeracionAleatoria = str_pad(mt_rand(0, 999), 3, '0', STR_PAD_LEFT);
        $ultimasLetrasProducto = substr($nombre, -3);
        $sku = $prefijo . $numeracionAleatoria . $ultimasLetrasProducto;
        return $sku;
    }
}
