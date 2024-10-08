<?php

namespace Modules\Tour\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Article;

class TourController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $tourArticles = Article::where('type', false)->get(); // 1 for tour
        return view('tour::index',compact('tourArticles'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function show($id)
    {
        $article = Article::findOrFail($id);
        return view('show', compact('article'));
    }
    public function destroy($id)
    {
        $article = Article::findOrFail($id);
        // Path to the image file
        $imagePath = storage_path('app/public/images/' . $article->img);
        // Check if the image is not the default 'no_image.jpg' and if it exists
        if ($article->img !== 'no_image.jpg' && file_exists($imagePath)) {
            unlink($imagePath); // Delete the image file
        }
        $article->delete(); // Delete the article from the database
        return redirect()->route('tour.index')->with('success', 'Article and associated image deleted successfully.');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    // public function store(Request $request)
    // {
    //     //
    // }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    // public function show($id)
    // {
    //     return view('tour::show');
    // }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    // public function edit($id)
    // {
    //     return view('tour::edit');
    // }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    // public function update(Request $request, $id)
    // {
    //     //
    // }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    // public function destroy($id)
    // {
    //     //
    // }
}
