<?php include "conexion1.php";?>

<?php include "header.php" ?>

<?php 


if (isset($_GET['id'])){
$id=$_GET['id'];
$_SESSION['id_curso']=$id;

}

$id=$_SESSION['id_curso'];

//var_dump($_SESSION['id_poa']);

?>


<div class="container content-center">

<form action="descargar.php" method="POST">
<div class="form-group">
    <label for="exampleFormControlTextarea1">Resumen inscritos</label>
    <textarea readonly class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
    
</div>
<div>


<div class="input-group">

<div class="col-auto">
<label for="filtrar">Seleccione una opcion de descarga </label>
</div>
<div class="col-3">
<select class="form-select col-auto" id="filtro" name="filtro" aria-label="Example select with button addon" required>
                                <option value="" selected >Seleccione</option>
                                <option value="1">Descargar Listado inscritos excel</option>
                                <option value="2">Descargar Paquete inscritos</option>
                                
                                
</select>
</div>

<div>
<button class="btn btn-secondary" type="submit">Seleccionar</button>
<?php

if ($_SESSION['alianza']==1){}else{echo '
<button class="btn btn-warning" type="button">Cerrar Curso por baja demanda</button>';}
?>

</div>
</div>

</form>



<br><br>
<table id="tabla" class="table table-striped">
      <thead>
        <tr>
          <th style="width:80px">Residencia</th>
          <th style="width:80px">Tipo documento</th>
          <th style="width:80px">Documento</th>
          <th style="width:80px">Nombres y apellidos</th>
          <th style="width:80px">Telefono</th>
          <th style="width:50px">Correo</th>
          <th style="width:80px">Tipo Poblacion</th>
          <th style="width:80px">Soporte documento</th>
          <th style="width:80px">Inscrito Sofia Plus</th>
          <th style="width:200px">Gestion</th>

        </tr>
        <tr>
          <td colspan="9">
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

    <td class="gfgmunicipio">'.$row->municipio.'</td>
    <td class="gfgmunicipio">'.$row->tipodocumento.'</td>
    <td class="gfgmunicipio">'.$row->documento.'</td>
    <td class="gfgnombres">'.$row->nombres.' '.$row->apellidos.'</td> 
    <td class="gfgperiodo">'.$row->telefono.'</td>   
    <td class="gfgperiodo">'.$row->email.'</td>  
    <td class="gfgperiodo">'.$row->tipoPoblacion.'</td>     
    <td class="gfgperiodo">'.$row->modo_Documento.'</td>  ';

    $consulta2="SELECT * FROM no_inscritos_sofiaplus, users WHERE users.id = no_inscritos_sofiaplus.id_users AND no_inscritos_sofiaplus.id_users=".$row->id;

    $query2 = $mysqli->query($consulta2);

    if ($query2->num_rows>=1){echo'<td class="gfgperiodo">No</td> ' ;}else {echo'<td class="gfgperiodo">Si</td> ';}
    
    echo  '
    <td class="gfgid" style="display:none" >'.$row->id.'</td> 
    <td>'; 

    $consulta3="SELECT DISTINCT (id_users), ruta AS ruta1 FROM files, users WHERE users.id = files.id_users AND files.id_users=".$row->id;
    $query3 = $mysqli->query($consulta3);

    while ($row3 = $query3->fetch_object()) {

      if ($row->modo_Documento=="documento anexo"){echo '<a href=./'.$row3->ruta1.' <button class="gfgdownload btn btn-warning btn-xs" ><span ></span>Descargar</button></a>';}

      if ($_SESSION['alianza']==1){}else{echo '<button class="gfgselect btn btn-danger btn-xs" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><span ></span>Borrar</button>
      </td>
      
  </tr>';}


    }


   
              
}


        



// SELECT * FROM no_inscritos_sofiaplus, users, gestion_cursos
// WHERE users.id = no_inscritos_sofiaplus.id_users
// AND gestion_cursos.id_Gestion_Cursos=10
// AND no_inscritos_sofiaplus.id_users=10590

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
