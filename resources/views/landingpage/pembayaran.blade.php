@extends('templatefrontend.master')
@section('title' . 'pembayaran')
@section('content')
    <!-- Awal Metode Pembayaran -->
    <section id="Metode-Pembayaran">
        <div class="container">
            <div class="row mt-lg-5">
                <div class="col">
                    <h1>Metode <span>Pembayaran</span></h1>
                </div>
            </div>
            <div class="bg-pembayaran mt-lg-3">
                <div class="row form-group">
                    <div class="col-lg-3 label">
                        <input class="form-control" type="text" placeholder="Batas waktu pembayaran">
                    </div>
                    <div class="col-lg-9 isi">
                        <input class="form-control" type="text" placeholder="{{ $bataspembayaran }}">
                    </div>
                </div>
            </div>
            <div class="bg-pembayaran mt-lg-3">
                <div class="row form-group">
                    <div class="col-lg-3 label">
                        <input class="form-control" type="text" placeholder="Courier">
                    </div>
                    <div class="col-lg-8 isi">
                        <input class="form-control" type="text" placeholder="{{ $transaction->courier->courier_name }}">
                    </div>
                    <div class="col-lg-1">
                        <div class="btn btn-outline-warning">Salin </div>
                    </div>
                </div>
            </div>
            <div class="bg-pembayaran mt-lg-3">
                <div class="row form-group">
                    <div class="col-lg-3 label">
                        <input class="form-control" type="text"
                            placeholder="{{ $transaction->paymentmethod->bank_name }}">
                    </div>
                    <div class="col-lg-8 isi">
                        <input class="form-control" type="text"
                            placeholder="{{number_format($transaction->paymentmethod->account_number, 0,',','-')}}">
                    </div>
                    <div class="col-lg-1">
                        <div class="btn btn-outline-warning">Salin </div>
                    </div>
                </div>
            </div>
            <div class="bg-pembayaran mt-lg-3">
                <div class="row form-group">
                    <div class="col-lg-3 label">
                        <input class="form-control" type="text" placeholder="Total Pembayaran">
                    </div>
                    <div class="col-lg-8 isi">
                        <input class="form-control" type="text" placeholder="IDR{{ $transaction->total_payments }}"
                            readonly value="{{number_format($transaction->total_payments, 2,',','.')}}">
                    </div>
                    <div class="col-lg-1">
                        <div class="btn btn-outline-warning">Salin </div>
                    </div>
                </div>
            </div>
            <div class="row mt-2 pt-3">
                <div class="col-lg-6 mb-5 text-center">
                    <a href="{{ url('/home') }}">
                        <div class="btn btn-warning">Back to Home <i class="fa fa-long-arrow-right"></i>
                        </div>
                    </a>
                </div>
                <div class="col-lg-6 mb-5 text-center">
                    <a href="{{url('/history')}}">
                        <div class="btn btn-warning">Cek History Belanja <i class="fa fa-long-arrow-right"></i>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <!-- Akhir Metode Pembayaran -->
@endsection
