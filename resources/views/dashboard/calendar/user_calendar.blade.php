@extends('layouts.dashboard.master', ['title' => 'Users'])
@section('scripts')
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js'></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                events: @json($events), // Pass the events data to the calendar
                eventColor: 'red', // Set a default color for events
                eventRender: function(info) {
                    // Set the color for each event based on the 'color' property
                    info.el.style.backgroundColor = info.event.extendedProps.color || 'red';
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


