<footer class="main-footer">
    <strong> HZTech.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">

    </div>
</footer>

@section('page-script')

    <script>

        $(document).ready(function () {

            $("body").on('click' , '#read_at' , function () {

                var ff = $(this).attr("notification");
                alert(ff);

                {{--var status = "read";--}}
                {{--$.ajax({--}}
                {{--    url: '{{route('users.read_notification')}}',--}}
                {{--    type: 'post',--}}
                {{--    // headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},--}}
                {{--    data: {--}}
                {{--        "_token": "{{ csrf_token() }}",--}}
                {{--        "data": status,--}}
                {{--        "id": 1,--}}
                {{--    },--}}
                {{--    success: function (res) {--}}
                {{--        if(res.status == 'notdone')--}}
                {{--        {--}}
                {{--            console.log(res);--}}
                {{--            toastr.error("error.", "Unread");--}}
                {{--        }--}}
                {{--        else--}}
                {{--        {--}}
                {{--            console.log(res);--}}
                {{--            toastr.success("Marked as read !.", "Read");--}}
                {{--        }--}}

                {{--    }--}}
                {{--});--}}

            });


        });


    </script>

@endsection
