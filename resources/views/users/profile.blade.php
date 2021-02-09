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
                                <ul class="nav nav-pills pl-2 pt-2">
                                    <h4>User Personal Information</h4>
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
                                                                       class="form-control"
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
                                                        <label for="inputName"
                                                               class="col-sm-6 col-form-label">City</label>
                                                        <div class="form-group row mb-0">
                                                            <div class="col-sm-10">
                                                                <input type="text" class="form-control" id="inputName"
                                                                       value="{{get_user_meta(auth()->id(),'city')}}"
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
                                                        <label for="inputExperience" class="col-sm-6 col-form-label">Marital
                                                            Status</label>
                                                        <div class="form-group row mb-0">
                                                            <div class="col-sm-10">
                                                                <select class="form-control select2"
                                                                        name="marital_status" style="width: 100%;">
                                                                    <option
                                                                        value="Married" {{ ( !empty($user->status) && $user->status == "Active"  ) ? "selected" : '' }} >
                                                                        Married
                                                                    </option>
                                                                    <option
                                                                        value="Single" {{ ( !empty($user->status) && $user->status == "Pending"  ) ? "selected" : '' }} >
                                                                        Single
                                                                    </option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        @error('marital_status')
                                                        <span class="invalid-feedback d-block" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror()
                                                        <label for="inputName" class="col-sm-6 col-form-label">Alternate
                                                            Phone number</label>
                                                        <div class="form-group row mb-0">
                                                            <div class="col-sm-10">
                                                                <input type="text" class="form-control" id="inputName"
                                                                       value="{{get_user_meta(auth()->id(),'alt_phone')}}"
                                                                       placeholder="Alternate phone" name="alt_phone">
                                                            </div>
                                                        </div>
                                                        @error('alphone')
                                                        <span class="invalid-feedback d-block" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror()
                                                        <label for="inputName2" class="col-sm-6 col-form-label">Zip
                                                            Code</label>
                                                        <div class="form-group row mb-0">
                                                            <div class="col-sm-10">
                                                                <input type="number" class="form-control" id="inputName2"
                                                                       value="{{get_user_meta(auth()->id(),'zipcode')}}"
                                                                       placeholder="Zip Code" name="zipcode">
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
                                                        <label for="inputName"
                                                               class="col-sm-6 col-form-label">Designation</label>
                                                        <div class="form-group row mb-0">
                                                            <div class="col-sm-10">
                                                                <input type="text" class="form-control" id="inputName"
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
                                                        <label for="inputName"
                                                               class="col-sm-6 col-form-label">State</label>
                                                        <div class="form-group row mb-0">
                                                            <div class="col-sm-10">
                                                                <input type="text" class="form-control" id="inputName"
                                                                       value="{{get_user_meta(auth()->id(),'state')}}"
                                                                       placeholder=" State" name="state">
                                                            </div>
                                                        </div>
                                                        @error('state')
                                                        <span class="invalid-feedback d-block" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror()
                                                        <label for="inputName"
                                                               class="col-sm-6 col-form-label">Nic</label>
                                                        <div class="form-group row mb-0">
                                                            <div class="col-sm-10">
                                                                <input type="text" class="form-control" id="inputName"
                                                                       value="{{get_user_meta(auth()->id(),'cnic')}}"
                                                                       placeholder="NIC" name="cnic">
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
                                                        <label for="inputName2" class="col-sm-6 col-form-label">Date of
                                                            birth</label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text"><i
                                                                        class="far fa-calendar-alt"></i></span>
                                                            </div>
                                                            <input type="date" class="form-control col-md-9"
                                                                   name="dob" value="{{get_user_meta(auth()->id(),'dob')}}"/>
                                                        </div>
{{--                                                        <div class="input-group col-sm-10">--}}
{{--                                                            <input type="date" class="form-control"--}}
{{--                                                                   name="dob" value="{{get_user_meta(auth()->id(),'dob')}}"/>--}}
{{--                                                        </div>--}}
                                                        <label for="inputName2" class="col-sm-6 col-form-label">User
                                                            Role</label>
                                                        <div class="form-group row ">
                                                            <div class="col-sm-10">
                                                                <input type="text" class="form-control" id="inputName2"
                                                                       value="{{get_role(auth()->id())}}"
                                                                       placeholder="" disabled>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="card-header p-2 mb-4">
                                                    <ul class="nav nav-pills pl-1 pt-5">
                                                        <h4>Emergency Contact Information</h4>
                                                    </ul>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label for="inputName" class="col-sm-6 col-form-label">First
                                                            Name</label>
                                                        <div class="form-group row mb-0">
                                                            <div class="col-sm-10">
                                                                <input type="text"
                                                                       class="form-control"
                                                                       id="em_first_name"
                                                                       value="{{get_user_meta(auth()->id(),'em_first_name')}}"
                                                                       placeholder="First Name" name="em_first_name">
                                                            </div>
                                                        </div>
                                                        @error('em_first_name')
                                                            <span class="invalid-feedback d-block" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror

                                                        <label for="inputName" class="col-sm-6 col-form-label">Full
                                                            Name</label>
                                                        <div class="form-group row mb-0">
                                                            <div class="col-sm-10">
                                                                <input type="text" class="form-control" id="em_full_name"
                                                                       value="{{get_user_meta(auth()->id(),'em_full_name')}}"
                                                                       placeholder=" FullName" name="em_full_name">
                                                            </div>
                                                        </div>
                                                        @error('em_full_name')
                                                            <span class="invalid-feedback d-block" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror

                                                        <label for="inputName"
                                                               class="col-sm-6 col-form-label">City</label>
                                                        <div class="form-group row mb-0">
                                                            <div class="col-sm-10">
                                                                <input type="text" class="form-control" id="em_city"
                                                                       value="{{get_user_meta(auth()->id(),'em_city')}}"
                                                                       placeholder="City" name="em_city">
                                                            </div>
                                                        </div>
                                                        @error('em_city')
                                                            <span class="invalid-feedback d-block" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror


                                                        <label for="inputExperience" class="col-sm-6 col-form-label">Address</label>
                                                        <div class="form-group row mb-0">
                                                            <div class="col-sm-10">
                                                                <textarea class="form-control" id="inputExperience"
                                                                          placeholder="Address"
                                                                          name="em_address">{{get_user_meta(auth()->id(),'em_address')}}
                                                                </textarea>
                                                            </div>
                                                        </div>
                                                        @error('emeraddress')
                                                            <span class="invalid-feedback d-block" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror

                                                        <label for="inputName" class="col-sm-6 col-form-label">Alternate
                                                            Phone number</label>
                                                        <div class="form-group row mb-0">
                                                            <div class="col-sm-10">
                                                                <input type="text" class="form-control" id="em_al_phone"
                                                                       value="{{get_user_meta(auth()->id(),'em_al_phone')}}"
                                                                       placeholder="Alternate phone" name="em_al_phone">
                                                            </div>
                                                        </div>
                                                        @error('em_al_phone')
                                                            <span class="invalid-feedback d-block" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror

                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="inputName" class="col-sm-6 col-form-label">Last
                                                            Name</label>
                                                        <div class="form-group row mb-0">
                                                            <div class="col-sm-10">
                                                                <input type="text" class="form-control" id="em_last_name"
                                                                       value="{{get_user_meta(auth()->id(),'em_last_name')}}"
                                                                       placeholder="Last Name" name="em_last_name">
                                                            </div>
                                                        </div>
                                                        @error('em_last_name')
                                                            <span class="invalid-feedback d-block" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror

                                                        <label for="inputName"
                                                               class="col-sm-6 col-form-label">Relationship</label>
                                                        <div class="form-group row mb-0">
                                                            <div class="col-sm-10">
                                                                <input type="text" class="form-control" id="em_relationship"
                                                                       value="{{get_user_meta(auth()->id(),'em_relationship')}}"
                                                                       placeholder="Relationship"
                                                                       name="em_relationship">
                                                            </div>
                                                        </div>
                                                        @error('em_relationship')
                                                            <span class="invalid-feedback d-block" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror

                                                        <label for="inputName"
                                                               class="col-sm-6 col-form-label">State</label>
                                                        <div class="form-group row mb-0">
                                                            <div class="col-sm-10">
                                                                <input type="text" class="form-control" id="em_state"
                                                                       value="{{get_user_meta(auth()->id(),'em_state')}}"
                                                                       placeholder=" State" name="em_state">
                                                            </div>
                                                        </div>
                                                        @error('em_state')
                                                            <span class="invalid-feedback d-block" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror

                                                        <label for="inputName2" class="col-sm-6 col-form-label">Phone
                                                            number</label>
                                                        <div class="form-group row mb-0">
                                                            <div class="col-sm-10">
                                                                <input type="tel" class="form-control" id="em_phone_number"
                                                                       value="{{get_user_meta(auth()->id(),'em_phone_number')}}"
                                                                       placeholder="Phone Number"
                                                                       name="em_phone_number" >
                                                            </div>
                                                        </div>
                                                        @error('em_phone_number')
                                                            <span class="invalid-feedback d-block" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror

                                                        <label for="inputName2" class="col-sm-6 col-form-label">Zip
                                                            Code</label>
                                                        <div class="form-group row mb-0">
                                                            <div class="col-sm-10">
                                                                <input type="number" class="form-control" id="em_zipcode" value="{{get_user_meta(auth()->id(),'em_zipcode')}}" placeholder="Zip Code" name="em_zipcode">
                                                            </div>
                                                        </div>
                                                        @error('em_zipcode')
                                                            <span class="invalid-feedback d-block" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror

                                                    </div>
                                                </div>
                                                <?php if(check_role_previliges('Edit','edit profile'))
                                                { ?>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <button type="submit" class="btn btn-danger mt-3">Submit</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php } ?>
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
