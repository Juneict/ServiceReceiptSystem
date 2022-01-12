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
                <h3 class="card-title">Create Tasks</h3>
                <a href="/tasks" class="btn btn-default" style="float:right">Back</a>
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
              <form action="/tasks " method="POST">
                      @csrf
                      <div class="form-group">
                          <label for="name">Customer</label><br>
                          <select name="customer_id"  class="form-control">
                              <option value="" class="form-control">Select Customer</option>
                              @foreach( $customers as $customer)
                              <option value="{{ $customer->id }}" class="form-control">{{ $customer->name}} ({{ $customer->error}})</option>
                              @endforeach
                          </select>
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
                      <div class="form-group">
                        <label for="name">Estimated Amount</label>
                        <input type="text" name="estimated_amount" class="form-control" value="{{old('adaptor')}}">
                      </div>
                      <div class="form-group">
                        <label for="name">Total Amount</label>
                        <input type="text" name="total_amount" class="form-control" value="{{old('bag')}}">
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
 