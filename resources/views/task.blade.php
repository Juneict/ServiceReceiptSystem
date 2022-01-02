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
                <h3 class="card-title">Tasks</h3>
                <a href="/tasks/create" class="btn btn-success" style="float:right">Create</a>
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
                        <th>Received Date</th>
                        <th>Name</th>
                        <th>Brand/Model</th>
                        <th>Error</th>
                        <th>Estimated Amount</th>
                        <th>Total Amount</th>
                        <th>Status</th>
                        <th>Technician</th>
                        <th>TakeBack Date</th>
                        <th>Action</th>
                      
                      </tr>
                  </thead>
                  <tbody>
                  @foreach( $tasks as $task)
                    <tr>
                        <td>{{ $task->created_at->format('Y-m-d')}}</td>
                        <td>{{ $task->customers->name}}</td>
                        <td>{{ $task->customers->brand}}</td>
                        <td>{{ $task->customers->error}}</td>
                        <td>{{ $task->estimated_amount}}</td>
                        <td>{{ $task->total_amount}}</td>
                        <td><span class="badge bg-success">{{ $status[$task->status]}}</span></td>
                        <td>{{ $task->technicians->name}}</td>
                        <td>{{ $task->updated_at->format('Y-m-d')}}</td>
                        
                       
                         
                         <td>
                         
                         <!-- Example single danger button -->
                         <div class="btn-group">
                    <button type="button" class="btn btn-info">Action</button>
                    <button type="button" class="btn btn-info dropdown-toggle dropdown-hover dropdown-icon" data-toggle="dropdown">
                      <span class="sr-only">Toggle Dropdown</span>
                    </button>
                    <div class="dropdown-menu" role="menu">
                    <a  href="/tasks/{{$task->id}}/edit" class="dropdown-item btn btn-success mr-2" >Edit</a>
                    <a  href="/tasks/{{$task->id}}/approve" class=" dropdown-item btn btn-success mr-2" >Approve</a>
                    <a  href="/tasks/{{$task->id}}/cancel" class="dropdown-item btn btn-danger mr-2 ">Cancle</a>
                    <a  href="/tasks/{{$task->id}}/complete" class="dropdown-item btn btn-info mr-2 " >Complete</a>
                    <a  href="/tasks/{{$task->id}}/completeNot" class="dropdown-item btn btn-warning my-2 " >Complete(TakeBack)</a>
                    <a  href="/tasks/{{$task->id}}/task_invoice" class="dropdown-item btn btn-warning my-2 " >Print Invoice</a>
                    </div>
                  </div>

                         <!-- <div class="form-row">
                         
                         <a  href="/tasks/{{$task->id}}/approve" class="btn btn-success mr-2" >Approve</a>
                         <a  href="/tasks/{{$task->id}}/edit" class="btn btn-success mr-2" >edit</a>
                          <a  href="/tasks/{{$task->id}}/cancel" class="btn btn-danger mr-2 ">Cancle</a>
                          <a  href="/tasks/{{$task->id}}/complete" class="btn btn-info mr-2 " >Done(OK)</i></a>
                          <a  href="/tasks/{{$task->id}}/completeNot" class="btn btn-warning my-2 " >Done(Not oK)</i></a>
                          </div> -->
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" referrerpolicy="no-referrer"></script>

<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
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
