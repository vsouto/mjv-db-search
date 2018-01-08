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
                            <h4 class="panel-title">MJV Database Search</h4>

                            <div class="text-right">
                                <button type="button" class="btn btn-info btn-rounded" id="new-contact">New</button>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                {!! $grid->render() !!}
                            </div>
                        </div>
                    </div>
                </div>

            </div><!-- Row -->
        </div>

    </div>
    <!-- Page Inner -->
@endsection

@section('footer')

    <script>
        $('#new-contact').click(function(){
            location.href = '{{ route('companies.create') }}';
        });
    </script>
@endsection