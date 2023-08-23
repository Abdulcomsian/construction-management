
<script src="{{ asset('assets/plugins/global/plugins.bundle.js') }}"></script>
<script src="{{ asset('assets/js/scripts.bundle.js') }}"></script>
<script src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
<script src="{{ asset('assets/js/custom/widgets.js') }}"></script>
<script src="{{ asset('assets/js/custom/modals/create-app.js') }}"></script>
<script src="{{ asset('assets/js/custom/modals/upgrade-plan.js') }}"></script>
<script src="{{ asset('css/jquery.validate.js') }}"></script>
@yield('multiselectscripts')

<script>
    function sendMarkRequest(id = null) {
        return $.ajax("{{ route('company.markNotification') }}", {
            method: 'POST',
            data: {
                "_token": "{{ csrf_token() }}",
                id
            }
        });
    }
    $(function() {
        $('.mark-as-read').click(function(e) {
            e.preventDefault();
            let request = sendMarkRequest($(this).data('id'));
            request.done(() => {
                alert("Nofication marked as read successfully");
                $(this).parents('div.notification-list').remove();
                let count=parseInt($(".unread-notification").text());
                count=count-1;
                $(".unread-notification").text(count);
                if(count==0)
                {
                    $(".fa-bell").removeClass('redBgBlink');
                }
            });
        });
        $('#mark-all').click(function() {
            let request = sendMarkRequest();
            request.done(() => {
                alert("All nofication marked as read successfully");
                $('div.notification-list').remove();
                $(".badge .unread-notification").text(0);
                $(".fa-bell").removeClass('redBgBlink');
                $(this).hide();
            })
        });
    });
    </script>


