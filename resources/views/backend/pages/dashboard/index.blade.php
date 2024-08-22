@extends('backend.layouts.master')

@section('title')
Dashboard Page - Admin Panel
@endsection

@section('admin-content')

<!-- page title area start -->
<div class="page-title-area">
    <div class="row align-items-center">
        <div class="col-sm-6">
            <div class="breadcrumbs-area clearfix">
                <h4 class="page-title pull-left">Dashboard</h4>
                <ul class="breadcrumbs pull-left">
                    <li><a href="{{ route('admin.dashboard') }}">Home</a></li>
                    <li><span>Dashboard</span></li>
                </ul>
            </div>
        </div>
        <div class="col-sm-12 clearfix">
            @include('backend.layouts.partials.logout')
        </div>
    </div>
</div>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa; /* Light background color */
        }

        .main-content-inner {
            padding: 1rem;
        }

        .row {
            margin: 0;
        }

        .card-columns {
            display: flex;
            flex-wrap: wrap;
            gap: 1rem; /* Space between cards */
        }

        .card {
            position: relative;
            overflow: hidden;
            border-radius: 0.25rem; /* Rounded corners */
            min-height: 120px; /* Minimum height to ensure consistency */
            background: #fff; /* Card background color */
            display: flex;
            align-items: center;
            padding: 1rem;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1); /* Optional shadow for better visibility */
            flex: 1 1 22%; /* Width for four cards in a row */
            box-sizing: border-box;
            margin-bottom: 1rem;
        }

        .card .card-bg {
            position: absolute;
            top: 0;
            left: 0;
            height: 100%;
            width: 40%; /* Reduced width for the two-tone effect */
            background-color: currentColor; /* Use the text color of the card for the background */
            z-index: 0;
        }

        .card .card-content {
            position: relative;
            z-index: 1;
            display: flex;
            justify-content: space-between;
            align-items: center;
            width: 100%; /* Full width to fill the card */
        }

        .card-content h2 {
            font-size: 1.25rem; /* Slightly smaller font size */
            margin: 0;
        }

        .card-content p {
            font-size: 0.875rem; /* Slightly smaller font size */
            margin: 0;
        }

        .card .icon {
            position: absolute;
            top: 50%;
            right: 0;
            transform: translateY(-50%);
            opacity: 0.1;
            font-size: 1.5rem; /* Adjust icon size */
        }

        .bg-danger .card-bg {
            background-color: #dc3545; /* Red */
        }

        .bg-warning .card-bg {
            background-color: #ffc107; /* Yellow */
        }

        .bg-success .card-bg {
            background-color: #28a745; /* Green */
        }

        .bg-primary .card-bg {
            background-color: #007bff; /* Blue */
        }

        .text-white {
            color: #fff;
        }

        .text-dark {
            color: #000;
        }

        .small-box-footer {
            display: block;
            color: #fff;
            background: rgba(0,0,0,0.1);
            padding: 0.5rem;
            text-align: right;
            border-radius: 0 0 0.25rem 0.25rem;
            text-decoration: none;
        }

        .small-box-footer:hover {
            color: #fff;
            background: rgba(0,0,0,0.2);
        }
    </style>
</head>
<body>
    <div class="main-content-inner">
        <div class="row card-columns">
            <div class="col-md-3">
                <!-- Card for Roles with Danger Background -->
                <div class="card bg-danger text-white">
                    <div class="card-bg"></div>
                    <div class="card-content">
                        <div class="seofct-icon"><i class="fa fa-users"></i></div>
                        <div>
                            <h2>{{ $total_roles }}</h2>
                            <p>Roles</p>
                        </div>
                    </div>
                    <a href="{{ route('admin.roles.index') }}" class="small-box-footer text-white text-decoration-none">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-md-3">
                <!-- Card for Admins with Warning Background -->
                <div class="card bg-warning text-white">
                    <div class="card-bg"></div>
                    <div class="card-content">
                        <div class="seofct-icon"><i class="fa fa-user"></i></div>
                        <div>
                            <h2>{{ $total_admins }}</h2>
                            <p>Admins</p>
                        </div>
                    </div>
                    <a href="{{ route('admin.admins.index') }}" class="small-box-footer text-dark text-decoration-none">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-md-3">
                <!-- Card for Permissions with Success Background -->
                <div class="card bg-success text-white">
                    <div class="card-bg"></div>
                    <div class="card-content">
                        <div class="seofct-icon"><i class="fa fa-lock"></i></div>
                        <div>
                            <h2>{{ $total_permissions }}</h2>
                            <p>Permissions</p>
                        </div>
                    </div>
                    <a href="#" class="small-box-footer text-white text-decoration-none">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-md-2.5">
                <!-- Card for Additional Info with Primary Background -->
                <div class="card bg-primary text-white">
                    <div class="card-bg"></div>
                    <div class="card-content">
                        <div class="seofct-icon"><i class="fa fa-info-circle"></i></div>
                        <div>
                            <h2>Additional</h2>
                            <p>Info</p>
                        </div>
                    </div>
                    <a href="#" class="small-box-footer text-white text-decoration-none">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
      

                <!-- Notice Board Section -->
                <div class="col-md-4 mb-3 mb-lg-0">
                    <div class="card notice-board">
                        <div class="card-header">
                            <h4 class="header-title">Notice Board</h4>
                        </div>
                        <div class="card-body">
                            @if($notices->isNotEmpty())
                                @foreach($notices as $notice)
                                    <div class="notice-item mb-3">
                                        <div class="d-flex justify-content-between align-items-center mb-2">
                                            <h5 class="notice-title">{{ $notice->title }}</h5>
                                            <small class="text-muted">{{ $notice->created_at->format('d M Y') }}</small>
                                        </div>
                                        <p class="notice-content">{{ Str::limit($notice->content, 150) }}</p>
                                        <a href="{{ route('admin.notices.show', $notice->id) }}" class="btn btn-info btn-sm">Read More</a>
                                    </div>
                                @endforeach
                            @else
                                <p>No notices available.</p>
                            @endif
                        </div>
                    </div>
                </div>
                <!-- End of Notice Board Section -->

            </div>
        </div>
    </div>
</div>

@endsection

@section('styles')
    <!-- Add custom styles for the notice board -->
    <style>
        .notice-board {
            background: #f8f9fa; /* Light background */
            border: 1px solid #dee2e6; /* Border for the card */
            border-radius: 8px; /* Rounded corners */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Shadow effect */
        }
        .notice-board .card-header {
            background: #007bff; /* Blue header */
            color: #fff; /* White text color */
            border-bottom: 1px solid #0069d9; /* Darker blue border */
            border-top-left-radius: 8px; /* Rounded top-left corner */
            border-top-right-radius: 8px; /* Rounded top-right corner */
        }
        .notice-board .notice-item {
            border-bottom: 1px solid #ddd; /* Border for each item */
            padding: 10px 0;
        }
        .notice-board .notice-item:last-child {
            border-bottom: none;
        }
        .notice-board .notice-title {
            font-size: 18px;
            font-weight: bold;
        }
        .notice-board .notice-content {
            font-size: 14px;
        }
        .notice-board .btn-info {
            background-color: #007bff; /* Blue button */
            border-color: #007bff; /* Blue border */
        }
        .notice-board .btn-info:hover {
            background-color: #0056b3; /* Darker blue on hover */
            border-color: #004085; /* Darker blue border on hover */
        }
    </style>
@endsection
