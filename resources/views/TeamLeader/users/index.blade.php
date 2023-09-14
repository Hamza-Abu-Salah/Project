@extends('TeamLeader.layout')
@section('users', 'active')
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
                                    <li class="breadcrumb-item active">Users
                                    </li>
                                </ul>
                            </div>
                            <div>
                                <a href="/leader/users/create" class="btn btn-info px-5">Add User</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->

            <div class="container">
                <table class="text-center table table-hover table-bordered  table-striped">
                    <tr class="table-dark">
                        <th>Name</th>
                        <th>Email</th>
                        <th>Points</th>
                        <th>Action</th>
                    </tr>
                    @forelse($items as $item)
                        <tr>
                            <td>{{ $item?->name }}</td>
                            <td>{{ $item?->email }}</td>
                            <td>{{ $item?->points }}</td>
                            <td>
                                <a href="/leader/users/edit/{{$item->id}}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                                <a href="/leader/users/delete/{{$item->id}}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                            </td>

                        </tr>
                    @empty
                    <tr>
                        <td colspan="100">No Users Found</td>
                    </tr>
                    @endforelse

                </table>

            </div>

        </div>
    </div>
@endsection
