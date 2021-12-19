@extends('template.master')
@section('title', 'Add Product')

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
                <!-- /.col -->
                <div class="col">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Product</h3>
                        </div>
                        <!-- /.card-header -->
                        <form method="POST" action="{{url('/product')}}" enctype="multipart/form-data">
                          @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="categoryId">Product Category</label>
                                    <select class="form-control" id="categoryId" name="categoryId">
                                    
                                    @foreach ($category as $item)
                                    <option value="{{$item->id}}">{{ $item->category_name }}</option>
                                    @endforeach

                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="productName">Product Name</label>
                                    <input type="text" class="form-control" id="productName" name="productName"
                                        placeholder="Enter Product">
                                </div>
                                <div class="form-group">
                                    <label for="image">Image</label>
                                    <input type="file" class="form-control @error('image') is-invalid @enderror" name="image" id="image" placeholder="Enter image" min="0" max="100">
                                    @error('image')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                  <label for="productStock">Product Stock</label>
                                  <input type="number" class="form-control-file" id="productStock" name="productStock" min="0" max="999999">
                                </div>
                                <div class="form-group">
                                    <label for="productPrice">Product Price</label>
                                    <input type="number" class="form-control-file" id="productPrice" name="productPrice" min="10">
                                </div>
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <input type="text" class="form-control-file" id="description" name="description" placeholder="Enter Description">
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
                                    <input type="number" class="form-control-file" id="weight" name="weight" placeholder="Enter Weight">
                                </div>
                                
                          </div>
                            <!-- /.card-body -->
                          <div class="card-footer">
                              <button type="submit" class="btn btn-primary">Submit</button>
                          </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- /.col -->
    </div>
    </section>
    </div>
@endsection
