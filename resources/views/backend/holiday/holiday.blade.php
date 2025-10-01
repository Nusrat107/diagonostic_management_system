@extends('backend.master')

@section('content')
<div class="main-wrapper">
    <div class="page-wrapper">
        <div class="content">

            <div class="row">
                <div class="col-sm-5 col-5">
                    <h4 class="page-title">Holidays</h4>
                </div>
                <div class="col-sm-7 col-7 text-right m-b-30">
                    <a href="{{ url('/admin/holiday-add') }}" class="btn btn-primary btn-rounded">
                        <i class="fa fa-plus"></i> Add Holiday
                    </a>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-striped custom-table mb-0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Title</th>
                                    <th>Holiday Date</th>
                                    <th>Day</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($holidays as $holiday)
                                <tr class="{{ \Carbon\Carbon::parse($holiday->holiday_date)->isPast() ? 'holiday-completed' : 'holiday-upcoming' }}">
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $holiday->holiday_name }}</td>
                                    <td>{{ \Carbon\Carbon::parse($holiday->holiday_date)->format('d M Y') }}</td>
                                    <td>{{ \Carbon\Carbon::parse($holiday->holiday_date)->format('l') }}</td>
                                     <td class="text-center">
                                        <a href="{{ url('/admin/holiday-view/' .  $holiday->id) }}" class="btn btn-info btn-sm mb-1" title="View">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                        <a href="{{ url('/admin/holiday-edit/' .  $holiday->id) }}" class="btn btn-warning btn-sm mb-1" title="Edit">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <a href="{{ url('/admin/holiday-delete/' .  $holiday->id) }}" class="btn btn-danger btn-sm mb-1" 
                                           onclick="return confirm('Are you sure you want to delete this schedule?')" title="Delete">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                                @if($holidays->isEmpty())
                                <tr>
                                    <td colspan="5" class="text-center">No Holidays Found</td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<div class="sidebar-overlay" data-reff=""></div>
@endsection
