<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller 
{ 
    public function index()
    {
        return response()->json(
            Product::all()
        );
    }
    
    public function show($id)
    {
    $product = Product::find($id);

    if (!$product) {
        return response()->json(['message' => 'Data tidak ditemukan'], 404);
    }

    return response()->json(['data' => $product], 200);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'  => 'required|string|max:100',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
        ]);

        $product = Product::create($validated);

        return response()->json([
            'message' => 'Produk berhasil dibuat',
            'data'    => $product
        ], 201);
    }

    public function update(Request $request, $id)
    {
    $product = Product::find($id);

    if (!$product) {
        return response()->json(['message' => 'Data tidak ditemukan'], 404);
    }

    $validated = $request->validate([
        'name'  => 'sometimes|required|string|max:100',
        'price' => 'sometimes|required|numeric|min:0',
        'stock' => 'sometimes|required|integer|min:0',
    ]);

    $product->update($validated);

    return response()->json([
        'message' => 'Data berhasil diperbarui',
        'data'    => $product
    ], 200);
    }

    public function destroy($id)
    {
    $product = Product::find($id);

    if (!$product) {
        return response()->json(['message' => 'Data tidak ditemukan'], 404);
    }

    $product->delete();

    return response()->json([
        'message' => 'Data berhasil dihapus'
    ], 200);
    }
}        
