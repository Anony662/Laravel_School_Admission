@extends('backend.layouts.master')

@section('title')
Course Create - Admin Panel
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
                <h4 class="page-title pull-left">Course Create</h4>
                <ul class="breadcrumbs pull-left">
                    <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li><a href="{{ route('admin.courses.index') }}">All Courses</a></li>
                    <li><span>Create Course</span></li>
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
        <!-- form start -->
        <div class="col-12 mt-5">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">Create New Course</h4>
                    @include('backend.layouts.partials.messages')
                    
                    <form action="{{ route('admin.courses.store') }}" method="POST">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="course_name">Course Name</label>
                                <input type="text" class="form-control" id="course_name" name="course_name" placeholder="Enter Course Name" required>
                            </div>
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="department">Department</label>
                                <input type="text" class="form-control" id="department" name="department" placeholder="Enter Department" required>
                            </div>
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="semester">Semester</label>
                                <input type="text" class="form-control" id="semester" name="semester" placeholder="Enter Semester" required>
                            </div>
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="year">Year</label>
                                <input type="number" class="form-control" id="year" name="year" placeholder="Enter Year" required>
                            </div>
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="instructor">Instructor</label>
                                <input type="text" class="form-control" id="instructor" name="instructor" placeholder="Enter Instructor Name" required>
                            </div>
                            <div class="form-group col-md-6 col-sm-12">
                                <label for="status">Status</label>
                                <select id="status" name="status" class="form-control" required>
                                    <option value="Active">Active</option>
                                    <option value="Inactive">Inactive</option>
                                </select>
                            </div>
                            <div class="form-group col-md-12 col-sm-12">
                                <label for="description">Description</label>
                                <textarea class="form-control" id="description" name="description" rows="3" placeholder="Enter Description"></textarea>
                            </div>
                        </div>
                        
                        <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">Save Course</button>
                    </form>
                </div>
            </div>
        </div>
        <!-- form end -->
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
