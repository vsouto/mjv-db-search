@extends('layouts.template')

@section('content')
    <div class="page-inner">
        <div class="page-title">
            <h3>Dashboard</h3>
            <div class="page-breadcrumb">
                <ol class="breadcrumb">
                    <li><a href="{{ route('home') }}">Dashboard</a></li>
                </ol>
            </div>
        </div>
        <div id="main-wrapper">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-white">
                        <div class="panel-heading clearfix">
                            <h4 class="panel-title">Responsive table</h4>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                {!! $grid->render() !!}
                            </div>
                        </div>
                    </div>
                </div>

            </div><!-- Row -->
        </div><!-- Main Wrapper -->
        <div class="page-footer">
            <p class="no-s">2015 &copy; Modern by Steelcode.</p>
        </div>
    </div><!-- Page Inner -->
@endsection
