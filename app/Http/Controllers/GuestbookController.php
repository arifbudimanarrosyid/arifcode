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
        // get guestbook with id = 1
        $pinned_guestbooks = Guestbook::where('is_pinned', 1)
            // ->with('user')
            ->orderBy('updated_at', 'desc')
            ->get();

        // get all guestbook
        // $guestbooks = Guestbook::with('user')->orderBy('created_at', 'desc')->get();

        // get all guestbook except id = 1
        $guestbooks = Guestbook::where('is_pinned',  0)
            // ->with('user')
            ->orderBy('created_at', 'desc')
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
        if (Auth::check()) {
            $validated = $request->validate([
                'message' => 'required|string|max:255',
            ]);

            $request->user()->guestbook()->create($validated);

            return redirect(route('guestbook.index'))->with('success', 'Guestbook created successfully.');
        } else {
            return redirect(route('login'));
        }
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
                return redirect()->route('guestbook.index')->with('danger', 'You are not authorized to edit this guestbook.');
            }
        } else {
            return redirect()->route('guestbook.index')->with('danger', 'You are not authorized to edit this guestbook.');
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
        if (Auth::user()->id != $guestbook->user_id) {
            $request->validate([
                'message' => 'required|string|max:255',
            ]);

            $guestbook->timestamps = false;
            $guestbook->message = $request->message;
            $guestbook->save();

            return redirect(route('guestbook.index'))->with('success', 'Guestbook updated successfully as Admin.');
        }
        if (Auth::user()->id == $guestbook->user_id) {
            $request->validate([
                'message' => 'required|string|max:255',
            ]);

            $guestbook->message = $request->message;
            $guestbook->save();

            return redirect(route('guestbook.index'))->with('success', 'Guestbook updated successfully.');
        }
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
                return redirect()->route('guestbook.index')->with('success', 'Guestbook deleted successfully.');
            } else {
                return redirect()->route('guestbook.index')->with('danger', 'You are not authorized to delete this guestbook.');
            }
        } else {
            return redirect()->route('guestbook.index')->with('danger', 'You are not authorized to delete this guestbook.');
        }
    }

    public function pin(Guestbook $guestbook)
    {
        if (Auth::check()) {
            if (Auth::user()->is_admin == true) {
                $guestbook->timestamps = false;
                $guestbook->is_pinned = true;
                $guestbook->save();
                // dd($guestbook);
                return redirect()->route('guestbook.index')->with('success', 'Guestbook pinned successfully.');
            } else {
                return redirect()->route('guestbook.index')->with('danger', 'You are not authorized to pin this guestbook.');
            }
        } else {
            return redirect()->route('guestbook.index')->with('danger', 'You are not authorized to pin this guestbook.');
        }
    }

    public function unpin(Guestbook $guestbook)
    {
        if (Auth::check()) {
            if (Auth::user()->is_admin == true) {
                $guestbook->timestamps = false;
                $guestbook->is_pinned = false;
                $guestbook->save();
                // dd($guestbook);
                return redirect()->route('guestbook.index')->with('success', 'Guestbook unpinned successfully.');
            } else {
                return redirect()->route('guestbook.index')->with('danger', 'You are not authorized to unpin this guestbook.');
            }
        } else {
            return redirect()->route('guestbook.index')->with('danger', 'You are not authorized to unpin this guestbook.');
        }
    }
}
