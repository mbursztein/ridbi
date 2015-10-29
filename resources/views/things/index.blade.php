@extends('layout')

@section('content')

@if (!Auth::guest())
	<div class="row"><a href="/things/create" class="btn btn-primary">+</a></div>
	<br />
@endif


<div class="row">
	<div class="col-md-6 panel">
	@foreach ($things as $thing)
	<ul class="thing-list">
		<li>
			<?php $mypath = ''; ?>
			@foreach ($thing->photos as $photo)
				<?php $mypath = $photo->path; ?>
			@endforeach
			<div class="thing-image-container"><img class="thing-image border-util" src="/{{ $mypath }}" alt="" /></div>
			
			<div class="thing-name-container"><a href="/things/{{ $thing->id }}">{{ $thing->name }}</a></div>
			<!-- {!! nl2br($thing->description) !!} -->
		</li>
	</ul>
	<?php $mypath = ''; ?>
	@endforeach
	</div>
</div>
@endsection