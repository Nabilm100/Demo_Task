<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Blog;
use Log;
use Str;
class BlogController extends Controller
{
    //
    public function store(Request $request)
{
    $validatedData = $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // adjust max size as needed
    ]);

    $blog = new Blog();
    $blog->title = $validatedData['title'];
    $blog->description = $validatedData['description'];
    
    if ($request->hasFile('image')) {
        
        
        $path = public_path('images');
        $imageName = Str::random(40) . "." . $request->image->getClientOriginalExtension();
        $request->image->move($path, $imageName);
        $blog->image = $imageName;

       

        
    }

    $blog->user_id = auth()->id(); // or however you determine the user

    $blog->save();

    return redirect()->route('blogs.index');
}

public function create()
{
    return view('blogs.create');
}

public function index()
{
    $blogs = Blog::latest()->get();
    return view('blogs.index', compact('blogs'));
}

public function show(Blog $blog)
{
    $blog->load('comments.user');
    return view('blogs.show', compact('blog'));
}


public function edit(Blog $blog)
{
    // Authorize and load the view for editing the blog
    if(request()->user()->id != $blog->user_id){
        abort(403, 'Unauthorized action.');
    }
    
    return view('blogs.edit', compact('blog'));
}

public function update(Request $request, Blog $blog)
{

    if(request()->user()->id != $blog->user_id){
        abort(403, 'Unauthorized action.');
    }
    $validatedData = $request->validate([
        'title' => 'nullable|string|max:255',
        'description' => 'nullable|string',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    // Update only the fields that are present in the validated data
        $blog->title = $validatedData['title'];
        $blog->description = $validatedData['description'];
    if ($request->hasFile('image')) {
        // Handle image upload
        
        $path = public_path('images');
        $imageName = Str::random(40) . "." . $request->image->getClientOriginalExtension();
        $request->image->move($path, $imageName);
        $blog->image = $imageName;
    }

    $blog->save();

    return redirect()->route('blogs.show', $blog->id)->with('success', 'Blog updated successfully.');
}


public function destroy(Blog $blog)
{
    if(request()->user()->id != $blog->user_id){
        abort(403, 'Unauthorized action.');
    }
    // Delete the blog
    $blog->delete();

    return redirect()->route('blogs.index')->with('success', 'Blog deleted successfully.');

}

}
