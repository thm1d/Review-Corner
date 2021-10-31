<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Models\Payment;

class PaymentController extends Controller
{
	public function index()
	{
		return view('donation');
	}

    public function store(Request $request)
    {
        $user_id = Auth::user()->id;

        dump($request);

        if ($request->method == 'bkash') {
        $payment = Payment::create([
                'name' =>$request->full_name,
                'value' => $request->amount,
                'method' => $request->method,
                'tranx_id' => $request->btranx_id,
                'sender_no' =>$request->bsender_no,
                'contact_no' => $request->bcontact_no,
                'user_id' => $user_id,

            ]);
	    } elseif ($request->method == 'nagad') {
        $payment = Payment::create([
                'name' =>$request->full_name,
                'value' => $request->amount,
                'method' => $request->method,
                'tranx_id' => $request->ntranx_id,
                'sender_no' =>$request->nsender_no,
                'contact_no' => $request->ncontact_no,
                'user_id' => $user_id,

            ]);
	    } elseif ($request->method == 'rocket') {
        $payment = Payment::create([
                'name' =>$request->full_name,
                'value' => $request->amount,
                'method' => $request->method,
                'tranx_id' => $request->rtranx_id,
                'sender_no' =>$request->rsender_no,
                'contact_no' => $request->rcontact_no,
                'user_id' => $user_id,

            ]);
	    } else {
	    	$payment = Payment::create([
                'name' =>$request->full_name,
                'value' => $request->amount,
                'method' => $request->method,
                'contact_no' => $request->bkcontact_no,
                'bank_name' => $request->bank,
                'depositor_name' => $request->depositor_name,
                'bank_account_no' =>$request->acc_no,
                'user_id' => $user_id,
            ]);
	    }
        return view('donation');
    }
}
