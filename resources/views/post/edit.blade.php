@extends('app')

@section('content')

<div class="post-cover" style="background-image: url(' {{ asset('img/uploads/' . $post->photo_name) }} ')" ></div>


<div class="col-md-6 col-md-offset-3">

	{!! Form::model($post, ['route' => ['post.store', $post->id, 'method' => 'PATCH', 'files' => 'true', 'class' => 'form-horizontal'] ] ) !!}

	<div class="form-group">
		{!! Form::label('title', 'Title') !!}

		{!! Form::text('title', null, ['class' => 'form-control']) !!}
	</div>

	<div class="form-group">
		{!! Form::label('tagline', 'Tagline') !!}

		{!! Form::text('tagline', null, ['class' => 'form-control']) !!}
	</div>

	<div class="form-group">
		{!! Form::label('category_id', 'Category') !!}

		{!! Form::select('category_id', $categoriesArray, ['class' => 'form-control']) !!}
	</div>

	<div class="form-group">
		{!! Form::label('cover', 'Cover Photo') !!}

		{!! Form::file('cover', null, ['class' => 'file']) !!}
	</div>

	<div class="form-group">
		{!! Form::label('content', 'Content') !!}

		{!! Form::textarea('content', null, ['class' => 'editable form-control']) !!}
	</div>


	{!! Form::submit('Create Post', ['class' => 'btn btn-default btn-block']) !!}


	{!! Form::close() !!}

	<br>

</div>

<hr>


@endsection


@section('post-scripts')

<script>
	
	$(document).ready(function() {

		tinymce.init({
		    selector: "textarea",
		    plugins: [
		        "advlist autolink lists link image charmap print preview anchor",
		        "searchreplace visualblocks code fullscreen",
		        "insertdatetime media table contextmenu paste"
		    ],
		    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
		});

	});

</script>

@endsection