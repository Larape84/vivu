<?php
session_start();
include "conexion1.php";

$_SESSION['id_curso'];
$metodo=$_POST['filtro'];

unlink("MiArchivo.zip");

if ($metodo==1){


    $consulta="SELECT * FROM cursos_detalle, users, gestion_cursos WHERE users.id=cursos_detalle.id_users AND gestion_cursos.id_Gestion_Cursos=cursos_detalle.id_gestion_cursos AND cursos_detalle.id_gestion_cursos=".$_SESSION['id_curso'];
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


}

if ($metodo==2){
  
  
  

  $zip = new ZipArchive(); // Load zip library 
  $zip_name ="MiArchivo.zip"; // Nombre de Fichero ZIP
 if ($zip->open($zip_name, ZipArchive::CREATE) === TRUE){
     

  

    $consulta="SELECT * FROM cursos_detalle WHERE cursos_detalle.id_gestion_cursos=".$_SESSION['id_curso'];
    $query = $mysqli->query($consulta);

    
      while($row = $query->fetch_object()){

        $consulta2="SELECT DISTINCT(files.id_users), files.ruta AS ruta1, documento, nombres, apellidos FROM files, users WHERE users.id=files.id_users AND files.id_users=".$row->id_users;

        $query2 = $mysqli->query($consulta2);

        while($row2 = $query2->fetch_object()){

          $zip->addFile($row2->ruta1,$row2->documento." - ".$row2->nombres." ".$row2->apellidos.".pdf");
        }

        

       }



  
     
     $zip->close(); 	
    
     
    
    }
      $file_example = 'MiArchivo.zip';
      if (file_exists($file_example)) {
          header('Content-Description: File Transfer');
          header('Content-Type:application/zip');
          header('Content-Disposition: attachment; filename='.basename($file_example));
          header('Content-Transfer-Encoding: binary');
          header('Expires: 0');
          header('Cache-Control: must-revalidate');
          header('Pragma: public');
          header('Content-Length: ' . filesize($file_example));
          ob_clean();
          flush();
          readfile($file_example);
          exit;
      }
      
  
    }
    
    
    
    


?>