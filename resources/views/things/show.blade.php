@extends('layout')

@section('content')

<script>
	function popitDelete() {
		swal({
			title: "Are you sure?",
			text: "You can't undo!",
			type: "warning",
			showCancelButton: true,
			confirmButtonColor: "#DD6B55",
			confirmButtonText: "Yes",
			closeOnConfirm: false }, function(){
				destroyThing.submit();
			});
	}

	function popitRequest() {
		swal({
			title: "Proceed with request?",
			text: "Owner will be notified",
			type: "warning",
			showCancelButton: true,
			confirmButtonColor: "#6bDD55",
			confirmButtonText: "Yes",
			closeOnConfirm: false }, function(){
				requestThing.submit();
			});
	}
</script>

@if (\Auth::check() && $thing->ownedBy(\Auth::user()))
	<form id="destroyThing" action="/things/destroy/{{ $thing->id }}" method="POST">{!! csrf_field() !!}
		<button class="btn btn-danger" onclick="popitDelete(); return false;"><span class="glyphicon glyphicon-remove" aria-hidden="true"></button>
	</form>
	<br />
	<div>
		@if ($status != 'Available')
			<a href="/rentals">
		@endif
		<span class="label label-{{$label_type}}">{{$status}}</span>
		@if ($status != 'Available')
			</a>
		@endif
	</div>
@endif


<h2>
	@if (\Auth::check() && $thing->ownedBy(\Auth::user()))<span data-inputclass="thing_name_editable_field" id="name" data-type="text" data-pk="{{ $thing->id }}" data-url="/things/update/{{ $thing->id }}" data-title="Enter name">@endif
		{{ $thing->name }}</h2>
	@if (\Auth::check() && $thing->ownedBy(\Auth::user()))</span>@endif
</h2>

<h3>{{ $thing->description }}</h3>

@foreach ($thing->photos as $photo)
	<img src="/{{ $photo->path }}" alt="" />
@endforeach




<hr>


@if (\Auth::check() && $thing->ownedBy(\Auth::user()))
	<form id="addPhotosForm" action="/things/{{ $thing->id }}/photos" method="POST" class="dropzone">{!! csrf_field() !!}</form>
@else
	
	@if ($status == 'available')
		<!-- Only show this if logged in user didn't request the item already -->
		<form id="requestThing" action="/things/ask/{{ $thing->id }}" method="POST">{!! csrf_field() !!}
			<button class="btn btn-primary" onclick="popitRequest(); return false;">Request</button>
		</form>
	@else
		Item not available
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

		$(document).ready(function() {
		    $('#name').editable();
		    params: {
		        csrf: 'my-csrf-token'
		    }
		});

		$.fn.editable.defaults.mode = 'inline';



	</script>
@stop
