@extends('main')
@section('title','Category Show')
@section('content')

	<div class="row space" id="content">
		<div class="col-md-8">
			<h1>{{ $category->name }} Category <small>{{$category->posts()->count()}} Posts</small></h1>
		</div>
		<div class="col-md-2">
			<a href="{{route('tags.edit',$category->id)}}" class="btn btn-primary pull-right btn-block" style="margin-top:20px;">Edit</a>
		</div>
		<div class="col-md-2">
			{{ Form::open(['route'=>['tags.destroy', $category->id],'method'=>'DELETE']) }}
				{{ Form::submit('Delete',['class'=>'btn btn-danger btn-block','style'=>'margin-top:20px'])}}
			{{ Form::close() }}
		</div>
	
	
		<div class="col-md-12">
		 	<table class="table">
		 		<thead>
		 			<tr>
		 				<th>#</th>
		 				<th>Title</th>
		 				<th>Category</th>
		 				<th></th>
		 			</tr>
		 		</thead>
		 		<tbody>
		 			@foreach($category->posts as $post)
		 				<tr>
		 					<th>{{ $post->id }}</th>
		 					<td>{{ $post->title }}</td>
		 					<td>@foreach($post->category as $row)
		 							<span class="label label-default">{{ $row }}</span>
		 						@endforeach
		 					</td>
		 					<td><a href="{{route('posts.show',$post->id)}}" class="btn btn-default btn-sm">View</a></td>
		 				</tr>
		 			@endforeach
		 		</tbody>
		 	</table>
		</div>
	</div>
@endsection