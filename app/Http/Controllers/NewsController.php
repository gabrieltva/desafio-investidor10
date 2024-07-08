<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use App\Models\Category;

class NewsController extends Controller
{

    /**
     * List all the news.
     * 
     * @return \Illuminate\Http\Response
     */
    public function index () {
        $news = News::orderBy('date', 'desc')->get();
        return view('index', compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('news.create', compact('categories'));
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
            'title' => 'required|max:255',
            'content' => 'required',
            'date' => 'required|date',
            'id_category' => 'required|exists:categories,id',
        ]);

        News::create($request->all());

        return redirect()->route('news.create')->with('success', 'Notícia cadastrada com sucesso.');
    }

    /**
     * Search for news by title and category title.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $search = $request->input('s');

        $news = News::where('title', 'like', "%{$search}%")
                    ->orWhereHas('category', function($query) use ($search) {
                        $query->where('title', 'like', "%{$search}%");
                    })->orderBy('date', 'desc')
                    ->get();

        return view('news.search', compact('news', 'search'));
    }

    /**
     * Show a news by slug.
     * 
     * @param  String $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug) {
        $news = News::where('slug', $slug)->firstOrFail();
        $category = $news->category()->firstOrFail();

        return view('news.show', ['news' => $news, 'category' => $category]);
    }
}
