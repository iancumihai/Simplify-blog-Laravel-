@extends('main')
@section('title','Categories')
@section('content')
	
<div class="row space" id="content">
	<div class="col-md-8">
		<h1>Categories</h1>
			<table class="table">
				<thead>
					<th>Id</th>
					<th>Name</th>
				</thead>
				<tbody>
					@foreach($categories as $category)
						<tr>
							<th>{{ $category->id }}</th>
							<td>{{ $category->name}}</td>
							<td><a href="{{route('categories.show',$category->id)}}" class="btn btn-default">Show</a></td>
						</tr>
					@endforeach
				</tbody>				
			</table>
	</div>
	<div class="col-md-4">
		<div class="well">
			{!!Form::open(['route'=>'categories.store', 'method'=>'POST'])!!}
				<h2>New Category</h2>
				{{Form::label('name','Name:')}}
				{{Form::text('name', null,['class'=>'form-control'])}}
				{{Form::submit('Create new category', ['class'=>'btn btn-success btn-block btn-spacing'])}}
			{!!Form::close()!!}
		</div>
	</div>
</div>
	
@endsection