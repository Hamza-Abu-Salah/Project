@extends('admin.layout')
@section('content')
    <div class="page-wrapper">

        <div class="content container-fluid">

            <!-- Page Header -->
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="d-flex justify-content-between text-align-center">
                            <div>
                                <h3 class="page-title">Welcome Admin!</h3>
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item active">Leaders
                                    </li>
                                </ul>
                            </div>
                            <div>
                                <a href="/admin/employer/create" class="btn btn-info px-5">Add Leader</a>
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
                        <th>Mobile</th>
                        <th>Job Name</th>
                        <th>Users</th>
                        <th>Action</th>
                    </tr>
                    @forelse($items as $item)
                        <tr>
                            <td>{{ $item?->name }}</td>
                            <td>{{ $item?->email }}</td>
                            <td>{{ $item?->mobile }}</td>
                            <td>{{ $item?->job_name }}</td>
                            <td><a href="/admin/users?employer_id={{$item->id}}" class="btn btn-secondary btn-sm"><i class="fa fa-users"></i></a></td>
                            <td>
                                <a href="/admin/employer/edit/{{$item->id}}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                                <a href="/admin/employer/delete/{{$item->id}}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                            </td>

                        </tr>
                    @empty
                    <tr col="5">No Employers Found</tr>
                    @endforelse

                </table>

            </div>

        </div>
    </div>
@endsection
