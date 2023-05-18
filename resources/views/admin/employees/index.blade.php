@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-12">
                <div class="card">
                    <div class="card-header card-header-warning">
                        <h4 class="card-title">Employees</h4>
                        <p class="card-category">
                            <a href="/employees/create" class="btn btn-primary">Add New</a>
                        </p>
                    </div>
                    <div class="card-body table-responsive">
                        <table class="table table-hover">
                            <thead class="text-warning">
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Mobile No.</th>
                                    <th>Department</th>
                                    <th>Status</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $status = ['Inactive', 'Active'];
                                @endphp
                                @foreach ($employees as $employee)
                                    <tr>
                                        <td>{{ $employee->name }}</td>
                                        <td>{{ $employee->email }}</td>
                                        <td>{{ $employee->mobile_no }}</td>
                                        <td>{{ $employee->department }}</td>
                                        <td>{{ $status[$employee->status] }}</td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
