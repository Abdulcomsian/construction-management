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
    
        document.addEventListener('change', function(event) {
            if (event.target.matches('#user-filter')) {
                applyFilter();
            }
        });
    
        function applyFilter() {
            var userId = document.getElementById('user-filter').value;
            var url = '{{ route("calendar") }}?';

            // Build the URL based on the selected parameter
            if (userId) {
                url += 'user_id=' + userId;
            }

            window.location.href = url;
        }
    </script>    
@endsection

@section('content')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="form-control"> 
            <div class="row mb-4">
                <div class="col-md-6">
                    <label for="user-filter">Filter by User:</label>
                    <select id="user-filter" name="user_id">
                        <option value="all" @if($selectedUserId == 'all') selected @endif>All Users</option>
                        <!-- Loop through user options -->
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}" @if($selectedUserId == $user->id) selected @endif>{{ $user->name }}</option>
                        @endforeach
                    </select>
                </div>              
            </div>            
            <div id="calendar"></div>
        </div>
    </div>
@endsection
