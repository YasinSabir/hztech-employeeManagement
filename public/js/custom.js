
$(document).ready(function(){

    $("body").on('click' , '#read_at' , function () {

        var status          = "read";
        var notification_id = $(this).attr("notification");
        var route           = $(this).attr("notificationroute");


        $.ajax({
            url: route,
            type: 'post',
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            data: {
                // "_token": "{{ csrf_token() }}",
                "data": status, "id": notification_id,
            },
            success: function (res) {
                if(res.status == 'notdone')
                {
                    console.log(res);
                    toastr.error("error.", "Unread");
                }
                else
                {
                    console.log(res);
                    toastr.success("Marked as read !.", "Read");
                }

            }
        });



    });


});

