@extends('main')
@section('title','Laravel Blog')
@section('content')

<div class="row space">
  <div class="col-md-8">
    @foreach($posts as $post)
      <div class="col-md-12 space">
          <div class=" col-xs-6 col-lg-4  imagini">
            <img class="post-thumb" src="{{asset('images/'.$post->image)}}">
          </div>
          
          <div class="col-xs-6 col-lg-8 titluri">
            <h2><a href="{{ url('post/'.$post->url) }}">{{$post->title}}</a></h2>
              <div class="post-info">
                <span class="author-info">
                  <i class="glyphicon glyphicon-user"></i> 
                  <span itemprop="name">{{$post->user->name}}</span>                     
                </span>

                <span class="post-timestamp">
                  <i class="glyphicon glyphicon-calendar"></i>
                  <span itemprop="datePublished">{{ date('M j,Y ',strtotime($post->created_at)) }}</span>
                </span>
            
                <span class="comment-info">
                  <i class="glyphicon glyphicon-comment"></i>
                  <span>{{$post->comments()->count()}}</span>
                  </span>
              </div>
              <br>
              <span class="post-info">{{ substr(strip_tags($post->body),0,150)}}{{strlen(strip_tags($post->body))>150 ? '...' : '' }}</p><a href="{{ url('post/'.$post->url) }}" class="btn btn-primary" id="nav-color">Read More</a></span>
          </div>
      </div>
    @endforeach
    <div>
      {!! $posts->links(); !!}
    </div>
  </div>
  
  <div class="col-md-4">
    @include('include.side')
  </div>
</div>

@endsection


