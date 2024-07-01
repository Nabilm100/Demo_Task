@extends('layouts.app')

@section('content')
<div class="container">
    <div class="text-center bg-primary p-3 mb-4">
        <h1 class="text-white">All Blogs</h1>
    </div>

    <div class="row">
        <a href="{{ route('blogs.create') }}" class="btn btn-success mb-4">Create a Post</a>

        @foreach($blogs as $blog)
            <div class="col-md-6 mb-4">
            <a href="{{ route('blogs.show', $blog->id) }}" class="card-link-wrapper">
                <div class="card custom-card">
                    @if($blog->image)
                        <img src="{{ asset('images/'. $blog->image) }}" class="card-img-top" alt="{{ $blog->title }}">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $blog->title }}</h5>
                        <p class="card-text">{{ $blog->description }}</p>

                        <!-- Buttons for Edit and Delete -->
                        <div class="d-flex justify-content-between align-items-center mt-3">
                            
                            <div>
                            @if(Auth::id() === $blog->user_id)
                                <a href="{{ route('blogs.edit', $blog->id) }}" class="btn btn-info btn-success">Edit</a>
                                <form action="{{ route('blogs.destroy', $blog->id) }}" method="POST" style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-success" onclick="return confirm('Are you sure you want to delete this blog post?')">Delete</button>
                                </form>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </a>
        @endforeach
    </div>
</div>
@endsection
