@extends('layouts.app')

@section('content')
<div class="container blog-form-container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header blog-form-title">Edit Comment</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('comments.update', $comment->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="content" class="blog-form-label">Comment</label>
                            <textarea id="content" name="content" class=" blog-form-textarea form-control @error('content') is-invalid @enderror" rows="4" required>{{ old('content', $comment->content) }}</textarea>

                            @error('content')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary btn-success btn-comm">Update Comment</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
