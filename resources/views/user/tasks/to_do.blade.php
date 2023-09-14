@extends('user.layout')
@section('to_do', 'active')
@section('content')
    <div class="page-wrapper">

        <div class="content container-fluid">

            <!-- Page Header -->
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="d-flex justify-content-between text-align-center">
                            <div>
                                <h3 class="page-title">Welcome {{ auth()->user()->name?? '' }}!</h3>
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item active">Tasks
                                    </li>
                                </ul>
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
                        <th>Project</th>
                        <th>Action</th>
                    </tr>
                    @forelse($items as $item)
                        <tr>
                            <td>{{ $item?->title }}</td>
                            <td>{{ $item?->description }}</td>
                            <td>{{ $item?->project?->title }}</td>
                            <td>
                                <a href="/user/tasks/start/{{$item->id}}" class="btn btn-primary btn-sm">Start</a>
                            </td>
                        </tr>
                    @empty
                    <tr>
                        <td colspan="4">No Tasks Found</td>
                    </tr>
                    @endforelse

                </table>

            </div>

        </div>
    </div>
@endsection
