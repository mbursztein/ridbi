@foreach ($things as $thing)
<ul>
	<li>
		<a href="/thing/{{ $thing->id }}">{{ $thing->name }}</a><br />
		{{ $thing->description }}
	</li>
</ul>
@endforeach