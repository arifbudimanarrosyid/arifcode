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
    public function store(Request $request)
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
            'is_published' => 'boolean'
        ]);


        if ($request->hasFile('thumbnail')) {
            $thumbnail = $request->file('thumbnail');
            $thumbnailName = time() . '.' . $thumbnail->getClientOriginalExtension();
            $thumbnail->storeAs('public/portofolio', $thumbnailName);
            $portofolio = Portofolio::create(
                [
                    'title' => $request->title,
                    'thumbnail' => $thumbnailName,
                    'description' => $request->description,
                    'technology' => $request->technology,
                    'demo_link' => $request->demo_link,
                    'github_link' => $request->github_link,
                    'website_link' => $request->website_link,
                    'youtube_link' => $request->youtube_link,
                    'is_published' => $request->is_published
                ]
            );
            // dd($portofolio);
            return redirect()->route('portofolio.index')->with('success', 'Portofolio created successfully with thumbnail');
        }

        $portofolio = Portofolio::create(
            [
                'title' => $request->title,
                'description' => $request->description,
                'technology' => $request->technology,
                'demo_link' => $request->demo_link,
                'github_link' => $request->github_link,
                'website_link' => $request->website_link,
                'youtube_link' => $request->youtube_link,
                'is_published' => $request->is_published
            ]
        );
        // dd($portofolio);

        return redirect()->route('portofolio.index')->with('success', 'Portofolio created successfully');
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
        //
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
            if (Storage::exists('public/thumbnails/' . $portofolio->thumbnail)) {
                unlink(public_path('storage/thumbnails/' . $portofolio->thumbnail));
            }
            $portofolio->delete();
            return redirect()->route('portofolio.index')->with('success', 'Portofolio deleted successfully, thumbnail deleted too');
        }
        $portofolio->delete();
        return redirect()->route('portofolio.index')->with('success', 'Portofolio deleted successfully');
    }
}
