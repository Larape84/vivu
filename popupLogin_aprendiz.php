 <!-- ====== PopUpLogin ======-->
 <section class="full-width PopUpLogin PopUpLogin-2">
  <div class="full-width">
    <a href="perfil.php"><i class="fa fa-user fa-fw" aria-hidden="true"></i> Tu perfil</a>

<?php

include "./vivuWeb/conexion1.php";

//session_start();

$consulta="SELECT *, alianza_municipio.municipio AS municipio1 FROM alianza_municipio, users WHERE alianza_municipio.id_User=users.id 
AND alianza_municipio.estado='activo' AND alianza_municipio.id_User=".$_SESSION['user_id'];

    $query = $mysqli->query($consulta);

    
    if(mysqli_num_rows($query) >0) { 

      echo '<a href="./vivuWeb/poa.php"><i class="fa fa-user fa-fw" aria-hidden="true"></i>Gestion Poa</a>';
      $_SESSION['alianza']=1;
    } else{$_SESSION['alianza']=0;}

?>
    

    
    
   
    <div role="separator" class="divider"></div>
    <a rel="nofollow" data-method="delete" href="logout.php">
      <i class="fa fa-sign-out fa-fw" aria-hidden="true"></i>Cerrar sesión
    </a>            
  </div>
</section>



