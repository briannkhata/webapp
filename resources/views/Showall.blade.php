<!doctype html>
<html lang="en">
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css" rel="stylesheet">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <link rel="stylesheet" type="text/css" href="main.css">

    <title>Brian Task | Tax Payers</title>
  </head>
  <body>
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

  @if (Session::has('edit'))
   <div class="alert alert-info text-center text-danger" style="margin: 0rem;">{{ Session::get('edit') }}</div>
  @endif

  <div class="col-md-12" style="padding:3%;">
    <h3>Tax Payers</h3>
    <hr>
        <a href="add" class="col-4 nav-link btn btn-outline-info text-dark">
            Add Tax Payer <i class="fa fa-plus-circle fa-lg"></i></a>
    <br>

        <table class="table table-bordered" id="listTaxpayer"> 
            <thead>
                <th style="width:3%;">#</th> 
                <th>TPIN</th> 
                <th>Business Certificate Number</th> 
                <th>Trading Name</th> 
                <th>Business Registration Date</th>
                <th>Contacts</th>
                <th>Physical Location</th>
                <th>Action</th>
            </thead>
            <tbody id="Taxpayers">
              
            </tbody>
        </table>
   
  </div>
   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>
    <script type="text/javascript">
      $(document).ready(function(){
          $.ajax({
                url:'getTaxpayers',
            success:function(data){
               $('#Taxpayers').html(data);
               $('#listTaxpayer').dataTable();
              }
          });

      });

    </script>
     <script type="text/javascript">
      $(".alert").fadeTo(2000, 500).slideUp(500, function(){
      $(".alert").slideUp(500);
   });
  </script>
  </body>
</html>