<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = Product::all();
        return view('product.index', compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::all();
        return view('product.create', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request;
        $request->validate(
            [
                'categoryId' => 'required',
                'image' => 'required',
                'productName' => 'required | min : 3 | max : 100',
                'productStock' => 'required |min :0 | max : 100000000',
                'productPrice' => 'required |min :0 | max : 100000000',
                'description' => 'required |min :5 | max : 100',
                'condition' => 'required | min : 3 | max : 100',
                'weight' => 'required |min :0 | max : 100000000'
            ],
            [
                'categoryId.required' =>'Category id is required',
                'image' => 'image is required',
                'productName.required' =>'Product name is required',
                'productName.min' => 'min 3 words',
                'productName.max' => 'max 100 words',
                'productStock.required'=> 'Product stock is required',
                'productStock.max'=> 'max 100000000',
                'productPrice.required' =>'Product price is required', 
                'productPrice.max'=> 'max 100000000',
                'description.required' => 'Product description is required',
                'description.min' => 'min 5 words',
                'description.max' => 'max 100 words',
                'condition.min' => 'min 3 words',
                'condition.max' => 'max 100 words',
                'weight.required' =>'Product weight is required', 
                'weight.max'=> 'max 100000000',
            ]);

        $img = $request->file('image'); //mengambil file dari form
        $filename = time()."_". $img->getClientOriginalName(); //mengambil dan mengedit nama file dari form
        $img->move('img', $filename); //proses memasukkan image ke dalam direktori laravel

        Product::create(
            [
                'category_id' => $request->categoryId,
                'image' => $filename,
                'product_name' => $request->productName,
                'product_stock' => $request->productStock,
                'product_price' => $request->productPrice,
                'description' => $request->description,
                'condition' => $request->condition,
                'weight' => $request->weight,
                'review' => 0,
                'sold_out' => 0
            ]
        );
        return redirect('/product')-> with('status', 'Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $category = Category::all();
        return view('product.update', compact('product','category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $request->validate(
            [
                'categoryId' => 'required',
                'image' => 'required ',
                'productName' => 'required | min : 3 | max : 100',
                'productStock' => 'required |min :0 | max : 100000000',
                'productPrice' => 'required |min :0 | max : 100000000',
                'description' => 'required |min :5 | max : 100',
                'condition' => 'required | min : 3 | max : 100',
                'weight' => 'required |min :0 | max : 100000000'
            ],
            [
                'categoryId.required' =>'Category id is required',
                'image' => 'image is required',
                'productName.required' =>'Product name is required',
                'productName.min' => 'min 3 words',
                'productName.max' => 'max 100 words',
                'productStock.required'=> 'Product stock is required',
                'productStock.max'=> 'max 100000000',
                'productPrice.required' =>'Product price is required', 
                'productPrice.max'=> 'max 100000000',
                'description.required' => 'Product description is required',
                'description.min' => 'min 5 words',
                'description.max' => 'max 100 words',
                'condition.min' => 'min 3 words',
                'condition.max' => 'max 100 words',
                'weight.required' =>'Product weight is required', 
                'weight.max'=> 'max 100000000',
            ]);
            
            if($request ->image !=null){
                $img = $request->file('image'); //mengambil dari form
                $filename = time() . "_" . $img->getClientOriginalName();
                $img->move('img', $filename);
                Product::where('id', $product->id)->update(
                    [
                       
                        'category_id' => $request->categoryId,
                        'image' => $filename,
                        'product_name' => $request->productName,
                        'product_stock' => $request->productStock,
                        'product_price' => $request->productPrice,
                        'description' => $request->description,
                        'condition' => $request->condition,
                        'weight' => $request->weight,
                        'review' => 0,
                        'sold_out' => 0
                    ]
                    );

            }else{
                Product::where('id', $product->id)->update(
                [
                    'category_id' => $request ->categoryId,
                    'product_name' =>  $request->productName,
                    'product_stock' =>  $request->productStock,
                    'product_price' =>  $request->productPrice,
                    'description' =>  $request->description,
                    'review' =>0,
                    'sold_out' =>0
                ]
                );
                
            }
            return redirect('/product')->with('status', 'Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        Product::destroy('id', $product->id);
        return redirect('/product')->with('status',' Deleted Successfully ');
    }
}
