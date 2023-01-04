<?php

namespace App\Http\Controllers;

use App\Models\Portofolio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DashboardPortofolioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $portofolios = Portofolio::all();
        return view('dashboard.portofolio.index', compact('portofolios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.portofolio.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Portofolio $portofolio)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required|max:255',
            'thumbnail' => 'image|mimes:jpeg,png,jpg|max:2048',
            'technology' => 'string',
            'demo_link' => 'url|nullable',
            'github_link' => 'url|nullable',
            'website_link' => 'url|nullable',
            'youtube_link' => 'url|nullable',
        ]);


        if ($request->hasFile('thumbnail')) {
            $thumbnail = $request->file('thumbnail');
            $thumbnailName = time() . '.' . $thumbnail->extension();
            $thumbnail->move(public_path('storage/portofolio'), $thumbnailName);
            $portofolio->create(
                [
                    'title' => $request->title,
                    'thumbnail' => $thumbnailName,
                    'description' => $request->description,
                    'technology' => $request->technology,
                    'demo_link' => $request->demo_link,
                    'github_link' => $request->github_link,
                    'website_link' => $request->website_link,
                    'youtube_link' => $request->youtube_link,
                ]
            );
            // dd($portofolio);
            return redirect()->route('portofolio.index')->with('success', 'Portofolio created successfully with thumbnail.');
        }

        $portofolio->create(
            [
                'title' => $request->title,
                'description' => $request->description,
                'technology' => $request->technology,
                'demo_link' => $request->demo_link,
                'github_link' => $request->github_link,
                'website_link' => $request->website_link,
                'youtube_link' => $request->youtube_link,
            ]
        );
        // dd($portofolio);

        return redirect()->route('portofolio.index')->with('success', 'Portofolio created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Portofolio  $portofolio
     * @return \Illuminate\Http\Response
     */
    public function show(Portofolio $portofolio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Portofolio  $portofolio
     * @return \Illuminate\Http\Response
     */
    public function edit(Portofolio $portofolio)
    {
        return view('dashboard.portofolio.edit', compact('portofolio'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Portofolio  $portofolio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Portofolio $portofolio)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required|max:255',
            'thumbnail' => 'image|mimes:jpeg,png,jpg|max:2048',
            'technology' => 'required',
            'demo_link' => 'url|nullable',
            'github_link' => 'url|nullable',
            'website_link' => 'url|nullable',
            'youtube_link' => 'url|nullable',
        ]);

        if ($request->hasFile('thumbnail')) {
            $thumbnail = $request->file('thumbnail');
            $thumbnailName = time() . '.' . $thumbnail->extension();
            $thumbnail->move(public_path('storage/portofolio'), $thumbnailName);

            $portofolio->update(
                [
                    'thumbnail' => $thumbnailName,
                    'title' => $request->title,
                    'description' => $request->description,
                    'technology' => $request->technology,
                    'demo_link' => $request->demo_link,
                    'github_link' => $request->github_link,
                    'website_link' => $request->website_link,
                    'youtube_link' => $request->youtube_link,
                ]
            );
            // dd($portofolio);
            return back()->with('success', 'Portofolio saved successfully with thumbnail');
        }
        $portofolio->update(
            [
                'title' => $request->title,
                'description' => $request->description,
                'technology' => $request->technology,
                'demo_link' => $request->demo_link,
                'github_link' => $request->github_link,
                'website_link' => $request->website_link,
                'youtube_link' => $request->youtube_link,
            ]
        );
        // dd($portofolio);
        return back()->with('success', 'Portofolio saved successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Portofolio  $portofolio
     * @return \Illuminate\Http\Response
     */
    public function destroy(Portofolio $portofolio)
    {
        if ($portofolio->thumbnail) {
            if (Storage::exists('public/portofolio/' . $portofolio->thumbnail)) {
                unlink(public_path('storage/portofolio/' . $portofolio->thumbnail));
            }
            $portofolio->delete();
            return redirect()->route('portofolio.index')->with('success', 'Portofolio deleted successfully, thumbnail deleted too');
        }
        $portofolio->delete();
        return redirect()->route('portofolio.index')->with('success', 'Portofolio deleted successfully');
    }

    public function deleteThumbnail(Portofolio $portofolio)
    {
        if ($portofolio->thumbnail) {
            if (Storage::exists('public/portofolio/' . $portofolio->thumbnail)) {
                unlink(public_path('storage/portofolio/' . $portofolio->thumbnail));
            }
            $portofolio->thumbnail = null;
            $portofolio->save();
            return back()->with('success', 'Portofolio thumbnail deleted successfully');
        }
        return back()->with('error', 'Portofolio thumbnail not found');
    }
}
