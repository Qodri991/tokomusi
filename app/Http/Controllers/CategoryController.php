<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Category::all();
        return view('category.index', compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'categoryName' => 'required',
                'icon' => 'required'
            ]
        );

        $img = $request->file('icon'); //mengambil file dari form
        $filename = time()."_". $img->getClientOriginalName(); //mengambil dan mengedit nama file dari form
        $img->move('img', $filename); //proses memasukkan image ke dalam direktori laravel

        Category::create(
            [
                'category_name' => $request->categoryName,
                'icon' => $filename
            ]
        );
        return redirect('/category');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('category.update', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $request->validate(
            [
                'categoryName' => 'required',
            ]
        );

        if($request->icon != null){
            $img = $request->file('icon'); //mengambil file dari form
            $filename = time()."_". $img->getClientOriginalName(); //mengambil dan mengedit nama file dari form
            $img->move('img', $filename); //proses memasukkan image ke dalam direktori laravel
            Category::where('id', $category->id)->update(
                [
                    'category_name' => $request->categoryName,
                    'icon' => $filename
                ]
            );
        } else {
            Category::where('id', $category->id)->update(
                [
                    'category_name' => $request->categoryName
                ]
            );
        }

        return redirect('/category');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        Category::destroy('id', $category->id);
        return redirect('/category');
    }
}
