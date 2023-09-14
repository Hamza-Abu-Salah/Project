@extends('TeamLeader.layout')
@section('tasks', 'active')
@section('content')
    <div class="page-wrapper">

        <div class="content container-fluid">

            <!-- Page Header -->
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <h3 class="page-title">Welcome TeamLeader!</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item active">Edit Task

                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->

            <div class="container">
                <form action="/leader/tasks/update/{{$item->id}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <label for="">Title</label>
                            <input value="{{$item?->title}}" type="text" name="title" class="form-control" placeholder="Title">
                        </div>
                        <div class="col-md-6 mb-4">
                            <label for="">Description</label>
                            <input value="{{$item?->description}}" type="text" name="description" class="form-control" placeholder="Description">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <label for="">Projects</label>
                            <select name="project_id" class="form-control">
                                @forelse($projects as $project)
                                    <option {{ $item->project_id == $project->id? 'selected' : '' }} value="{{ $project->id }}">{{ $project?->title }}</option>
                                @empty
                                    <option value="0">Please add a project first</option>
                                @endforelse
                            </select>
                        </div>
                        <div class="col-md-6 mb-4">
                            <label for="">Points</label>
                            <input value="{{$item?->points}}" type="number" name="points" class="form-control" placeholder="Points">
                        </div>
                    </div>
                    <button class="btn btn-info px-5" type="submit">save</button>
                </form>

            </div>

        </div>
    </div>
@endsection
