<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Model\Category;
use App\Model\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function productByCategory($id, Product $product)
    {
        $products = $product->with('category')->where('category_id', $id)->get();
        return response()->json($products, 200);
    }
}