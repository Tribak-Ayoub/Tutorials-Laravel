<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return ['products' => ['Product 1', 'Product 2']];
    }

    public function store(Request $request)
    {
        return ['message' => 'Product stored successfully!', 'data' => $request->all()];
    }

    public function show($id)
    {
        return ['id' => $id, 'name' => "Product $id"];
    }

    public function update(Request $request, $id)
    {
        return ['message' => 'Product updated successfully!', 'id' => $id, 'data' => $request->all()];
    }

    public function destroy($id)
    {
        return ['message' => 'Product deleted successfully!', 'id' => $id];
    }
}
