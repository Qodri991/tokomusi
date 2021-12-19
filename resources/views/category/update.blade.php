@extends('template.master')
@section('title', 'Update Category')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Dashboard</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard v1</li>
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
                            <h3 class="card-title">Category</h3>
                        </div>
                        <!-- /.card-header -->
                        <form method="POST" action="{{url('/category/'.$category->id)}}" enctype="multipart/form-data">
                          @csrf
                          @method('patch')
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="categoryName">Edit Category Name</label>
                                    <input type="text" class="form-control" id="categoryName" name="categoryName"
                                        placeholder="Enter Category" value="{{$category->category_name}}">
                                </div>
                                <div class="form-group">
                                  <label for="icon">Edit Icon</label>
                                  <input type="file" class="form-control-file" id="icon" name="icon">
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
