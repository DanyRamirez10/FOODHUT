<head>
    <meta charset="UTF-8" />
    <link rel="icon" type="image/x-icon" href="/assets/logo-vt.svg" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx"
      crossorigin="anonymous"
    />
    <style>
        body{
            Background-image: url("https://static.neweuropetours.eu/wp-content/uploads/2018/08/best-restaurants-1600x900.jpg");
            Background-repeat:no-repeat;
            Background-size:cover;
            Background-position:center;
            Background-attachment:fixed;
            background-color: aliceblue;
            
        }

        body:before{
            width: 100%;
            height: 100vh;
            Background:linear-gradient(130deg,·509fc9,·e83b59);
            opacity:0.7;
        }
        .rg{
         margin-right: 40px;
        }
    </style>
</head>

<div id="login-container" class="animation-fadeIn">
           
 <form id="login_php" class="form-horizontal form-bordered form-control-borderless">
     <body class="d-flex d-flex flex-row-reverse align-items-center vh-100 rg rg">
                <div
      class="rg bg-white p-5 rounded-5 text-secondary shadow"
      style="width: 25rem">
      <div class="d-flex justify-content-center">
        <img src="./assets/images/login.ico"alt="login-icon"style="height: 7rem"/>
      </div>

      <div class="text-center fs-2 fw-bold">Bienvenido Usuario</div>
       <div class="input-group mt-4">
                                <div class="input-group-text ">
                                <img src="./assets/images/logUsu.ico"alt="username-icon" style="height: 1rem"/>
                                </div>
                                <input type="text" name="email" class="form-control input-lg" placeholder="Email"/>
                            </div>
       
      <div class="input-group mt-2">
        <div class="input-group-text ">
          <img
            src="./assets/images/passUsu.ico"
            alt="password-icon"
            style="height: 1rem"
          />
        </div>
        <input type="password" name="password" class="form-control input-lg" placeholder="Password"
        />
      </div>
      <div class="d-flex justify-content-around mt-1">
        <div class="d-flex align-items-center gap-1">
          <input class="form-check-input" type="checkbox" />
          <div class="pt-1" style="font-size: 0.9rem">Remember me</div>
        </div>
        <div class="pt-1">
          <a
            href="#"
            class="text-decoration-none text-info fw-semibold fst-italic"
            style="font-size: 0.9rem"
            >Forgot your password?</a
          >
        </div>
      </div>
                        <div id="div_login" class="col-xs-12"></div>
                    <div class="form-group">
                    <div class="col-xs-8 text-right">
                            <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-angle-right"></i> Login to Dashboard</button>
                        </div>
      <div class="d-flex gap-1 justify-content-center mt-1">
        <div>Don't have an account?</div>
        <a href="#" class="text-decoration-none text-info fw-semibold"
          >Register</a
        >
        </div>
    </div>
   </body>                 
</form>
</div>
</html>
<?php include_once 'sections/script.php';?>
        <!-- Load and execute javascript code used only in this page -->
        <script src="assets/template/admin/js/pages/login.js"></script>
        <script>$(function(){ Login.init(); });</script>
        <script src="lib/login.js"></script>
<?php include_once 'sections/template_fin.php';?>  

 