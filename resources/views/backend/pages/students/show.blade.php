@extends('backend.layouts.master')

@section('title', 'Admission Details - Admin Panel')

@section('styles')
<style>
    .student-details dt {
        font-weight: bold;
    }
</style>
@endsection

@section('admin-content')

<div class="page-title-area">
    <div class="row align-items-center">
        <div class="col-sm-6">
            <div class="breadcrumbs-area clearfix">
                <h4 class="page-title pull-left">Admission Details</h4>
                <ul class="breadcrumbs pull-left">
                    <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li><a href="{{ route('admin.students.index') }}">All Admissions</a></li>
                    <li><span>Admission Details</span></li>
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
                    <h4 class="header-title">Admission Details</h4>
                    <div class="student-details">
                        <dl class="row">
                            <dt class="col-sm-3">Name</dt>
                            <dd class="col-sm-9">{{ $student->name }}</dd>
                            
                            <dt class="col-sm-3">Email</dt>
                            <dd class="col-sm-9">{{ $student->email }}</dd>
                            
                            <dt class="col-sm-3">Phone Number</dt>
                            <dd class="col-sm-9">{{ $student->phone_number }}</dd>
                            
                            <dt class="col-sm-3">Father's Name</dt>
                            <dd class="col-sm-9">{{ $student->father_name }}</dd>
                            
                            <dt class="col-sm-3">Mother's Name</dt>
                            <dd class="col-sm-9">{{ $student->mother_name }}</dd>
                            
                            <dt class="col-sm-3">Father's Phone</dt>
                            <dd class="col-sm-9">{{ $student->father_phone }}</dd>
                            
                            <dt class="col-sm-3">Mother's Phone</dt>
                            <dd class="col-sm-9">{{ $student->mother_phone }}</dd>
                            
                            <dt class="col-sm-3">Profile Image</dt>
                            <dd class="col-sm-9">
                                @if ($student->profile_image)
                                    <img src="{{ asset('storage/' . $student->profile_image) }}" alt="Profile Image" width="100">
                                @else
                                    No image available
                                @endif
                            </dd>
                            
                            <dt class="col-sm-3">Birth Certificate</dt>
                            <dd class="col-sm-9">
                                @if ($student->birth_certificate)
                                    <a href="{{ asset('storage/' . $student->birth_certificate) }}" target="_blank">View Birth Certificate</a>
                                @else
                                    No certificate available
                                @endif
                            </dd>
                            
                            <dt class="col-sm-3">Passport Attachment</dt>
                            <dd class="col-sm-9">
                                @if ($student->passport_attachment)
                                    <a href="{{ asset('storage/' . $student->passport_attachment) }}" target="_blank">View Passport Attachment</a>
                                @else
                                    No passport available
                                @endif
                            </dd>
                            
                            <dt class="col-sm-3">Academic Certificates</dt>
                            <dd class="col-sm-9">
                                @if ($student->academic_certificates)
                                    <a href="{{ asset('storage/' . $student->academic_certificates) }}" target="_blank">View Academic Certificates</a>
                                @else
                                    No certificates available
                                @endif
                            </dd>
                            
                            <dt class="col-sm-3">Nationality</dt>
                            <dd class="col-sm-9">{{ $student->nationality }}</dd>
                            
                            <dt class="col-sm-3">Address</dt>
                            <dd class="col-sm-9">{{ $student->address }}</dd>
                            
                            <dt class="col-sm-3">Course</dt>
                            <dd class="col-sm-9">{{ $student->course }}</dd>
                            
                            <dt class="col-sm-3">Preferred Country</dt>
                            <dd class="col-sm-9">{{ $student->preferred_country }}</dd>
                            
                            <dt class="col-sm-3">Status</dt>
                            <dd class="col-sm-9">{{ $student->status }}</dd>
                            
                            <dt class="col-sm-3">Notes</dt>
                            <dd class="col-sm-9">{{ $student->notes }}</dd>
                        </dl>
                        <a href="{{ route('admin.students.index') }}" class="btn btn-secondary">Back to List</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
