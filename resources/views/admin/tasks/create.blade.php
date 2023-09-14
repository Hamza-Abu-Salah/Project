@extends('admin.layout')
@section('tasks', 'active')
@section('content')
    <div class="page-wrapper">

        <div class="content container-fluid">

            <!-- Page Header -->
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <h3 class="page-title">Welcome Admin!</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item active">Add Task

                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->

            <div class="container">
                <form action="/admin/tasks/store" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <label for="">Title</label>
                            <input type="text" name="title" class="form-control" placeholder="Title">
                        </div>
                        <div class="col-md-6 mb-4">
                            <label for="">Description</label>
                            <input type="text" name="description" class="form-control" placeholder="Description">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <label for="">Projects</label>
                            <select name="project_id" class="form-control">
                                @forelse($projects as $project)
                                    <option value="{{ $project->id }}">{{ $project?->title }}</option>
                                @empty
                                    <option value="0">Please add a project first</option>
                                @endforelse
                            </select>
                        </div>
                        <div class="col-md-6 mb-4">
                            <label for="">Points</label>
                            <input type="number" name="points" class="form-control" placeholder="Points">
                        </div>
                    </div>
                    <button class="btn btn-info px-5" type="submit">save</button>
                </form>

            </div>

        </div>
    </div>
@endsection
