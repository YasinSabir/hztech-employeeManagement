@extends('layouts.backend.app')
@section('section')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Add Users Roles</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Add Users Roles</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        @if(session()->has('status'))
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-8 ">
                        <div class="alert alert-success" role="alert">
                            {{ session()->get('status') }}
                        </div>
                    </div>
                </div>
            </div>
        @endif

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-8">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Add Role</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form role="form" method="post" action="{{route('roles.add')}}">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Role Title</label>
                                        <select name="role_title" class="form-control select2" style="width: 100%;">
                                            <option value="admin">Admin</option>
                                            <option value="head">Heads</option>
                                            <option value="hr">HR</option>
                                            <option value="lead">Leads</option>
                                            <option value="employee">Employee</option>
                                        </select>
                                    </div>

                                    @error('role_title')
                                    <span class="invalid-feedback d-block"
                                     role="alert"> <strong>{{ $message }}</strong> </span>
                                    @enderror
                                    <div class="form-group">
                                        <label>Role Description</label>
                                        <textarea class="form-control" name="role_description" rows="4"
                                                  placeholder="Enter Role Description."></textarea>
                                    </div>
                                    @error('role_description')
                                    <span class="invalid-feedback d-block"
                                          role="alert"> <strong>{{ $message }}</strong> </span>
                                    @enderror
                                    <div class="form-group">
                                        <label>Status</label>
                                        <select class="form-control select2" name="role_status" style="width: 100%;">
                                            <option value="Active" selected="selected">Active</option>
                                            <option value="Pending">Pending</option>
                                            <option value="Block">Block</option>
                                        </select>
                                    </div>

                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
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
            //Initialize Select2 Elements
            $('.select2').select2()

            //Initialize Select2 Elements
            $('.select2bs4').select2({
                theme: 'bootstrap4'
            })

            //Datemask dd/mm/yyyy
            $('#datemask').inputmask('dd/mm/yyyy', {'placeholder': 'dd/mm/yyyy'})
            //Datemask2 mm/dd/yyyy
            $('#datemask2').inputmask('mm/dd/yyyy', {'placeholder': 'mm/dd/yyyy'})
            //Money Euro
            $('[data-mask]').inputmask()

            //Date range picker
            $('#reservation').daterangepicker()
            //Date range picker with time picker
            $('#reservationtime').daterangepicker({
                timePicker: true,
                timePickerIncrement: 30,
                locale: {
                    format: 'MM/DD/YYYY hh:mm A'
                }
            })
            //Date range as a button
            $('#daterange-btn').daterangepicker(
                {
                    ranges: {
                        'Today': [moment(), moment()],
                        'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                        'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                        'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                        'This Month': [moment().startOf('month'), moment().endOf('month')],
                        'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                    },
                    startDate: moment().subtract(29, 'days'),
                    endDate: moment()
                },
                function (start, end) {
                    $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
                }
            )

            //Timepicker
            $('#timepicker').datetimepicker({
                format: 'LT'
            })

            //Bootstrap Duallistbox
            $('.duallistbox').bootstrapDualListbox()

            //Colorpicker
            $('.my-colorpicker1').colorpicker()
            //color picker with addon
            $('.my-colorpicker2').colorpicker()

            $('.my-colorpicker2').on('colorpickerChange', function (event) {
                $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
            });

            $("input[data-bootstrap-switch]").each(function () {
                $(this).bootstrapSwitch('state', $(this).prop('checked'));
            });

        })
    </script>

@endsection
