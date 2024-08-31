<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Like;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function likeArticle($id)
    {
        $article = Article::findOrFail($id);

        if (!$article->likes()->where('user_id', Auth::id())->exists()) {
            $like = new Like(['user_id' => Auth::id()]);
            $article->likes()->save($like);
        }

        return redirect()->back();
    }

    public function unlikeArticle($id)
    {
        $article = Article::findOrFail($id);
        $article->likes()->where('user_id', Auth::id())->delete();

        return redirect()->back();
    }
}
