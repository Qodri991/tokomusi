@extends('template.master')
@section('title', 'Product')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Product Table</h1>
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
                <div class="row">
                    <a href="{{url('/product/create')}}" class="btn btn-primary" role="button">Add Product</a>
                </div>
                <!-- /.col -->
                <div class="col">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Product</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <td>No</td>
                                        <td>Category ID</td>
                                        <td>Product Name</td>
                                        <td>Image</td>
                                        <td>Product Stock</td>
                                        <td>Product Price</td>
                                        <td>Description</td>
                                        <td>Review</td>
                                        <td>Sold Out</td>
                                        <td>Condition</td>
                                        <td>Weight</td>
                                        <td>Action</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($product as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{$item->category->category_name}}</td>
                                            <td>{{ $item->product_name }}</td>
                                            <td><img src="{{asset('img/'.$item->image)}}" alt="" width="50"></td>
                                            <td>{{ $item->product_stock }}</td>
                                            <td>{{ $item->product_price }}</td>
                                            <td>{{ $item->description }}</td>
                                            <td>{{ $item->review }}</td>
                                            <td>{{ $item->sold_out }}</td>
                                            <td>{{ $item->condition }}</td>
                                            <td>{{ $item->weight }}</td>
                                            <td>
                                                <a href="{{ url('/product/'.$item->id.'/edit')}}" class="btn btn-info">Edit</a>
                                                <form method="POST" action="{{ url('/product/'.$item->id) }}">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
                <!-- /.col -->
            </div>
        </section>
    </div>
@endsection
