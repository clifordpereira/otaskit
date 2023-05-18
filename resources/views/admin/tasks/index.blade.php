@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-12">
                <a href="/" class="btn btn-info">Home</a>
                <div class="card">
                    <div class="card-header card-header-warning">
                        <h4 class="card-title">Tasks</h4>
                        <p class="card-category">
                            <a href="/tasks/create" class="btn btn-primary">Add New</a>
                        </p>
                    </div>
                    <div class="card-body table-responsive">
                        <table class="table table-hover">
                            <thead class="text-warning">
                                <tr>
                                    <th>Assignee</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Status</th>
                                    <th>Start Task</th>
                                    <th>End Task</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tasks as $task)
                                    <tr>
                                        <td>{{ optional($task->employee)->name }}</td>
                                        <td>{{ $task->title }}</td>
                                        <td>{{ $task->description }}</td>
                                        <td>{{ $task->status }}</td>
                                        <td>
                                            @if ('In Progress' == $task->status || 'Done' == $task->status)
                                                Started
                                            @else
                                                <a href='/tasks/start_task/{{ $task->id }}' class="btn btn-info">
                                                    Start
                                                </a>
                                            @endif
                                        </td>
                                        <td>
                                            @if ('Done' == $task->status)
                                                Ended
                                            @elseif ('In Progress' == $task->status)
                                                <a href='/tasks/end_task/{{ $task->id }}' class="btn btn-info">
                                                    End
                                                </a>
                                            @else
                                                Not Started
                                            @endif
                                        </td>
                                        <td>
                                            <a href='/tasks/{{ $task->id }}/edit' class="btn btn-secondary">
                                                <i class="fa fa-pencil"></i>
                                            </a>
                                        </td>
                                        <td>
                                            <form class="form-horizontal" role="form" method="POST" action="{{ url('tasks/'.$task->id) }}"
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
