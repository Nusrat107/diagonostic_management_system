@extends('backend.master')

@section('content')
    <div class="main-wrapper">
        <div class="page-wrapper">
            <div class="content">

                <!-- Page header -->
                <div class="row">
                    <div class="col-sm-4 col-3">
                        <h4 class="page-title">Schedule</h4>
                    </div>
                    <div class="col-sm-8 col-9 text-right m-b-20">
                        <a href="{{ url('/admin/doctorshedule-add') }}" class="btn btn-primary btn-rounded float-right">
                            <i class="fa fa-plus"></i> Add Schedule
                        </a>
                    </div>
                </div>

                <!-- Schedule Table -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table table-border table-striped custom-table mb-0">
                                <thead>
                                    <tr>
                                        <th>Doctor Name</th>
                                        <th>Department</th>
                                        <th>Available Days</th>
                                        <th>Available Time</th>
                                        <th>Status</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($schedules as $schedule)
                                        <tr>
                                            <td>
                                                <img width="28" height="28" src="{{ asset('backend/images/doctor/'.$schedule->doctor->image) }}" class="rounded-circle m-r-5" alt="">
                                                {{ $schedule->doctor->username }}
                                            </td>
                                            <td>{{ $schedule->doctor->profession ?? 'N/A' }}</td>
                                            <td>{{ $schedule->day }}</td>
                                            <td>{{ \Carbon\Carbon::parse($schedule->start_time)->format('h:i A') }} -
                                                {{ \Carbon\Carbon::parse($schedule->end_time)->format('h:i A') }}</td>
                                            <td>
                                                @if (strtolower($schedule->status) == 'active')
                                                    <span class="custom-badge status-green">Active</span>
                                                @else
                                                    <span class="custom-badge status-red">Inactive</span>
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                <a href="{{ url('/admin/doctorshedule-view/'.$schedule->id) }}"
                                                    class="btn btn-info btn-sm mb-1" title="View">
                                                    <i class="fa fa-eye"></i>
                                                </a>
                                                <a href="{{ url('/admin/doctorshedule-edit/'.$schedule->id) }}"
                                                    class="btn btn-warning btn-sm mb-1" title="Edit">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <a href="{{ url('/admin/doctorshedule-delete/'.$schedule->id) }}"
                                                    class="btn btn-danger btn-sm mb-1"
                                                    onclick="return confirm('Are you sure you want to delete this schedule?')" title="Delete">
                                                    <i class="fa fa-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6" class="text-center">No schedules found</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Delete Modal -->
    <div id="delete_schedule" class="modal fade delete-modal" role="dialog">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <img src="{{ asset('backend/assets/img/sent.png') }}" alt="" width="50" height="46">
                    <h3>Are you sure want to delete this Schedule?</h3>
                    <div class="m-t-20">
                        <a href="#" class="btn btn-white" data-dismiss="modal">Close</a>
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="sidebar-overlay" data-reff=""></div>
@endsection

@push('script')
    <script>
document.addEventListener('DOMContentLoaded', function() {
    const rows = document.querySelectorAll('table tbody tr');

    function updateScheduleStatus() {
        const now = new Date();

        rows.forEach(row => {
            const id = row.querySelector('.btn-warning').getAttribute('href').split('/').pop();
            const timeText = row.querySelector('td:nth-child(4)').innerText;
            const [startTime, endTime] = timeText.split('-').map(t => t.trim());

            const today = new Date();
            const start = new Date(today.toDateString() + ' ' + startTime);
            const end = new Date(today.toDateString() + ' ' + endTime);

            const statusTd = row.querySelector('td:nth-child(5)');

            if (now >= start && now <= end) {
               
                if (!statusTd.innerText.includes('Active')) {
                    statusTd.innerHTML = '<span class="custom-badge status-green">Active</span>';
                    updateStatusInDB(id, 'active');
                }
            } else if (now > end) {
                
                if (!statusTd.innerText.includes('Inactive')) {
                    statusTd.innerHTML = '<span class="custom-badge status-red">Inactive</span>';
                    updateStatusInDB(id, 'inactive');
                }
            }
        });
    }

    setInterval(updateScheduleStatus, 60000);
    updateScheduleStatus();

    function updateStatusInDB(id, status) {
        fetch(`/admin/doctorshedule-status-update/${id}`, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ status })
        });
    }
});
</script>
@endpush
