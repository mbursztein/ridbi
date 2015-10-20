@extends('layout')

@section('content')

@if (\Auth::check() && $thing->ownedBy(\Auth::user()))

<script>
	function popit() {
	swal({
		title: "Are you sure?",
		text: "You can't undo!",
		type: "warning",
		showCancelButton: true,
		confirmButtonColor: "#DD6B55",
		confirmButtonText: "Yes, delete it!",
		closeOnConfirm: false }, function(){
			destroyThing.submit();
		});
	}

</script>



	<form id="destroyThing" action="/things/destroy/{{ $thing->id }}" method="POST">{!! csrf_field() !!}
		<button class="btn btn-danger" onclick="popit(); return false;"><span class="glyphicon glyphicon-remove" aria-hidden="true"></button>
	</form>
	
@endif




<h2>
	@if (\Auth::check() && $thing->ownedBy(\Auth::user()))<span data-inputclass="thing_name_editable_field" id="name" data-type="text" data-pk="{{ $thing->id }}" data-url="/things/update/{{ $thing->id }}" data-title="Enter name">@endif
		{{ $thing->name }}
	@if (\Auth::check() && $thing->ownedBy(\Auth::user()))</span>@endif
</h2>

<h3>{{ $thing->description }}</h3>

@foreach ($thing->photos as $photo)
	<img src="/{{ $photo->path }}" alt="" />
@endforeach





@if (\Auth::check() && $thing->ownedBy(\Auth::user()))
	<form id="addPhotosForm" action="/things/{{ $thing->id }}/photos" method="POST" class="dropzone">{!! csrf_field() !!}</form>
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

		$(document).ready(function() {
		    $('#name').editable();
		    params: {
		        csrf: 'my-csrf-token'
		    }
		});

		$.fn.editable.defaults.mode = 'inline';



	</script>
@stop
