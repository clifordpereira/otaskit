@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Create Employee') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="/employees">
                        @csrf

                        <div class="form-group">
                            <label for="name">Name: </label>

                            <input name="name" id="name"
                                type="text"
                                class="@error('name') is-invalid @else is-valid @enderror form-control">

                            @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="email">Email: </label>

                            <input name="email" id="email"
                                type="email"
                                class="@error('email') is-invalid @else is-valid @enderror form-control">

                            @error('email')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="mobile_no">Mobile No: </label>

                            <input name="mobile_no" id="mobile_no"
                                type="text"
                                class="@error('mobile_no') is-invalid @else is-valid @enderror form-control">

                            @error('mobile_no')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="department">Department: </label>

                            <select name="department" id="department"
                                class="@error('department') is-invalid @else is-valid @enderror form-control">
                                <option value="">Select</option>
                                <option value="Sales">Sales</option>
                                <option value="Marketing">Marketing</option>
                                <option value="IT">IT</option>
                            </select>

                            @error('department')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="status">Status: </label>

                            <select name="status" id="status"
                                class="@error('status') is-invalid @else is-valid @enderror form-control">
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>

                            @error('status')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
