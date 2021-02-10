@extends('layouts.backend.app')
@section('section')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>View Complain</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">View Complain</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">View Complain</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form role="form" method="get" action="{{route('complains.view',['id' => $app->id])}}">
                                @csrf
                                <div class="card card-outline card-info">
                                    <div class="card-header">

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
                                            <label>Complain Title</label>
                                            <input type="text" class="form-control" value="{{$app->title}}" disabled name="title" placeholder="Enter Application Title."/>
                                        </div>
                                        <div class="mb-3">
                                            <div class="form-group">
                                                <label>Complain Description</label>
                                                <textarea disabled class="form-control" name="description" rows="20"
                                                          placeholder="Write your application here ....">{{strip_tags($app->description)}}</textarea>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

@endsection

@section('page-script')

    <script>
        $(function () {
            // Summernote
            $('.textarea').summernote()
        })
    </script>

@endsection
