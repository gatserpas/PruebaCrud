<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\productoModel;

class ProductoController extends Controller
{
    public function index()
    {
        $products = productoModel::all();
        return view('products.index', compact('products'));
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
        ]);

        productoModel::create($request->all());

        return redirect()->route('products.index')->with('success','Producto generado exitosamente');
    }

    public function show(string $id)
    {
        $product = productoModel::findOrFail($id);
        return view('products.show', compact('product'));
    }

    public function edit(string $id)
    {
        $product = productoModel::findOrFail($id);
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
        ]);

        $product = productoModel::findOrFail($id);
        $product->update($request->all());

        return redirect()->route('products.index')->with('success','El producto se actualizó correctamente');
    }

    public function destroy(string $id)
    {
        $product = productoModel::findOrFail($id);
        $product->delete();

        return redirect()->route('products.index')->with('success','Producto eliminado exitosamente');
    }
}
