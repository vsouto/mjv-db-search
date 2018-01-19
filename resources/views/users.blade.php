@extends('layouts.template')

@section('content')
    <div class="page-inner">
        <div class="page-title">
            <h3>Dashboard</h3>
            <div class="page-breadcrumb">
                <ol class="breadcrumb">
                    <li><a href="{{ route('home') }}">Users</a></li>
                </ol>
            </div>
        </div>
        <div id="main-wrapper">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-white">
                        @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @endif
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
            location.href = "{{ route('users.create') }}";
        });
    </script>

    <script>
        $('.btn-delete').click(function(evt){
            evt.preventDefault();

            var url =  '{{ route("users.destroy",  ":id") }}';
            url = url.replace(':id', $(this).data('id'));

            $.ajax({
                url: url,
                type: 'post',
                data:{
                    _token: $(this).data('token'),
                    _method: 'delete'
                }
            }).done(function() {
                location.href = "{{ route('users.index') }}";
            });
        });
    </script>
@endsection