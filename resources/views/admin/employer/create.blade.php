@extends('admin.layout')
@section('content')
    <div class="page-wrapper">

        <div class="content container-fluid">

            <!-- Page Header -->
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <h3 class="page-title">Welcome Admin!</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item active">Add Employer

                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->

            <div class="container">
                <form action="/admin/employer/store" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <label for="">Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Name">
                        </div>
                        <div class="col-md-6 mb-4">
                            <label for="">Email</label>
                            <input type="email" name="email" class="form-control" placeholder="Email">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <label for="">Mobile</label>
                            <input type="text" name="mobile" class="form-control" placeholder="Mobile">
                        </div>
                        <div class="col-md-6 mb-4">
                            <label for="">Password</label>
                            <input type="text" name="password" class="form-control" placeholder="Password">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <label for="">Jop Name</label>
                            <input type="text" name="job_name" class="form-control" placeholder="Job Name">
                        </div>
                        <div class="col-md-6 mb-4">
                            <label for="">Avatar</label>
                            <input type="file" name="avatar" class="form-control">
                        </div>
                    </div>
                    <button class="btn btn-info px-5" type="submit">save</button>
                </form>

            </div>

        </div>
    </div>
@endsection
