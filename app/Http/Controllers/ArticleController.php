<?php

namespace App\Http\Controllers;

use App\Models\Article;
use \Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreArticleRequest;
use App\Http\Requests\UpdateArticleRequest;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Article::all();
        return view('article.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('article.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreArticleRequest $request)
    {
        $validatedData = $request->validated();

        if($request->hasFile('image')){
            $validatedData['image_content'] = $request->file('image')->store('article_images', 'public');
        }

        Article::create($validatedData);

        return redirect()->route('article.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        return view('article.edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateArticleRequest $request, Article $article)
    {
        $image_name = $article->image_content;
        if($request->hasFile('update_image')){
            Storage::delete($image_name);
            $image_name = $request->file('update_image')->store('article_images', 'public');
        }
        $article->update($request->validated() + ['image_content' => $image_name]);
        return redirect()->route('article.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        //
    }

    public function generatePdf(){
        $articles = Article::all();
        $pdf = PDF::loadView('pdf.tesPdf', compact('articles'));
        return $pdf->stream('test.pdf');
    }
}
