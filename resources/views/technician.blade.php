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
                <h3 class="card-title">Technicians</h3>
                <a href="/technicians/create" class="btn btn-success" style="float:right">Create</a>
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
                        <th>Name</th> 
                        <th>Action</th>                                             
                      </tr>
                  </thead>
                  <tbody>
                  @foreach( $technicians as $technician)
                    <tr>
                        <td>{{ $technician->name }}</td>                     
                         
                         <td>
                         

                         <div class="form-row">
                         
                      
                          <a  href="/technicians/{{$technician->id}}/edit" class="btn btn-warning  mx-auto" style="height:30px"><i class="fas fa-pencil-alt"></i></a>
                          
                          <form action="/technicians/{{$technician->id}}" method="POST">
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
      "searching:false",
      "ordering": false,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
