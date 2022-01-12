
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>ICT SRS | Invoice Print</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
</head>
<body>
<div class="container">
  <!-- Main content -->
  <section class="invoice">
    <!-- title row -->
    <div class="row">
      <div class="col-12">
        <h2 class="page-header">
        <img src="/dist/img/logo.png" alt="" width="180" height="100">  ICT Technology Solution 
          <h5>အမှတ်(၁၀/၁၁)၊ ပထမထပ်၊ အဆင့်မြင့် သုံးထပ်ဈေး၊လမ်းငါးသွယ်၊စိုးကောမင်းရပ်ကွက်၊မကွေးမြို့။</h5>
          <h5><p>Ph : 09-785433166 (Laptop Service) , 09-43009421  (Desktop &  Printer Service)</p></h5>
        </h2>
      </div>
      <!-- /.col -->
    </div>
    <!-- info row -->
    <div class="row invoice-info">
      
      <!-- /.col -->
      <div class="col-sm-8 invoice-col">
        Inovice
        To
        <address>
          <strong> Customer Name : </strong>{{ $order->name }}<br>
          Phone : {{ $order->ph }}<br>

        </address>
      </div>
      <!-- /.col -->
      <div class="col-sm-4 invoice-col">
        <br>
        <b>Order ID :  {{ $order->id}}</b><br>
      
        <b>Date : </b> {{ $date }}<br>
        
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

    <!-- Table row -->
    <div class="row">
      <div class="col-12 ">
        <table class="table  table-striped">
          <thead>
          <tr>
            <th>No</th>
            <th>Product</th>
            <th>Part</th>
            
            <th>Price</th>
          </tr>
          </thead>
          <tbody>         
            <td>1</td>
            <td>{{ $order->brand }}</td>
            <td>{{ $order->part}}</td>
            
            <td>{{ $order->price}}</td>
            <tfoot>
                <tr>
                    <td  colspan="2"></td>
                    <th>Prepaid</th>
                    <td>{{ $order->prepaid}}</td>
                </tr>
               <tr>
                    <td  colspan="2"></td>
                    <th>Total</th>
                    <td>{{ $order->price - $order->prepaid }}</td>
               </tr>
            </tfoot>
            
        </table>
        
      </div>
      
      <!-- /.col -->
    </div>
    <!-- /.row -->

    <div class="row">
      <!-- accepted payments column -->
      <div class="col-12">
        <p class="text-muted well well-sm shadow-none text-center" style="margin-top: 10px;">
                ဝယ်ယူအားပေးမှုကို အထူးကျေးဇူးတင်ပါသည်။
        </p>
        
      </div>
      <div class="col-6 mt-5">
        <p class="text-muted well well-sm shadow-none text-center" style="margin-top: 10px;">
        --------------------------
               Customer sign
        </p>
        
      </div>
      <div class="col-6  mt-5">
        <p class="text-muted well well-sm shadow-none text-center" style="margin-top: 10px;">
        --------------------------
               Casher sign
        </p>
        
      </div>
    </div>
    <div class="row no-print pl-3">
        <div class="col-md-12">
          
          <a href="/orders" class="btn btn-success mr-3 float-right">back</a>
         
        </div>
      </div><br>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<!-- ./wrapper -->
<!-- Page specific script -->
<script>
  window.addEventListener("load", window.print());
</script>
</body>
</html>

