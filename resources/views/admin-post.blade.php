@extends('layouts.admin')

@section('content')
    <div class="row" style="margin-top: 20px;">
        <div class="col s1 m1 l1">
            <a href="{{ url('/admin') }}" class="btn-floating btn-large waves-effect waves-light red left"><i class="material-icons">arrow_back</i></a>
        </div>
        <div class="col s10 m10 l10">
            <h4>Add Post</h4>
        </div>
    </div>

    <div class="row">
        <strong>{{ $message }}</strong>
        <form action="{{ url('/admin-post') }}" method="post" class="col s12">
            {!! csrf_field() !!}
          <div class="row">
            <div class="input-field col s6">
              <input name="title" id="title" type="text" class="validate">
              <label for="title">Title</label>
            </div>
          </div>  
          <div class="row">
            <div class="input-field col s12">
              <textarea name="abstract" id="abstract" class="materialize-textarea"></textarea>
              <label for="abstract">Abstract</label>
            </div>
          </div>
          <div class="row">
            <div class="input-field col s12">
              <textarea name="content" id="content" class="materialize-textarea"></textarea>
              <label for="content">Content</label>
            </div>
          </div>
          <button type="submit" class="waves-effect waves-light btn">Add</button>
        </form>
    </div>
@endsection
