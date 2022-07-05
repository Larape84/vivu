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


<div class="container content-center">

<form action="descargar.php">
<div class="form-group">
    <label for="exampleFormControlTextarea1">Resumen inscritos</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
    
</div>
<div>
<button  class="btn btn-danger mb-2">Descargar Excel</button>
<button  class="btn btn-warning mb-2">Descargar Paquete</button>
</div>
</form>

<br><br>
<table id="tabla" class="table table-striped">
      <thead>
        <tr>
          <th style="width:80px">Municipio_Curso</th>
          <th style="width:80px">Documento</th>
          <th style="width:80px">Nombres y apellidos</th>
          <th style="width:80px">Tipo Poblacion</th>
          <th style="width:50px">Gestion</th>

        </tr>
        <tr>
          <td colspan="4">
            <input id="buscar" type="text" class="form-control" placeholder="filtrar" />
          </td>
        </tr>
      </thead>
      <tbody>
      <?php


$consulta="SELECT * FROM cursos_detalle, users, gestion_cursos WHERE users.id=cursos_detalle.id_users AND gestion_cursos.id_Gestion_Cursos=cursos_detalle.id_gestion_cursos AND cursos_detalle.id_gestion_cursos=".$id;

$query = $mysqli->query($consulta);

//obtener municipio

//var_dump($query);

while ($row = $query->fetch_object()) {
  
    echo '<tr> 

    <td class="gfgmunicipio">'.$row->Municipio_Curso.'</td>
    <td class="gfgmunicipio">'.$row->documento.'</td>
    <td class="gfgnombres">'.$row->nombres.' '.$row->apellidos.'</td> 
    <td class="gfgperiodo">'.$row->tipoPoblacion.'</td>     
    <td class="gfgid" style="display:none" >'.$row->id.'</td> 
    <td> 

    <button class="gfgdelete btn btn-danger btn-xs" data-bs-toggle="modal" data-bs-target="#staticBackdropDelete"><span ></span>Borrar</button>
    
    </td>
    
</tr>';
              
}


//var_dump($municipio);

 ?> 







</tbody>
</table>









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
