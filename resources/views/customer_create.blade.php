@extends('layouts.master')

@section('content')

    <!-- Content Header (Page header) -->
    
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">
          <div class="card">
              <div class="card-header">
                <h3 class="card-title">Create Customer</h3>
                <a href="/customers" class="btn btn-default" style="float:right">Back</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              @if ($errors->any())
                  <div class="alert alert-danger">
                      <ul>
                          @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                          @endforeach
                      </ul>
                  </div>
              @endif
              <form action="/customers" method="POST">
                      @csrf
                      <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" class="form-control" value="{{old('name')}}">
                      </div>
                      <div class="form-group">
                        <label for="name">Phone Number</label>
                        <input type="text" name="ph" class="form-control" value="{{old('ph')}}">
                      </div>
                      <div class="form-group">
                        <label for="name">Brand/Model</label>
                        <input type="text" name="brand" class="form-control" value="{{old('brand')}}">
                      </div>
                      <div class="form-group">
                        <label for="name">Error</label>
                        <input type="text" name="error" class="form-control" value="{{old('error')}}">
                      </div>
                      <div class="form-group">
                        <label for="name">Adaptor</label>
                        <input type="text" name="adaptor" class="form-control" value="{{old('adaptor')}}">
                      </div>
                      <div class="form-group">
                        <label for="name">Bag</label>
                        <input type="text" name="bag" class="form-control" value="{{old('bag')}}">
                      </div>
                      <div class="form-group">
                        <label for="name">Note</label>
                        <input type="text" name="note" class="form-control" value="{{old('note')}}">
                      </div>
                      <div class="form-group">
                          <label for="name">Servicer</label><br>
                          <select name="technician_id"  class="form-control">
                              <option value="" class="form-control">Select Technician</option>
                              @foreach( $technicians as $technician)
                              <option value="{{ $technician->id }}" class="form-control">{{ $technician->name}}</option>
                              @endforeach
                          </select>
                      </div>
                      
                      <button class="btn btn-success" type="submit">Create</button>
                  </form>
              </div>
              <!-- /.card-body -->
              </div>
              </div>
        </div>
              

            
           
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  
  <!-- /.content-wrapper -->
@endsection
 