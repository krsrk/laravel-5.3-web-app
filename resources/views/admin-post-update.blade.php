@extends('layouts.admin')

@section('content')
    <div class="row" style="margin-top: 20px;">
        <div class="col s1 m1 l1">
            <a href="{{ url('/admin') }}" class="btn-floating btn-large waves-effect waves-light red left"><i class="material-icons">arrow_back</i></a>
        </div>
        <div class="col s10 m10 l10">
            <h4>Edit Post</h4>
        </div>
    </div>

    <div class="row">
        <strong>{{ $message }}</strong>
        <form action="{{ url('/admin-post') }}" method="post" class="col s12">
            {!! csrf_field() !!}
            {{ method_field('PUT') }}
            <input type="hidden" name="postId" value="{{ $data->id }}"> 
          <div class="row">
            <div class="input-field col s6">
              <input name="title" id="title" type="text" class="validate" value="{{ $data->title }}">
              <label for="title">Title</label>
            </div>
          </div>  
          <div class="row">
            <div class="input-field col s12">
              <textarea name="abstract" id="abstract" class="materialize-textarea"> {{ $data->abstract }} </textarea>
              <label for="abstract">Abstract</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s12">
              <textarea name="content" id="content" class="materialize-textarea"> {{ $data->content }} </textarea>
              <label for="content">Content</label>
            </div>
          </div>
          <button type="submit" class="waves-effect waves-light btn">Edit</button>
        </form>
    </div>
@endsection
