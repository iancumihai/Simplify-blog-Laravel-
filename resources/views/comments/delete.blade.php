@extends('main')

@section('title', 'Delete comment')

@section('content')
	
	<div class="row">
		<div class="col-md-8 col-md-offset-2" id="content">
			<h1>Delete this comment?</h1>
			<p>
				<strong>Comment:</strong> {{ $comment->comment }}
			</p>

			{{ Form::open(['route' => ['comments.destroy', $comment->id], 'method' => 'DELETE']) }}
			<div class="col-md-4"> 
				{{ Form::submit('Yes', ['class' => 'btn btn-lg btn-block btn-danger space']) }}
			</div>
			<div class="col-md-4">
			{{ Html::linkRoute('posts.index','Cancel',[],['class'=>'btn btn-lg btn-block btn-default space'])}}
			</div>
			{{ Form::close() }}
		</div>
	</div>

@endsection