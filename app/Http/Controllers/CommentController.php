<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Blog;

class CommentController extends Controller
{
    //
    public function store(Request $request, Blog $blog)
{
    $validatedData = $request->validate([
        'content' => 'required|string',
    ]);

    $comment = new Comment();
    $comment->content = $validatedData['content'];
    $comment->blog_id = $blog->id;
    $comment->user_id = auth()->id(); 

    $comment->save();

    return back(); // redirect back to the blog post after commenting
}

public function edit(Comment $comment)
{
    // Authorize and load the view for editing the comment
    return view('comments.edit', compact('comment'));
}

public function update(Request $request, Comment $comment)
{
    $validatedData = $request->validate([
        'content' => 'required|string',
    ]);

    $comment->content = $validatedData['content'];
    $comment->save();

    return redirect()->route('blogs.show', $comment->blog_id)->with('success', 'Comment updated successfully.');
}

public function destroy(Comment $comment)
{
    // Delete the comment
    $comment->delete();

    return redirect()->route('blogs.show', $comment->blog_id)->with('success', 'Comment deleted successfully.');
}

}
