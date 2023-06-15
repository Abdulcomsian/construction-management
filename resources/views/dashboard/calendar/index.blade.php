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
            if (event.target.matches('#checker-filter, #designer-filter')) {
                applyFilter();
            }
        });
    
        function applyFilter() {
            var checkerId = document.getElementById('checker-filter').value;
            var designerId = document.getElementById('designer-filter').value;
            var url = '{{ route("calendar") }}?checker_id=' + checkerId + '&designer_id=' + designerId;
            window.location.href = url;
        }
    </script>    
@endsection

@section('content')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <div class="form-control">
            <div class="row mb-4">
                <div class="col-md-6">
                    <label for="checker-filter">Filter by Checker:</label>
                    <select id="checker-filter" name="checker_id">
                        <option value="">All Checkers</option>
                        <!-- Loop through checker options -->
                        @foreach ($users as $user)
                            @if($user->hasAnyRole(['Design Checker', 'Designer and Design Checker']))
                                <option value="{{ $user->id }}" @if(request('checker_id') == $user->id) selected @endif>{{ $user->name }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="designer-filter">Filter by Designer:</label>
                    <select id="designer-filter" name="designer_id">
                        <option value="">All Designers</option>
                        <!-- Loop through designer options -->
                        @foreach ($users as $user)
                            @if($user->hasAnyRole(['designer', 'Designer and Design Checker']))
                                <option value="{{ $user->id }}" @if(request('designer_id') == $user->id) selected @endif>{{ $user->name }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>                
            </div>
            <div id="calendar"></div>
        </div>
    </div>
@endsection