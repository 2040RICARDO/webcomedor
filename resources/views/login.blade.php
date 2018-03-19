
<!DOCTYPE html>
<html lang="es">
  
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Formulario Login</title>

    <link rel="stylesheet" href="assets/log/css/bootstrap.min.css">    
    <link rel="stylesheet" href="assets/log/font-awesome/css/font-awesome.min.css"> <!--Iconos--> 
    <link rel="stylesheet" href="assets/log/css/custom.css">

    <style type="text/css">

    </style>
  </head>
 
  <body>
    <div class="my-content" >
        <div class="container" > 

            <div class="row">
              <div class="col-sm-12" >
                  <h1><strong style="font-family: Impact; font-size: 60px; color: #00c853;">BIENESTAR</strong><strong style="font-size: 50px;"> Social</strong></h1>
                  <h3>Sistema de control de asistencia</h3>
                  <hr>
              </div>
            </div>

            <div class="row">
                  <div class="col-sm-6 col-sm-offset-3 myform-cont" >
                      <div class="myform-top">
                          <div class="myform-top-left">
                            <h3>Digite su Login y Password</h3>
                          </div>
                          <div class="myform-top-right">
                            <i class="fa fa-key"></i>
                          </div>
                      </div>
                      <div class="myform-bottom">
                        <form action="login" method="post">
                         <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>"> 
                          <div class="form-group">
                              <input type="text" name="username" placeholder="Login..." class="form-control" id="form-username">
                          </div>
                          <div class="form-group">
                              <input type="password" name="password" placeholder="Password..." class="form-control" id="form-password">
                          </div>
                          <button type="submit" class="mybtn">Ingresar</button>
                        </form>
                        <br>
                        <a href="welcome" style="margin-left: 20px;">Regresar</a>
                      </div>
                  </div>
            </div>
        </div>
    </div>
    <script src="assets/log/js/bootstrap.min.js"></script>
  </body>

</html>