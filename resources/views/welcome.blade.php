@extends('layouts.home')
@section('title', config('app.name', 'ultimatePOS'))

@section('content')
    <style type="text/css">
        .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
                margin-top: 10%;
            }
        .title {
                font-size: 84px;
            }
        .tagline {
                font-size:25px;
                font-weight: 300;
                text-align: center;
            }
    </style>
     <div class="title flex-center" style="font-weight: 600 !important;">
		<img src="http://localhost/splg/public/uploads/business_logos/1599836174_whoapos_logo.png" alt="Logo">
        <!--{{ config('app.name', 'ultimatePOS') }}-->
		
    </div>
    <p class="tagline">
        <!-- {{ env('APP_TITLE', '') }}-->
    </p>
@endsection
            