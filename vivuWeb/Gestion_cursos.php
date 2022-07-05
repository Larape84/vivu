<?php include "conexion1.php";?>

<?php include "header.php" ?>

<?php 


if (isset($_GET['id'])){
$id=$_GET['id'];
$_SESSION['id_poa']=$id;

}

$id=$_SESSION['id_poa'];

//var_dump($_SESSION['id_poa']);

?>

<div class="container contenedor">
    <?php
    

    if (!isset($_SESSION['estado'])){
      $_SESSION['estado']='';
      $_SESSION['valor']='';
    }

        if($_SESSION['valor']==1){
            ?>
            <div class="alert alert-dismissible alert-success" style="margin-top:20px;">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <span class="icon-checkmark"></span> <?php echo $_SESSION['estado'] ; ?>
            </div>
            <?php

            unset($_SESSION['estado']);

        }elseif($_SESSION['estado']==!null){
          ?>
            <div class="alert alert-dismissible alert-danger" style="margin-top:20px;">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <span class="icon-checkmark"></span> <?php echo "Operacion NO Realizada :".$_SESSION['estado'] ; ?>
            </div>
            <?php

           unset($_SESSION['estado']);

        }
    ?>





<div class="container center-fluid">
    
<form action="operaciones.php" method="POST">
  <div class="form-group">
    <label for="exampleInputEmail1">Centro de Fromacion</label>
    <select name="Centro_Formacion" id="Centro_Formacion" class="form-select" required>
    <option selected value=""></option>
    <option select value="CENTRO DE COMERCIO Y SERVICIOS">CENTRO DE COMERCIO Y SERVICIOS</option>
    <option select value="CENTRO INDUSTRIAL Y DE AVIACION">CENTRO INDUSTRIAL Y DE AVIACION</option>
    <option select value="CENTRO NACIONAL COLOMBO ALEMAN">CENTRO NACIONAL COLOMBO ALEMAN</option>
    <option select value="CEDAGRO">CEDAGRO</option>
    </select>
    </div>

    <div class="form-group">
    <label for="exampleInputPassword1">Nivel de Formacion</label>
    <select name="Nivel_Formacion" id="Nivel_Formacion" class="form-select" required>
    <option selected value=""></option>
    <option select value="Formacion Complementaria">Formacion Complementaria</option>
    <option select value="Formacion Titulada">Formacion Titulada</option>
    <option select value="Certificacion por competencias Laborales">Certificacion por competencias Laborales</option>
    <option select value="Evento divulgacion Tecnologica">Evento divulgacion Tecnologica</option>
    </select>
    </div>

  <div class="form-group">
    <label for="exampleInputPassword1">Nombre programa de Formacion</label>
    <input type="text" class="form-control" id="Nombre_Curso" name='Nombre_Curso' placeholder="Nombre del programa de formacion" required>
  </div>

  <div class="form-group">
    <label for="exampleInputPassword1">Categoria</label>
    <select type="text" class="form-control" id="categoria" name='categoria' placeholder="Categoria" required>
    <option selected value=""></option>
    <option select value="Tecnología">Tecnología</option>
    <option select value="Salud Ocupacional">Salud Ocupacional</option>
    <option select value="Emprendimiento">Emprendimiento</option>
    <option select value="Confección">Confección</option>
    <option select value="Cocina">Cocina</option>
    <option select value="Gestión">Gestión</option>
    <option select value="Artesanías">Artesanías</option>
    <option select value="Ética">Ética</option>
    <option select value="Pedagogía">Pedagogía</option>
    <option select value="Construcción">Construcción</option>
    <option select value="Belleza">Belleza</option>
    <option select value="Agricultura">Agricultura</option>
    <option select value="LGBTIQ">LGBTIQ</option>
    <option select value="Discapacidad">Discapacidad</option>
    <option select value="Logistica">Logistica</option>
    <option select value="Etnias">Etnias</option>
    <option select value="Ingles">Ingles</option>
    <option select value="Electricidad">Electricidad</option>

    </select>


  </div>

  <div class="form-group">
    <label for="exampleInputPassword1">Mes de ejecucion</label>
    <select name="Mes_Poa" id="Mes_Poa" class="form-select" required>
    <option selected value=""></option>
    <option select value="Enero">Enero</option>
    <option select value="Febrero">Febrero</option>
    <option select value="Marzo">Marzo</option>
    <option select value="Abril">Abril</option>
    <option select value="Mayo">Mayo</option>
    <option select value="Junio">Junio</option>
    <option select value="Agosto">Agosto</option>
    <option select value="Septiembre">Septiembre</option>
    <option select value="Octubre">Octubre</option>
    <option select value="Noviembre">Noviembre</option>
    <option select value="Diciembre">Diciembre</option>
    </select>
    <input type="text" value=4 style="display: none;" id="operacion" name='operacion'>
