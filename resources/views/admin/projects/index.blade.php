@extends('admin.layout')
@section('projects', 'active')
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
                                    <li class="breadcrumb-item active">Projects
                                    </li>
                                </ul>
                            </div>
                            <div>
                                <a href="/admin/projects/create" class="btn btn-info px-5">Add Project</a>
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
                        <th>Related Tasks</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    @forelse($items as $item)
                        <tr>
                            <td>{{ $item?->title }}</td>
                            <td>{{ $item?->description }}</td>
                            <td>
                                <a href="/admin/tasks?project_id={{$item->id}}" class="btn btn-info btn-sm">Show Tasks ({{$item?->tasks?->count()}})</a>
                            </td>
                            <td>{{ $item?->status? 'Active' : 'In Active' }}</td>
                            <td>
                                <a href="/admin/projects/edit/{{$item->id}}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                                <a href="/admin/projects/delete/{{$item->id}}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                    @empty
                    <tr col="5">No Projects Found</tr>
                    @endforelse

                </table>

            </div>

        </div>
    </div>
@endsection
