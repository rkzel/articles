<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Comments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CommentsController extends Controller {
    public function store(Request $request, $article_id)
    {
        Log::info($request);

        // Validate the request data
        $validatedData = $request->validate([
            'subject' => 'required|max:255',
            'body' => 'required',
        ]);

        // Create a new comment instance
        $comment = new Comments;

        // Set the comment attributes
        $comment->subject = $validatedData['subject'];
        $comment->body = $validatedData['body'];

        $comment->article_id = $article_id;

        // Save the comment to the database
        $comment->save();

        // Redirect back to the article page with a success message
        return redirect()->route('articles.show', $article_id)->with('success', 'Comment added successfully!');
    }
}
