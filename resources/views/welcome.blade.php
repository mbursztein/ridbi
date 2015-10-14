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
                                <?php echo url('auth/login', 'Come in', array('class' => 'btn btn-primary'));?>
                        </div>
                </div>
        </div>
</div>