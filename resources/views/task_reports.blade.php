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
                <h3 class="card-title">Completed Tasks</h3>
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
                        <th>Status</th>
                        <th>Technician</th>
                        <th>TakeBack Date</th>
                       
                      
                      </tr>
                  </thead>
                  <tbody>
                  @foreach( $completeds as $completed)
                    <tr>
                        <td>{{ $completed->created_at->format('Y-m-d')}}</td>
                        <td>{{ $completed->customers->name}}</td>
                        <td>{{ $completed->customers->brand}}</td>
                        <td>{{ $completed->customers->error}}</td>
                        <td>{{ $completed->estimated_amount}}</td>
                        <td>{{ $completed->total_amount}}</td>
                        <td><span class="badge bg-success">{{ $status[$completed->status]}}</span></td>
                        <td>{{ $completed->technicians->name}}</td>
                        <td>{{ $completed->updated_at->format('Y-m-d')}}</td>
                         
                        
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
