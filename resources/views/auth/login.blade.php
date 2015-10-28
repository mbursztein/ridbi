@extends('layout')

@section('content')

<link type="text/css" rel="stylesheet" href="http://fonts.googleapis.com/css?family=Alef:regular|Syncopate:regular&amp;subset=latin" media="all">
<link href="{{ asset('/css/login.css') }}" rel="stylesheet">


<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			
			<div class="panel-body" style="text-align: center">
				<a href="/githubLogin"><i class="fa fa-github-alt fa-4x"></i></a>
			</div>
		</div>
	</div>
		
		<div class="parent">
			<div class="child padding-util white-bg-util">

				
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

				<form class="form-horizontal" role="form" method="POST" action="{{ url('/auth/login') }}">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">

					<div class="form-group">
						<label class="col-md-12 control-label nobr-util">E-Mail Address</label>
						<div class="col-md-12">
							<input type="email" class="form-control" name="email" value="{{ old('email') }}">
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-12 control-label">Password</label>
						<div class="col-md-12">
							<input type="password" class="form-control" name="password">
						</div>
					</div>

					<div class="form-group">
						<div class="col-md-12">
							<div class="checkbox">
								<label>
									<input type="checkbox" name="remember"> Remember Me
								</label>
							</div>
						</div>
					</div>

					<div class="form-group">
						<div class="col-md-12">
							<button type="submit" class="btn btn-primary">Login</button>
						</div>
					</div>
				</form>
			</div>

		</div>
		<div class="parent">
			<div class="child center-util">
				<br />
				<br /><p><a href="{{ url('/password/email') }}">Forgot Your Password?</a></p>
				<br />
				<p>New here? <a href="{{ url('/auth/register') }}">Register</a>.</p>
			</div>
		</div>

</div>
@endsection
