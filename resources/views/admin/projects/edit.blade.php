@extends('admin.layout')
@section('projects', 'active')
@section('content')
    <div class="page-wrapper">

        <div class="content container-fluid">

            <!-- Page Header -->
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <h3 class="page-title">Welcome Admin!</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item active">Edit Project

                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->

            <div class="container">
                <form action="/admin/projects/update/{{$item->id}}" method="post" enctype="multipart/form-data">
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
                            <label for="">Status</label>
                            <select name="status" class="form-control">
                                <option {{ $item?->status? 'selected' : '' }} value="1">Active</option>
                                <option {{ $item?->status? '' : 'selected' }} value="0">In Active</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-4">
                            <label for="">Leaders</label>
                            <select name="leader_id" class="form-control">
                                @forelse($leaders as $leader)
                                    <option {{ $item->leader_id == $leader->id? 'selected' : '' }} value="{{ $leader->id }}">{{ $leader?->name }}</option>
                                @empty
                                    <option value="0">Please add a leader first</option>
                                @endforelse
                            </select>
                        </div>
                    </div>
                    <button class="btn btn-info px-5" type="submit">save</button>
                </form>

            </div>

        </div>
    </div>
@endsection
