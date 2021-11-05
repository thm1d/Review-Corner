<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Models\Payment;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Redirect;

class PaymentController extends Controller
{
	public function index()
	{
		return view('donation');
	}

    public function store(Request $request)
    {
        $user_id = Auth::user()->id;
        //dump($request);

        if ($request->method == 'bkash') {
            $payment = Payment::create([
                'name' =>$request->full_name,
                'value' => $request->amount,
                'method' => $request->method,
                'tranx_id' => $request->btranx_id,
                'sender_number' =>$request->bsender_no,
                'contact_number' => $request->bcontact_no,
                'user_id' => $user_id,

            ]);
	    } elseif ($request->method == 'nagad') {
            $payment = Payment::create([
                'name' =>$request->full_name,
                'value' => $request->amount,
                'method' => $request->method,
                'tranx_id' => $request->ntranx_id,
                'sender_number' =>$request->nsender_no,
                'contact_number' => $request->ncontact_no,
                'user_id' => $user_id,

            ]);
	    } elseif ($request->method == 'rocket') {
            $payment = Payment::create([
                'name' =>$request->full_name,
                'value' => $request->amount,
                'method' => $request->method,
                'tranx_id' => $request->rtranx_id,
                'sender_number' =>$request->rsender_no,
                'contact_number' => $request->rcontact_no,
                'user_id' => $user_id, 

            ]);
	    } else {
	    	$payment = Payment::create([
                'name' =>$request->full_name,
                'value' => $request->amount,
                'method' => $request->method,
                'contact_number' => $request->bkcontact_no,
                'bank_name' => $request->bank,
                'depositor_name' => $request->depositor_name,
                'bank_account_no' =>$request->acc_no,
                'user_id' => $user_id,

            ]);
	    }
        // $url = URL::route('donate.index', ['#2']);
        // Redirect::to($url);
        return Redirect::to(URL::previous() . "#2")->with('msg', 'Request Submitted. Please wait for confirmation');
    }
}
