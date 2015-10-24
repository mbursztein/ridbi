@extends('layout')

@section('content')
<div class="row">
	<div class="col-md-6 panel">
	<h2>Pendings</h2>
	<h3>You want:</h3>
	@foreach ($requests as $request)
	<ul>
		<li>
			<a href="/things/{{ $request->thing_id }}">{{ $request->thing_name }}</a> from {{ $request->name }}
		</li>
	</ul>
	@endforeach

	<h3>Others want:</h3>
	@foreach ($others_want as $other_want)
	<ul>
		<li>
			{{ $other_want->name }} wants your <a href="/things/{{ $other_want->thing_id }}">{{ $other_want->thing_name }}</a><br />

			<form id="confirmRental" action="/rentals/process/confirm/{{ $other_want->id }}" method="POST">{!! csrf_field() !!}
				<button class="btn btn-success">Confirm</button>
			</form>

			<form id="rejectRental" action="/rentals/process/reject/{{ $other_want->id }}" method="POST">{!! csrf_field() !!}
				<button class="btn btn-danger">Reject</button>
			</form>

			
		</li>
	</ul>
	@endforeach
	</div>
	<div class="col-md-6 panel">
	<h2>Rented</h2>
	<h3>You are renting:</h3>
	@foreach ($your_rentals as $rental)
	<ul>
		<li>
			<a href="/things/{{ $rental->thing_id }}">{{ $rental->thing_name }}</a> from {{ $rental->name }}
		</li>
	</ul>
	@endforeach

	<h3>Others are renting:</h3>
	@foreach ($others_rentals as $others_rental)
	<ul>
		<li>
			{{ $others_rental->name }} is renting your <a href="/things/{{ $others_rental->thing_id }}">{{ $others_rental->thing_name }}</a>
			<form id="returnedRental" action="/rentals/process/returned/{{ $others_rental->id }}" method="POST">{!! csrf_field() !!}
				<button class="btn btn-primary">Returned</button>
			</form>
		</li>
	</ul>
	@endforeach
	</div>
</div>
@endsection