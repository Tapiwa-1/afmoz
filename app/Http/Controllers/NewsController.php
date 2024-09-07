<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Church;
use Illuminate\Http\Request;
use Inertia\Inertia;

class NewsController extends Controller
{
    /**
     * Display a listing of the news articles.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = News::with('church')->get(); // Get all news articles with their associated churches
        return Inertia('News/index', compact('news'));
    }

    /**
     * Show the form for creating a new news article.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $churches = Church::all(); // Get all churches to associate with a news article
        return Inertia('News/create', compact('churches'));
    }

    /**
     * Store a newly created news article in the database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'author' => 'nullable|string|max:255',
            'published_at' => 'nullable|date',
        ]);

        News::create($request->all());

        return redirect()->route('news.index')->with('success', 'News article created successfully.');
    }

    /**
     * Display the specified news article.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function show(News $news)
    {
        return Inertia('News/show', compact('news'));
    }

    /**
     * Show the form for editing the specified news article.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function edit(News $news)
    {
        $churches = Church::all(); // Get all churches to associate with the news article
        return Inertia('News/edit', compact('news', 'churches'));
    }

    /**
     * Update the specified news article in the database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, News $news)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'author' => 'nullable|string|max:255',
            'published_at' => 'nullable|date',
            
        ]);

        $news->update($request->all());

        return redirect()->route('news.index')->with('success', 'News article updated successfully.');
    }

    /**
     * Remove the specified news article from the database.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function destroy(News $news)
    {
        $news->delete();

        return redirect()->route('news.index')->with('success', 'News article deleted successfully.');
    }
}
