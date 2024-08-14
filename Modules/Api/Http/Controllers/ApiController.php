<?php

namespace Modules\Api\Http\Controllers;

use App\Article;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class ApiController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function login(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($request->only('email', 'password'))) {
            $user = Auth::user();
            $token = $user->createToken('Personal Access Token')->accessToken;

            return response()->json([
                'token' => $token,
                'user' => $user
            ]);
        }
        throw ValidationException::withMessages([
            'email' => ['The provided credentials are incorrect.'],
        ]);
    }


    public function articleList(Request $request)
    {
        // Retrieve the type parameter from the request
        $type = $request->query('type');
        // Build the query based on the type parameter
        $query = Article::query();
        if ($type === 'true') {
            $query->where('type', true);
        } elseif ($type === 'false') {
            $query->where('type', false);
        }
        // Get the articles
        $articles = $query->get();
        return response()->json([
            'articles' => $articles
        ]);
    }

    public function articleById($id)
{
    $article = Article::find($id);

    if ($article) {
        return response()->json([
            'article' => $article
        ]);
    }

    return response()->json([
        'message' => 'Article not found'
    ], 404);
}


    public function index()
    {
        return view('api::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('api::create');
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
    public function show($id)
    {
        return view('api::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('api::edit');
    }

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

    // /**
    //  * Remove the specified resource from storage.
    //  * @param int $id
    //  * @return Renderable
    //  */
    // public function destroy($id)
    // {
    //     //
    // }
}
