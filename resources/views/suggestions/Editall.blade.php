@extends('layouts.backend.app')
@section('section')


    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Edit Suggestions</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Edit Suggestions</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-8">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Edit Suggestions</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form role="form" method="post" action="{{route('suggestions.EditAll',['id' => $suggestion->id])}}">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Suggestion Title</label>
                                        <input type="text" value="{{$suggestion->title}}" class="form-control" name="suggestion_title" placeholder="Enter Suggestion Title."/>
                                    </div>
                                    @error('suggestion_title')
                                    <span class="invalid-feedback d-block"
                                          role="alert"> <strong>{{ $message }}</strong> </span>
                                    @enderror
                                    <div class="form-group">
                                        <label>Suggestion Description</label>
                                        <textarea  class="form-control" name="suggestion_description" rows="4" placeholder="Enter Suggestion Description.">{{$suggestion->description}}</textarea>
                                    </div>
                                    @error('suggestion_description')
                                    <span class="invalid-feedback d-block"
                                          role="alert"> <strong>{{ $message }}</strong> </span>
                                    @enderror
                                    <div class="form-group">
                                        <label>Status</label>
                                        <select class="form-control select2" name="suggestion_status" style="width: 100%;">
                                            <option value="Approved" {{ ( !empty($suggestion->status) && $suggestion->status == "Approved"  ) ? "selected" : '' }} >Approved</option>
                                            <option value="Pending" {{ ( !empty($suggestion->status) && $suggestion->status == "Pending"  ) ? "selected" : '' }} >Pending</option>
                                            <option value="Reject" {{ ( !empty($suggestion->status) && $suggestion->status == "Reject"  ) ? "selected" : '' }} >Reject</option>
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
            $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
            //Datemask2 mm/dd/yyyy
            $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
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
                    ranges   : {
                        'Today'       : [moment(), moment()],
                        'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                        'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
                        'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                        'This Month'  : [moment().startOf('month'), moment().endOf('month')],
                        'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                    },
                    startDate: moment().subtract(29, 'days'),
                    endDate  : moment()
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

            $('.my-colorpicker2').on('colorpickerChange', function(event) {
                $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
            });

            $("input[data-bootstrap-switch]").each(function(){
                $(this).bootstrapSwitch('state', $(this).prop('checked'));
            });

        })
    </script>

@endsection
