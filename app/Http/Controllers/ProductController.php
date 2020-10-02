<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Product;
use App\Http\Requests\CreateProductRequest;
use App\Model\Category;
use App\Http\Requests\UpdateProductRequest;
use App\Model\Image;

class ProductController extends Controller
{
    public function index(Product $product, $id = null, Category $category)
    {
        if ($id) {
            $data = [
                'products'   => $product->where('category_id', $id)->get(),
                'titlePage'  => 'List product of Category: <b>' . $category->find($id)->name . "</b>",
            ];
        } else {
            $data = [
                'products'   => $product->with('images')->get(),
                'titlePage'  => 'List product'
            ];
        }

        return view('products.list', $data);
    }

    public function create(Category $category)
    {
        $data = [
            'categories' => $category->all(),
            'titlePage'  => 'Create product'
        ];
        return view('products.create', $data);
    }


    public function store(CreateProductRequest $request, Product $product, Image $image)
    {
        //insert to table Products.
        $dataCreate = [
            'name'        => $request->p_name,
            'quantity'    => $request->p_quantity,
            'category_id' => $request->category_id,
            'price'       => $request->p_price
        ];
        $productCreate =  $product->create($dataCreate);

        if ($request->p_image) {
            foreach ($request->p_image as $p_image) {
                $path_image = $this->storeFile($p_image);

                $image->create([
                    'path'       => $path_image,
                    'product_id' => $productCreate->id
                ]);
            }
        }
        return redirect()->route('product.list');
    }

    public function edit($id, Product $product, Category $category, Image $image)
    {
        $data = [
            'titlePage'     => ' Edit Product',
            'product'       => $product->with('images')->find($id),
            'categories'    => $category->all(),
        ];
        return view('products.edit', $data);
    }


    public function update(UpdateProductRequest $request, $id, Product $product, Image $image)
    {
        // dd($request->images_no_delete);
        $dataUpdate = [
            'name'        => $request->p_name,
            'category_id' => $request->category_id,
            'quantity'    => $request->p_quantity,
            'price'       => $request->p_price
        ];
        $product->find($id)->update($dataUpdate);

        // Delete images deleted.
        if ($request->images_no_delete) {
            $images_existed = $image->where('product_id', $id)->pluck('id');
            $id_image_remove = array_diff($images_existed->toArray(), $request->images_no_delete);
            foreach ($id_image_remove as $id_image) {
                $image->where('id', $id_image)->delete();
            }
        } else {
            $request->images_no_delete = [];

            $images_existed = $image->where('product_id', $id)->pluck('id');
            $id_image_remove = array_diff($images_existed->toArray(), $request->images_no_delete);
            foreach ($id_image_remove as $id_image) {
                $image->where('id', $id_image)->delete();
            }
        }
        // Add images added.
        if ($request->p_images_new) {
            foreach ($request->p_images_new as $p_image) {
                $path_image = $this->storeFile($p_image);
                $image->create([
                    'path'       => $path_image,
                    'product_id' => $id
                ]);
            }
        }
        return redirect()->route('product.list');
    }
    public function destroy($id, Product $product, Image $image)
    {
        $image->where('product_id', $id)->delete();
        $product->find($id)->delete();

        return redirect()->route('product.list');
    }

    public function storeFile($request)
    {
        $file = $request;
        $namefile = time() . $request->getClientOriginalName();
        $file->move('uploads/images/products', $namefile);
        $path_image = 'uploads/images/products/' . $namefile;

        return $path_image;
    }

    public function detail($id, Product $product)
    {
        $data = [
            'titlePage'     => ' Detail Product',
            'product'       => $product->with('images')->find($id)
        ];
        return view('products.detail', $data);
    }
    public function showCart()
    {
        return view('cart');
    }
}