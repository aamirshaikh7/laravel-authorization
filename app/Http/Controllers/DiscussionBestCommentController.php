<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class DiscussionBestCommentController extends Controller
{
    public function store (Request $request, Comment $comment) {
        $this->authorize('mark-as-best-comment', $comment->discussion);
        
        $comment->discussion->best_comment_id = $comment->id;

        $comment->discussion->save();

        return back();
    }
}
