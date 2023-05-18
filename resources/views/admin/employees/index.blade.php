@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-12">
                <a href="/" class="btn btn-info">Home</a>
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
                                        <td>
                                            <a href='/employees/{{ $employee->id }}/edit' class="btn btn-secondary">
                                                <i class="fa fa-pencil"></i>
                                            </a>
                                        </td>
                                        <td>
                                            <form class="form-horizontal" role="form" method="POST" action="{{ url('employees/'.$employee->id) }}"
                                                onsubmit="return confirm('Are you sure you wish to delete this record?');"
                                            >
                                                @method('DELETE')
                                                @csrf

                                                <div class="form-group">
                                                    <div class="col-md-6 col-md-offset-2">
                                                        <button type="submit" class="btn btn-danger">
                                                            Del
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
                                        </td>
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
