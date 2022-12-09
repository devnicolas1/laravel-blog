<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        return view('blog.search', [
            'results' => Post::where('noAccentsTitle', 'like', '%' . $request->searchString . '%')->get()
        ]);
    }
}
