@extends('layouts.backend.app')
@section('section')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Write Application</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Application</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">

                <div class="col-md-12">
                    <form role="form" method="post" action="{{route('applications.store')}}">
                        @csrf
                        <div class="card card-outline card-info">
                            <div class="card-header">
                                <h3 class="card-title">
                                    Application
                                    <small></small>
                                </h3>
                                <!-- tools box -->
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool btn-sm" data-card-widget="collapse"
                                            data-toggle="tooltip"
                                            title="Collapse">
                                        <i class="fas fa-minus"></i></button>
                                </div>
                                <!-- /. tools -->
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body pad">
                                <div class="form-group">
                                    <label>Application Title</label>
                                    <input type="text" class="form-control" name="title" placeholder="Enter Application Title."/>
                                </div>
                                @error('title')
                                <span class="invalid-feedback d-block mb-3"
                                      role="alert"> <strong>{{ $message }}</strong> </span>
                                @enderror
                                <div class="form-group">
                                    <label>Application Description</label>
                                    <textarea class="form-control" name="description" rows="20"
                                              placeholder="Write your application here ...."></textarea>
                                </div>
                                @error('description')
                                <span class="invalid-feedback d-block mb-3"
                                      role="alert"> <strong>{{ $message }}</strong> </span>
                                @enderror
                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- /.col-->
            </div>
            <!-- ./row -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

@endsection

@section('page-script')

    <script>
        $(function () {
            // Summernote
            $('.textarea').summernote()
        })
    </script>

@endsection
