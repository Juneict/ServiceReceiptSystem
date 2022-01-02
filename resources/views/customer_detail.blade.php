
@extends('layouts.master')

@section('content')
<div class="wrapper">
  <!-- Main content -->
  <section class="invoice">
    <!-- title row -->
    <!-- <div class="row">
      <div class="col-12">
        <h2 class="page-header">
        <img src="/dist/img/logo.png" alt="" width="180" height="100">  ICT Technology Solution 
          <h5>အမှတ်(၁၀/၁၁)၊ ပထမထပ်၊ အဆင့်မြင့် သုံးထပ်ဈေး၊လမ်းငါးသွယ်၊စိုးကောမင်းရပ်ကွက်၊မကွေးမြို့။</h5>
          <h5><p>Ph : 09-785433166 (Laptop Service) , 09-43009421  (Desktop &  Printer Service)</p></h5>
        </h2>
      </div>
    
    </div> -->
    <!-- info row -->
    <div class="row invoice-info">
      
      <!-- /.col -->
      <div class="col-sm-8 invoice-col pl-3">
        To
        <address>
          <strong> Customer Name : {{ $customer->name }}</strong><br>
          Phone : {{ $customer->ph }}<br>
          <b>Recepit No : {{ $customer->id}}</b><br>
          <b>Receving Date : </b> {{ $customer->created_at->format('Y-m-d') }}<br>
          <b>Serviced by : </b> {{ $customer->technicians->name }}<br>
        </address>
      </div>
      <!-- /.col -->
      <div class="col-sm-4 invoice-col">
      
      
        
        
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

    <!-- Table row -->
    <div class="row">
      <div class="col-12 pl-3">
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
            <!-- <td>{{ $customer->technicians->name }}</td> -->
        
          </tbody>
          <tfoot>
            <tr>
            <th>Error</th>
            <td colspan="7" class="text-center">{{ $customer->error}}</td>
            </tr>
            
          </tfoot>
        </table>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

    <!-- <div class="row">
    
      <div class="col-12">
        <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
        မှတ်ချက်။  ။ စက်ကိုစစ်ဆေးပြီးမှ (၃)ရက် အတွင်း အကြောင်းကြားပေးပါမည်။ပြုပြင်ပြီးစက်များကို မီးအားကြောင့်ဖြစ်သော(Phyisical error ဖြစ်ပါက တာဝန်မယူပါ။
    လက်ခံဘောက်ချာမပါ၊ပျောက်ဆုံးပါက စက်ပြန်လည်ထုတ်မပေးပါ။
        </p>
       <p>စက်ကို စစ်ဆေးပြုပြင်ပြီး(၃၀)ရက်အတွင်း စက်လာမယူလျှင် တာဝန်မယူပါ။ Data(လုံးဝ) တာဝန်မယူပါ။( Sunday ဆိုင်ပိတ်ပါသည်။)</p> 
      </div>
      
    </div> -->
    <!-- /.row -->
    <div class="row no-print pl-3">
        <div class="col-md-12">
          <a href="/customers/{{$customer->id}}/customer_invoice" class="btn btn-default mr-3"><i class="fa fa-print"></i> Print</a>
          <a href="/customers" class="btn btn-success mr-3">back</a>
          <form action="/customers/{{$customer->id}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger mt-3" type="submit" ><i class="fas fa-trash-alt"></i>Delete Customer</button>
          </form>
        </div>
      </div><br>
  </section>
  <!-- /.content -->
</div>

@endsection
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" referrerpolicy="no-referrer"></script>
<script>
  $(function () {
    
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
