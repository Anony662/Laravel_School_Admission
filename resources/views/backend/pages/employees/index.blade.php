@extends('backend.layouts.master')

@section('title', 'Employees - Admin Panel')

@section('styles')
<!-- Start datatable css -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.jqueryui.min.css">

<style>
    .status-active {
        background-color: #28a745; /* Green */
        color: white;
        padding: 0.2rem 0.5rem;
        border-radius: 0.25rem;
        font-weight: bold;
    }
    .status-on-leave {
        background-color: #ffc107; /* Yellow */
        color: black;
        padding: 0.2rem 0.5rem;
        border-radius: 0.25rem;
        font-weight: bold;
    }
    .status-terminated {
        background-color: #dc3545; /* Red */
        color: white;
        padding: 0.2rem 0.5rem;
        border-radius: 0.25rem;
        font-weight: bold;
    }
</style>
@endsection

@section('admin-content')

<!-- page title area start -->
<div class="page-title-area">
    <div class="row align-items-center">
        <div class="col-sm-6">
            <div class="breadcrumbs-area clearfix">
                <h4 class="page-title pull-left">Employees</h4>
                <ul class="breadcrumbs pull-left">
                    <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li><span>All Employees</span></li>
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
                    <h4 class="header-title float-left">Employees List</h4>
                    @if (Auth::guard('admin')->user()->can('employee.create'))
                        <p class="float-right mb-2">
                            <a class="btn btn-primary text-white" href="{{ route('admin.employees.create') }}">Add New Employee</a>
                        </p>
                    @endif
                    <div class="clearfix"></div>
                    <div class="data-tables">
                        @include('backend.layouts.partials.messages')
                        <table id="dataTable" class="text-center">
                            <thead class="bg-light text-capitalize">
                                <tr>
                                    <th width="5%">ID</th>
                                    <th width="20%">First Name</th>
                                    <th width="20%">Last Name</th>
                                    <th width="25%">Email</th>
                                    <th width="15%">Phone</th>
                                    <th width="15%">Status</th>
                                    <th width="15%">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                               @foreach ($employees as $employee)
                               <tr>
                                    <td>{{ $employee->id }}</td>
                                    <td>{{ $employee->first_name }}</td>
                                    <td>{{ $employee->last_name }}</td>
                                    <td>{{ $employee->email }}</td>
                                    <td>{{ $employee->phone }}</td>
                                    <td>
                                        @if ($employee->status == 'Active')
                                            <span class="status-active">{{ $employee->status }}</span>
                                        @elseif ($employee->status == 'On Leave')
                                            <span class="status-on-leave">{{ $employee->status }}</span>
                                        @elseif ($employee->status == 'Terminated')
                                            <span class="status-terminated">{{ $employee->status }}</span>
                                        @else
                                            {{ $employee->status }}
                                        @endif
                                    </td>
                                    <td>
                                        @if (Auth::guard('admin')->user()->can('employee.show'))
                                            <a class="btn btn-info text-white" href="{{ route('admin.employees.show', $employee->id) }}">View</a>
                                        @endif

                                        @if (Auth::guard('admin')->user()->can('employee.edit'))
                                            <a class="btn btn-success text-white" href="{{ route('admin.employees.edit', $employee->id) }}">Edit</a>
                                        @endif

                                        @if (Auth::guard('admin')->user()->can('employee.delete'))
                                        <a class="btn btn-danger text-white" href="{{ route('admin.employees.destroy', $employee->id) }}"
                                        onclick="event.preventDefault(); document.getElementById('delete-form-{{ $employee->id }}').submit();">
                                            Delete
                                        </a>
                                        <form id="delete-form-{{ $employee->id }}" action="{{ route('admin.employees.destroy', $employee->id) }}" method="POST" style="display: none;">
                                            @method('DELETE')
                                            @csrf
                                        </form>
                                        @endif
                                    </td>
                                </tr>
                               @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- data table end -->
    </div>
</div>

@endsection

@section('scripts')
<!-- Start datatable js -->
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
<script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap.min.js"></script>

<script>
    /*================================
    datatable active
    ==================================*/
    if ($('#dataTable').length) {
        $('#dataTable').DataTable({
            responsive: true
        });
    }
</script>
@endsection
