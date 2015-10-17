@extends('layout')

@section('content')
<h2>{{ $thing->name }}</h2>
<h3>{{ $thing->description }}</h3>

@foreach ($thing->photos as $photo)
	<img src="/{{ $photo->path }}" alt="" />
@endforeach

@if (\Auth::user())
	@if ($thing->ownedBy(\Auth::user()))
		<form id="addPhotosForm" action="/things/{{ $thing->id }}/photos" method="POST" class="dropzone">{!! csrf_field() !!}</form>
	@endif
@endif

@stop


@section('scripts.footer')
	<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.2.0/dropzone.js"></script>
	<script>
		Dropzone.options.addPhotosForm = {
			paramName: 'photo',
			maxFilesize: 3,
			acceptedFiles: '.jpg, .jprg, .png'
		}
	</script>
@stop
