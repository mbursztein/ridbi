@extends('layout')

@section('content')
<div class="row"><a href="/things/create" class="btn btn-primary">+</a></div>
<br />
<div class="row">
	<div class="col-md-6 panel">
	@foreach ($things as $thing)
	<ul>
		<li>
			<a href="/things/{{ $thing->id }}">{{ $thing->name }}</a><br />
			{!! nl2br($thing->description) !!}
		</li>
	</ul>
	@endforeach
	</div>
</div>
@endsection