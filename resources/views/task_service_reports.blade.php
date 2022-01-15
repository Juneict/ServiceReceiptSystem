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
                <h3 class="card-title">YGN/ MDY TUN Service Reports</h3>
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
              <table id="customers" class="table table-bordered table-striped">
                  <thead>
                      <tr>
                        <th>Received Date</th>
                        <th>Name</th>
                        <th>Brand/Model</th>
                        <th>Error</th>
                        <th>Estimated Amount</th>
                        <th>Total Amount</th>
                        <th>Note</th>
                        <th>Status</th>
                        <th>Technician</th>
                        <th>TakeBack Date</th>
                       
                      
                      </tr>
                  </thead>
                  <tbody>
                  @foreach( $tasks as $task)
                    <tr>
                        <td>{{ $task->created_at->format('Y-m-d')}}</td>
                        <td>{{  $task->customers->name}}</td>
                        <td>{{   $task->customers->brand}}</td>
                        <td>{{  $task->customers->error}}</td>
                        <td>{{  $task->estimated_amount}}</td>
                        <td>{{  $task->total_amount}}</td>
                        <td>{{  $task->customers->note}}</td>
                        <td><span class="badge bg-success">{{ $status[ $task->status]}}</span></td>
                        <td>{{  $task->technicians->name}}</td>
                        <td>{{  $task->updated_at->format('Y-m-d')}}</td>
                         
                        
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


<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->

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
    $('#completed_task').DataTable({
      "paging": true,
      "lengthChange": false,
      
      "ordering": false,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
