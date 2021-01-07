@extends('layouts.backend.app')
@section('section')


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
                        </ol>
                    </div>
                </div>

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
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Time In</th>
                                <th>Time Out</th>
                                <th>Date</th>
                                <th>Day</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($records as $key => $val)

                                <tr>
                                    <td>{{$val['time_in']}}</td>
                                        <td>{{$val['time_out']}}</td>
                                        <td>{{$val['date']}}</td>
                                        <td>{{$today}}</td>
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


    </script>
@endsection
