@extends('main')

@section('title', 'Edit Blog Post')

@section('stylesheet')

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
	<div class="col-md-8" >
		<div class="row" >
        <div class="col-md-8">
            <h1>Create Post</h1>
        </div>
        </div>
		{!! Form::model($post, ['route' => ['posts.update', $post->id], 'method' => 'PUT','files'=>true]) !!}
		<div class="col-md-12">
			{{ Form::label('title', 'Title:') }}
			{{ Form::text('title', null, ["class" => 'form-control input-lg']) }}

			{{ Form::label('url', 'Url:', ['class' => 'form-spacing-top']) }}
			{{ Form::text('url', null, ['class' => 'form-control']) }}

			{{ Form::label('category_id', "Category:", ['class' => 'form-spacing-top']) }}
			{{ Form::select('category_id', $categories, null, ['class' => 'form-control']) }}

			{{ Form::label('tags', 'Tags:', ['class' => 'form-spacing-top']) }}
			{{ Form::select('tags[]', $tags, null, ['class' => 'form-control select2-multi', 'multiple' => 'multiple']) }}
			{{Form::label('featured_image','Image upload:')}}
            {{Form::file('featured_image')}}
			
			{{ Form::label('body', "Body:", ['class' => 'form-spacing-top']) }}
			{{ Form::textarea('body', null, ['class' => 'form-control']) }}
		</div>
	
	</div>
		<div class="col-md-4 space">
			<div class="well">
				<div class="row">
					<dl class="dl-horizontal">
						<dt>Created At:</dt>
						<dd>{{ date('M j, Y h:ia', strtotime($post->created_at)) }}</dd>
					</dl>

					<dl class="dl-horizontal">
						<dt>Last Updated:</dt>
						<dd>{{ date('M j, Y h:ia', strtotime($post->updated_at)) }}</dd>
					</dl>
					<hr>
					<div class="row">
						<div class="col-sm-6">
							{!! Html::linkRoute('posts.show', 'Cancel', array($post->id), array('class' => 'btn btn-danger btn-block')) !!}
						</div>
						<div class="col-sm-6">
							{{ Form::submit('Save Changes', ['class' => 'btn btn-success btn-block']) }}
						</div>
					</div>
				</div>
			</div>
		</div>
		{!! Form::close() !!}
	</div>	<!-- end of .row (form) -->

@endsection

@section('scripts')

	{!! Html::script('js/select2.min.js') !!}

	<script type="text/javascript">
		$('.select2-multi').select2();
		$('.select2-multi').select2().val({!! json_encode($post->tags()->allRelatedIds()) !!}).trigger('change');
	</script>

@endsection