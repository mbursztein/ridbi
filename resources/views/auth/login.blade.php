@extends('layout')

@section('content')

<link type="text/css" rel="stylesheet" href="http://fonts.googleapis.com/css?family=Alef:regular|Syncopate:regular&amp;subset=latin" media="all">

		<style>
			body {
				margin: 0;
				padding: 0;
				width: 100%;
				height: 100%;
				display: table;
				font-weight: 100;
				font-family: 'Syncopate';
			}

			.container {
				text-align: center;
				display: table-cell;
				vertical-align: middle;
			}

			.content {
				text-align: center;
				display: inline-block;
			}

			h1 {
				font-size: 96px;
			}

			h2 {
				font-size: 21px;
			}
			
			h3 {
				font-size: 16px;
			}
		</style>

<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel-body" style="text-align: center">
				<h1>Ridbi</h1>
				<h2>Rent it, don't buy it</h2>
			</div>
			
			<div class="panel-body" style="text-align: center">
				<?php echo link_to('githubLogin', 'Log in with GitHub', array('class' => 'btn btn-primary'));?>
				<h3>Or with your Ridbi Account</h3>
			</div>
			
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
					<label class="col-md-4 control-label">E-Mail Address</label>
					<div class="col-md-6">
						<input type="email" class="form-control" name="email" value="{{ old('email') }}">
					</div>
				</div>

				<div class="form-group">
					<label class="col-md-4 control-label">Password</label>
					<div class="col-md-6">
						<input type="password" class="form-control" name="password">
					</div>
				</div>

				<div class="form-group">
					<div class="col-md-6 col-md-offset-4">
						<div class="checkbox">
							<label>
								<input type="checkbox" name="remember"> Remember Me
							</label>
						</div>
					</div>
				</div>

				<div class="form-group">
					<div class="col-md-6 col-md-offset-4">
						<button type="submit" class="btn btn-primary">Login</button>

						<a class="btn btn-link" href="{{ url('/password/email') }}">Forgot Your Password?</a>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
@endsection
