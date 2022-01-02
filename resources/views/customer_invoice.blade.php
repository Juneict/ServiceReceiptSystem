
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
<div class="container ">
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
        To
        <address>
          <strong> Customer Name : </strong>{{ $customer->name }}<br>
          Phone : {{ $customer->ph }}<br>

        </address>
      </div>
      <!-- /.col -->
      <div class="col-sm-4 invoice-col">
        <br>
        <b>Recepit No : {{ $customer->id}}</b><br>
      
        <b>Receving Date : </b> {{ $customer->created_at->format('Y-m-d') }}<br>
        
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

    <!-- Table row -->
    <div class="row">
      <div class="col-12 ">
        <table class="table table-bordered table-striped">
          <thead>
          <tr>
            <th>Brand & Model</th>
            <td  colspan="7" class="text-center">{{ $customer->brand}}</td>
          </tr>
          </thead>
          <tbody>
          <tr>
            <th>Hard Disk</th>
            <th>Ram</th>
            <th>VGA</th>
            <th>Drive</th>
            <th>Battery</th>
            <th>Adaptor</th>
            <th>Bag</th>
            
            <th>Note</th>
            <!-- <th>Servicer</th> -->
            
          </tr>
          
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>{{ $customer->adaptor}}</td>
            <td>{{ $customer->bag}}</td>
            
            <td>{{ $customer->note}}</td>
    
        
          </tbody>
          <tfoot>
            <tr>
            <th>Error</th>
            <td colspan="7" class="text-center">{{ $customer->error}}</td>
            </tr>
            
          </tfoot>
        </table>
        <b>Servicer : </b> {{ $customer->technicians->name }}<br>
      </div>
      
      <!-- /.col -->
    </div>
    <!-- /.row -->

    <div class="row">
      <!-- accepted payments column -->
      <div class="col-12">
        <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
        မှတ်ချက်။  ။ စက်ကိုစစ်ဆေးပြီးမှ (၃)ရက် အတွင်း အကြောင်းကြားပေးပါမည်။ပြုပြင်ပြီးစက်များကို မီးအားကြောင့်ဖြစ်သော(Phyisical error) ဖြစ်ပါက တာဝန်မယူပါ။
    လက်ခံဘောက်ချာမပါ၊ပျောက်ဆုံးပါက စက်ပြန်လည်ထုတ်မပေးပါ။
        </p>
       <p>စက်ကို စစ်ဆေးပြုပြင်ပြီး(၃၀)ရက်အတွင်း စက်လာမယူလျှင် တာဝန်မယူပါ။ Data(လုံးဝ) တာဝန်မယူပါ။( တနင်္ဂနွေနေ့တိုင်း ဆိုင်ပိတ်ပါသည်။)</p> 
      </div>
      
    </div>
    <div class="row no-print pl-3">
        <div class="col-md-12">
          
          <a href="/customers" class="btn btn-success mr-3 float-right">back</a>
          <form action="/customers/{{$customer->id}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit" ><i class="fas fa-trash-alt"></i>Delete Customer</button>
          </form>
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

