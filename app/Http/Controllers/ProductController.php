<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return response()->json(Product::all());
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'        => 'required|string|max:255',
            'description' => 'nullable|string',
            'price'       => 'required|numeric|min:0',
            'stock'       => 'required|integer|min:0',
        ]);

        $product = Product::create($data);

        return response()->json($product, 201);
    }

    public function show(Product $product)
    {
        return response()->json($product);
    }

    public function update(Request $request, Product $product)
    {
        $data = $request->validate([
            'name'        => 'sometimes|required|string|max:255',
            'description' => 'nullable|string',
            'price'       => 'sometimes|required|numeric|min:0',
            'stock'       => 'sometimes|required|integer|min:0',
        ]);

        $product->update($data);

        return response()->json($product);
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return response()->json(['message' => 'Producto eliminado']);
    }

    public function averageRating(Product $product)
    {
        $avg = $product->reviews()->avg('rating');

        return response()->json([
            'product_id'     => $product->id,
            'average_rating' => $avg ? round($avg, 2) : null,
        ]);
    }

    public function bestRated()
    {
        $product = Product::withAvg('reviews', 'rating')
            ->orderByDesc('reviews_avg_rating')
            ->first();

        if (! $product) {
            return response()->json(['message' => 'No hay productos con valoraciones'], 404);
        }

        return response()->json($product);
    }
}