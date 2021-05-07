<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class DiscussionBestCommentController extends Controller
{
    public function store (Request $request, Comment $comment) {
        $discussion = $this->authorizeUserAndDiscussion($comment);
        
        $discussion->best_comment_id = $comment->id;

        $discussion->save();

        return back();
    }

    public function unmark (Request $request, Comment $comment) {
        $discussion = $this->authorizeUserAndDiscussion($comment);
        
        $discussion->best_comment_id = null;

        $discussion->save();

        return back();
    }

    public function authorizeUserAndDiscussion (Comment $comment) {
        $discussion = $comment->discussion;

        $this->authorize('markAsBestComment', $discussion);
        
        return $discussion;
    }
}
