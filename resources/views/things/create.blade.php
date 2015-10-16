@extends('layout')

@section('content')

<h1>Create Thing</h1>

<form method="POST" action="/thing" enctype="multipart/form-data">
	<div class="form-group">
		<label for="name">Name:</label>
		<input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" />
	</div>
	<div class="form-group">
		<label for="name">Description:</label>
		<input type="text" name="description" id="description" class="form-control" value="{{ old('description') }}" />
	</div>
	<div class="form-group">
		<button type="submit" class="btn btn-primary">Create Thing</button>
	</div>
</form>

@endsection