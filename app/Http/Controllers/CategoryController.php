<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateCateRequest;
use App\Http\Requests\UpdateCateRequest;
use App\Model\Category;

class CategoryController extends Controller
{
    public function showHome()
    {
        return view('layouts.master');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Category $category)
    {

        $data = [
            'categories' => $category->all(),
            'titlePage'  => 'List Category'
        ];
        return view('categories.list', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categories.create', ['titlePage'  => 'Create Category']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateCateRequest $request, Category $category)
    {
        $category->create([
            'name' => $request->c_name
        ]);
        return redirect()->route('category.list');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Category $category)
    {
        $data = [
            'category' => $category->find($id),
            'titlePage'  => 'Edit Category'
        ];
        return view('categories.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCateRequest $request, $id, Category $category)
    {
        $categoryUpdate = $category->find($id)->update(
            ['name' => $request->c_name]
        );
        return redirect()->route('category.list');
    }

    public function showProduct()
    {
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}