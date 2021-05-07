@extends('layouts.admin')

@section('content')
     <!-- Content Header (Page header) -->
     <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Edit User</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('website') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('user.index') }}">User List</a></li>
                <li class="breadcrumb-item active">Edit User</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <h3 class="card-title">Edit User - {{ $user->name }}</h3>
                                <a href="{{ route('user.index') }}" class="btn btn-primary">Go Back to User List</a>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0">
                            <div class="row">
                                <div class="col-12 col-lg-6 offset-lg-3 col-md-8 offset-md-2">
                                    <!-- form start -->
                                    <form action="{{ route('user.update', [$user->id]) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="card-body">

                                        @include('includes.errors')

                                        <div class="form-group">
                                            <label for="name">User Name</label>
                                            <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="email">User Email</label>
                                            <input type="text" class="form-control" id="email" name="email" value="{{ $user->email }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="password">User Password <small class="text-info">(Enter password if you want to change)</small></label>
                                            <input type="text" class="form-control" id="password" name="password" placeholder="Enter user password">
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary btn-lg">Submit</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
