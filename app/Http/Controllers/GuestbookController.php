<?php

namespace App\Http\Controllers;

use App\Models\Guestbook;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GuestbookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pinned_guestbooks = Guestbook::with('user')
            ->where('id', 1)
            ->limit(2)
            ->get();
        // $guestbooks = Guestbook::with('user')->orderBy('created_at', 'desc')->get();
        $guestbooks = Guestbook::with('user')
            ->orderBy('created_at', 'desc')
            ->where('id', '!=', 1)
            ->get();

        return  view('guestbook.index', compact('guestbooks', 'pinned_guestbooks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
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
        $validated = $request->validate([
            'message' => 'required|string|max:255',
        ]);

        $request->user()->guestbook()->create($validated);

        return redirect(route('guestbook.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Guestbook  $guestbook
     * @return \Illuminate\Http\Response
     */
    public function show(Guestbook $guestbook)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Guestbook  $guestbook
     * @return \Illuminate\Http\Response
     */
    public function edit(Guestbook $guestbook)
    {
        if (Auth::check()) {
            if (Auth::user()->id == $guestbook->user_id || Auth::user()->is_admin == true) {
                return view('guestbook.edit', compact('guestbook'));
            } else {
                return redirect()->route('guestbook.index');
            }
        } else {
            return redirect()->route('guestbook.index');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Guestbook  $guestbook
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Guestbook $guestbook)
    {
        $validated = $request->validate([
            'message' => 'required|string|max:255',
        ]);

        $guestbook->update($validated);

        return redirect(route('guestbook.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Guestbook  $guestbook
     * @return \Illuminate\Http\Response
     */
    public function destroy(Guestbook $guestbook)
    {
        if (Auth::check()) {
            if (Auth::user()->id == $guestbook->user_id || Auth::user()->is_admin == true) {
                $guestbook->delete();
                return redirect()->route('guestbook.index');
            } else {
                return redirect()->route('guestbook.index');
            }
        } else {
            return redirect()->route('guestbook.index');
        }
    }
}
