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
                      @if (session('message'))
                        <div class="alert alert-success">
                            {{ session('message') }}
                        </div>
                      @endif
                      @if (session('delete'))
                        <div class="alert alert-danger">
                            {{ session('delete') }}
                        </div>
                      @endif
              <div class="card-header">
                <h3 class="card-title">Orders</h3>
                <a href="/orders/create" class="btn btn-success" style="float:right">Create</a>
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
              <table id="customers" class="table table-bordered table-striped">
                  <thead>
                      <tr>
                        <th>Ordered Date</th>
                        <th>Name</th>
                        <th>Ph</th>
                        <th>Brand/Model</th>
                        <th>Part</th>
                        <th>Prepaid</th>
                        <th>Price</th>
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                  </thead>
                  <tbody>
                  @foreach( $orders as $order)
                    <tr>
                        <td>{{ $order->created_at->format('Y-m-d')}}</td>
                        <td>{{ $order->name}}</td>
                        <td>{{ $order->ph}}</td>
                        <td>{{ $order->brand }}</td>
                        <td>{{ $order->part}}</td>
                        <td>{{ $order->prepaid}}</td>
                        <td>{{ $order->price}}</td>
                        <td><span class="badge bg-success">{{ $status[$order->status]}}</span></td>     
                         <td>
                         
                         <!-- Example single danger button -->
                         <div class="btn-group">
                    <button type="button" class="btn btn-info">Action</button>
                    <button type="button" class="btn btn-info dropdown-toggle dropdown-hover dropdown-icon" data-toggle="dropdown">
                      <span class="sr-only">Toggle Dropdown</span>
                    </button>
                    <div class="dropdown-menu" role="menu">
                    <a  href="/orders/{{$order->id}}/edit" class="dropdown-item btn btn-success mr-2" >Edit</a>
                    <a  href="/orders/{{$order->id}}/ordering" class=" dropdown-item btn btn-success mr-2" >Ordering</a>
                    <a  href="/orders/{{$order->id}}/arrived" class="dropdown-item btn btn-danger mr-2 ">Arrived</a>
                    <a  href="/orders/{{$order->id}}/completed" class="dropdown-item btn btn-info mr-2 " >Completed</a>
                    <a  href="/orders/{{$order->id}}/cancle" class="dropdown-item btn btn-info mr-2 " >Cancle /Take Back</a>
                    <a  href="/orders/{{$order->id}}/invoice" class="dropdown-item btn btn-warning my-2 " >Print Invoice</a>
                    </div>
                  </div>

          
                          </td>
                         
                        
                  </tr>
                  @endforeach
                 
                  </tbody>
                  
                </table>
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
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>

<script>
  $(function () {
    $('div.alert').delay(3000).slideUp(300);
    $('#customers').DataTable({
      "paging": true,
      "lengthChange": false,
      
      "ordering": false,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
