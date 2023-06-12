@extends('layouts.dashboard.master', ['title' => 'Users'])

@section('scripts')
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js'></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                events: @json($events), // Pass the events data to the calendar
                eventRender: function(info) {
                    console.log(info)
                    // Display text on specific dates
                    if (info.event.start === '2023-06-10') {
                        info.el.querySelector('.fc-content').textContent = 'Special Event!';
                    }
                }
            });
            calendar.render();
        });
    </script>
@endsection

@section('content')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="form-control">
            <div id="calendar"></div>
        </div>
    </div>
@endsection
