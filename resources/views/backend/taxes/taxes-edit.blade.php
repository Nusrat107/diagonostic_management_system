@extends('backend.master')

@section('content')
<div class="main-wrapper">
    <div class="page-wrapper">
        <div class="content">
            
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <h4 class="page-title">Edit Tax</h4>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <form action="{{ url('/admin/taxes-update/'.$tax->id) }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Tax Name <span class="text-danger">*</span></label>
                            <input class="form-control" type="text" name="name" value="{{ $tax->name }}" placeholder="Enter tax name" required>
                        </div>

                        <div class="form-group">
                            <label>Tax Percentage (%) <span class="text-danger">*</span></label>
                            <input class="form-control" type="text" name="percentage" value="{{ $tax->percentage }}" placeholder="Enter tax percentage" required>
                        </div>

                        <div class="form-group">
                            <label>Status <span class="text-danger">*</span></label>
                            <select class="form-control" name="status" id="statusSelect" required>
                                <option value="Pending" {{ $tax->status == 'Pending' ? 'selected' : '' }}>Pending</option>
                                <option value="Approved" {{ $tax->status == 'Approved' ? 'selected' : '' }}>Approved</option>
                            </select>
                        </div>

                        <div class="m-t-20 text-center">
                            <button class="btn btn-primary submit-btn">Update Tax</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>

<script>
    const statusSelect = document.getElementById('statusSelect');
    function setStatusColor() {
        statusSelect.style.color = statusSelect.value === 'Approved' ? 'green' : 'red';
    }
    statusSelect.addEventListener('change', setStatusColor);
    setStatusColor();
</script>
@endsection
