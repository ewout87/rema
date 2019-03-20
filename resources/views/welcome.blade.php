@extends('voyager::master')

@section('page_title', __('voyager::generic.viewing').'Bestelling')

@section('page_header')
    <div class="container-fluid">
        <h1 class="page-title">
            Hello there
        </h1>
    
    </div>
@stop

@section('content')

    <div id="app">
        <div class="page-content browse container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-bordered">

                        <div class="panel-body" >
                            <orders></orders>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src={{asset('js/app.js')}}></script>
@endsection

@section('css')

<link rel="stylesheet" href="{{ voyager_asset('lib/css/responsive.dataTables.min.css') }}">

@stop