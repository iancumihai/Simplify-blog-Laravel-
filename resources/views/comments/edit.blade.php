@extends('main')
@section('title','Edit Coment')
@section('content')
<div class="row">
	<div class="col-md-8 col-md-offset-2">
		<h2>Edit Coment</h2>
		{{Form::model($comment,['route'=>['comments.update',$comment->id],'method'=>'PUT'])}}
			{{Form::label('name','Name:')}}
			{{Form::text('name',null,['class'=>'form-control','disabled'=>''])}}
			{{ Form::label('email','Email:')}}
			{{Form::text('email',null,['class'=>'form-control','disabled'=>''])}}
			{{Form::label('comment','Coment:')}}
			{{Form::textarea('comment',null,['class'=>'form-control'])}}
			{{Form::submit('Update comment',['class'=>'btn btn-success btn-block','style'=>'margin-top:15px'])}}

		{{Form::close()}}
	</div>
</div>
@endsection