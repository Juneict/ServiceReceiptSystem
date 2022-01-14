@extends('layouts.master')

@section('content')
 
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{ $orderNumber }}</h3>

                <p>New Orders</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="/orders" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{ $customerNumber}}</h3>

                <p>Customers</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="/customers" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>{{ $taskNumber }}</h3>

                <p>New Tasks</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="/tasks" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>{{ $completedNumber }}</h3>

                <p>Completed Tasks</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="/task_reports" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- TABLE: LATEST ORDERS -->
        <div class="card">
              <div class="card-header border-transparent">
                <h3 class="card-title">Latest Orders</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <div class="table-responsive">
                <table id="customers" class="table">
                  <thead>
                      <tr>
                        <th>Ordered Date</th>
                        <th>Name</th>
                        <th>Ph</th>
                        <th>Brand/Model</th>
                        <th>Part</th>
                        <th>Prepaid</th>
                        <th>Price</th>
                        
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
                        
                  </tr>
                  @endforeach
                 
                  </tbody>
                  
                </table>
                </div>
                <!-- /.table-responsive -->
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
                <a href="/orders/create" class="btn btn-sm btn-info float-left">Place New Order</a>
                <a href="/orders" class="btn btn-sm btn-secondary float-right">View All Orders</a>
              </div>
              <!-- /.card-footer -->
            </div>
            <!-- /.card -->
            
            <div class="card">
              <div class="card-header border-transparent">
                <h3 class="card-title">New Customers</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <div class="table-responsive">
                <table id="customers" class="table">
                  <thead>
                      <tr>
                      <th>Received Date</th>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Brand/Model</th>
                        <th>Error</th>
                        <th>Note</th>
                        
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
                        
                  </tr>
                  @endforeach
                 
                  </tbody>
                  
                </table>
                </div>
                <!-- /.table-responsive -->
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
                <a href="/orders/create" class="btn btn-sm btn-info float-left">Place New Order</a>
                <a href="/orders" class="btn btn-sm btn-secondary float-right">View All Orders</a>
              </div>
              <!-- /.card-footer -->
            </div>
            <!-- /.card -->
           
          </div>
          <!-- /.col -->
       
      </div><!-- /.container-fluid -->

      
    </section>
    <!-- /.content -->
    
@endsection

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
