@extends('main')

@section('title','Create Post')

@section('stylesheet')

	{!! Html::style('css/parsley.css') !!}
    {!! Html::style('css/select2.min.css') !!}
    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
    
    <script>
        tinymce.init({
            selector: 'textarea',
            plugins: 'link code',
            menubar: false 
        });    
    </script>
@endsection
@section('content')

<div class="row">
	<div class="col-md-12" >
		<div class="row" >
            <div class="col-md-8">
                <h1>Create Post</h1>
            </div>
            
            <div class="col-md-4 post-button">
            {!! Form::open(['route' => 'posts.store','data-parsley-validate' =>'','files'=>true]) !!}   
                {{Form::submit('Save Post',array('class' => 'btn btn-success btn-lg btn-block'))}}
            </div>
        </div>

    		{{Form::label('title','Title:')}}
    		{{Form::text('title',null,array('class' => 'form-control','required'=>'','max-length'=>'255'))}}
    		{{Form::label('url','url:')}}
    		{{Form::text('url',null,array('class' => 'form-control','required'=>'','min-lenght'=>'5','max-length'=>'255'))}}
    		{{Form::label('category','Category:')}}
    		<select class="form-control" name='category_id'>
    			<option value="0">Select the category</option>
    			@foreach($categories as $category)
    			     <option value="{{$category->id}}">{{$category->name}}</option>
    			@endforeach
    		</select>	
            {{Form::label('tags','Tag:')}}
            <select class="form-control select2-multi" name='tags[]' multiple="multiple">
                <option value="0">Select the tags</option>
                @foreach($tags as $tag)
                    <option value="{{$tag->id}}">{{$tag->name}}</option>
                @endforeach

            </select>   
            {{Form::label('featured_image','Image upload:')}}
            {{Form::file('featured_image')}}
    		{{Form::label('body','Post body:')}}
    		{{Form::textarea('body',null,array('class' => 'form-control'))}}
		    {!! Form::close() !!}
	</div>
</div>

@endsection

@section('scripts')
    {!! Html::script('js/parsley.min.js') !!}
    {!! Html::script('js/select2.min.js') !!}
    <script type="text/javascript">
        $('.select2-multi').select2();
    </script>
@endsection