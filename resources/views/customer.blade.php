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
                <h3 class="card-title">Customers</h3>
                <a href="/customers/create" class="btn btn-success" style="float:right">Create</a>
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
                        <th>Phone</th>
                        <th>Brand/Model</th>
                        <th>Error</th>
                        <th>Note</th>
                        <!-- <th>Adaptor</th>
                        <th>Bag</th>
                        
                        <th>Servicer</th> -->
                        
                        <th>Action</th>
                      
                      </tr>
                  </thead>
                  <tbody>
                  @foreach( $customers as $customer)
                    <tr>
                        <td>{{ $customer->created_at->format('Y-m-d') }}</td>
                        <td>{{ $customer->name}}</td>
                        <td>{{ $customer->ph}}</td>
                        <td>{{ $customer->brand}}</td>
                        <td>{{ $customer->error}}</td>
                        <td>{{ $customer->note}}</td>
                        <!-- <td>{{ $customer->adaptor}}</td>
                        <td>{{ $customer->bag}}</td>
                        
                        <td>{{ $customer->technicians->name}}</td> -->
                        
                         
                         <td>
                         

                         <div class="form-row">
                         
                         <a  href="/customers/{{$customer->id}}" class="btn btn-default mx-auto" style="height:30px"><i class="far fa-eye"></i></a>
                          <a  href="/customers/{{$customer->id}}/edit" class="btn btn-warning  mx-auto" style="height:30px"><i class="fas fa-pencil-alt"></i></a>
                          
                          <form action="/customers/{{$customer->id}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger  mx-auto" type="submit" ><i class="fas fa-trash-alt"></i></button>
                          </form>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" referrerpolicy="no-referrer"></script>
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
