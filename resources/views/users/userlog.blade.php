@extends('layouts.backend.app')
@section('section')

    <?php
    use Carbon\Carbon;
    ?>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>User Logs</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">User Logs</li>
                            <li class="breadcrumb-item active">
{{--                                {{claculation('14-01-2021')}}--}}
                            </li>
                        </ol>
                    </div>
                </div>

                <section class="content">
                    <div class="container-fluid">


                        <!-- Small boxes (Stat box) -->
                        <div class="row">
                            <div class="col-lg-3 col-6">
                                <!-- small box -->
                                <div class="small-box bg-info">
                                    <div class="inner">
                                        <h5>Todays <br/>Hours</h5>
                                        <p >{{CalculateTime()}}</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-bag"></i>
                                    </div>
                                    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                            <!-- ./col -->
                            <div class="col-lg-3 col-6">
                                <!-- small box -->
                                <div class="small-box bg-success">
                                    <div class="inner">
                                        <h5>Today Hours <br/>Remaining</h5>

                                        <p>{{TodaysRemaininghours()}}</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-stats-bars"></i>
                                    </div>
                                    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>

                            <div class="col-lg-3 col-6">
                                <!-- small box -->
                                <div class="small-box bg-warning">
                                    <div class="inner">
                                        <h5 style="color: #FFFFFF;">Monthly Total <br/>Hours</h5>
                                        <p style="color: #FFFFFF;">{{MonthTotalHours()}}</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-person-add"></i>
                                    </div>
                                    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>

                            <div class="col-lg-3 col-6 ">
                                <!-- small box -->
                                <div class="small-box bg-danger">
                                    <div class="inner">
                                        <h5>Monthly Remaining <br/>Hours</h5>

                                        <p>{{MonthRemainingHours()}}</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-pie-graph"></i>
                                    </div>
                                    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                            <!-- ./col -->
                        </div>
                        <!-- /.row -->
                    </div><!-- /.container-fluid -->
                </section>
                <hr>
                <div class="card">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card-body">
                                @if( isset($status->entry_type) && $status->entry_type == 1)
                                    <button class="btn btn-app" name="time_out" id="time_out" type="button">
                                        <i class="fas fa-stopwatch"></i> Time Out
                                    </button>
                                @else
                                    <button class="btn btn-app like" name="time_in" id="time_in" type="button">
                                        <i class="fas fa-clock"></i> Time In
                                    </button>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">User Logs Data</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form method="get" action="{{route('users.UserLog')}}">
                            @csrf
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <select name="get_month" id="" class="form-control">
                                            <option value="01" {{ ( !empty($_GET['get_month']) == '01') ? "selected" : ''  }}>
                                                Jan
                                            </option>
                                            <option value="02" {{ (!empty($_GET['get_month']) == '02') ? "selected" : ''  }}>
                                                Feb
                                            </option>
                                            <option value="03" {{ (!empty($_GET['get_month']) == '03') ? "selected" : ''  }}>
                                                Mar
                                            </option>
                                            <option value="04" {{ (!empty($_GET['get_month']) == '04') ? "selected" : ''  }}>
                                                Apr
                                            </option>
                                            <option value="05" {{ (!empty($_GET['get_month']) == '05') ? "selected" : ''  }}>
                                                May
                                            </option>
                                            <option value="06" {{ (!empty($_GET['get_month']) == '06') ? "selected" : ''  }}>
                                                June
                                            </option>
                                            <option value="07" {{ (!empty($_GET['get_month']) == '07') ? "selected" : ''  }}>
                                                July
                                            </option>
                                            <option value="08" {{ (!empty($_GET['get_month']) == '08') ? "selected" : ''  }}>
                                                Aug
                                            </option>
                                            <option value="09" {{ (!empty($_GET['get_month']) == '09') ? "selected" : ''  }}>
                                                Sept
                                            </option>
                                            <option value="10" {{ (!empty($_GET['get_month']) == '10') ? "selected" : ''  }}>
                                                Oct
                                            </option>
                                            <option value="11" {{ (!empty($_GET['get_month']) == '11') ? "selected" : ''  }}>
                                                Nov
                                            </option>
                                            <option value="12" {{ (!empty($_GET['get_month']) == '12') ? "selected" : ''  }}>
                                                Dec
                                            </option>
                                        </select>
                                    </div>

                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <hr>

                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>S.No</th>
                                <th>Time In</th>
                                <th>Time Out</th>
                                <th>Date</th>
                                <th>Day</th>
                                <th>Difference</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($records as $key => $val)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$val['time_in']}}</td>
                                    <td>{{$val['time_out']}}</td>
                                    <td>{{$val['date']}}</td>
                                    <td>{{$val['day']}}</td>
                                    <td>{{isset($val['difference']) ? $val['difference'] : ''}}</td>
                                </tr>
                            @empty

                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

            </div><!-- /.container-fluid -->
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
            $('#reservation').datepicker()
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

        $("#example1").DataTable();
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
        });

        //$('#time_out').css("display", "none");

        $('#time_in').click(function () {
            var status = "time_in";
            $.ajax({
                url: '{{route('users.time_log')}}',
                type: 'post',
                // headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                data: {
                    "_token": "{{ csrf_token() }}",
                    "data": status
                },
                success: function (res) {
                    console.log(res);
                    toastr.success("Successfully time in.", "Time Log!");
                    $('#time_in').css("display", "none");
                    $('#time_out').css("display", "inline-block");

                }
            });

        });

        $('#time_out').click(function () {
            var status = "time_out";

            $.ajax({
                url: '{{route('users.time_log')}}',
                type: 'post',
                // headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                data: {
                    "_token": "{{ csrf_token() }}",
                    "data": status
                },
                success: function (res) {
                    console.log(res);
                    toastr.error("Successfully time out.", "Time Log!");
                    $('#time_out').css("display", "none");
                    $('#time_in').css("display", "inline-block");
                }
            });
            // $('#time_in').show();
            //$('#time_out').hide();
        });
        $(document).keypress(
            function(event){
                if (event.which == '13') {
                    event.preventDefault();
                }
            });
    </script>
@endsection
