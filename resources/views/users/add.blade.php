@extends('layouts.backend.app')
@section('section')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Add Users</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Add Users</li>
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
                                <h3 class="card-title">Add User</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form role="form" method="post" action="{{route('users.store')}}">
                                @csrf

                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Full Name</label>
                                        <input type="text" class="form-control" name="user_fullname"
                                               placeholder="Enter Full Name."/>
                                    </div>
                                    @error('user_fullname')
                                    <span class="invalid-feedback d-block"
                                          role="alert"> <strong>{{ $message }}</strong> </span>
                                    @enderror
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" class="form-control" name="user_email"
                                               placeholder="Enter User Email."/>
                                    </div>
                                    @error('user_email')
                                    <span class="invalid-feedback d-block"
                                          role="alert"> <strong>{{ $message }}</strong> </span>
                                    @enderror
                                    <div class="form-group">
                                        <label>Role Title</label>
                                        <select name="role_title" id="role_title" class="form-control select2"
                                                style="width: 100%;">
                                            @foreach($role as $r)
                                                <option value="{{$r->id}}">{{$r->title}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Employee Name</label>
                                        <select name="sel_emp" id="sel_emp" class="form-control"
                                                style="width: 100%;">
                                            <option value="0">Select Employee</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Status</label>
                                        <select class="form-control select2" name="user_status" style="width: 100%;">
                                            <option value="Active" selected="selected">Active</option>
                                            <option value="Pending">Pending</option>
                                            <option value="Block">Block</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Password</label>
                                        <input type="password" name="password" class="form-control"
                                               id="exampleInputPassword1" placeholder="Password">
                                    </div>
                                    @error('password')
                                    <span class="invalid-feedback d-block"
                                          role="alert"> <strong>{{ $message }}</strong> </span>
                                    @enderror
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
        /*Ajax Employee Dropdown fill*/

        $(document).ready(function () {

            $("#role_title").change(function () {
                var selectedRole = $(this).children("option:selected").text();
                if(selectedRole == "employee") {
                    // Department Change
                    //$('#sel_role').change(function () {

                        // Department id
                        //var id = $(this).val();
                        alert("You have selected the - " + selectedRole);
                        // Empty the dropdown
                        $('#sel_emp').find('#sel_emp').not(':first').remove();

                        // AJAX request
                        $.ajax({
                            // url: 'getEmployees/',
                            url : '{{route('users.getEmployees')}}',
                            type: 'get',
                            dataType: 'json',
                            success: function (response) {

                                var len = 0;
                                if (response['data'] != null) {
                                    len = response['data'].length;
                                }
                                if (len > 0) {
                                    // Read data and create <option >
                                    for (var i = 0; i < len; i++) {

                                        var fullname = response['data'][i].fullname;

                                        var option = "<option value='"+response['data'][i].id+"'>" + fullname + "</option>";

                                        $("#sel_emp").append(option);
                                    }
                                }
                            }
                        });
                }
            });
        });
        //Ajax Dropdwon fill end
    </script>
@endsection
