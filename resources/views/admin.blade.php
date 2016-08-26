@extends('layouts.admin')

@section('content')
    <div class="row" style="margin-top: 20px;">
        <div class="col s3 m4 l3">
            <h4>The Posts</h4>
        </div>
        <div class="col s9 m8 l9">
            <a href="{{ url('/admin-post') }}" class="btn-floating btn-large waves-effect waves-light red right"><i class="material-icons">add</i></a>
        </div>
    </div>
    <div class="row">
     <select class="browser-default js-data-example-ajax">
        <option selected="selected">Find Post...</option>
     </select>   
    <strong>{{{ $message or '' }}}</strong>
    @foreach($data as $dat)  
      <div class="col s12 m6 l12">
        <div class="card blue-grey darken-1">
          <div class="card-content white-text">
            <span class="card-title">{{ $dat->title }}</span>
            <p>{{ $dat->abstract }}</p>
            <div id="comments-{{$dat->id}}" style="display:none;">
            @foreach($dat->comments as $comment)
                <div class="row">  
                    <div class="col s12 m6 l12">
                      <div class="card-panel white">
                        <span class="black-text">{{ $comment->comment }}</span>
                      </div>
                    </div>
                </div>    
            @endforeach
            </div>    
          </div>
          <div class="card-action">
            <a href="{{ url('/admin-post/' . $dat->id) }}">Edit</a>
            <a onclick="delPost({{ $dat->id }});" style="cursor:pointer;">Delete</a>
            <a onclick="showComments({{ $dat->id }});" style="cursor:pointer;">See Comments</a>
            <form id="frmDel-{{$dat->id}}" method="post" action="{{ url('/admin') }}">
                {!! csrf_field() !!}
                {{ method_field('DELETE') }}
                <input type="hidden" name="postId" value="{{ $dat->id }}">
            </form>
          </div>
        </div>
      </div>
    @endforeach
    </div>
    <script>
        
        function delPost(id) {
            var conf = confirm("Are you sure to delete this post?");
            if (conf) {
                $('#frmDel-' + id).submit();
            }
        }
        
        function showComments(id) {
            $('#comments-' + id).slideToggle();
        }
    </script>
@endsection
