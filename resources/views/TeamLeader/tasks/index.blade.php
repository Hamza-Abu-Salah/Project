@extends('TeamLeader.layout')
@section('tasks', 'active')
@section('content')
    <div class="page-wrapper">

        <div class="content container-fluid">

            <!-- Page Header -->
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="d-flex justify-content-between text-align-center">
                            <div>
                                <h3 class="page-title">Welcome TeamLeader!</h3>
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item active">Tasks
                                    </li>
                                </ul>
                            </div>
                            <div>
                                <a href="/leader/tasks/create" class="btn btn-info px-5">Add Task</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->

            <div class="container">
                <table class="text-center table table-hover table-bordered  table-striped">
                    <tr class="table-dark">
                        <th>Title</th>
                        <th>Description</th>
                        <th>Done By</th>
                        <th>Points</th>
                        <th>Project</th>
                        <th>Action</th>
                    </tr>
                    @forelse($items as $item)
                        <tr>
                            <td>{{ $item?->title }}</td>
                            <td>{{ $item?->description }}</td>
                            <td>{{ $item?->user_task_count }}</td>
                            <td>{{ $item?->points }}</td>
                            <td>{{ $item?->project?->title }}</td>
                            <td>
                                <a href="/leader/tasks/edit/{{$item->id}}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                                <a href="/leader/tasks/delete/{{$item->id}}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                    @empty
                    <tr>
                        <td colspan="100">No Tasks Found</td>
                    </tr>
                    @endforelse

                </table>

            </div>

        </div>
    </div>
@endsection
