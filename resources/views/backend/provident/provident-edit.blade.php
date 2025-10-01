@extends('backend.master')

@section('content')
<div class="main-wrapper">
    <div class="page-wrapper">
        <div class="content">
            <div class="container">

                <div class="row mb-3">
                    <div class="col-12">
                        <h4 class="page-title">Edit Provident Fund</h4>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <form action="{{ url('/admin/provident-update/'.$provident->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Employee Name <span class="text-danger">*</span></label>
                                        <select class="form-control" name="employee_id" required>
                                            <option value="">Select Employee</option>
                                            @foreach($employees as $emp)
                                                <option value="{{ $emp->id }}" {{ $provident->employee_id == $emp->id ? 'selected' : '' }}>
                                                    {{ $emp->name }} ({{ $emp->employee_code ?? '' }})
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Provident Fund Type <span class="text-danger">*</span></label>
                                        <select class="form-control" name="fund_type" id="fundType" required>
                                            <option value="Fixed Amount" {{ $provident->fund_type == 'Fixed Amount' ? 'selected' : '' }}>Fixed Amount</option>
                                            <option value="Percentage of Basic Salary" {{ $provident->fund_type == 'Percentage of Basic Salary' ? 'selected' : '' }}>Percentage of Basic Salary</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <!-- Fixed Amount Fields -->
                            <div id="fixedAmountFields" style="{{ $provident->fund_type == 'Fixed Amount' ? 'display:block' : 'display:none' }}">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Employee Share (Amount)</label>
                                            <input class="form-control" type="text" name="employee_share_amount" value="{{ $provident->employee_share_amount }}" placeholder="Enter employee share amount">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Organization Share (Amount)</label>
                                            <input class="form-control" type="text" name="organization_share_amount" value="{{ $provident->organization_share_amount }}" placeholder="Enter organization share amount">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Percentage Fields -->
                            <div id="percentageFields" style="{{ $provident->fund_type == 'Percentage of Basic Salary' ? 'display:block' : 'display:none' }}">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Employee Share (%)</label>
                                            <input class="form-control" type="text" name="employee_share_percentage" value="{{ $provident->employee_share_percentage }}" placeholder="Enter employee share %">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Organization Share (%)</label>
                                            <input class="form-control" type="text" name="organization_share_percentage" value="{{ $provident->organization_share_percentage }}" placeholder="Enter organization share %">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Status</label>
                                <select class="form-control" name="status">
                                    <option value="Pending" {{ $provident->status == 'Pending' ? 'selected' : '' }}>Pending</option>
                                    <option value="Approved" {{ $provident->status == 'Approved' ? 'selected' : '' }}>Approved</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Description</label>
                                <textarea class="form-control" name="description" rows="4" placeholder="Enter description">{{ $provident->description }}</textarea>
                            </div>

                            <div class="text-center mt-3">
                                <button type="submit" class="btn btn-primary">Update Provident Fund</button>
                            </div>

                        </form>
                    </div>
                </div>

            </div> 
        </div>
    </div>
</div>

<script>
    const fundTypeSelect = document.getElementById('fundType');
    const fixedFields = document.getElementById('fixedAmountFields');
    const percentageFields = document.getElementById('percentageFields');

    fundTypeSelect.addEventListener('change', function() {
        if (this.value === 'Fixed Amount') {
            fixedFields.style.display = 'block';
            percentageFields.style.display = 'none';
        } else {
            fixedFields.style.display = 'none';
            percentageFields.style.display = 'block';
        }
    });
</script>
@endsection
