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


class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->hasRole('user')) {
            $user = Auth::user()->toArray();
            //dump($user);

            return view('profile.dashboard', [
                'user' => $user,
            ]);
        } elseif(Auth::user()->hasRole('admin')) {
            return view('admin.index');
        } elseif(Auth::user()->hasRole('superadmin')) {
            return view('superadmin.dashboard');
        }
    }

    public function usersIndex()
    {
        $users = User::all();
        if(!is_null($users)) {
            $users = $users->toArray();
        }

        return view('admin.users', [
            'users' => $users,
        ]);
    }

    public function ratingsIndex()
    {
        $ratings = Rating::all();
            if(!is_null($ratings)) {
                $ratings = $ratings->toArray();
            }
        return view('admin.ratings', [
            'ratings' => $ratings,
        ]);
    }

    public function tableIndex()
    {
        return view('admin.tables');
    }

    public function formIndex()
    {
        $contacts = Contact::all();
            if(!is_null($contacts)) {
                $contacts = $contacts->toArray();
            }
        return view('admin.forms', [
            'contacts' => $contacts,
        ]);
    }

    public function reviewIndex()
    {
        $reviews = Review::all();
            if(!is_null($reviews)) {
                $reviews = $reviews->toArray();
            }
        return view('admin.reviews', [
            'reviews' => $reviews,
        ]);
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

    public function reviewDestroy($id)
    {
        $review = Review::where('id', $id)->firstorfail()->delete();
        return redirect()->back()->with('msg', 'Review deleted successfully.');
    }

}
