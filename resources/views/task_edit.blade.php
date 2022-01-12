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
                <h3 class="card-title">Edit Tasks</h3>
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
              <form action="/tasks/{{$task->id}}" method="POST">
                      @csrf
                      @method('PUT')
                      <div class="form-group">
                          <label for="name">Customer</label><br>
                          <select name="customer_id"  class="form-control">
                              <option value="" class="form-control">Select Customer</option>
                              @foreach( $customers as $customer)
                              <option value="{{ $customer->id }}"{{ $customer->id == $task->customer_id ? 'selected' :''}}>{{ $customer->name}}</option>
                              @endforeach
                          </select>
                      </div>
                      
                      <div class="form-group">
                          <label for="name">Servicer</label><br>
                          <select name="technician_id"  class="form-control">
                              <option value="" class="form-control">Select Technician</option>
                              @foreach( $technicians as $technician)
                              <option value="{{ $technician->id }}"{{ $technician->id == $task->technician_id ? 'selected' :''}}>{{ $technician->name}}</option>
                              @endforeach
                          </select>
                      </div>
                      <div class="form-group">
                        <label for="name">Status</label>
                        <input type="text" name="status" class="form-control" value="{{$task->status}}">
                      </div>
                      <div class="form-group">
                        <label for="name">Estimated Amount</label>
                        <input type="text" name="estimated_amount" class="form-control" value="{{ $task->estimated_amount}}">
                      </div>
                      <div class="form-group">
                        <label for="name">Total Amount</label>
                        <input type="text" name="total_amount" class="form-control" value="{{ $task->total_amount}}">
                      </div>
                     
                      
                      
                      <button class="btn btn-success" type="submit">Update</button>
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
 