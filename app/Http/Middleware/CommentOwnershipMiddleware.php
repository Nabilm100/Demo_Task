<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Comment;

class CommentOwnershipMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $commentId = $request->route('comment'); // Assuming the route parameter is 'comment'

        // Log the comment ID
        Log::info('Comment ID from route parameter: ' . $commentId);

        // Fetch the comment from database
        $comment = Comment::findOrFail($commentId);

        // Check if the authenticated user is the owner of the comment
        if ($request->user()->id !== $comment->user_id) {
            abort(403, 'Unauthorized action.');
        }

        return $next($request);
    }
}
