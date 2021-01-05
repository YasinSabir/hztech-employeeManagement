@extends('layouts.backend.app')
@section('section')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Profile</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">User Personal Information</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3">
                    </div>
                    <!-- /.col -->
                    <div class="col-md-12">
                        <div class="card card-primary card-outline">
                            <div class="card-body box-profile">
                                <div class="text-center">
                                    <img class="profile-user-img img-fluid img-circle"
                                         src="{{asset(getUser_image(auth()->id()))}}"
                                         alt="User profile picture" id="profile-img">
                                </div>
                                <h3 class="profile-username text-center">{{$user->fullname}}</h3>
                                <p class="text-muted text-center">{{$user->designation}}</p>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <div class="card">
                            <div class="card-header p-2">
                                <ul class="nav nav-pills">
                                    <h3>User Personal Information</h3>
                                </ul>
                            </div><!-- /.card-header -->
                            <div class="card-body">
                                <div class="tab-content">
                                    <div class="active tab-pane" id="activity">
                                        <div class="tab-pane" id="settings">
                                            <form class="form-horizontal" method="post"
                                                  action="{{route('users.profile')}}" enctype="multipart/form-data">
                                                @csrf
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label for="inputName" class="col-sm-6 col-form-label">First
                                                            Name</label>
                                                        <div class="form-group row mb-0">
                                                            <div class="col-sm-10">
                                                                <input type="text"
                                                                       class="form-control  "
                                                                       id="inputName"
                                                                       value="{{$user->first_name}}"
                                                                       placeholder="First Name" name="firstname">
                                                            </div>
                                                        </div>
                                                        @error('firstname')
                                                        <span class="invalid-feedback d-block" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror()
                                                        <label for="inputName" class="col-sm-6 col-form-label">Full
                                                            Name</label>
                                                        <div class="form-group row mb-0">
                                                            <div class="col-sm-10">
                                                                <input type="text" class="form-control" id="inputName"
                                                                       value="{{$user->fullname}}"
                                                                       placeholder=" FullName" name="fullname">
                                                            </div>
                                                        </div>
                                                        @error('fullname')
                                                        <span class="invalid-feedback d-block" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror()
                                                        <label for="inputName" class="col-sm-6 col-form-label">City</label>
                                                        <div class="form-group row mb-0">
                                                            <div class="col-sm-10">
                                                                <input type="text" class="form-control" id="inputName"
                                                                       value="{{$user->city}}"
                                                                       placeholder=" City" name="city">
                                                            </div>
                                                        </div>
                                                        @error('city')
                                                        <span class="invalid-feedback d-block" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror()
                                                        <label for="inputExperience" class="col-sm-6 col-form-label">Address</label>
                                                        <div class="form-group row mb-0">
                                                            <div class="col-sm-10">
                                                                <textarea class="form-control" id="inputExperience"
                                                                          placeholder="Address"
                                                                          name="address">{{$user->address}}
                                                                </textarea>
                                                            </div>
                                                        </div>
                                                        @error('address')
                                                        <span class="invalid-feedback d-block" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror()
                                                        <label for="inputExperience" class="col-sm-6 col-form-label">Marital Status</label>
                                                        <div class="form-group row mb-0">
                                                            <div class="col-sm-10">
                                                                <select class="form-control select2" name="marital_status" style="width: 100%;">
                                                                    <option value="Married" {{ ( !empty($user->status) && $user->status == "Active"  ) ? "selected" : '' }} >Married</option>
                                                                    <option value="Single" {{ ( !empty($user->status) && $user->status == "Pending"  ) ? "selected" : '' }} >Single</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        @error('marital_status')
                                                        <span class="invalid-feedback d-block" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror()
                                                        <label for="inputName" class="col-sm-6 col-form-label">Alternate Phone number</label>
                                                        <div class="form-group row mb-0">
                                                            <div class="col-sm-10">
                                                                <input type="text" class="form-control" id="inputName"
                                                                       value="{{$user->alphone}}"
                                                                       placeholder="Alternate phone" name="alphone">
                                                            </div>
                                                        </div>
                                                        @error('alphone')
                                                        <span class="invalid-feedback d-block" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror()
                                                        <label for="inputName2" class="col-sm-6 col-form-label">Zip Code</label>
                                                        <div class="form-group row mb-0">
                                                            <div class="col-sm-10">
                                                                <input type="tel" class="form-control" id="inputName2"
                                                                       value="{{$user->zipcode}}"
                                                                       placeholder="Zip Code" name="userzipcode">
                                                            </div>
                                                        </div>
                                                        @error('zipcode')
                                                        <span class="invalid-feedback d-block" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror()
                                                        <label for="inputSkills" class="col-sm-6 col-form-label">Profile
                                                            Picture</label>
                                                        <div class="form-group row mb-0">
                                                            <div class="col-sm-10">
                                                                <div class="custom-file">
                                                                    <input type="file" name="picture"
                                                                           class="custom-file-input"
                                                                           id="exampleInputFile">
                                                                    <label class="custom-file-label"
                                                                           for="exampleInputFile">Choose file</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        @error('picture')
                                                        <span class="invalid-feedback d-block" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror()
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="inputName" class="col-sm-6 col-form-label">Last
                                                            Name</label>
                                                        <div class="form-group row mb-0">
                                                            <div class="col-sm-10">
                                                                <input type="text" class="form-control" id="inputName"
                                                                       value="{{$user->last_name}}"
                                                                       placeholder="Last Name" name="lastname">
                                                            </div>
                                                        </div>
                                                        @error('lastname')
                                                        <span class="invalid-feedback d-block" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror()
                                                        <label for="inputEmail"
                                                               class="col-sm-6 col-form-label">Designation</label>
                                                        <div class="form-group row mb-0">
                                                            <div class="col-sm-10">
                                                                <input type="text" class="form-control" id="inputEmail"
                                                                       value="{{$user->designation}}"
                                                                       placeholder="Designation"
                                                                       name="designation">
                                                            </div>
                                                        </div>
                                                        @error('designation')
                                                        <span class="invalid-feedback d-block" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror()
                                                        <label for="inputName" class="col-sm-6 col-form-label">State</label>
                                                        <div class="form-group row mb-0">
                                                            <div class="col-sm-10">
                                                                <input type="text" class="form-control" id="inputName"
                                                                       value="{{$user->state}}"
                                                                       placeholder=" State" name="state">
                                                            </div>
                                                        </div>
                                                        @error('state')
                                                        <span class="invalid-feedback d-block" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror()
                                                        <label for="inputName" class="col-sm-6 col-form-label">Nic</label>
                                                        <div class="form-group row mb-0">
                                                            <div class="col-sm-10">
                                                                <input type="text" class="form-control" id="inputName"
                                                                       value="{{$user->nic}}"
                                                                       placeholder="NIC" name="nic">
                                                            </div>
                                                        </div>
                                                        @error('nic')
                                                        <span class="invalid-feedback d-block" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror()
                                                        <label for="inputEmail"
                                                               class="col-sm-6 col-form-label">Email</label>
                                                        <div class="form-group row mb-0">
                                                            <div class="col-sm-10">
                                                                <input type="email" class="form-control" id="inputEmail"
                                                                       value="{{$user->email}}" placeholder="Email"
                                                                       name="email" disabled>
                                                            </div>
                                                        </div>
                                                        @error('email')
                                                        <span class="invalid-feedback d-block" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror()
                                                        <label for="inputName2" class="col-sm-6 col-form-label">Phone
                                                            number</label>
                                                        <div class="form-group row mb-0">
                                                            <div class="col-sm-10">
                                                                <input type="tel" class="form-control" id="inputName2"
                                                                       value="{{$user->phone_number}}"
                                                                       placeholder="Phone Number" name="phonenumber">
                                                            </div>
                                                        </div>
                                                        @error('phonenumber')
                                                        <span class="invalid-feedback d-block" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror()
                                                        <label for="inputName2" class="col-sm-6 col-form-label">Date of birth</label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend" >
                                                                <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                                            </div>
                                                            <input type="text" class="form-control col-md-9" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask>
                                                        </div>
                                                        <label for="inputName2" class="col-sm-6 col-form-label">User
                                                            Role</label>
                                                        <div class="form-group row ">
                                                            <div class="col-sm-10">
                                                                <input type="text" class="form-control" id="inputName2"
                                                                       value="{{get_role(18)}}"
                                                                       placeholder="" disabled>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-header p-2">
                                                    <ul class="nav nav-pills">
                                                        <h3>Emergency Contact Information</h3>
                                                    </ul>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label for="inputName" class="col-sm-6 col-form-label">First
                                                            Name</label>
                                                        <div class="form-group row mb-0">
                                                            <div class="col-sm-10">
                                                                <input type="text"
                                                                       class="form-control  "
                                                                       id="inputName"
                                                                       value=""
                                                                       placeholder="First Name" name="emerfirstname">
                                                            </div>
                                                        </div>
                                                        @error('firstname')
                                                        <span class="invalid-feedback d-block" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror()
                                                        <label for="inputName" class="col-sm-6 col-form-label">Full
                                                            Name</label>
                                                        <div class="form-group row mb-0">
                                                            <div class="col-sm-10">
                                                                <input type="text" class="form-control" id="inputName"
                                                                       value=""
                                                                       placeholder=" FullName" name="emerfullname">
                                                            </div>
                                                        </div>
                                                        @error('emerfullname')
                                                        <span class="invalid-feedback d-block" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror()
                                                        <label for="inputName" class="col-sm-6 col-form-label">City</label>
                                                        <div class="form-group row mb-0">
                                                            <div class="col-sm-10">
                                                                <input type="text" class="form-control" id="inputName"
                                                                       value=""
                                                                       placeholder=" City" name="emercity">
                                                            </div>
                                                        </div>
                                                        @error('emercity')
                                                        <span class="invalid-feedback d-block" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror()
                                                        <label for="inputExperience" class="col-sm-6 col-form-label">Address</label>
                                                        <div class="form-group row mb-0">
                                                            <div class="col-sm-10">
                                                                <textarea class="form-control" id="inputExperience"
                                                                          placeholder="Address"
                                                                          name="emeraddress">
                                                                </textarea>
                                                            </div>
                                                        </div>
                                                        @error('emeraddress')
                                                        <span class="invalid-feedback d-block" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror()
                                                        <label for="inputName" class="col-sm-6 col-form-label">Alternate Phone number</label>
                                                        <div class="form-group row mb-0">
                                                            <div class="col-sm-10">
                                                                <input type="text" class="form-control" id="inputName"
                                                                       value=""
                                                                       placeholder="Alternate phone" name="emeralphone">
                                                            </div>
                                                        </div>
                                                        @error('emeralphone')
                                                        <span class="invalid-feedback d-block" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror()

                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="inputName" class="col-sm-6 col-form-label">Last
                                                            Name</label>
                                                        <div class="form-group row mb-0">
                                                            <div class="col-sm-10">
                                                                <input type="text" class="form-control" id="inputName"
                                                                       value=""
                                                                       placeholder="Last Name" name="emerlastname">
                                                            </div>
                                                        </div>
                                                        @error('emerlastname')
                                                        <span class="invalid-feedback d-block" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror()
                                                        <label for="inputEmail"
                                                               class="col-sm-6 col-form-label">Relationship</label>
                                                        <div class="form-group row mb-0">
                                                            <div class="col-sm-10">
                                                                <input type="text" class="form-control" id="inputEmail"
                                                                       value=""
                                                                       placeholder="Relationship"
                                                                       name="emerrelationship">
                                                            </div>
                                                        </div>
                                                        @error('emerrelationship')
                                                        <span class="invalid-feedback d-block" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror()
                                                        <label for="inputName" class="col-sm-6 col-form-label">State</label>
                                                        <div class="form-group row mb-0">
                                                            <div class="col-sm-10">
                                                                <input type="text" class="form-control" id="inputName"
                                                                       value=""
                                                                       placeholder=" State" name="emerstate">
                                                            </div>
                                                        </div>
                                                        @error('emerstate')
                                                        <span class="invalid-feedback d-block" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror()

                                                        <label for="inputName2" class="col-sm-6 col-form-label">Phone
                                                            number</label>
                                                        <div class="form-group row mb-0">
                                                            <div class="col-sm-10">
                                                                <input type="tel" class="form-control" id="inputName2"
                                                                       value=""
                                                                       placeholder="Phone Number" name="emerphonenumber">
                                                            </div>
                                                        </div>
                                                        @error('emerphonenumber')
                                                        <span class="invalid-feedback d-block" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror()
                                                        <label for="inputName2" class="col-sm-6 col-form-label">Zip Code</label>
                                                        <div class="form-group row mb-0">
                                                            <div class="col-sm-10">
                                                                <input type="tel" class="form-control" id="inputName2"
                                                                       value=""
                                                                       placeholder="Zip Code" name="emerzipcode">
                                                            </div>
                                                        </div>
                                                        @error('emerzipcode')
                                                        <span class="invalid-feedback d-block" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror()
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group row">
                                                            <div class="offset-sm-2 col-sm-10 mt-4">
                                                                <button type="submit" class="btn btn-danger">Submit
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <!-- /.tab-pane -->
                                </div>
                                <!-- /.tab-content -->
                            </div><!-- /.card-body -->
                        </div>
                        <!-- /.nav-tabs-custom -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
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
            bsCustomFileInput.init();


            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        $('#profile-img').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(input.files[0]);
                }
            }

            $("#exampleInputFile").change(function () {
                readURL(this);
                console.log(readURL(this));
            });
        })
    </script>

@endsection
