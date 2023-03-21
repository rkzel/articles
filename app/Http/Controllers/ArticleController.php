<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Comments;
use App\Models\Tags;
use App\Models\Views;
use App\Models\Likes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ArticleController extends Controller {
    public function index(Request $request) {
        $articles = Article::paginate(10);

        foreach ($articles as $article) {
            $tags = Tags::where('article_id', $article->id)->get();
            $views = Views::where('article_id', $article->id)->get();
            $likes = Likes::where('article_id', $article->id)->get();
            $article["tags"] = $tags;
        }

        return view('articles.articles', compact('articles'));
    }

    public function show($id) {
        $article = Article::findOrFail($id);

        // TODO: duplicate code detected!

        $comments = Comments::where('article_id', $article->id)->orderBy('created_at', 'desc')->get();
        $tags = Tags::where('article_id', $article->id)->get();
        $views = Views::where('article_id', $article->id)->first();
        $likes = Likes::where('article_id', $article->id)->first();

        return view('articles.show', [
            'article' => $article,
            'comments' => $comments,
            'tags' => $tags,
            'views' => $views->counter,
            'likes' => $likes->counter,
        ]);
    }

    public function views($id) {
        $article = Article::findOrFail($id);

        $counter = Views::where('article_id', $article->id)->get();

        return $counter;
    }

}
