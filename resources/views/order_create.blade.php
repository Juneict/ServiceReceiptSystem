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
                <h3 class="card-title">Create Order</h3>
                <a href="/orders" class="btn btn-default" style="float:right">Back</a>
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
              <form action="/orders" method="POST">
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
                        <label for="name">Part</label>
                        <input type="text" name="part" class="form-control" value="{{old('part')}}">
                      </div>
                      <div class="form-group">
                        <label for="name">Prepaid</label>
                        <input type="text" name="prepaid" class="form-control" value="{{old('prepaid')}}">
                      </div>
                      <div class="form-group">
                        <label for="name">Price</label>
                        <input type="text" name="price" class="form-control" value="{{old('price')}}">
                      </div>
                      <button class="btn btn-success" type="submit">Create</button>
                     
                      </div>
                      
                     
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
 