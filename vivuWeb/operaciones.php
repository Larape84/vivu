<?php
session_start();

$o="";

/* 
operacion 0 = registrar asignacion municipios orientadores
operacion 1 = actualizar registro asignacion municipios orientadores
operacion 2 = Eliminar registro asignacion municipios orientadores
operacion 3 = registrar poa
operacion 4 = registrar curso
operacion 5 = registrar enlace
operacion 6 = actualizar alianza municipio
operacion 7 = registro eliminado alianza


 */



$o=$_POST['operacion'];

$_SESSION['estado']='';



switch ($o) {
    case 0:

        try {
            include 'conexion1.php';
            $municipio=$_POST['municipio'];
            $orientador=(int)$_POST['orientador'];
            $periodo=$_POST['periodo'];

        $sql = "INSERT INTO asignar_municipios (municipio, id_responsable, periodo, estado) VALUES ('$municipio', '$orientador', '$periodo','activo')";
        $resultado1 = $mysqli->query($sql);
        $_SESSION['estado'] = "Orientador Registrado Correctamente";
        $_SESSION['valor'] = 1;
        $mysqli->close();
        
        header("Location: AsignarResponsables.php");
        } catch (Exception $e) {
            $_SESSION['estado'] =$e->getMessage();
            header("Location: AsignarResponsables.php");
            $mysqli->close();
        }
    
        //var_dump($_SESSION['estado']);
        break;

    case 1:

        try {
            include 'conexion1.php';

            $municipio=$_POST['municipio'];
            $estado=$_POST['estado'];
            $periodo=$_POST['periodo'];
            $id=(int)$_POST['id'];

        $sql = "UPDATE asignar_municipios SET municipio='$municipio', periodo='$periodo',estado='$estado' WHERE id=$id";

        $resultado1 = $mysqli->query($sql);

        $_SESSION['estado'] = "Registro Actualizado correctamente";
        $_SESSION['valor'] = "1";
        $mysqli->close();
        
        header("Location: AsignarResponsables.php");
        
        } catch (Exception $e) {
            $_SESSION['estado'] =$e->getMessage();
            header("Location: poa.php");
            $mysqli->close();
        }
        //var_dump($_SESSION);
        break;


    case 2:

        try {
            include 'conexion1.php';

           
            $id=(int)$_POST['id'];

        $sql = "DELETE from asignar_municipios  WHERE id=$id";

    
        $resultado1 = $mysqli->query($sql);

        $_SESSION['estado'] = "Registro Eliminado correctamente";
        $_SESSION['valor'] = "1";
        $mysqli->close();
        
        header("Location: AsignarResponsables.php");
        } catch (Exception $e) {
            $_SESSION['estado'] =$e->getMessage();
            header("Location: AsignarResponsables.php");
            $mysqli->close();
        }
        //var_dump($_SESSION);

        break;

    case 3:
        
        try {
            include 'conexion1.php';

            $Nombre_Poa=$_POST['Nombre_Poa'];
            $Persona_Enlace=$_POST['Persona_Enlace'];
            $Telefono_Enlace=$_POST['Telefono_Enlace'];
            $Correo_Enlace=$_POST['Correo_Enlace'];
            $Poblacion=$_POST['Poblacion'];
            $Ocupacion_Productiva=$_POST['Ocupacion_Productiva'];
            $municipio=(int)$_POST['municipio'];
            

        $sql = "INSERT INTO poa (id_asignar_municipios, Nombre_Poa, Persona_Enlace, Telefono_Enlace, Correo_Enlace, Poblacion, Ocupacion_Productiva) VALUES ('$municipio', '$Nombre_Poa', '$Persona_Enlace', '$Telefono_Enlace', '$Correo_Enlace', '$Poblacion', '$Ocupacion_Productiva')";

        $resultado1 = $mysqli->query($sql);
        $_SESSION['estado'] = "Poa Registrado Correctamente";
        $_SESSION['valor'] = 1;
        $mysqli->close();
        
        header("Location: poa.php");
        } catch (Exception $e) {
            $_SESSION['estado'] =$e->getMessage();
            header("Location: poa.php");
            $mysqli->close();
        }
    
        //var_dump($_SESSION['estado']);
    
        break;

    case 4:   
        try {
            include 'conexion1.php';

            $Municipio_Curso=$_POST['Municipio_Curso'];
            $Centro_Formacion=$_POST['Centro_Formacion'];
            $Nivel_Formacion=$_POST['Nivel_Formacion'];
            $Nombre_Curso=$_POST['Nombre_Curso'];
            $categoria=$_POST['categoria'];
            $Mes_Poa=$_POST['Mes_Poa'];
            $Estado_Curso="registrado";
            $Nombre_Poa=(int)$_POST['Nombre_Poa'];

        $sql = "INSERT INTO gestion_cursos (Municipio_Curso, Centro_Formacion, Nivel_Formacion, Nombre_Curso, categoria, Mes_Poa, Estado_Curso, id_nombre_poa) VALUES ('$Municipio_Curso', '$Centro_Formacion', '$Nivel_Formacion', '$Nombre_Curso', '$categoria', '$Mes_Poa', '$Estado_Curso','$Nombre_Poa')";

        $resultado1 = $mysqli->query($sql);
        $_SESSION['estado'] = "Operacion Registrada Correctamente";
        $_SESSION['valor'] = 1;
        $mysqli->close();
        
        header("Location: Gestion_cursos.php");

        } catch (Exception $e) {
            $_SESSION['estado'] =$e->getMessage();
            header("Location: Gestion_cursos.php");
            $mysqli->close();
        }
    
        //var_dump($_SESSION['estado']);
        break;
    case 5: 
        
        try {
            include 'conexion1.php';

            $id_User=(int)$_POST['user_id'];
            $municipio=$_POST['municipio'];
            $periodo=$_POST['periodo'];
            $enlace_poblacion=$_POST['poblacion'];
            $cargo=$_POST['cargo'];
            $poa_id=(int)$_POST['poa'];
            
            var_dump($id_User,$municipio,$periodo,$enlace_poblacion,$cargo,$poa_id);

        $sql = "INSERT INTO alianza_municipio (id_User, municipio, periodo, enlace_poblacion, cargo, poa_id, estado) VALUES ('$id_User', '$municipio', '$periodo', '$enlace_poblacion', '$cargo', '$poa_id', 'activo')";

        $resultado1 = $mysqli->query($sql);
        $_SESSION['estado'] = "Operacion Registrada Correctamente";
        $_SESSION['valor'] = 1;
        $mysqli->close();
        //echo '<br>';
       // var_dump($resultado1);
        
        header("Location: AsignarEnlaces.php");

        } catch (Exception $e) {
            $_SESSION['estado'] =$e->getMessage();
            header("Location: AsignarEnlaces.php");
            $mysqli->close();
        }
    
        //var_dump($_SESSION['estado']);




        
        break; 
    case 6:  
        
        try {
            include 'conexion1.php';

            $id_User=$_POST['user_id'];
            $estado=$_POST['estado'];
            
            
            //var_dump($id_User,$municipio,$periodo,$enlace_poblacion,$cargo,$poa_id);

        $sql = "UPDATE alianza_municipio SET estado='$estado' WHERE id_alianza=".$id_User;

        $resultado1 = $mysqli->query($sql);
        $_SESSION['estado'] = "Operacion Registrada Correctamente";
        $_SESSION['valor'] = 1;
        $mysqli->close();
        //echo '<br>';
       var_dump($resultado1,$id_User,$estado);
        
        header("Location: AsignarEnlaces.php");

        } catch (Exception $e) {
            $_SESSION['estado'] =$e->getMessage();
            header("Location: AsignarEnlaces.php");
            $mysqli->close();
        }
    
        //var_dump($_SESSION['estado']);
        break;

    case 7:  
        
        try {
            include 'conexion1.php';

           
            $id=(int)$_POST['user_id'];

        $sql = "DELETE from alianza_municipio  WHERE id_alianza=$id";

    
        $resultado1 = $mysqli->query($sql);

        $_SESSION['estado'] = "Registro Eliminado correctamente";
        $_SESSION['valor'] = "1";
        $mysqli->close();
        
        header("Location: AsignarEnlaces.php");
        } catch (Exception $e) {
            $_SESSION['estado'] =$e->getMessage();
            header("Location: AsignarEnlaces.php");
            $mysqli->close();
        }
        //var_dump($_SESSION);



        break; 
    case 8: 
        
        



        
       break; 
 case 9:   
       break;

       case 10:   
        break;

        case 11:   
            break;

}




?>