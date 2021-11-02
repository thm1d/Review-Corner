<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
use App\Models\User;
use App\Models\Movie;
use App\Models\Tv;
use App\Models\Rating;
use App\Models\Review;
use App\Models\Contact;
use App\Models\Payment;

class SuperAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->hasRole('user')) {
            return redirect()->back();
        } elseif(Auth::user()->hasRole('admin')) {
            return view('admin.index');
        } elseif(Auth::user()->hasRole('superadmin')) {
            return view('superadmin.dashboard');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function usersIndex()
    {
        if(Auth::user()->hasRole('user') || Auth::user()->hasRole('admin')) {
            return redirect()->back();
        } else {
            $users = collect(DB::table('users')
                                ->join('role_user', 'users.id', '=', 'role_user.user_id')->where('role_user.role_id', '=', '3')->get());
            if(!is_null($users)) {
                $users = json_decode($users, true);
            }
            //dump($users);

            return view('superadmin.users', [
                'users' => $users,
            ]);
        }
    }

    public function adminsIndex()
    {
        if(Auth::user()->hasRole('user') || Auth::user()->hasRole('admin')) {
            return redirect()->back();
        } else {
            $admins = collect(DB::table('users')
                                ->join('role_user', 'users.id', '=', 'role_user.user_id')->where('role_user.role_id', '=', '2')->get());

            
            if(!is_null($admins)) {
                $admins = json_decode($admins, true);
            }
            //dd($admins);

            return view('superadmin.admins', [
                'admins' => $admins,
            ]);
        }
    }

    public function ratingsIndex()
    {
        if(Auth::user()->hasRole('user') || Auth::user()->hasRole('admin')) {
            return redirect()->back();
        } else {
            $ratings = Rating::all();
                if(!is_null($ratings)) {
                    $ratings = $ratings->toArray();
                }
            return view('superadmin.ratings', [
                'ratings' => $ratings,
            ]);
        }
    }

    public function formIndex()
    {
        if(Auth::user()->hasRole('user') || Auth::user()->hasRole('admin')) {
            return redirect()->back();
        } else {
            $contacts = Contact::all();
                if(!is_null($contacts)) {
                    $contacts = $contacts->toArray();
                }
            return view('superadmin.forms', [
                'contacts' => $contacts,
            ]);
        }
    }

    public function reviewsIndex()
    {
        if(Auth::user()->hasRole('user') || Auth::user()->hasRole('admin')) {
            return redirect()->back();
        } else {
            $reviews = Review::all();
                if(!is_null($reviews)) {
                    $reviews = $reviews->toArray();
                }
            return view('superadmin.reviews', [
                'reviews' => $reviews,
            ]);
        }
    }

    public function donationsIndex()
    {
        if(Auth::user()->hasRole('user') || Auth::user()->hasRole('admin')) {
            return redirect()->back();
        } else {
            $payment = Payment::all();
                if(!is_null($payment)) {
                    $payment = $payment->toArray();
                }
            return view('superadmin.donations', [
                'donations' => $payment,
            ]);
        }
    }

    public function demoIndex()
    {
        if(Auth::user()->hasRole('user')) {
            $user = Auth::user()->toArray();
            dump($user);

            return view('profile.dashboard', [
                'user' => $user,
            ]);
        } elseif(Auth::user()->hasRole('admin')) {
            $users = User::all();
            if(!is_null($users)) {
                $users = $users->toArray();
            }
            dump($users);

            return view('admin.users', [
                'users' => $users,
            ]);
        } elseif(Auth::user()->hasRole('superadmin')) {
            return view('superadmin.dashboard');
        }
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
    public function show($id)
    {
        //
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

    public function donationUpdate(Request $request, $id)
    {
        $donation = Payment::where('id', $id)->first();
        $donation->status = 1;
        $donation->save();
        return redirect()->back()->with('msg', 'Donation is Approved'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function userDestroy($id)
    {
        $user = User::where('id', $id)->firstorfail()->delete();
        return redirect()->back()->with('msg', 'User Record deleted successfully.');
    }

    public function adminDestroy($id)
    {
        $user = User::where('id', $id)->firstorfail()->delete();
        return redirect()->back()->with('msg', 'Admin Record deleted successfully.');
    }

    public function reviewDestroy($id)
    {
        $review = Review::where('id', $id)->firstorfail()->delete();
        return redirect()->back()->with('msg', 'Review deleted successfully.');
    }
}
