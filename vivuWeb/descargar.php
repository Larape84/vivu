<?php
session_start();
include "conexion1.php";

$_SESSION['id_poa'];


    $consulta="SELECT * FROM cursos_detalle, users, gestion_cursos WHERE users.id=cursos_detalle.id_users AND gestion_cursos.id_Gestion_Cursos=cursos_detalle.id_gestion_cursos AND cursos_detalle.id_gestion_cursos=".$_SESSION['id_poa'];
    $query = $mysqli->query($consulta);

 if(mysqli_num_rows($query) >= 0) {
 $export="";

 $export .= '

 <table>
 <thead>
   <tr>
     <th style="width:250px">Municipio_Curso</th>
     <th style="width:200px">Documento</th>
     <th style="width:350px">Nombres y apellidos</th>
     <th style="width:350px">Tipo Poblacion</th>
   </tr>
   </thead>
      <tbody>';
 while($row = $query->fetch_object())
 {
 $export .= '

 <tr> 
    <td>'.$row->Municipio_Curso.'</td>
    <td>'.$row->documento.'</td>
    <td>'.$row->nombres.' '.$row->apellidos.'</td> 
    <td>'.utf8_decode($row->tipoPoblacion).'</td>     
</tr>';
$curso="";
$curso=$row->Nombre_Curso;

 }
 $export .= '</tbody>
 </table>';
 header('Content-type: application/vnd.ms-excel; charset=UTF-8');
header('Content-Disposition: attachment;filename=Reporte inscripcion formacion de '.$curso.'.xls');
header('Pragma: no-cache');
header('Expires: 0');
 echo $export;
 }


//header("Location:cursos_detalle.php");




?>