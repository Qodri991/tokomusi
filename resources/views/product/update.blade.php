@extends('template.master')
@section('title','Edit Product')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Edit Cateogory</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Product</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <section class="content">
        <div class="container-fluid">
            <!-- /.col -->
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Product</h3>
                    </div>
                    <form method="POST" action="{{url('/product/'.$product->id)}}" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="card-body">

                            <div class="form-group">
                                <label for="categoryId">Product Category</label>
                                <select class="form-control" id="categoryId" name="categoryId">
                                    <!-- using FOREIGN ID -->
                                    @foreach ($category as $item)

                                    @if($item->id == $product->category_id)
                                    <option value="{{$item->id}}" selected>{{$item->category_name}}</option>
                                    @else
                                    <option value="{{$item->id}}" >{{$item->category_name}}</option>
                                    @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="productName">Product Name</label>
                                <input type="text" class="form-control  @error('productName') is-invalid @enderror" name="productName" id="productName" placeholder="Enter Product Name" value="{{$product->product_name}}">
                                @error('productName')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror

                            </div>
                            <div class="form-group">
                                <label for="image">Image</label>
                                <input type="file" class="form-control @error('image') is-invalid @enderror" name="image" id="image" placeholder="Enter Product Name" value="{{$product->product_name}}">
                                @error('image')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="productStock">Product Stock</label>
                                <input type="number" class="form-control @error('productStock') is-invalid @enderror" name="productStock" id="productStock" placeholder="Enter Product Stock" value="{{$product->product_stock}}">
                                @error('productStock')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="productPrice">Product Price</label>
                                <input type="number" class="form-control @error('productPrice') is-invalid @enderror" name="productPrice" id="productPrice" placeholder="Enter Product Price" value="{{$product->product_price}}">
                                @error('productPrice')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <input type="text" class="form-control @error('description') is-invalid @enderror" name="description" id="description" placeholder="Enter Category Name" value="{{$product->description}}">
                                @error('description')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="condition">Product Condition</label>
                                <select class="form-control" id="condition" name="condition">
                                
                                <option value="new">New</option>
                                <option value="second">Second</option>

                                </select>
                            </div>
                            <div class="form-group">
                                <label for="weight">Weight</label>
                                <input type="number" class="form-control-file" id="weight" name="weight" placeholder="Enter Weight" value="{{ $product->weight }}">
                            </div>

                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>

                </div>

            </div>
            <!-- /.col -->
        </div>
    </section>
</div>
@endsection