@extends('layouts.admin')

@section('content')
     <!-- Content Header (Page header) -->
     <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Update Settings</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('website') }}">Home</a></li>
                <li class="breadcrumb-item active">Update Settings</li>
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
                                <h3 class="card-title">Update Site Settings</h3>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0">
                            <div class="row">
                                <div class="col-12 col-lg-8 offset-lg-2 col-md-8 offset-md-2">
                                    <!-- form start -->
                                    <form action="{{ route('setting.update') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="card-body">
                                            @include('includes.errors')

                                            <div class="form-group">
                                                <label for="name">Site Name</label>
                                                <input type="text" class="form-control" id="name" name="name" value="{{ $setting->name }}">
                                            </div>

                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="facebook">Facebook</label>
                                                        <input type="text" class="form-control" id="facebook" name="facebook" value="{{ $setting->facebook }}" placeholder="facebook url">
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="twitter">Twitter</label>
                                                        <input type="text" class="form-control" id="twitter" name="twitter" value="{{ $setting->twitter }}" placeholder="twitter url">
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="instagram">Instagram</label>
                                                        <input type="text" class="form-control" id="instagram" name="instagram" value="{{ $setting->instagram }}" placeholder="instagram url">
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="reddit">Reddit</label>
                                                        <input type="text" class="form-control" id="reddit" name="reddit" value="{{ $setting->reddit }}" placeholder="reddit url">
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="email">Email</label>
                                                        <input type="text" class="form-control" id="email" name="email" value="{{ $setting->email }}" placeholder="email url">
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="copyright">Copyright</label>
                                                        <input type="text" class="form-control" id="copyright" name="copyright" value="{{ $setting->copyright }}" placeholder="copyright url">
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="phone">Contact Phone Number</label>
                                                        <input type="text" class="form-control" id="phone" name="phone" value="{{ $setting->phone }}" placeholder="phone number">
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="address">Location</label>
                                                        <textarea name="address" class="form-control" id="address"  rows="1" value="{{ $setting->address }}" placeholder="enter address">{{ $setting->address }}</textarea>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-8">
                                                        <label for="site_logo">Site Logo</label>
                                                        <div class="custom-file">
                                                            <input type="file" name="site_logo" class="custom-file-input" id="site_logo">
                                                            <label class="custom-file-label" for="site_logo">Choose file</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-4">
                                                        <div style="max-height:100; max-width:100px; overflow:hidden; margin-left:auto;">
                                                            <img src="{{ asset($setting->site_logo) }}" class="img-fluid">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="description">Description</label>
                                                <textarea name="description" id="description" rows="3" class="form-control" placeholder="Enter description">{{ $setting->description }}</textarea>
                                            </div>

                                            <div class="form-group">
                                                <button type="submit" class="btn btn-primary btn-lg" >Update Setting</button>
                                            </div>
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



