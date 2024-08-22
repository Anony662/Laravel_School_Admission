@extends('backend.layouts.master')

@section('title', 'Edit Employee - Admin Panel')

@section('styles')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
<style>
    .form-check-label {
        text-transform: capitalize;
    }
</style>
@endsection

@section('admin-content')

<div class="page-title-area">
    <div class="row align-items-center">
        <div class="col-sm-6">
            <div class="breadcrumbs-area clearfix">
                <h4 class="page-title pull-left">Edit Employee</h4>
                <ul class="breadcrumbs pull-left">
                    <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li><a href="{{ route('admin.employees.index') }}">All Employees</a></li>
                    <li><span>Edit Employee</span></li>
                </ul>
            </div>
        </div>
        <div class="col-sm-6 clearfix">
            @include('backend.layouts.partials.logout')
        </div>
    </div>
</div>

<div class="main-content-inner">
    <div class="row">
        <div class="col-12 mt-5">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">Edit Employee</h4>
                    @include('backend.layouts.partials.messages')

                    <form action="{{ route('admin.employees.update', $employee->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-row">
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="first_name">First Name</label>
                                <input type="text" class="form-control" id="first_name" name="first_name" value="{{ $employee->first_name }}" required>
                            </div>
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="last_name">Last Name</label>
                                <input type="text" class="form-control" id="last_name" name="last_name" value="{{ $employee->last_name }}" required>
                            </div>
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email" value="{{ $employee->email }}" required>
                            </div>
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="phone">Phone</label>
                                <input type="text" class="form-control" id="phone" name="phone" value="{{ $employee->phone }}">
                            </div>
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="address">Address</label>
                                <textarea class="form-control" id="address" name="address" rows="3">{{ $employee->address }}</textarea>
                            </div>
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="emergency_contact_name">Emergency Contact Name</label>
                                <input type="text" class="form-control" id="emergency_contact_name" name="emergency_contact_name" value="{{ $employee->emergency_contact_name }}">
                            </div>
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="emergency_contact_phone">Emergency Contact Phone</label>
                                <input type="text" class="form-control" id="emergency_contact_phone" name="emergency_contact_phone" value="{{ $employee->emergency_contact_phone }}">
                            </div>
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="department">Department</label>
                                <input type="text" class="form-control" id="department" name="department" value="{{ $employee->department }}">
                            </div>
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="job_title">Job Title</label>
                                <input type="text" class="form-control" id="job_title" name="job_title" value="{{ $employee->job_title }}">
                            </div>
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="manager">Manager</label>
                                <input type="text" class="form-control" id="manager" name="manager" value="{{ $employee->manager }}">
                            </div>
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="employment_type">Employment Type</label>
                                <select id="employment_type" name="employment_type" class="form-control">
                                    <option value="Full-Time" {{ $employee->employment_type == 'Full-Time' ? 'selected' : '' }}>Full-Time</option>
                                    <option value="Part-Time" {{ $employee->employment_type == 'Part-Time' ? 'selected' : '' }}>Part-Time</option>
                                    <option value="Contract" {{ $employee->employment_type == 'Contract' ? 'selected' : '' }}>Contract</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="status">Status</label>
                                <select id="status" name="status" class="form-control">
                                    <option value="Active" {{ $employee->status == 'Active' ? 'selected' : '' }}>Active</option>
                                    <option value="On Leave" {{ $employee->status == 'On Leave' ? 'selected' : '' }}>On Leave</option>
                                    <option value="Terminated" {{ $employee->status == 'Terminated' ? 'selected' : '' }}>Terminated</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="start_date">Start Date</label>
                                <input type="date" class="form-control" id="start_date" name="start_date" value="{{ $employee->start_date }}" required>
                            </div>
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="end_date">End Date</label>
                                <input type="date" class="form-control" id="end_date" name="end_date" value="{{ $employee->end_date }}">
                            </div>
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="date_of_birth">Date of Birth</label>
                                <input type="date" class="form-control" id="date_of_birth" name="date_of_birth" value="{{ $employee->date_of_birth }}">
                            </div>
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="gender">Gender</label>
                                <select id="gender" name="gender" class="form-control">
                                    <option value="Male" {{ $employee->gender == 'Male' ? 'selected' : '' }}>Male</option>
                                    <option value="Female" {{ $employee->gender == 'Female' ? 'selected' : '' }}>Female</option>
                                    <option value="Other" {{ $employee->gender == 'Other' ? 'selected' : '' }}>Other</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="nationality">Nationality</label>
                                <input type="text" class="form-control" id="nationality" name="nationality" value="{{ $employee->nationality }}">
                            </div>
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="salary">Salary</label>
                                <input type="number" class="form-control" id="salary" name="salary" step="0.01" value="{{ $employee->salary }}">
                            </div>
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="currency">Currency</label>
                                <input type="text" class="form-control" id="currency" name="currency" value="{{ $employee->currency }}">
                            </div>
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="bank_account_number">Bank Account Number</label>
                                <input type="text" class="form-control" id="bank_account_number" name="bank_account_number" value="{{ $employee->bank_account_number }}">
                            </div>
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="photo">Photo</label>
                                <input type="file" class="form-control" id="photo" name="photo">
                                @if ($employee->photo)
                                    <img src="{{ asset('storage/' . $employee->photo) }}" alt="Employee Photo" width="100">
                                @endif
                            </div>
                            <div class="form-group col-md-12 col-sm-12">
                                <label for="notes">Notes</label>
                                <textarea class="form-control" id="notes" name="notes" rows="3">{{ $employee->notes }}</textarea>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary mt-4">Update Employee</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        $('.select2').select2();
    });
</script>
@endsection
