<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Http\Requests\ArticleRequest;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    public function index()
    {
        $query = Article::query();

        if ($author = request('author')) {
            $query->where('author', $author);
        }

        $articles = $query->withCount('likes')->get();
        return view('articles.index', compact('articles'));
    }

    public function create(Article $article)
    {
        return view('articles.form', [
            'article' => $article,
            'meta_page' => [
                'title' => 'Create new article',
                'method' => 'post',
                'url' => '/blog',
                'submit_text' => 'Create',
            ],
        ]);
    }

    public function store(ArticleRequest $request)
    {
        Article::create(array_merge($request->validated(), [
            'slug' => Str::slug($request->title),
            'author' => Auth::user()->name,
            'teaser' => Str::limit($request->body, 160),
            'meta_title' => $request->title,
            'meta_description' => Str::limit($request->body, 160),
        ]));

        return redirect('blog');
    }

    public function show(Article $article)
    {
        $currentArticle = $article->slug;
        $randomArticles = $article->where('slug', '!=', $currentArticle)
            ->inRandomOrder()
            ->limit(5)
            ->get();
        return view('articles.show', compact('article', 'randomArticles', 'currentArticle'));
    }

    public function edit(Article $article)
    {
        return view('articles.form', [
            'article' => $article,
            'meta_page' => [
                'title' => 'Edit article: ' . $article->title,
                'method' => 'put',
                'url' => '/blog/' . $article->id,
                'submit_text' => 'Edit',
            ],
        ]);
    }

    public function update(ArticleRequest $request, Article $article)
    {
        $article->update(array_merge($request->validated(), [
            'slug' => Str::slug($request->title),
            'teaser' => Str::limit($request->body, 160),
            'meta_title' => $request->title,
            'meta_description' => Str::limit($request->body, 160),
        ]));

        return redirect()->route('blog');
    }

    public function destroy(Article $article)
    {
        $article->delete();
        return redirect()->route('dashboard', ['activeTable' => 'Articles'])->with('success', 'Article deleted successfully.');
    }
}
