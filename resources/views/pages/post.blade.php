@extends('main')
<?php $titleTag = htmlspecialchars($post->title);?>
@section('title',"$titleTag")
@section('content')
	
	<div class="row space">
 		<div class="col-md-10 col-md-offset-1">
 			<img class="post-thumb img" src="{{asset('images/'.$post->image)}}">
 			<h1>{{ $post->title }}</h1>
 			<p>{!!$post->body!!}</p>
 		</div>
	</div>
	
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<h3 class="comment-title"><span class="glyphicon glyphicon-comment"></span> {{ $post->comments()->count()}} Comments</h3>
			@foreach($post->comments as $comment)
				<div class="comment">
					<div class="author-info">
						<img src="{{ "https://www.gravatar.com/avatar/" . strtolower(trim($comment->user->email))}}"class="author-image">
						<div class="author-name">
							<h4>{{ $comment->user->name }}</h4>
							<p class="author-time">{{ date('F nS,Y - g:i A',strtotime($comment->created_at))}}</p>
						</div> 	
					</div>
					<div class="comment-content"> 
						{{ $comment->comment }}
					</div>
				</div>
			@endforeach	
		</div>
	</div>
	@if(Auth::check())
		<div class="row">
			<div class="col-md-10 col-md-offset-1" id='comment-form'>
			{{ Form::open(['route' => ['comments.store', $post->id],'method'=>'POST']) }}
				<div class="row">
					<div class="col-md-12">
						{{Form::label('comment','Comment:')}}	
						{{Form::textarea('comment',null,['class'=>'form-control'])}}
						{{Form::submit('Add Comment',['class'=>'btn btn-success btn-block space'])}}
					</div>
				</div>
			{{ Form::close() }}
			</div>
		</div>
	@else
		<div class="col-md-10 col-md-offset-1">
			<p class="space"><strong><a href="{{route('login')}}">Login</a> to leave a comment</strong></p>
		</div>
	@endif
	
	
@endsection