<?php

namespace App\Http\Controllers;

use App\Models\Guestbook;
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
        //$guestbook with user orderby created_at desc
        $guestbooks = Guestbook::with('user')->orderBy('created_at', 'desc')->get();
        // $guestbooks = Guestbook::with('user')->orderBy()->get();
        return  view('guestbook.index', compact('guestbooks'));
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

        // if auth
        // if (Auth::check()) {
        //     // $request->validate([
        //     //     'message' => 'required',
        //     // ]);
        //     $guestbook = new Guestbook();
        //     $guestbook->message = $request->message;
        //     $guestbook->user_id = Auth::user()->id;
        //     $guestbook->save();
        //     return redirect()->route('guestbook.index');
        // } else {
        //     return redirect()->route('login');
        // }


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
        //if auth check
        if (Auth::check()) {
            //if auth id == guestbook user id
            if (Auth::user()->id == $guestbook->user_id) {
                return view('guestbook.edit', compact('guestbook'));
            } else {
                return redirect()->route('guestbook.index');
            }
        } else {
            return redirect()->route('login');
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
        // $this->authorize('update', $guestbook);

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
        //if auth check
        //if auth id == guestbook user id
        if (Auth::check()) {
            if (Auth::user()->id == $guestbook->user_id) {
                $guestbook->delete();
                return redirect()->route('guestbook.index');
            } else {
                return redirect()->route('guestbook.index');
            }
        } else {
            return redirect()->route('login');
        }
        // $guestbook->delete();

        // return redirect(route('guestbook.index'));
    }
}
