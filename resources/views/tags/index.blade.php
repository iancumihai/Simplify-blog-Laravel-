@extends('main')
@section('title','Tags')
@section('content')

	
	<div class="row space" id="content">
		<div class="col-md-8">
			<h1>Tags</h1>
			<table class="table">
				<thead>
					<th>Id</th>
					<th>Name</th>
					<th></th>
				</thead>
				<tbody>
				@foreach($tags as $tag)
					<tr>
						<th>{{ $tag->id }}</th>
						<td>{{ $tag->name}}</td>
						<td><a href="{{route('tags.show',$tag->id)}}" class="btn btn-default">Show</a></td>
					</tr>
				@endforeach
				</tbody>				
			</table>
		</div>
		<div class="col-md-4">
			<div class="well">
			{!!Form::open(['route'=>'tags.store', 'method'=>'POST'])!!}
				<h2>New Tag</h2>
				{{Form::label('name','Name:')}}
				{{Form::text('name', null,['class'=>'form-control'])}}
				{{Form::submit('Create new tag', ['class'=>'btn btn-success btn-block btn-spacing'])}}
			{!!Form::close()!!}
			</div>
		</div>
	</div>

	
		
	</div>
	

@endsection