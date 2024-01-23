@extends('layouts\app')

@section('content')

    <div class="container">
        <a class="btn btn-outline-primary ms-4 mt-3" href="{{ route('index') }}" type="submit" value="Back">Back</a>
        <div class="row justify-content-center mt-2 align-text-center">
            <div class="col-md-6">
                <div class="card">
                    @if(isset($task))
                        <div class="card-header">Edit Task</div>
                    @else
                        <div class="card-header">Add Task</div>
                    @endif
                    <div class="card-body">
                        <form method="post" action="{{ route('task_add') }}">
                            @csrf
                            @if(isset($task) )
                                <input type="hidden" name="task_id" value="{{ $task->id }}">
                                <div class="mb-3 row">
                                    <label for="title" class="col-md-4 col-form-label text-md-end text-start">Title:</label>
                                    <div class="col-md-6">
                                        <input type="text"
                                            class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm @error('title') is-invalid @enderror"
                                            id="title" name="title" value="{{ $task->title}}">
                                        @if ($errors->has('title'))
                                            <span class="text-danger">{{ $errors->first('title') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="description"
                                        class="col-md-4 col-form-label text-md-end text-start">Description:</label>
                                    <div class="col-md-6">
                                        <textarea
                                            class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm @error('description') is-invalid @enderror"
                                            id="description" name="description" rows="4">{{ $task->description}}</textarea>
                                        @if ($errors->has('description'))
                                            <span class="text-danger">{{ $errors->first('description') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="status" class="col-md-4 col-form-label text-md-end text-start">Progress
                                        Status:</label>
                                    <div class="col-md-6">
                                        <select name="progress" id="progress"
                                            class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm @error('progress') is-invalid @enderror">
                                            <option value="pending" {{ $task->progress === 'pending' ?
                                                'selected' : '' }}>Pending</option>
                                            <option value="inprogress" {{ $task->progress === 'inprogress'
                                                ? 'selected' : '' }}>Inprogress</option>
                                            <option value="completed" {{ $task->progress === 'completed' ?
                                                'selected' : '' }}>Completed</option>
                                        </select>
                                        @if ($errors->has('progress'))
                                            <span class="text-danger">{{ $errors->first('progress') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="status" class="col-md-4 col-form-label text-md-end text-start">Status:</label>
                                    <div class="col-md-6">
                                        <select name="status" id="status"
                                            class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm @error('status') is-invalid @enderror">
                                            <option value="Private" {{ $task->status === 'Private' ?
                                                'selected' : '' }}>Private</option>
                                            <option value="Public" {{$task->status === 'Public' ?
                                                'selected' : '' }}>Public</option>
                                        </select>
                                        @if ($errors->has('status'))
                                            <span class="text-danger">{{ $errors->first('status') }}</span>
                                        @endif
                                    </div>
                                </div>
                            @endif
                            <div class="mb-3 row">
                                <input type="submit" class="col-md-3 offset-md-5 btn btn-outline-primary" value="Save">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection