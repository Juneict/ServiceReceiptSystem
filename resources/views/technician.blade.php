@extends('layouts.master')

@section('content')

    <!-- Content Header (Page header) -->
    
    <!-- /.content-header -->

    <div class="card card-solid">
        <div class="card-body pb-0">
          <div class="row">
              
              @foreach( $technicians as $technician)

              <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
              <div class="card bg-light d-flex flex-fill">
                <div class="card-header text-muted border-bottom-0">
                  Technician
                </div>
                <div class="card-body pt-0">
                  <div class="row">
                    <div class="col-7">
                      <h2 class="lead"><b>{{ $technician->name }}</b></h2>
                      <p class="text-muted text-sm"><b>About: </b> Technician </p>
                      <ul class="ml-4 mb-0 fa-ul text-muted">
                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span>Lan Bay</li>
                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> Phone #: </li>
                      </ul>
                    </div>
                    
                  </div>
                </div>
                <div class="card-footer">
                  <div class="text-right">
                    <a href="/technicians/{{$technician->id}}/edit" class="btn btn-sm bg-teal">
                      <i class="fas fa-comments"></i>Edit
                    </a>
                    <a href="#" class="btn btn-sm btn-danger">
                      <i class="fas fa-user"></i> Delete
                    </a>
                  </div>
                </div>
              </div>
            </div>

              @endforeach
              <!-- /.card-body -->
             
              </div>
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
