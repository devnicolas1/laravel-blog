<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('blog.index', [
            'twoLatestPosts' => Post::orderBy('created_at', 'desc')->limit(2)->get(),
            'allPosts' => Post::orderBy('created_at', 'desc')->paginate(20)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('blog.create', [
            'categories' => Category::orderBy('category', 'asc')->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post = Post::create([
            'user_id' => Auth::id(),
            'metaTitle' => $request->metaTitle,
            'metaDescription' => $request->metaDescription,
            'metaKeywords' => $request->metaKeywords,
            'title' => $request->title,
            'noAccentsTitle' => $this->removeAccents($request->title),
            'excerpt' => $request->excerpt,
            'body' => $request->body,
            'image_path' => $this->storeImage($request),
        ]);

        $this->relateCategories($post, $request);

        return redirect(route('dashboard'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('blog.show', [
            'post' => Post::findOrFail($id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('blog.edit', [
            'post' => Post::where('id', $id)->first()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Post::where('id', $id)->update([
            'metaTitle' => $request->metaTitle,
            'metaDescription' => $request->metaDescription,
            'metaKeywords' => $request->metaKeywords,
            'title' => $request->title,
            'noAccentsTitle' => $this->removeAccents($request->title),
            'excerpt' => $request->excerpt,
            'body' => $request->body,
            // 'image_path' => $this->storeImage($request),
        ]);

        return redirect(route('dashboard'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Post::destroy($id);

        return redirect(route('dashboard'));
    }

    private function removeAccents($string) {
        $allAccentsArray = ['á', 'ã', 'â', 'é', 'ê', 'í', 'ó', 'õ', 'ô', 'ú', 'û'];
        $noAccentsArray = ['a', 'a', 'a', 'e', 'e', 'i', 'o', 'o', 'o', 'u', 'u'];
        
        return str_replace($allAccentsArray, $noAccentsArray, $string);
    }

    private function storeImage($request)
    {
        $noAccentsTitle = $this->removeAccents($request->title);

        $newImageName = uniqid() . '-' . $noAccentsTitle . '.' . $request->image_path->extension();

        $finalImagePath = $request->image_path->move(public_path('images'), $newImageName);
        $finalImagePath = explode('public\\', $finalImagePath); // creates an array, where $finalImagePath[1] equals to the one usable on asset()

        return $finalImagePath[1];
    }

    private function relateCategories($post, $requestWithCategories) {
        $categories = $requestWithCategories->except('_token', 'title', 'excerpt', 'body', 'metaTitle', 'metaDescription', 'metaKeywords', 'image_path');

        foreach ($categories as $categoryId) {
            $categoriesId[] = $categoryId;
        }

        for($i = 0; $i < count($categoriesId); $i++) {
            $post->categories()->attach($categoriesId[$i]);
        }
    }
}
