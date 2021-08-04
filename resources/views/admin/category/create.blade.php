@extends('admin.layouts.master')
@section('content')
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">{{ $title }}</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('category.index') }}">Category List</a></li>
            <li class="breadcrumb-item active">{{ $title }}</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Fill This Form</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{ route('category.store') }}" method="POST">
              @csrf
              <div class="card-body">
                <div class="form-group">
                  <label for="name">Name</label>
                  <input type="text" name="name" class="form-control" value="{{ old('name') }}" id="name" placeholder="Enter category name">
                  @error('name') <i class="text-danger">{{ $message }}</i> @enderror
                </div>
                <div class="form-group">
                    <label for="description">Name</label>
                    <textarea type="text" name="description" class="form-control" value="{{ old('description') }}" id="description" placeholder="Enter category description"></textarea>
                    @error('description') <i class="text-danger">{{ $message }}</i> @enderror            
                  </div>
                <div class="form-group">
                    <label>Status</label>
                    <div class="form-check">
                        <input name= "status" type="radio" @if(old('status') && old('status') == 'active') checked @endif class="form-check-input" value= "active" id="active">
                        <label for="active">Active</label>
                    </div>    
                    <div class="form-check">
                      <input name= "status" type="radio" @if(old('status') && old('status') == 'inactive') checked @endif class="form-check-input" value= "inactive" id="inactive">
                      <label for="inactive">Inctive</label>
                  </div> 
                    @error('status') <i class="text-danger">{{ $message }}</i> @enderror
                </div> 
              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
          <!-- /.card -->
        </div>
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
@endsection