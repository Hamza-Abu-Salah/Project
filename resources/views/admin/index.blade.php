@extends('admin.layout')
@section('dashboard', 'active')
@section('content')
    <div class="page-wrapper">

        <div class="content container-fluid">

            <!-- Page Header -->
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <h3 class="page-title">Welcome Admin!</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item active">dashboard

                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->

            <div class="container">
                <table class="text-center table table-hover table-bordered  table-striped">
                    <tr class="table-dark">
                        <th>Title</th>
                        <th>Description</th>
                        <th>Project</th>
                        <th>Status</th>
                        <th>Member</th>
                        <th>Minutes</th>
                    </tr>
                    @forelse($tasks as $item)
                        <tr>
                            <td>{{ $item?->task?->title }}</td>
                            <td>{{ $item?->task?->description }}</td>
                            <td>{{ $item?->task?->project?->title }}</td>
                            <td>
                                @switch($item->status)
                                    @case('2')
                                    <a class="btn btn-success btn-sm">Completed</a>
                                    @break
                                    @case('3')
                                    <a class="btn btn-danger btn-sm">Cancelled</a>
                                    @break
                                    @default
                                    <a class="btn btn-warning btn-sm">In Progress</a>
                                    @break
                                @endswitch
                            </td>
                            <td>
                                <a class="btn btn-info btn-sm">{{ $item?->user?->name }}</a>
                            </td>
                            <td>
                                <a class="btn btn-info btn-sm">{{ $item?->time }}</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7">No Tasks Found</td>
                        </tr>
                    @endforelse

                </table>

            </div>
        </div>
    </div>
@endsection