<br>

<?php


$consulta='SELECT poa.id_asignar_municipios, asignar_municipios.municipio 
FROM poa, asignar_municipios WHERE poa.id_poa='.$id.' AND asignar_municipios.id=(SELECT poa.id_asignar_municipios FROM poa WHERE poa.id_poa='.$id.')AND asignar_municipios.estado="activo"';

$query = $mysqli->query($consulta);

//obtener municipio

//var_dump($query);

while ($row = $query->fetch_object()) {
  
 echo '<input type="text" value="'.$row->municipio.'" style="display: none;" id="Municipio_Curso" name="Municipio_Curso">';        
}


$consulta="SELECT poa.Nombre_Poa, poa.id_poa FROM poa WHERE poa.id_poa='$id'";

$query = $mysqli->query($consulta);

//obtener municipio

//var_dump($query);

while ($row = $query->fetch_object()) {
  
 echo '<input type="text" value="'.$row->id_poa.'" style="display: none;" id="Nombre_Poa" name="Nombre_Poa">';        
}




 ?> 


<button type="submit" class="btn btn-primary">Registrar</button>
</div>
</form>


<table id="tabla" class="table table-striped">
      <thead>
        <tr>
          <th style="width:80px">Municipio_Curso</th>
          <th style="width:80px">Centro_Formacion</th>
          <th style="width:50px">Nivel_Formacion</th>
          <th style="width:100px">Nombre_Curso</th>
          <th style="width:80px">Mes_Poa</th>
          <th style="width:80px">Categoria</th>
          <th style="width:50px">Estado_Curso</th>
          <th style="width:50px">inscritos</th>
          <th style="width:50px">Gestion</th>

        </tr>
        <tr>
          <td colspan="8">
            <input id="buscar" type="text" class="form-control" placeholder="filtrar" />
          </td>
        </tr>
      </thead>
      <tbody>
      <?php


$consulta="SELECT * FROM gestion_cursos, poa WHERE poa.id_poa='$id' AND gestion_cursos.id_nombre_poa='$id'";

$query = $mysqli->query($consulta);

//obtener municipio

//var_dump($query);

while ($row = $query->fetch_object()) {

  $consulta2="SELECT COUNT(*) AS inscritos FROM gestion_cursos, cursos_detalle WHERE cursos_detalle.id_gestion_cursos=gestion_cursos.id_Gestion_Cursos AND gestion_cursos.id_Gestion_Cursos=".$row->id_Gestion_Cursos;

  $query2 = $mysqli->query($consulta2);

    echo '<tr> 

    <td class="gfgMunicipio_Curso">'.$row->Municipio_Curso.'</td> 
    <td class="gfgCentro_Formacion">'.$row->Centro_Formacion.'</td>
    <td class="gfgNivel_Formacion">'.$row->Nivel_Formacion.'</td>
    <td class="gfgNombre_Curso">'.$row->Nombre_Curso.'</td> 
    <td class="gfgcategoria">'.$row->categoria.'</td> 
    <td class="gfgMes_Poa">'.$row->Mes_Poa.'</td> 
    <td class="gfgEstado_Curso">'.$row->Estado_Curso.'</td>'; 

    while ($row2 = $query2->fetch_object()) {
      echo '<td class="gfginscritos">'.$row2->inscritos.'</td>'; 
    }

    echo '
    <td class="gfgid" style="display:none" >'.$row->id_Gestion_Cursos.'</td> 
    <td> <button class="gfgselect btn btn-primary btn-xs" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><span ></span>Editar</button>
    <button class="gfgdelete btn btn-danger btn-xs" data-bs-toggle="modal" data-bs-target="#staticBackdropDelete"><span ></span>Borrar</button>
    <a href=cursos_detalle.php?id='.$row->id_Gestion_Cursos.' <button class="gfgdelete btn btn-warning btn-xs" ><span ></span>Ver Detalle</button></a> 
    
    </td>
    
</tr>';
              
}


//var_dump($municipio);

 ?> 







</tbody>
</table>

<br>




<?php include "footer.php" ?>

<script type="text/javascript">


var busqueda = document.getElementById('buscar');
    var table = document.getElementById("tabla").tBodies[0];

    buscaTabla = function(){
      texto = busqueda.value.toLowerCase();
      var r=0;
      while(row = table.rows[r++])
      {
        if ( row.innerText.toLowerCase().indexOf(texto) !== -1 )
          row.style.display = null;
        else
          row.style.display = 'none';
      }
    }

    busqueda.addEventListener('keyup', buscaTabla);


</script>