<?php 
session_start();

require_once "cursos/clases/conexion.php";
$obj= new conectar();
$conexion=$obj->conexion();
$tildes = $conexion->query("SET NAMES 'utf8'");


 $nombre_carpeta="";


$Correo_Electronico="";


if (isset($_POST['email'])) {
  $Correo_Electronico=$_POST['email'];
}



if (isset($_SESSION['user_id'])) {
  header('Location: micuenta.php');
}

if (!empty($_POST['email']) && !empty($_POST['password'])) {

	$sql="SELECT id, nombres, apellidos, tipodocumento, documento, tipoPoblacion, email, password, 
	fechaRegistro, rol, fecha_sesion, telefono, fechaNacimiento, municipio, sexo, img, centro 
	FROM users WHERE email = '$Correo_Electronico'";
	$result_login = mysqli_fetch_row(mysqli_query($conexion,$sql));
	$user = null;
  
	if (count($result_login) > 0) {
	  $user = $result_login;
	}

  if (count($result_login) > 0 && ($_POST['password']==$user[7])) {
    $_SESSION['user_id'] = $user[0];

    $fecha=date('y-m-d');
    include 'save-fecha-sesion.php';

    header("Location: micuenta.php");

  } else {
    echo "<script>alert('Lo sentimos, su correo o contraseña son erroneos, por favor verifique nuevamente su información y accede al aplicativo.');</script>";
  }

}

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <link rel="icon" href="assets/logoSena.png">
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>
  <title>Iniciar sesión | Oferta Complementaria</title>
  <meta property="og:title" content="Iniciar sesión | Oferta Complementaria">
  <meta name="csrf-param" content="authenticity_token" />
  <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">
  
  <meta name="csrf-token" content="sD0hPoBuliGFd5InGhre2tEwqBOWq5IyYKAr5Wcj/6NdVI39jnyEqFx6JUMBQiSF2YRkJZbYZjp8VUo/qVtfog==" />
  <link rel="stylesheet" media="all" href="assets/general.css" data-turbolinks-track="reload" />
  <link rel="stylesheet" media="screen" href="assets/grupos.css" />
  <script src="assets/general.js" data-turbolinks-track="reload"></script>
  <style type="text/css">
    .footer_new {
      bottom: 0;
      text-align: center;
      font-size: 15px;
      width: 100%;
      height: 50px; /* Set the fixed height of the footer here */
      line-height: 44px; /* Vertically center the text there */
      background-color: #FF6C00;
      color: white;
    }
  </style>
</head>
<body>

 <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title " id="exampleModalLabel" style="font-size: 28px; text-align:center;"><i class="fa fa-envelope-open" aria-hidden="true"></i> ¿Olvidaste tu contraseña?<button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button></h5>
        
      </div>
      <div class="modal-body">
        <form action="recover.php" method="POST">
          <div class="form-group">
            <label for="txtCorreo" class="col-form-label" requerid><i class="fa fa-envelope" aria-hidden="true"></i> Correo electronico:</label>
            <input type="email" class="form-control" id="txtCorreo" name="txtCorreo" required="" >
          </div>

        </div>
        <div class="modal-footer">
         <input type="submit" value="Recuperar contraseña" class="btn" style="background-color: #FF6C00; color: white; border-color: #FF6C00; ">
       </form>
     </div>
   </div>
 </div>
</div>

<?php  include 'header.php';?>


<div class="mt-1 PopUpContainer">
  <div class="contentContainer">
    <ol class="breadcrumb"><li><a href="index.php">Inicio</a></li><li class="active">Iniciar sesión</li></ol>
  </div>
</div>
</div>

<!--<div class="contenedor-vistas">-->
  <div class="container down">

    <div class="container">
      <div class="row">
        <div class="col-xs-12 col-sm-6 col-sm-offset-3">
          <div class="full-width container-login">
            <i class="fa fa-user container-login-icon" aria-hidden="true"></i>
            <h2 class="text-center text-light" >Iniciar Sesión</h2>
            <br>
            <form class="simple_form new_user" id="new_user" action="sign_in.php" accept-charset="UTF-8" method="post">
              <div class="form-group">
                <div class="form-group email optional user_email">
                  <label class="control-label email optional" for="user_email"><i class="fa fa-envelope" aria-hidden="true"></i> Correo electrónico</label>
                  <input class="form-control string email optional form-control input-lg" autocomplete="email" autofocus="autofocus" placeholder="Usuario" required=""  type="email" value="" name="email" id="user_email" />
                </div>
              </div>
              <div class="form-group">
               <div class="form-group password optional user_password">
                <label class="control-label password optional" for="user_password"><i class="fa fa-key" aria-hidden="true"></i> Password</label>
                <input class="form-control password optional form-control input-lg" autocomplete="current-password" placeholder="Contraseña" required="" type="password" name="password" id="user_password" />
              </div>
            </div>
            <a  data-toggle="modal" data-target="#exampleModal"><i class="fa fa-key" aria-hidden="true"></i> ¿Olvidaste tu contraseña?</a>
            <button class="btn btn-outline-primary btn-block" type="submit"> Iniciar sesión  </button>
          </form>  
          <a href="sign_up.php" class="btn btn-outline-primary btn-block">Registrarme</a>        
        </div>
      </div>
    </div>
  </div>
</div>

<footer class="footer_new">
  <div class="container">
    <span class="">Todos los derechos <?php echo '&copy'; echo date("Y"); ?>  SENA - Políticas de privacidad y condiciones uso Portal Web SENA</span>
  </div>
</footer>
<!-- Demo ads. Please ignore and remove. -->
<script src="http://cdn.tutorialzine.com/misc/enhance/v2.js" async></script>
<!-- ====== Pie de pagina ======-->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<link rel="stylesheet" href="assets/bootstrap/4.0.0-alpha.5/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js" integrity="sha384-3ceskX3iaEnIogmQchP8opvBy3Mi7Ce34nWjpBIwVTHfGYWQS9jwHDVRnpKKHJg7" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.3.7/js/tether.min.js" integrity="sha384-XTs3FgkjiBgo8qjEjBk0tGmf3wPrWtA6coPfQDfFEY8AnYJwjalXCiosYRBIBZX8" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/js/bootstrap.min.js" integrity="sha384-BLiI7JTZm+JWlgKa0M0kGRpJbF2J8q+qreVrKBC47e3K6BW78kGLrCkeRX6I9RoK" crossorigin="anonymous"></script>
</body>

</html>
