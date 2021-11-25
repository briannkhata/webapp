<!DOCTYPE html>
<html lang="en">
<head>
    <title>Brian Task | Login</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->  
    <link rel="icon" type="image/png" href="LoginDesign/images/icons/favicon.ico"/>
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="LoginDesign/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="LoginDesign/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="LoginDesign/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="LoginDesign/vendor/animate/animate.css">
<!--===============================================================================================-->  
    <link rel="stylesheet" type="text/css" href="LoginDesign/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="LoginDesign/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="LoginDesign/vendor/select2/select2.min.css">
<!--===============================================================================================-->  
    <link rel="stylesheet" type="text/css" href="LoginDesign/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="LoginDesign/css/util.css">
    <link rel="stylesheet" type="text/css" href="LoginDesign/css/main.css">
<!--===============================================================================================-->
</head>
<body>
    @if (Session::has('logoutt'))
   <div class="alert alert-info text-center text-danger" style="margin: 0rem;">{{ Session::get('logoutt') }}</div>
    @endif

    @if(Session::has('message'))
   <div class="alert alert-danger text-center text-red" style="margin: 0rem;">{{ Session::get('message') }}</div>
    @endif
    
    <div class="limiter">
        <div class="container-login100" style="background-image: url('LoginDesign/images/bg-01.jpg');">
            <div class="wrap-login100 p-t-30 p-b-50">
                
                <form class="login100-form validate-form p-b-33 p-t-5" action="{{url('login')}}" method="post">
                    <br><br>
                    <span class="login100-form-title p-b-41" style="color: black; margin-top: 3%;">
                        Account Login
                     </span>
                     <hr>
                            @csrf

                    <div class="wrap-input100 validate-input" data-validate = "Enter username">
                        <input class="input100" type="email" name="username" placeholder="Username">
                        <span class="focus-input100" data-placeholder="&#xe82a;"></span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Enter password">
                        <input class="input100" type="password" name="pass" placeholder="Password">
                        <span class="focus-input100" data-placeholder="&#xe80f;"></span>
                    </div>

                    <div class="container-login100-form-btn m-t-32">
                        <button class="login100-form-btn">
                            Login
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
    

    <div id="dropDownSelect1"></div>
    
<!--===============================================================================================-->
    <script src="LoginDesign/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
    <script src="LoginDesign/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
    <script src="LoginDesign/vendor/bootstrap/js/popper.js"></script>
    <script src="LoginDesign/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
    <script src="LoginDesign/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
    <script src="LoginDesign/vendor/daterangepicker/moment.min.js"></script>
    <script src="LoginDesign/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
    <script src="LoginDesign/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
    <script src="LoginDesign/js/main.js"></script>
    <script type="text/javascript">
      $(".alert").fadeTo(2000, 500).slideUp(500, function(){
      $(".alert").slideUp(500);
   });
  </script>

</body>
</html>