<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <title>Brian Task | Edit Tax Payer</title>
  </head>
  <body>

    <style type="text/css">
        .topnav {
    background-color: #0dcaf0;
    overflow: hidden;
    }

    .topnav a {
      float: left;
      color: #f2f2f2;
      text-align: center;
      padding: 14px 16px;
      text-decoration: none;
      font-size: 17px;
    }

    .topnav .yes-hover:hover {
      background-color: #ddd;
      color: black;
    }

    /* Add a color to the active/current link */
    .topnav a.active {
      background-color: #04AA6D;
      color: white;
    }

    /* Right-aligned section inside the top navigation */
    .topnav-right {
      float: right;
    }

  hr{
        border: 0;
        height: 0;
        border-top: 1px solid rgba(0, 0, 0, 0.1);
        border-bottom: 1px solid rgba(255, 255, 255, 0.3);
    }
    </style>
    <div class="topnav" style="overflow:hidden;">
      <a href=""><b>TaxPayers System-Brian</b></a>
      <a href=""></a>
      <a href=""> <i class="fa fa-clock-o"></i> {{ date('d, F Y H:i:s') }}</a>
      <a href=""></a>
      <a href=""></a>
      <div class="topnav-right">
        <a href=""><i class="fa fa-user"></i> {{session()->get('firstname')}} {{session()->get('lastname')}}</a>
        <a href="logout" title="Click to logout"  class="yes-hover"><i class="fa fa-sign-out"></i> Signout</a>
      </div>
    </div>

<div class="col-md-12" style="padding:3%;">
    <h3>Edit Tax Payer</h3>
    <hr>
       
    <br>
   @if (Session::has('logoutt'))
   <div class="alert alert-info text-center text-danger" style="margin: 0rem;">{{ Session::get('logoutt') }}</div>
   @endif

  @foreach($values as $va)
<form class="row g-3" action="{{url('update')}}" method="post">
  @csrf

  <div class="col-md-12">
    <label for="TradingName" class="form-label">Trading Name</label>
    <input type="text" class="form-control" name="TradingName" id="TradingName" value="{{$va->TradingName}}" required="">
  </div>

  <div class="col-md-4">
    <label for="TPIN" class="form-label">TPIN</label>
    <input type="text" class="form-control" id="TPIN" name="TPIN" value="{{$va->TPIN}}" required="">
  </div>

  <div class="col-md-4">
    <label for="Email" class="form-label">Email</label>
    <input type="email" class="form-control" name="email" id="Email"  value="{{$va->Email}}" required="">
  </div>

  <div class="col-md-4">
    <label for="MobileNumber" class="form-label">Mobile Number</label>
    <input type="telphone" class="form-control" name="MobileNumber" id="MobileNumber" value="{{$va->MobileNumber}}" required="">
   <input type="hidden" name="Username" id="Username" value="{{$va->Username}}">
  </div>

  <div class="col-12">
    <label for="PhysicalLocation" class="form-label">Physical Location</label>
    <input type="text" class="form-control" name="PhysicalLocation" id="PhysicalLocation" placeholder="1234 Main St" value="{{$va->PhysicalLocation}}"   required="">
  </div>
  
  <div class="col-md-6">
    <label for="BusinessCertificateNumber" class="form-label">Business Certificate Number </label>
    <input type="text" class="form-control" id="BusinessCertificateNumber" name="BusinessCertificateNumber"  value="{{$va->BusinessCertificateNumber}}" required="">
  </div>
  

  <div class="col-md-6">
    <label for="BusinessRegistrationDate" class="form-label">Business Registration Date</label>
    <input type="date" class="form-control" name="BusinessRegistrationDate" id="BusinessRegistrationDate"  value="{{$va->BusinessRegistrationDate}}" required="">
  </div>
   
  <br>
  <div class="col-md-12" style="margin-top: 2%;">
    <button type="submit" class="col-3 btn btn-outline-info">Update tax Payer</button>
    <a href="showall" class="col-3 btn btn-outline-info">Back</a>
  </div>
</form>
</div>
  @endforeach
   
     
  </body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  <script type="text/javascript">
    $(".alert").fadeTo(2000, 500).slideUp(500, function(){
    $(".alert").slideUp(500);
   });
  </script>
</html>