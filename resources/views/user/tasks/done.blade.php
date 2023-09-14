@extends('user.layout')
@section('done', 'active')
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
                        <th>Time</th>
                    </tr>
                    @forelse($items as $item)
                        <tr>
                            <td>{{ $item?->task?->title }}</td>
                            <td>{{ $item?->task?->description }}</td>
                            <td>{{ $item?->task?->project?->title }}</td>
                            <td>{{ $item?->time }} mins</td>
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
