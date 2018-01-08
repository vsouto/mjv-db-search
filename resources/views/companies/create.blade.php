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

            <form id="create_call" method="post" action="{{ route('companies.store') }}" class="form-horizontal">
                {{ Form::token() }}
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <!-- Row Starts -->
                <div class="row">
                    <!-- Row Starts -->
                    <div class="row">
                        <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                            <div class="blog">
                                <div class="blog-header">
                                    <h5 class="blog-title">Company</h5>
                                </div>
                                <div class="blog-body">

                                        <fieldset>
                                            <legend>Core Info</legend>

                                            <div class="form-group">
                                                <label class="col-lg-6 control-label">Name</label>
                                                <div class="col-lg-6">
                                                    {{ Form::text('name', null, [
                                                         'class' => 'form-control',
                                                         'id'    => 'name'
                                                         ]) }}
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="form-group">
                                                    <label class="col-lg-6 control-label">Email</label>
                                                    <div class="col-lg-6">
                                                        {{ Form::text('email', null, [
                                                         'class' => 'form-control',
                                                         'id'    => 'name'
                                                         ]) }}
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-lg-6 control-label">Phone 1</label>
                                                    <div class="col-lg-6">
                                                        {{ Form::text('phone1', null, [
                                                            'class' => 'form-control',
                                                            'id'    => 'phone1'
                                                            ]) }}
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-lg-6 control-label">Phone 2</label>
                                                    <div class="col-lg-6">
                                                        {{ Form::text('phone2', null, [
                                                            'class' => 'form-control',
                                                            'id'    => 'phone2'
                                                            ]) }}
                                                    </div>
                                                </div>
                                            </div>
                                        </fieldset>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- Row Ends -->

                    <div class="form-group">

                        <div class="col-lg-6 col-lg-offset-6">
                            <button type="button" class="btn btn-danger" title="" id="btn-cancel">
                                <i class="fa fa-close"></i> Cancel
                            </button>
                            <button type="submit" class="btn btn-success" id="btn-submit">Create</button>
                        </div>
                    </div>
                </div>
                <!-- Row Ends -->

            {!! Form::close() !!}

        </div>
    </div>
    <!-- Main Container ends -->

@endsection

@section('footer')

    <script>

        $(function() {

            $('#btn-cancel').click(function() {
               location.href = '{{ route('companies.index') }}';
            });

            $('#states').change(function() {

                var state_id = $(this).val();

                getCities(state_id, '#cities');
            });
        });
    </script>

@endsection