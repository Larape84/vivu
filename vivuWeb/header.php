<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UFT-8">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">


  <title>Cursos | Oferta Complementaria</title>
  <meta property="og:title" content="Cursos | Oferta Complementaria">

    <script src="../js/jquery.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4-4.1.1/jq-3.3.1/dt-1.10.20/r-2.2.3/datatables.min.css"/>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4-4.1.1/jq-3.3.1/dt-1.10.20/r-2.2.3/datatables.min.js"></script>



  <link rel="icon" href="../assets/logoSena.png">
  <meta name="csrf-param" content="authenticity_token" />

  <link rel="stylesheet" media="all" href="../assets/general.css" data-turbolinks-track="reload" />
  <link rel="stylesheet" media="screen" href="../assets/grupos.css" />


  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>


  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

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
    .col-xs-6{
      width: 50%;
    }
    .col-lg-1, .col-lg-10, .col-lg-11, .col-lg-12, .col-lg-2, .col-lg-3, .col-lg-4, .col-lg-5, .col-lg-6, .col-lg-7, .col-lg-8, .col-lg-9, .col-md-1, .col-md-10, .col-md-11, .col-md-12, .col-md-2, .col-md-3, .col-md-4, .col-md-5, .col-md-6, .col-md-7, .col-md-8, .col-md-9, .col-sm-1, .col-sm-10, .col-sm-11, .col-sm-12, .col-sm-2, .col-sm-3, .col-sm-4, .col-sm-5, .col-sm-6, .col-sm-7, .col-sm-8, .col-sm-9, .col-xs-1, .col-xs-10, .col-xs-11, .col-xs-12, .col-xs-2, .col-xs-3, .col-xs-4, .col-xs-5, .col-xs-6, .col-xs-7, .col-xs-8, .col-xs-9 {
      position: relative;
      min-height: 1px;
      padding-right: 15px;
      padding-left: 15px;
    }
    .efectoa img {
      border-radius: 20px 20px 0px 0px;
      -webkit-transition: .2s;
      -moz-transition: .2s;
      -o-transition: .2s;
      -ms-transition: .2s;
      transition: .2s;
    }
  </style>
</head>
<body>


<!-- ====== Barra de navegacion ======-->
<div class="navHeader">
 <div class = "container">
   <div class="row">
     <div class="col-md-12">        
      <div class="">

      <?php session_start(); include "conexion1.php";?>

         <?php 
         
         //var_dump($_SESSION['user_id']) ;
         //var_dump($_SESSION['rol']);


         $nombre_carpeta="";

         if ($nombre_carpeta == "cursos"):  ?>
           <a href="../index.php"><img width="215px" src="../assets/Logosimbolo.png" alt="Logosena" /></a>
         <?php else: ?>
           <a href="../index.php"><img width="215px" src="../assets/Logosimbolo.png" alt="Logosena" /></a>
         <?php endif; ?>
     </div>
     <nav class=" full-width NavBar-Nav">
       <div class="full-width NavBar-Nav-bg hidden-md hidden-lg show-menu-mobile"></div>
       <ul class="list-unstyled menu-mobile-c mr-1">
         <div class="full-width hidden-md hidden-lg header-menu-mobile">
           <i class="fa fa-times header-menu-mobile-close-btn show-menu-mobile" aria-hidden="true"></i>
           <div class="row">
             <div class="col-md-12">
              <center>
               <div class="">
                
                   <a href="../index.php"><img width="215px" src="../assets/Logosimbolo.png" alt="Logosena" /></a>
               
               </div>
             </center>
           </div>
         </div>
         <div class="divider"></div>
       </div >
       
       <li class="menu" >
         <a href="http://oferta.senasofiaplus.edu.co/sofia-oferta/" target="_blank">
           <i class="fa fa-list-ul fa-fw hidden-md hidden-lg" aria-hidden="true"></i> SOFIAPLUS
         </a>
       </li> 
       <li class="menu" >
         <a href="https://agenciapublicadeempleo.sena.edu.co/Paginas/inicio.aspx" target="_blank">
           <i class="fa fa-list-ul fa-fw hidden-md hidden-lg" aria-hidden="true"></i> APE
         </a>
       </li> 
       <li class="menu" >
       
             <a href="cursosReg.php">
               <i class="fa fa-list-ul fa-fw hidden-md hidden-lg" aria-hidden="true"></i> CURSOS
             </a>
         
            
         
       </li>
       <li class="menu" >
        
           <a href="../noticias.php">
             <i class="fa fa-user fa-fw hidden-md hidden-lg" aria-hidden="true"></i>NOTICIAS
           </a>
        
           
         
       </li>

       <?php 
       if (!isset($_SESSION['rol'])){
        echo'
       <li class="menu" >
       <a href="../sign_in.php">
             <i class="fa fa-user fa-fw hidden-md hidden-lg" aria-hidden="true"></i>INICIAR SESION
      </a>
      </li>';

    } else{

     echo ' <li class="menu" >
       <a href="../sign_in.php">
             <i class="fa fa-user fa-fw hidden-md hidden-lg" aria-hidden="true"></i>'.$_SESSION['nombre'].' '.$_SESSION['apellido'].'
      </a>
      </li>';
    }
      ?>


     </ul>
   </nav>
   <i class="fa fa-bars hidden-md hidden-lg btn-mobile-menu show-menu-mobile" aria-hidden="true"></i>
 </div>
</div>
</div>
</div>

<br>
