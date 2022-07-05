<?php
session_start();



if (isset($_POST["user_id"]) & isset($_POST["poblacion"]) ){

$usuario=$_POST["user_id"];

$poblacion=$_POST["poblacion"];
$correo=$_POST["txtCorreo"];
$telefono=$_POST["txtTelefono"];
$modo_Guardar=$_POST["documento"];
$curso=$_POST["id_curso"];


} else {

$poblacion=$_POST["txtTipoPoblacion"];
$correo=$_POST["txtCorreo"];
$telefono=$_POST["txtTelefono"];

$txtNombres=$_POST["txtNombres"];
$txtApellidos=$_POST["txtApellidos"];
$txtSexo=$_POST["txtSexo"];

$txtFechaNacimiento=$_POST["txtFechaNacimiento"];
$txtPassword=$_POST["txtPassword"];

$txtTipoDocumento=$_POST["txtTipoDocumento"];
$txtDocumento=$_POST["txtDocumento"];

$txtMunicipio=$_POST["txtMunicipio"];


$modo_Guardar=$_POST["documento"];
$curso=$_POST["id_curso"];



        include 'conexion1.php';

        $sql = "INSERT INTO users (nombres, apellidos, sexo, tipodocumento, documento, fechaNacimiento, telefono, tipoPoblacion, municipio, email, password, rol) VALUES ('$txtNombres','$txtApellidos','$txtSexo','$txtTipoDocumento','$txtDocumento','$txtFechaNacimiento','$telefono','$poblacion','$txtMunicipio','$correo','$txtPassword','2')";

        $resultado1 = $mysqli->query($sql);

        //var_dump($resultado1);

        $sql = "SELECT * FROM users where users.documento=".$txtDocumento;
        $query = $mysqli->query($sql);

        while ($row = $query->fetch_object()) {
            $usuario=$row->id;
             }


}



if ($modo_Guardar==1){

    $fichero = $_FILES["filePDF"];

    $InformacionArchivo = pathinfo($_FILES['filePDF']['name']);
    $NombreArchivo = $_FILES['filePDF']['name'];
    $NombreArchivo = $InformacionArchivo['filename'];
    $Extension = $InformacionArchivo['extension'];
    $ArchivoPDF = $usuario.".".$Extension;

    $Ubicacion = 'files/'.$ArchivoPDF;
    copy( $_FILES['filePDF']['tmp_name'], $Ubicacion);

    include 'conexion1.php';

    $sql = "INSERT INTO files (id_users, ruta) VALUES ('$usuario','$Ubicacion')";

    $resultado1 = $mysqli->query($sql);


    $sql = 'SELECT * FROM files WHERE files.id_users='.$usuario;

    $query = $mysqli->query($sql);

    while ($row = $query->fetch_object()) {
        $id_archivo=$row->id;
         }
    
    
    $sql = "INSERT INTO cursos_detalle (id_users, id_gestion_cursos, modo_Documento, id_Docuemnto) VALUES ('$usuario','$curso','documento anexo','$id_archivo')";

    $resultado1 = $mysqli->query($sql);
    $mysqli->close();
    $_SESSION['estado'] = "Se ha registrado Correctamente en el Curso";
    $_SESSION['valor'] = 1;
    header("Location: CursosReg.php");
}

if ($modo_Guardar==2){

$fichero1 = $_FILES["filePDF1"];
$fichero2 = $_FILES["filePDF2"];

$InformacionArchivo = pathinfo($_FILES['filePDF1']['name']);
$Extension = $InformacionArchivo['extension'];
$ArchivoPDF = $usuario.".".$Extension;
$Ubicacion1 = 'files/'.$ArchivoPDF."-1";

copy( $_FILES['filePDF1']['tmp_name'], $Ubicacion1);

$InformacionArchivo = pathinfo($_FILES['filePDF2']['name']);
$Extension = $InformacionArchivo['extension'];
$ArchivoPDF = $usuario.".".$Extension;
$Ubicacion2 = 'files/'.$ArchivoPDF."-2";

copy( $_FILES['filePDF2']['tmp_name'], $Ubicacion2);



require("fpdf/fpdf.php");

$pdf=new FPDF();

$pdf->AddPage();
$pdf->Image($Ubicacion1,60,30,90,0,'JPEG');
$pdf->AddPage();
$pdf->Image($Ubicacion2,60,30,90,0,'JPEG');
$pdf->Output('files/'.$usuario.'.pdf', 'F');

include 'conexion1.php';

    $sql = "INSERT INTO files (id_users, ruta) VALUES ('$usuario','files/".$usuario.".pdf')";

    $resultado1 = $mysqli->query($sql);


    $sql = 'SELECT * FROM files WHERE files.id_users='.$usuario;

    $query = $mysqli->query($sql);

    while ($row = $query->fetch_object()) {
        $id_archivo=$row->id;
         }
    
    
    $sql = "INSERT INTO cursos_detalle (id_users, id_gestion_cursos, modo_Documento, id_Docuemnto) VALUES ('$usuario','$curso','documento anexo','$id_archivo')";

    $resultado1 = $mysqli->query($sql);
    $mysqli->close();
    $_SESSION['estado'] = "Se ha registrado Correctamente en el Curso";
    $_SESSION['valor'] = 1;
    header("Location: CursosReg.php");

}

if ($modo_Guardar==3){

include 'conexion1.php';

$sql = "INSERT INTO cursos_detalle (id_users, id_gestion_cursos, modo_Documento) VALUES ('$usuario','$curso','entregar doc fisico')";

$resultado1 = $mysqli->query($sql);
    $mysqli->close();
    $_SESSION['estado'] = "Se ha registrado Correctamente en el Curso";
    $_SESSION['valor'] = 1;
    header("Location: CursosReg.php");



}

?>

