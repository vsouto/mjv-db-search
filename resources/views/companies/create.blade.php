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
                                                <div class="form-group">
                                                    <label class="col-lg-6 control-label">Title</label>
                                                    <div class="col-lg-6">
                                                        <input class="form-control" id="title" name="title" type="text" required>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-lg-6 control-label">First Name</label>
                                                    <div class="col-lg-6">
                                                        <input class="form-control" id="firstname" name="firstname" type="text" required>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-lg-6 control-label">Last Name</label>
                                                    <div class="col-lg-6">
                                                        <input class="form-control" id="lastname" name="lastname" type="text" required>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-lg-6 control-label">Email</label>
                                                    <div class="col-lg-6">
                                                        <input class="form-control" id="email" name="email" type="email">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-lg-6 control-label">Job Title</label>
                                                    <div class="col-lg-6">
                                                        <input class="form-control" id="job_title" name="job_title" type="text" required>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-lg-6 control-label">City</label>
                                                    <div class="col-lg-6">
                                                        <input class="form-control" id="city" name="city" type="text" required>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-lg-6 control-label">Industry</label>
                                                    <div class="col-lg-6">
                                                        <input class="form-control" id="industry" name="industry" type="text" required>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-lg-6 control-label">Linkedin URL</label>
                                                    <div class="col-lg-6">
                                                        <input class="form-control" id="linkedin" name="linkedin" type="text" required>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-lg-6 control-label">Hardbounce</label>
                                                    <div class="col-lg-6">
                                                        <input class="form-control" id="hardbounce" value="1" name="hardbounce" type="checkbox" >
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