<?php 
session_start();

require_once "cursos/clases/conexion.php";
$obj= new conectar();
$conexion=$obj->conexion();

if (isset($_SESSION['user_id'])) {
	$id = $_SESSION['user_id'];
	$tildes = $conexion->query("SET NAMES 'utf8'");
	$sql="SELECT id, nombres, apellidos, tipodocumento, documento, tipoPoblacion, email, password, 
	fechaRegistro, rol, fecha_sesion, telefono, fechaNacimiento, municipio, sexo, img, centro 
	FROM users WHERE id = $id";
	$result_login = mysqli_fetch_row(mysqli_query($conexion,$sql));
	$user = null;
  
	if (count($result_login) > 0) {
	  $user = $result_login;
	}
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>
  <title>Mi cuenta | Oferta Complementaria</title>
  <link rel="icon" href="assets/logoSena.png">
  <meta property="og:title" content="Mi cuenta | Oferta Complementaria">
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
<?php if(!empty($user)): ?>

  <?php if ($user[9]=='1'): ?>
     <!-- contenido para Administrador -->
    <?php include 'header_admin.php'; ?>
    <div class="mt-4 PopUpContainer">
        <div class="contentContainer">
        </div>
        <!-- ====== PopUpLogin ======-->
        <?php include 'popupLogin_admin.php'; ?>
    </div>
  <?php elseif ($user[9]=='2'): ?>
    <!-- contenido para Aprendiz -->
    <?php include 'header_aprendiz.php'; ?>
    <div class="mt-4 PopUpContainer">
        <div class="contentContainer">
        </div>
        <!-- ====== PopUpLogin ======-->
        <?php include 'popupLogin_aprendiz.php'; ?>
    </div>
  <?php elseif ($user[9]=='3'): ?>
    <!-- contenido para Orientador -->
    <?php include 'header_orientador.php'; ?>
    <div class="mt-4 PopUpContainer">
        <div class="contentContainer">
        </div>
        <!-- ====== PopUpLogin ======-->
        <?php include 'popupLogin_orientador.php'; ?>
    </div>
  <?php elseif ($user[9]=='4'): ?>
    <!-- contenido para GESTOR -->
    <?php include 'header_gestor.php'; ?>
    <div class="mt-4 PopUpContainer">
        <div class="contentContainer">
        </div>
        <!-- ====== PopUpLogin ======-->
        <?php include 'popupLogin_gestor.php'; ?>
    </div>
  <?php else: ?>
    <!-- contenido para CERTIFICACION -->
    <?php include 'header_certificacion.php'; ?>
    <div class="mt-4 PopUpContainer">
        <div class="contentContainer">
        </div>
        <!-- ====== PopUpLogin ======-->
        <?php include 'popupLogin_certificacion.php'; ?>
    </div>
  <?php endif; ?>

  <div class="text-center"><br>
    <p class="font-weight-bold">Hola, <?php echo $user[1]." ".$user[2]."."; ?></p>
    <?php if (in_array($user[9], [1,3,4,5])): ?>

      <div class="container">
        <div class="row">
          <div class="card-group">
            <div class="card">
              <img class="card-img-top img-fluid" src="assets/img/imgCuenta3.png" alt="Card image cap">
              <div class="card-body">
                <h5 class="card-title">Cambiar información del aprendiz</h5>
              </div>
              <div class="card-footer">
                <a href="cursos/actualizar_perfil.php" class="mt-1 btn btn-primary">Ir</a>
              </div>
            </div>
            <div class="card">              
              <img class="card-img-top img-fluid" src="assets/img/imgCuenta2.png" alt="Card image cap">
              <div class="card-body">
                <h5 class="card-title">Inscribir aprendiz en curso</h5>
              </div>
              <div class="card-footer">
                <a href="cursos/inscribir_aprendiz.php" class="mt-1 btn btn-primary">Ir</a>
              </div>
            </div>
            <div class="card">
              <img class="card-img-top img-fluid" src="assets/img/imgCuenta1.png" alt="Card image cap">
              <div class="card-body">
                <h5 class="card-title">Registrar aprendiz</h5>
              </div>
              <div class="card-footer">
                <a href="registrar_aprendices.php" class="mt-1 btn btn-primary">Ir</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    <?php elseif ($user[9]=='2'): ?>
      <img src="assets/img/imgPortadaBienvenido.png" class="img-fluid" alt="">
    <?php endif; ?>

<?php else: ?>
    
  <?php echo "<script>window.location='sign_in.php';</script>"; ?>

<?php endif; ?>
<footer class="footer_new mt-2">
  <div class="container">
    <span class="">Todos los derechos <?php echo '&copy'; echo date("Y"); ?>  SENA - Políticas de privacidad y condiciones uso Portal Web SENA</span>
  </div>
</footer>
<script>
    var dummyContent = $('.dummy-content').children(),
    i;

    $('#add-content').click(function(e){
      e.preventDefault();

      if($(dummyContent[0]).is(":visible")){
        for(i=0;i<dummyContent.length;i++){
          $(dummyContent[i]).fadeOut(600);
        }
      }
      else{
        for(i=0;i<dummyContent.length;i++){
          $(dummyContent[i]).delay(600*i).fadeIn(600);
        }
      }

    });
  </script>
  <!-- Demo ads. Please ignore and remove. -->
  <script src="http://cdn.tutorialzine.com/misc/enhance/v2.js" async></script>
  <script src="assets/home.js"></script>
  <!-- ====== Pie de pagina ======-->
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
  <script src="assets/main.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/css/bootstrap.min.css" integrity="sha384-AysaV+vQoT3kOAXZkl02PThvDr8HYKPZhNT5h/CXfBThSRXQ6jW5DO2ekP5ViFdi" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js" integrity="sha384-3ceskX3iaEnIogmQchP8opvBy3Mi7Ce34nWjpBIwVTHfGYWQS9jwHDVRnpKKHJg7" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.3.7/js/tether.min.js" integrity="sha384-XTs3FgkjiBgo8qjEjBk0tGmf3wPrWtA6coPfQDfFEY8AnYJwjalXCiosYRBIBZX8" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/js/bootstrap.min.js" integrity="sha384-BLiI7JTZm+JWlgKa0M0kGRpJbF2J8q+qreVrKBC47e3K6BW78kGLrCkeRX6I9RoK" crossorigin="anonymous"></script>
</body>

</html>
