


@extends('layouts.app')

@section('content')
    <div class="container blog-form-container">
        <h1 class="blog-form-title">Create New Blog Post</h1>

        <form action="{{ route('blogs.store') }}" method="POST" enctype="multipart/form-data" class="blog-form">
            @csrf
            <div class="form-group">
                <label for="title" class="blog-form-label">Title</label>
                <input type="text" class="form-control blog-form-input" id="title" name="title" required>
            </div>
            <div class="form-group">
                <label for="description" class="blog-form-label">Description</label>
                <textarea class="form-control blog-form-textarea" id="description" name="description" rows="4" required></textarea>
            </div>
            <div class="form-group">
                <label for="image" class="blog-form-label">Image</label>
                <input type="file" class="form-control-file blog-form-file" id="image" name="image" accept="image/*" required>
            </div>
            <button type="submit" class="btn btn-primary blog-form-button">Create Blog Post</button>
        </form>
    </div>
@endsection
