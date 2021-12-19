@extends('templatefrontend.master')
@section('title' . 'history')
@section('content')

    <!-- Awal History Transaksi -->
    <section id="History-Transaksi">
        <div class="container">
            <div class="col mt-5">
                <h1>History <span>Transaksi</span></h1>
            </div>
            <div class="row mt-4">
                @foreach ($cart as $item)
                    
                
                <div class="col-lg-12">
                    <div class="bg-history">
                        <div class="container">
                            <div class="row mt-4 pt-3 text-center judul">
                                <div class="col-lg-2">
                                    <h6>Gambar</h6>
                                </div>
                                <div class="col-lg-4">
                                    <h6>Nama Barang</h6>
                                </div>
                                <div class="col-lg-4">
                                    <h6>Kuantitas</h6>
                                </div>
                                <div class="col-lg-2">
                                    <h6>Action</h6>
                                </div>
                            </div>
                            <hr>
                            <div class="row aksi">
                                <div class="col-lg-2">
                                    <img src="{{asset('img/' . $item->product->image)}}" alt="">
                                </div>
                                <div class="col-lg-8">
                                    <h5>{{ $item->product->product_name }}</h5>
                                    <div class="row mt-lg-4">
                                        <div class="col harga">
                                            <h5>IDR <span>{{ $item->total_price }}</span></h5>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <h5>{{ $item->product_qty }}</h5>
                                    </div>
                                </div>
                                <div class="col-lg-2 text-center">
                                    <i class="fa fa-trash"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- Akhir Keranjang -->
@endsection
