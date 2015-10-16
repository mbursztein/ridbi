@extends('layout')

@section('content')
<h2>{{ $thing->name }}</h2>
<h3>{{ $thing->description }}</h3>
@endsection