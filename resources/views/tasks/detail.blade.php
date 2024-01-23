@extends('layouts.app')

@section('content')

    <a class="btn btn-outline-primary ms-4 mt-4" href="{{ route('index') }}" type="submit" value="Back">Back</a>
    <div class="container mt-2 d-flex justify-content-center align-items-center">
        <div class="card shadow p-3 mb-5 bg-white rounded" style="min-width: 50vw;">
            <div class="d-block">
                <p class="fw-bold mb-2">{{ $task->title }}</p>
            </div>
            <p class="mb-5">{{ $task->description }}</p>
            <hr class="border border-danger border-2 opacity-50">
            <form action="{{ route('comment') }}" method="post">
                @csrf
                <div class="row d-flex justify-content-center">
                    <input type="hidden" value="{{ $task->id }}" name="task_id">
                    <input type="text"
                        class=" border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm @error('title') is-invalid @enderror mt-3 col-sm-7"
                        id="comment" name="comment" placeholder="Comment..." required>
                    <button type="submit" class="btn btn-outline-primary ms-2 mt-3 col-sm-3">Submit</button>
                </div>
            </form>

            @if($comments->count() > 0)
                <p class="fw-bold">Comments</p>
                @foreach($comments as $comment)
                    <div class="row d-flex justify-content-center">
                        <div class="col-sm-9 mb-5 mb-sm-0">
                            <div class="card mb-2">
                                <div class="card-body">
                                    <div
                                        class="float-{{$comment->user_id == Auth::id() ? 'end' : 'start' }} text-{{$comment->user_id == Auth::id() ? 'end' : 'start' }}">
                                        <h5><strong>{{ $comment->user->name }}</strong></h5>
                                        <p class="text-body-secondary">{{ $comment->created_at->format('d-m-Y') }}</p>
                                        <p class="card-text">{{ $comment->comment }}</p>
                                        <button type="button" class="btn btn-outline-danger m-auto ms-2"
                                            onclick="showDeleteModal('comment', '{{ $comment->id }}')">
                                            Delete
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                @include('layouts.modal')
            @else
                <p>Be the first to comment.</p>
            @endif
        </div>
    </div>


@endsection