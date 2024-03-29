@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-sm-6 col-sm-offset-3">
            <div class="panel panel-default" style="margin: 0; border-radius: 0;">
            <div class="panel-heading">
                <h3 class="panel-title">
                <h3 class="panel-title">
                    {{ $post->title }},
                    @if ($post->friends()->count() > 0)
                        <small>
                            with
                            @foreach ($post->friends as $tag)
                                {{ $tag->user2->name }},
                            @endforeach
                        </small>
                    @endif
                    
                    <div class="pull-right">
                        <a href="{{ url('/posts') }}">Return back</a>
                    </div>
                </h3>
              </div>
              <div class="panel-body">
                {{ $post->body }}
                @if($post->postMedia)
                    @if($post->postMedia->type=="image")
                    <img src="/uploads/posts/images/{{$post->postMedia->path}}" style='width:100%;height:600px;'>
                    @endif
                    @if($post->postMedia->type=="video")
                    <video style='width:100%;height:600px;' controls>
                        <source src="/uploads/posts/video/{{$post->postMedia->path}}">
                    </video>
                    <!-- <video src="/uploads/posts/video/{{$post->postMedia->path}}" controls style='width:250px;height:250px;'> -->
                    @endif
                @endif
                <br />
                <a href="{{ route('category.showAll', [$post->category->name]) }}" class="badge">{{ $post->category->name }}</a>
              </div>
              <div class="panel-footer" data-postid="{{ $post->id }}">
              @if (Auth::check())
                      @php
                          $i = Auth::user()->likes()->count();
                          $c = 1;
                      @endphp
                      @foreach (Auth::user()->likes as $like)
                          @if ($like->post_id == $post->id)
                              @if ($like->like)
                                  <a href="#" class="btn btn-link like active-like">Like</a>
                                  <a href="#" class="btn btn-link like">Dislike</a>
                              @else
                                  <a href="#" class="btn btn-link like">Like</a>
                                  <a href="#" class="btn btn-link like active-like">Dislike</a>
                              @endif
                              @break
                          @elseif ($i == $c)
                              <a href="#" class="btn btn-link like">Like</a>
                              <a href="#" class="btn btn-link like">Dislike</a>
                          @endif
                          @php
                              $c++;
                          @endphp
                      @endforeach
                  @else
                      <a href="{{ url('login') }}" class="btn btn-link">Like</a>
                      <a href="{{ url('login') }}" class="btn btn-link">Dislike</a>
                  @endif
                  <a href="#" class="btn btn-link">Comment</a>
              </div>
            </div>
            @foreach ($post->comments as $comment)
                <div class="panel panel-default" style="margin: 0; border-radius: 0;">
                  <div class="panel-body">
                      <div class="col-sm-9">
                          {{ $comment->comment }}
                      </div>
                      <div class="col-sm-3 text-right">
                          <small>Commented by {{ $comment->user->name }}</small>
                      </div>
                  </div>
                </div>
            @endforeach
            @if (Auth::check())
                <div class="panel panel-default" style="margin: 0; border-radius: 0;">
                  <div class="panel-body">
                      <form action="{{ url('/comment') }}" method="POST" style="display: flex;">
                          {{ csrf_field() }}
                          <input type="hidden" name="post_id" value="{{ $post->id }}">
                          <input type="text" name="comment" placeholder="Enter your Comment" class="form-control" style="border-radius: 0;">
                          <input type="submit" value="Comment" class="btn btn-primary" style="border-radius: 0;">
                      </form>
                      @if (count($errors) > 0)
                          <div class="alert alert-danger">
                              <a href="#" class="close" data-dismiss="alert">&times;</a>
                              <ul>
                                  @foreach ($errors->all() as $error)
                                      {{ $error }}
                                  @endforeach
                              </ul>
                          </div>
                      @endif
                      @if (Session::has('success'))
                          <div class="alert alert-success">
                              <a href="#" class="close" data-dismiss="alert">&times;</a>
                              {{ Session::get('success') }}
                          </div>
                      @endif
                  </div>
                </div>
            @endif
        </div>
    </div>
@endsection
