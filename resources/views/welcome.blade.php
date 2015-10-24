@extends('layout')

@section('content')

<div class="container-fluid">
        <div class="row">
                <div class="col-md-12">
                        <div class="panel-body" style="text-align: center">
                                <h1>Make money, save the panet.</h1>
                        </div>

                        <div class="panel-body" style="text-align: center">
                                <?php echo link_to('auth/login', 'Come in', array('class' => 'btn btn-primary'));?>
                        </div>
                </div>
        </div>
</div>
@endsection