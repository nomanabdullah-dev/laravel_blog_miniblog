@extends('layouts.admin')

@section('content')
     <!-- Content Header (Page header) -->
     <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Create Post</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('website') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('post.index') }}">Post List</a></li>
                <li class="breadcrumb-item active">Create Post</li>
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
                                <h3 class="card-title">Create Post</h3>
                                <a href="{{ route('post.index') }}" class="btn btn-primary">Go Back to Post List</a>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0">
                            <div class="row">
                                <div class="col-12 col-lg-8 offset-lg-2 col-md-8 offset-md-2">
                                    <!-- form start -->
                                    <form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="card-body">

                                            @include('includes.errors')

                                            <div class="form-group">
                                                <label for="title">Post Title</label>
                                                <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" placeholder="Enter post title">
                                            </div>
                                            <div class="form-group">
                                                <label for="category">Post Category</label>
                                                <select name="category" id="category" class="form-control">
                                                    <option value="" style="display: none" selected>Select Category</option>
                                                    @foreach ($categories as $c)
                                                        <option value="{{ $c->id }}">{{ $c->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>


                                            <div class="form-group">
                                                <label for="image">Image</label>
                                                <div class="custom-file">
                                                    <input type="file" name="image" class="custom-file-input" id="image">
                                                    <label class="custom-file-label" for="image">Choose file</label>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label>Choose Post Tags</label>
                                                <div class="d-flex flex-wrap">
                                                    @foreach ($tags as $tag)
                                                        <div class="custom-control custom-checkbox"style="margin-right: 20px">
                                                        <input class="custom-control-input" type="checkbox" name="tags[]" id="tag{{ $tag->id }}" value="{{ $tag->id }}">
                                                        <label for="tag{{ $tag->id }}" class="custom-control-label">{{ $tag->name }}</label>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="description">Description</label>
                                                <textarea name="description" id="description" rows="4" class="form-control" placeholder="Enter description">{{ old('description') }}</textarea>
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-primary btn-lg">Submit</button>
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


@section('style')
    <link rel="stylesheet" href="{{ asset('admin/css/summernote-bs4.min.css') }}">
@endsection

@section('script')
    <script src="{{ asset('admin/js/summernote-bs4.min.js') }}"></script>
    <script>
        $('#description').summernote({
          placeholder: 'Hello Bootstrap 4',
          tabsize: 2,
          height: 300
        });
    </script>
@endsection
