<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    // Show the form to create a new article
    public function create()
    {
        return view('create');
    }

    // Store a newly created article
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'excerpt' => 'required|string|max:255',
            'detail' => 'required|string',
            'type' => 'required|boolean',
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validate image file
        ]);

        // Get the authenticated user's ID
        $userId = auth()->id();

        // Prepare data for creating the article
        $data = $request->except('img');
        $data['user_id'] = $userId;

        if ($request->hasFile('img')) {
            $imageName = time() . '.' . $request->img->extension();
            $request->img->storeAs('public/images', $imageName);
            $data['img'] = $imageName;
        }else{
            $data['img'] = 'no_image.jpg';
        }

        Article::create($data);

        return redirect()->route('news.index')->with('success', 'Article created successfully.');
    }

    // Show the form for editing an existing article
    public function edit($id)
    {
        $article = Article::findOrFail($id);
        return view('edit', compact('article'));
    }

    // Update the specified article
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'excerpt' => 'required|string|max:255',
            'detail' => 'required|string',
            'type' => 'required|boolean',
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validate image file
        ]);

        $article = Article::findOrFail($id);
        $data = $request->except('img'); // Get all data except the image

        if ($request->hasFile('img')) {
            // Delete old image if exists
            if ($article->img !== 'no_image.jpg') {
                Storage::delete('public/images/' . $article->img);
            }

            // Store new image
            $imageName = time() . '.' . $request->img->extension();
            $request->img->storeAs('public/images', $imageName);
            $data['img'] = $imageName;
        }

        $article->update($data);

        return redirect()->route('news.index')->with('success', 'Article updated successfully.');
    }
}
