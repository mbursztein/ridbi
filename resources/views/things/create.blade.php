@extends('layout')

@section('content')

<div class="col-md-6">
	<h1>Create Thing</h1>
	@if (count($errors) > 0)
		<div class="alert alert-danger">
			<strong>Whoops!</strong> There were some problems with your input.<br><br>
			<ul>
				@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
	@endif

	<form method="POST" action="/things/store" enctype="multipart/form-data">
		{!! csrf_field() !!}
		<div class="form-group">
			<label for="name">Name:</label>
			<input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required />
		</div>
		<div class="form-group">
			<label for="name">Description:</label>
			<input type="text" name="description" id="description" class="form-control" value="{{ old('description') }}" required />
		</div>
		<div class="form-group">
			<button type="submit" class="btn btn-primary">Create Thing</button>
		</div>
	</form>
</div>



@endsection