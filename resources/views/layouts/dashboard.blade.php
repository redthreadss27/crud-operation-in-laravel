@extends('layouts.app')

@section('content')

<div class="row">
<div class="container my-5 d-flex justify-content-center align-items-center">
  <div class="card col-sm-9 shadow mx-3 bg-white rounded" style="width: 18rem;">
    <div class="card-body">
      <h5 class="card-title">Private</h5>
      <p class="card-text">{{ $private }}
        </p>
        
      </div>
    </div>
    <div class="card col-sm-9 shadow mx-3 bg-white rounded" style="width: 18rem;">
      <div class="card-body">
        <h5 class="card-title">Public</h5>
        <p class="card-text">{{ $public }}
          </p>
          
        </div>
      </div>
    </div>
</div>
<div class=" d-flex justify-content-center align-items-center">

  <a class="btn btn-outline-primary ms-4 mt-4" href="{{ route('index') }}" type="submit"
  value="details">Show Details</a>
</div>

@endsection