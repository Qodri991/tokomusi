<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Transaction;
use App\Models\Number;
use App\Models\Paymentmethod;
use App\Models\Courier;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LandingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        date_default_timezone_set('Asia/Jakarta');
    }

    public function index()
    {
        $category = Category::all();
        $product = Product::orderByDesc('sold_out')-> get();
        // return $product;
        return view('landingpage.index', compact('category','product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) // menampilkan data hanya dari satu tabel
    {
        $product = Product::where('id', $id)->first();
        // return $product;
        return view('landingpage.detail', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
    public function keranjang(){
        //return "Qodri";
        $cart = Cart::where('user_id', Auth::user()->id)->where('status','belum')->get();
        
        $totalharga = Cart::where('user_id', Auth::user()->id)->where('status', 'belum')->sum('total_price');
        // $courier = Courier::all();
        $courier = Courier::all();
        $paymentmethod = Paymentmethod::all();
        return view('landingpage.keranjang', compact('cart','courier', 'paymentmethod', 'totalharga'));
    }
    public function keranjang_store(Request $request){
        // return Auth::user()->id;
        //return $request;
        $request->validate(
            [
                'kuantitas' => 'required'
            ],
            [
                'kuantitas.required' => 'kuantitas is required'
            ]);
            $product = Product::where('id', $request->productid)->first();
            // return $request;
            //return $product->$product_price;
            $cart = Cart::where('user_id', Auth::user()->id)->where('status','belum')->get();
            foreach ($cart as $item) {
                // return $item->product_id;
                if($item->product_id == $request->productid){
                    Cart::where('product_id', $item->product_id)->update([
                        'product_qty' =>  $item->product_qty + $request->kuantitas,
                        'total_price' => ($item->product_qty + $request->kuantitas) * ($product->product_price),
                    ]);
                    return redirect('/keranjang');   
                }
            }
            Cart::create([
                'user_id' => Auth::user()->id,
                'product_id' => $request ->productid,
                'product_qty' =>  $request->kuantitas,
                'total_price' =>  ($request->kuantitas) * ($product->product_price),
                'status'=>'belum',
                'status_checkout' =>0
                
            ]);
            return redirect('/keranjang');
    }



    public function transaksi(Request $request) {
        //return $request;
        $request->validate(
            [
                'alamat' => 'required',
                // 'invoice' => 'required',
                'courier' => 'required',
                'paymentmethod' => 'required',
                // 'payment_deadline' => 'required',
                // 'courier_id' => 'required',
                'totalharga' => 'required',
                // 'cart_id' => 'required'
            ],
            [
                'alamat' => 'Please insert your address'
            ]);

            //INV-20211212-1
            $date = date('Ymd');
            $number = Number::first();
            $angka = $number->number;
            $invoice = "INV-$date-$angka";
            Number::where('id',1)->update([
                'number' => $angka+=1
            ]);

            Transaction::create([
                'alamat' => $request->alamat,
                'courier_id' => $request->courier,
                'paymentmethod_id' => $request->paymentmethod,
                'total_payments' => $request->totalharga,
                'invoice' => $invoice,
                'status' => 0,
                'payment_deadline' => date('Y-m-d H:i:s')
            ]);
            $cart = Cart::where('user_id', Auth::user()->id)->where('status','belum')->get();
            $transaction = Transaction::where('invoice', $invoice)->first();
            //return $transaction;
            foreach ($cart as $item) {
                Cart::where('id', $item->id)->where('status','belum')->update([
                    'transaction_id' => $transaction->id,
                    'status' => 'sudah'
                ]);
            }
            return redirect('/pembayaran/'.$invoice)->with('status', 'Added Successfully');
    }
    public function pembayaran($inv){
        $transaction = Transaction::where('invoice', $inv)->first();
        // return $transaction;
        $bataspembayaran = date('d M y h:i:s', strtotime('+1 days', strtotime($transaction->created_at)));
        // return $bataspembayaran;
        return view('landingpage.pembayaran', compact('transaction', 'bataspembayaran'));
    }

    public function history(){
        
        $cart = Cart::where('user_id', Auth::user()->id)->where('status','sudah')->get();
        
        
        return view('landingpage.history', compact('cart'));
    }
}
