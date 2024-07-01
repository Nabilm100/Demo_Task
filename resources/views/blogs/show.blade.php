@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col-md-6 mb-4">
        <a href="{{ route('blogs.show', $blog->id) }}" class="card-link-wrapper">
            <div class="card custom-card">
                @if($blog->image)
                    <img src="{{ asset('images/'. $blog->image) }}" class="card-img-top" alt="{{ $blog->title }}">
                @endif
                <div class="card-body">
                    <h5 class="card-title">{{ $blog->title }}</h5>
                    <p class="card-text">{{ $blog->description }}</p>
                </div>
            </div>
        </a>
    </div>

    <div class="comments-section">
    <h3 class="comment">Comments:</h3>
    @foreach($blog->comments as $comment)
        <div class="card comment-card">
            <div class="card-body">
                <p class="comment-content">{{ $comment->content }}</p>
                <p class="comment-info">Commented by: {{ $comment->user->name }}</p>
                
                <!-- Display edit and delete buttons if the comment belongs to the authenticated user -->
                @if($comment->user_id === auth()->id())
                    <div>
                        <a href="{{ route('comments.edit', $comment->id) }}" class="btn btn-info btn-sm btn-success">Edit</a>
                        <form action="{{ route('comments.destroy', $comment->id) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm btn-success" onclick="return confirm('Are you sure you want to delete this comment?')">Delete</button>
                        </form>
                    </div>
                @endif
            </div>
        </div>
    @endforeach

    <!-- Comment Form -->
    <div class="card comment-card mt-4">
        <div class="card-body">
            <form action="{{ route('comments.store', $blog->id) }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="content" class="blog-form-label">Add a comment:</label>
                    <textarea class="form-control form-control blog-form-input" id="content" name="content" rows="3" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary btn-success btn-comm">Submit</button>
            </form>
        </div>
    </div>
</div>
</div>
@endsection
