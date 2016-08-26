@extends('layouts.layout')

@section('content')
    <h4>Last Posts</h4>
    <div class="row">  
    @foreach($data as $dat)  
      <div class="col s12 m6 l12">
        <div class="card blue-grey darken-1">
          <div class="card-content white-text">
            <span class="card-title">{{ $dat->title }}</span>
            <p>{{ $dat->abstract }}</p>
          </div>
          <div class="card-action">
            <a href="{{ url('/post/' . $dat->id) }}">See more</a>
          </div>
        </div>
      </div>
    @endforeach
    </div>
@endsection
