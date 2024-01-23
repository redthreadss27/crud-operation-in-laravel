@extends('layouts.app')

@section('content')


  <a class="btn btn-outline-primary ms-4 mt-4" href="{{ route('add') }}" type="submit" value="Add Task">Add Task</a>

  <div class="container my-3">
    <h1 class="fs-3 d-flex justify-content-center align-items-center">Private tasks:</h1>
    @if(auth()->check())
      @include('layouts.modal')
      <div class="table-responsive">
        <table id="tasks-table" class="tasks-table">
          <thead>
            <tr>
              <th>Title</th>
              <th>Description</th>
              <th>Comments</th>
              <th>Progress</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach($private_tasks as $key => $task)
              <tr>
                <td>{{ $task->title }}</td>
                <td>{{ $task->description }}</td>
                <td>{{ $task->comments->count() }}</td>
                <td>{{ $task->progress }}</td>
                <td>
                  <a class="btn btn-outline-primary ms-2" href="{{ url('task/edit?task_id='. $task->id) }}" type="submit"
                    value="Edit">Edit</a>
                  <button type="button" class="btn btn-outline-danger m-auto ms-2" onclick="showDeleteModal('task', '{{ $task->id }}')">
                    Delete
                  </button>
                  <a class="btn btn-outline-primary ms-2" href="{{ url('task/detail?task_id='. $task->id) }}" type="submit"
                    value="View Details">View Details</a>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    @endif
  </div>
  @include('layouts.modal')
  <div class="container my-3">
    <h1 class="fs-3 d-flex justify-content-center align-items-center">Public tasks:</h1>
    <div class="table-responsive">
      <table id="tasks-table" class="tasks-table">
        <thead>
          <tr>
            <th>Title</th>
            <th>Description</th>
            <th>Added by</th>
            <th>Comments</th>
            <th>Progress</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach($public_tasks as $key=>$task)
            <tr>
              <td>{{ $task->title }}</td>
              <td>{{ $task->description }}</td>
              <td>{{ $task->user->name }}</td>
              <td>{{ $task->comments->count() }}</td>
              <td>{{ $task->progress }}</td>
              <td>
                @if($task->user_id === Auth::id())
                  <a class="btn btn-outline-primary ms-2" href="{{ url('task/edit?task_id='. $task->id) }}" type="submit"
                    value="Edit">Edit</a>
                    <button type="button" class="btn btn-outline-danger m-auto ms-2" onclick="showDeleteModal('task', '{{ $task->id }}')">
                    Delete
                  </button>
                @endif
                <a class="btn btn-outline-primary ms-2" href="{{ url('task/detail?task_id='. $task->id) }}" type="submit"
                  value="View Details">View Details</a>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
  
  <script>
    $(document).ready(function () {
      $('.tasks-table').DataTable();
    });
  </script>

@endsection