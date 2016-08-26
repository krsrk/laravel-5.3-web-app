@extends('layouts.layout')

@section('content')
    <h3>{{$data->title}}</h3>
    <div class="row">  
      <div class="col s12 m6 l12">
        <div class="card blue-grey darken-1">
          <div class="card-content white-text">
            <p>{{ $data->content }}</p>
          </div>
          <div class="card-action">
            <a href="{{ url('/') }}">Back</a>
          </div>
        </div>
      </div>
    </div>
@endsection