@extends('backend.layouts.master')

@section('title', 'Employee Details - Admin Panel')

@section('styles')
<style>
    /* Keyframes for the moving effect */
    @keyframes moveHeader {
        0% {
            transform: translateX(100%);
            opacity: 0.3; /* Reduced opacity at start */
        }
        50% {
            transform: translateX(-100%);
            opacity: 1; /* Full opacity in the middle */
        }
        100% {
            transform: translateX(100%);
            opacity: 0.3; /* Reduced opacity at end */
        }
    }

    /* Card Styling */
    .card {
        border: none;
        box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
        border-radius: 10px;
        overflow: hidden;
        transition: box-shadow 0.3s ease, transform 0.3s ease;
    }

    .card:hover {
        box-shadow: 0 0 25px rgba(0, 0, 0, 0.3);
        transform: translateY(-5px);
    }

    .card-header {
        background-color: #007bff; /* Blue background */
        color: #fff !important; /* White text color */
        border-bottom: 2px solid #0056b3; /* Darker blue border */
        font-size: 1.5rem;
        font-weight: 600;
        padding: 1rem;
        position: relative;
        overflow: hidden;
        white-space: nowrap; /* Ensure text doesn’t wrap */
    }

    .card-header h4 {
        margin: 0;
        /* Very slow animation */
        animation: moveHeader 30s linear infinite; /* Slower duration */
        color: #fff !important; /* Ensure text color is white */
    }

    /* Profile Picture Styling */
    .employee-photo {
        position: relative;
        display: inline-block;
        border-radius: 50%;
        overflow: hidden;
        border: 5px solid #ddd;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .employee-photo img {
        display: block;
        width: 150px;
        height: 150px;
        object-fit: cover;
        transition: transform 0.3s ease;
    }

    .employee-photo:hover img {
        transform: scale(1.1);
    }

    .employee-photo:hover {
        box-shadow: 0 0 15px rgba(0, 0, 0, 0.3);
    }

    .employee-info {
        margin-bottom: 2rem;
    }

    .employee-info .card-body {
        padding: 1.5rem;
    }

    .employee-info dl {
        margin: 0;
    }

    .employee-info dt {
        font-weight: bold;
    }

    .employee-info dd {
        margin-bottom: 1rem;
    }

    .btn-secondary {
        margin-top: 1rem;
    }
</style>
@endsection

@section('admin-content')

<div class="page-title-area">
    <div class="row align-items-center">
        <div class="col-sm-6">
            <div class="breadcrumbs-area clearfix">
                <h4 class="page-title pull-left">Employee Details</h4>
                <ul class="breadcrumbs pull-left">
                    <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li><a href="{{ route('admin.employees.index') }}">All Employees</a></li>
                    <li><span>Employee Details</span></li>
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
            <div class="employee-info">
                <div class="card">
                    <div class="card-header">
                        <h4 class="header-title">Employee Details</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3 text-center">
                                <div class="employee-photo">
                                    @if ($employee->photo)
                                        <img src="{{ asset('storage/' . $employee->photo) }}" alt="Employee Photo">
                                    @else
                                        <img src="https://via.placeholder.com/150" alt="Placeholder Photo">
                                    @endif
                                </div>
                                <h5 class="mt-3">{{ $employee->first_name }} {{ $employee->last_name }}</h5>
                            </div>
                            <div class="col-md-9">
                                <dl class="row">
                                    <dt class="col-sm-4">Email</dt>
                                    <dd class="col-sm-8">{{ $employee->email }}</dd>
                                    
                                    <dt class="col-sm-4">Phone</dt>
                                    <dd class="col-sm-8">{{ $employee->phone }}</dd>
                                    
                                    <dt class="col-sm-4">Address</dt>
                                    <dd class="col-sm-8">{{ $employee->address }}</dd>
                                    
                                    <dt class="col-sm-4">Emergency Contact Name</dt>
                                    <dd class="col-sm-8">{{ $employee->emergency_contact_name }}</dd>
                                    
                                    <dt class="col-sm-4">Emergency Contact Phone</dt>
                                    <dd class="col-sm-8">{{ $employee->emergency_contact_phone }}</dd>
                                    
                                    <dt class="col-sm-4">Department</dt>
                                    <dd class="col-sm-8">{{ $employee->department }}</dd>
                                    
                                    <dt class="col-sm-4">Job Title</dt>
                                    <dd class="col-sm-8">{{ $employee->job_title }}</dd>
                                    
                                    <dt class="col-sm-4">Manager</dt>
                                    <dd class="col-sm-8">{{ $employee->manager }}</dd>
                                    
                                    <dt class="col-sm-4">Employment Type</dt>
                                    <dd class="col-sm-8">{{ $employee->employment_type }}</dd>
                                    
                                    <dt class="col-sm-4">Status</dt>
                                    <dd class="col-sm-8">{{ $employee->status }}</dd>
                                    
                                    <dt class="col-sm-4">Start Date</dt>
                                    <dd class="col-sm-8">{{ $employee->start_date }}</dd>
                                    
                                    <dt class="col-sm-4">End Date</dt>
                                    <dd class="col-sm-8">{{ $employee->end_date }}</dd>
                                    
                                    <dt class="col-sm-4">Date of Birth</dt>
                                    <dd class="col-sm-8">{{ $employee->date_of_birth }}</dd>
                                    
                                    <dt class="col-sm-4">Gender</dt>
                                    <dd class="col-sm-8">{{ $employee->gender }}</dd>
                                    
                                    <dt class="col-sm-4">Nationality</dt>
                                    <dd class="col-sm-8">{{ $employee->nationality }}</dd>
                                    
                                    <dt class="col-sm-4">Salary</dt>
                                    <dd class="col-sm-8">{{ $employee->salary }}</dd>
                                    
                                    <dt class="col-sm-4">Currency</dt>
                                    <dd class="col-sm-8">{{ $employee->currency }}</dd>
                                    
                                    <dt class="col-sm-4">Bank Account Number</dt>
                                    <dd class="col-sm-8">{{ $employee->bank_account_number }}</dd>
                                    
                                    <dt class="col-sm-4">Notes</dt>
                                    <dd class="col-sm-8">{{ $employee->notes }}</dd>
                                </dl>
                            </div>
                        </div>
                        <a href="{{ route('admin.employees.index') }}" class="btn btn-secondary">Back to List</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
