<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Log;

use App\Models\Blog;

class BlogOwnershipMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $blogId = $request->route('blog'); // Assuming the route parameter is 'blog'
       // Log::info('Blog ID from route parameter: ' . $blogId);
        //echo($blogId);

        // Fetch the blog post from database
        $blog = Blog::find($blogId);
       // dd($blog);

        // Check if the authenticated user is the owner of the blog post
      /*  if ($request->user()->id !== $blog->user_id) {
            return redirect()->to('/blogs');
        }*/


        if(auth()->id() === $blog->user_id) {
            return $next($request);

        }
        
        return redirect()->to('/');
       // return $next($request);
    }
}
