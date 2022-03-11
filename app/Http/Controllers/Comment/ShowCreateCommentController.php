<?php

namespace App\Http\Controllers\Comment;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Community;
use Illuminate\Http\Request;

class ShowCreateCommentController extends Controller
{
    public function __invoke(Request $request, Community $community, Comment $comment)
    {
        return view('comment.show', [
            'community' => $community,
            'comment' => $comment
        ]);
    }
}
