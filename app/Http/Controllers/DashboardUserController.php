<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // user where user id is not 1


        if (Auth::user()->id == 1) {
            $users = User::where('id', '!=', 1)
                ->where('id', '!=', Auth::user()->id)
                ->get();
        } else {
            $users = User::where('id', '!=', 1)
                ->where('id', '=', Auth::user()->id)
                ->get();
            // $users = User::where('id', '!=', 1)
            //     ->where('id', '=', Auth::user()->id)
            //     ->get();
        }
        return view('dashboard.user.index', compact('users'));
    }

    public function makeRoleAdmin(User $user)
    {
        $user->is_admin = 1;
        $user->save();
        return redirect()->back()->with('success', 'User has been made Admin');
    }
    public function makeRoleUser(User $user)
    {
        $user->is_admin = 0;
        $user->save();
        if (Auth::user()->is_admin == 0) {
            redirect()->route('home');
        } else {
            return redirect()->back()->with('success', 'User has been made User');
        }
        // return redirect()->back()->with('success', 'User has been made User');
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
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
