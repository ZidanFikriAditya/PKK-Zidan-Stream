<?php

namespace App\Http\Controllers;

use DateTime;
use DateTimeZone;
use App\Http\Controllers\Payment\TripayController;
use App\Http\Requests\storeTransactionRequest;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\Types\Boolean;

class TransactionController extends Controller
{
    private $defaultStatus = 'Menunggu';
    
    
    public function store(storeTransactionRequest $request){
        // dd(boolval(Transaction::all()->pluck('user_id', Auth::user()->id)->first()));
        
        if (boolval(Transaction::all()->where('user_id', Auth::user()->id)->first())){
            return back()->with('error', 'Pesanan anda masih di proses mohon jangan memesan lagi');
        } else {
            $tr = new Transaction;
            $tr->user_id = auth()->user()->id;
            $tr->package_id = $request->package_id;
            $tr->save();
            
            return redirect('/checkout')->with('bisa', 'Langganan anda sedang di proses!');
        }
        
    }
    
    public function show($reference)
    {
        $tripay = new TripayController;
        $detail = $tripay->detailTransaction($reference);
        
        return view('checkout.detailTrans', [
            'title' => 'Detail Transaksi',
            'detail' => $detail
        ]);
    }
    
    public function checkout()
    {
        $tripay = new TripayController;
        
        $channels = $tripay->getPaymentChannels();
        
        if(!empty(Transaction::all()->pluck('user_id', Auth::user()->id)->first())){
            return view('checkout.checkout', [
                'title' => 'Checkout',
                'channels' => $channels
            ]);
        } else {
            return back()->with('error', 'Anda belum beli!'); 
        }
        
        
    }
    
    public function request(Request $request)
    {
        
        $method = $request->method;
        
        $tripay = new TripayController;
        $transaction = $tripay->getRequestPayment($method);
        
        $up = Transaction::where('user_id', auth()->user()->id)->first();
        $up->reference = $transaction->reference;
        $up->merchant_ref = $transaction->merchant_ref;
        $up->amount = $transaction->amount;
        $up->status = $transaction->status;
        $up->update();
        
        
        return redirect()->route('transaction.show', [
            'reference' => $transaction->reference
        ]);
        
    }
    
    
    public function buktiBayarAdmin()
    {
        $transaction = Transaction::latest()->paginate(10);
        
        return view('checkout.adminDet', compact('transaction'), [
            'title' => 'Detail Bayar'
        ]);
    }    
    
    public function destroy($id)
    {
        $expired = Transaction::findOrFail($id);
        $expired->delete();
        
        return back()->with('habis', 'Paket anda sudah expired');
    }
}
