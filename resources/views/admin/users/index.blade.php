@extends('admin.layout')

@section('content')
    <div class="container">
        <h1 class="heading">Pending Users</h1>

        @if ($users->isEmpty())
            <p class="empty-message">No pending users.</p>
        @else
            <div class="user-table">
                <div class="user-header">
                    <div class="user-column">
                        <span>Name</span>
                    </div>
                    <div class="user-column">
                        <span>Email</span>
                    </div>
                    <div class="user-column">
                        <span>Actions</span>
                    </div>
                </div>
                <div class="user-body">
                    @foreach ($users as $user)
                        <div class="user-row">
                            <div class="user-column">
                                <span>{{ $user->name }}</span>
                            </div>
                            <div class="user-column">
                                <span>{{ $user->email }}</span>
                            </div>
                            <div class="user-column">
                                <form action="{{ route('admin.users.approve', $user) }}" method="post" class="action-form">
                                    @csrf
                                    <button type="submit" class="action-button approve-button">Approve</button>
                                </form>
                                <form action="{{ route('admin.users.reject', $user) }}" method="post" class="action-form">
                                    @csrf
                                    <button type="submit" class="action-button reject-button">Reject</button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
    </div>
@endsection
