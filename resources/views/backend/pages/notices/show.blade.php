@extends('backend.layouts.master')

@section('title')
Notice Details - Admin Panel
@endsection

@section('styles')
<!-- Add any custom styles here -->
<style>
    .notice-content {
        white-space: pre-wrap; /* Preserve line breaks in content */
    }
    .notice-header {
        border-bottom: 2px solid #007bff; /* Blue underline */
        padding-bottom: 10px;
        margin-bottom: 20px;
    }
    .notice-date {
        font-size: 0.9rem;
        color: #6c757d; /* Grey color for date */
    }
    .btn-back {
        background-color: #6c757d;
        color: white;
    }
</style>
@endsection

@section('admin-content')

<!-- page title area start -->
<div class="page-title-area">
    <div class="row align-items-center">
        <div class="col-sm-6">
            <div class="breadcrumbs-area clearfix">
                <h4 class="page-title pull-left">Notice Details</h4>
                <ul class="breadcrumbs pull-left">
                    <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li><a href="{{ route('admin.notices.index') }}">All Notices</a></li>
                    <li><span>Notice Details</span></li>
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
        <div class="col-12 mt-5">
            <div class="card">
                <div class="card-body">
                    <div class="notice-header">
                        <h4>{{ $notice->title }}</h4>
                        <small class="notice-date">Published on {{ $notice->created_at->format('d M Y') }}</small>
                    </div>
                    <div class="notice-content">
                        <p>{{ $notice->content }}</p>
                    </div>
                    <a href="{{ route('admin.notices.index') }}" class="btn btn-back mt-4">Back to Notices</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<!-- Add any custom scripts here -->
@endsection
