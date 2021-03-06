@extends('main')
@section('title','View Post')
@section('content')

	<div class="row">
		<div class="col-md-8">
			<img src="{{asset('images/'.$post->image)}}" width="600" height="400">
			<h2>{{ $post->title }}</h2>
			<p class="Lead">{!! $post->body !!}</p>
			<hr>
			<div class="tags">
			@foreach($post->tags as $tag)
				<span class="label label-default">{{$tag->name}}</span>
			@endforeach
			</div>
			<div id="backend-comments" style="margin-top:50px">
				<h3>Comments<small> {{$post->comments()->count()}} total</small></h3>
				<table class="table">
					<thead>
						<tr>
							<th>Name</th>
							<th>Email</th>
							<th>Comment</th>
							<th width="70 px"></th>
						</tr>
					</thead>
					<tbody>
						@foreach($post->comments as $comment)
						<tr>
							<td>{{$comment->user->name}}</td>
							<td>{{$comment->user->email}}</td>
							<td>{{$comment->comment}}</td>
							<td><a href="{{route('comments.edit',$comment->id)}}" class="btn btn-xs btn-primary"><span class="glyphicon glyphicon-pencil"></span></a></td>
							<td><a href="{{route('comments.delete',$comment->id)}}" class="btn btn-xs btn-danger"><span class="glyphicon glyphicon-trash"></span></a></td>		
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
		
		<div class="col-md-4">
			<div class="well">
				<dl class="dl-horizontal">
					<label>Url:</label>
					<p><a href="{{ url('post/'.$post->url) }}">{{url($post->url)}}</a></p>
				</dl>

				<dl class="dl-horizontal">
					<label>Category:</label>
					<p>{{$post->category->name}}</a></p>
				</dl>

				<dl class="dl-horizontal">
					<label>Create At:</label>
					<p>{{ date('M j,Y H:i a',strtotime($post->created_at)) }}</p>
				</dl>

				<dl class="dl-horizontal">
					<label>Last update:</label>
					<p>{{ date('M j,Y h:i a',strtotime($post->updated_at)) }}</p>
				</dl>

				<hr>
				<div class="row">
					<div class="col-sm-6">
						{!! Html::linkRoute('posts.edit','Edit',array($post->id),array('class'=>'btn btn-primary btn-block'))!!}	
					</div>

					<div class="col-sm-6">
						{!! Form::open(['route' => ['posts.destroy', $post->id],'method'=>'DELETE']) !!}
						{!! Form::submit('Delete',['class'=>'btn btn-danger btn-block']) !!}	
						{!! Form::close() !!}
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						{{ Html::linkRoute('posts.index','<< See All Posts',[],['class'=>'btn btn-default btn-block space'])}}
					</div>
				</div>
			</div>
		</div>
	</div>


@endsection