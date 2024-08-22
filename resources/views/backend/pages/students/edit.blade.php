@extends('backend.layouts.master')

@section('title')
Admission Edit - Admin Panel
@endsection

@section('styles')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
<style>
    .form-check-label {
        text-transform: capitalize;
    }
</style>
@endsection

@section('admin-content')

<!-- page title area start -->
<div class="page-title-area">
    <div class="row align-items-center">
        <div class="col-sm-6">
            <div class="breadcrumbs-area clearfix">
                <h4 class="page-title pull-left">Admission Edit</h4>
                <ul class="breadcrumbs pull-left">
                    <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li><a href="{{ route('admin.students.index') }}">All Admissions</a></li>
                    <li><span>Edit Admission</span></li>
                </ul>
            </div>
        </div>
        <div class="col-sm-6 clearfix">
            @include('backend.layouts.partials.logout')
        </div>
    </div>
</div>
<!-- page title area end -->

<div class="main-content-inner">
    <div class="row">
        <!-- data table start -->
        <div class="col-12 mt-5">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">Edit Admission</h4>
                    @include('backend.layouts.partials.messages')
                    
                    <form action="{{ route('admin.students.update', $student->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-row">
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="name">Student Name</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name" value="{{ old('name', $student->name) }}">
                                @error('name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="email">Student Email</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email" value="{{ old('email', $student->email) }}">
                                @error('email')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="phone_number">Phone Number</label>
                                <input type="text" class="form-control" id="phone_number" name="phone_number" placeholder="Enter Phone Number" value="{{ old('phone_number', $student->phone_number) }}">
                                @error('phone_number')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="father_name">Father's Name</label>
                                <input type="text" class="form-control" id="father_name" name="father_name" placeholder="Enter Father's Name" value="{{ old('father_name', $student->father_name) }}">
                                @error('father_name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="mother_name">Mother's Name</label>
                                <input type="text" class="form-control" id="mother_name" name="mother_name" placeholder="Enter Mother's Name" value="{{ old('mother_name', $student->mother_name) }}">
                                @error('mother_name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="father_phone">Father's Phone</label>
                                <input type="text" class="form-control" id="father_phone" name="father_phone" placeholder="Enter Father's Phone" value="{{ old('father_phone', $student->father_phone) }}">
                                @error('father_phone')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="mother_phone">Mother's Phone</label>
                                <input type="text" class="form-control" id="mother_phone" name="mother_phone" placeholder="Enter Mother's Phone" value="{{ old('mother_phone', $student->mother_phone) }}">
                                @error('mother_phone')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="profile_image">Profile Image</label>
                                <input type="file" class="form-control" id="profile_image" name="profile_image">
                                @if ($student->profile_image)
                                    <img src="{{ asset('storage/' . $student->profile_image) }}" alt="Profile Image" class="img-thumbnail mt-2" style="max-width: 150px;">
                                @endif
                                @error('profile_image')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="birth_certificate">Birth Certificate</label>
                                <input type="file" class="form-control" id="birth_certificate" name="birth_certificate">
                                @if ($student->birth_certificate)
                                    <a href="{{ asset('storage/' . $student->birth_certificate) }}" target="_blank">Current Birth Certificate</a>
                                @endif
                                @error('birth_certificate')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="passport_attachment">Passport Attachment</label>
                                <input type="file" class="form-control" id="passport_attachment" name="passport_attachment">
                                @if ($student->passport_attachment)
                                    <a href="{{ asset('storage/' . $student->passport_attachment) }}" target="_blank">Current Passport Attachment</a>
                                @endif
                                @error('passport_attachment')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="academic_certificates">Academic Certificates</label>
                                <input type="file" class="form-control" id="academic_certificates" name="academic_certificates">
                                @if ($student->academic_certificates)
                                    <a href="{{ asset('storage/' . $student->academic_certificates) }}" target="_blank">Current Academic Certificates</a>
                                @endif
                                @error('academic_certificates')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="nationality">Nationality</label>
                                <input type="text" class="form-control" id="nationality" name="nationality" placeholder="Enter Nationality" value="{{ old('nationality', $student->nationality) }}">
                                @error('nationality')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="address">Address</label>
                                <textarea class="form-control" id="address" name="address" rows="3" placeholder="Enter Address">{{ old('address', $student->address) }}</textarea>
                                @error('address')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="course">Course</label>
                                <input type="text" class="form-control" id="course" name="course" placeholder="Enter Course" value="{{ old('course', $student->course) }}">
                                @error('course')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="preferred_country">Preferred Country</label>
                                <input type="text" class="form-control" id="preferred_country" name="preferred_country" placeholder="Enter Preferred Country" value="{{ old('preferred_country', $student->preferred_country) }}">
                                @error('preferred_country')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">Update Student</button>
                    </form>
                </div>
            </div>
        </div>
        <!-- data table end -->
        
    </div>
</div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        $('.select2').select2();
    })
</script>
@endsection
