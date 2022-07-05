
<?php

    $id_cedula=$_POST["cedula"];


    

include "conexion1.php";




$consulta='SELECT * FROM users WHERE users.documento='.$id_cedula;

$query = $mysqli->query($consulta);

 if ($query->num_rows==1){


while ($row = $query->fetch_object()) {
  
    echo '
          <form enctype="multipart/form-data" action="realizar_inscripcion.php" method="POST">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label class="control-label" for="user_nombre">Nombres</label>
                    <input class="form-control" required="required" type="text" name="txtNombres" id="txtNombres" value="'.$row->nombres.'" disabled />
                </div>
                <div class="form-group col-md-6">
                    <label for="inputApellidos">Apellidos</label>
                    <input class="form-control" required="required" type="text" name="txtApellidos" id="txtApellidos" value="'.$row->apellidos.'" disabled/>
                </div>
            </div> 

           
            
            
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputDireccion">Correo electrónico</label>
                    <input class="form-control" required="required" type="email" name="txtCorreo" id="txtCorreo" value="'.$row->email.'"/>
                </div>

                
                <div class="form-group col-md-6">
                    <label for="inputTelefono">Telefono</label>
                    <input class="form-control" required="required" type="number" name="txtTelefono" id="txtTelefono" value="'.$row->telefono.'"/>
                </div>
                
            </div>

           

            
            
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label class="control-label" for="user_tipo_de_poblacion_id">Tipo de poblacion</label>
                    <select class="form-control select" name="poblacion" id="poblacion" required>
                        <option value="'.$row->tipoPoblacion.'">'.$row->tipoPoblacion.'</option>
                        <option value="Desplazados por la violencia">Desplazados por la violencia</option>
                        <option value="Víctimas del conflicto armado">Víctimas del conflicto armado</option>
                        <option value="Discapacitados">Discapacitados</option>
                        <option value="Indígenas">Indígenas</option>
                        <option value="Convenio INPEC">Convenio INPEC</option>
                        <option value="Jóvenes vulnerables">Jóvenes vulnerables</option>
                        <option value="Adolescentes en conflicto con la ley penal">Adolescentes en conflicto con la ley penal</option>
                        <option value="Mujeres cabeza de hogar">Mujeres cabeza de hogar</option>
                        <option value="Negritudes">Negritudes</option>
                        <option value="Afrocolombianos">Afrocolombianos </option>
                        <option value="Palenques">Palenques</option>
                        <option value="Raizales">Raizales</option>
                        <option value="ROM">ROM</option>
                        <option value="Desplazados por fenómenos naturales y desplazados por fenómenos naturales cabeza de hogar">Desplazados por fenómenos naturales y desplazados por fenómenos naturales cabeza de hogar</option>
                        <option value="Proceso de reintegración y adolescentes desvinculados de Grupo armados organizados al margen de la ley">Proceso de reintegración y adolescentes desvinculados de Grupo armados organizados al margen de la ley</option>
                        <option value="Tercera edad">Tercera edad</option>
                        <option value="Adolescente trabajador">Adolescente trabajador</option>
                        <option value="Remitidos por el PAL">Remitidos por el PAL</option>
                        <option value="Soldados campesinos">Soldados campesinos</option>
                        <option value="Sobrevivientes minas antipersonas">Sobrevivientes minas antipersonas</option>
                        <option value="Comunidad LGBTI">Comunidad LGBTI</option>
                        <option value="Comunidad LGBTI">Poblacion Migrante</option>
                    </select>              
                </div>
            </div>

            <input type="text" style="display: none;" value="'.$row->id.'" id="user_id" name="user_id">   

            <input type="text" style="display: none;" value="" id="id_curso" name="id_curso">   


            <div class="form-row">
                <div class="form-group col-md-12">
                    <label class="control-label" for="user_tipo_de_poblacion_id">Documento PDF</label>
                    <select class="form-control select" name="documento" id="documento" onchange="seleccionDocumento()" required>
                        <option disabled="" selected="" value="">Seleccione</option>
                        <option value="1">Anexar 1 solo Documento en PDF</option>
                        <option value="2">Tomar Foto Documento por ambas caras</option>
                        <option value="3">Entregar Documento en fisico</option>
                        </select>
                </div>

            </div>
            
            <div class="opcion1" style="display:none" id ="opcion1" name="opcion1">

                <div class="mb-3">
                <label for="formFile" class="form-label">Seleccione PDF</label>
                <!-- MAX_FILE_SIZE debe preceder al campo de entrada del fichero -->
                <input type="hidden" name="MAX_FILE_SIZE" value="3000000" />
                <input class="form-control" type="file" id="filePDF" name="filePDF" required accept="application/pdf">
                </div>

            </div>

            <div class="opcion2" style="display:none" id ="opcion2" name="opcion2">

                <div class="mb-3">
                <label for="formFile" class="form-label">Capturar 1ra cara del documento</label>
                <!-- MAX_FILE_SIZE debe preceder al campo de entrada del fichero -->
                <input type="hidden" name="MAX_FILE_SIZE" value="3000000" />
                <input class="form-control" type="file" id="filePDF1" name="filePDF1" required accept="image/jpg, image/jpeg">
                </div>
                <div class="mb-3">
                <label for="formFile" class="form-label">Capturar 2da cara del documento</label>
                <!-- MAX_FILE_SIZE debe preceder al campo de entrada del fichero -->
                <input type="hidden" name="MAX_FILE_SIZE" value="3000000" />
                <input class="form-control" type="file" id="filePDF2" name="filePDF2" required accept="image/jpg, image/jpeg">
                </div>

            </div>

            
            
            </div>

            <div class="modal-footer">

       <button type="button" onclick="cerrar()" class="gfgcerrar btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
       <button type="submit" class="btn btn-primary">Inscribir</button>
       
      </div>



          </form>';

  

    
    


}

}

if ($query->num_rows==0){
    echo '<div class="container">
    
    <form enctype="multipart/form-data" action="realizar_inscripcion.php" method="POST">

    <div class="form-row">
                <div class="form-group col-md-6">
                    <label class="control-label" for="user_nombre">Nombres</label>
                    <input class="form-control" required="" type="text" name="txtNombres" id="txtNombres" />
                </div>
                <div class="form-group col-md-6">
                    <label for="inputApellidos">Apellidos</label>
                    <input class="form-control" required="" type="text" name="txtApellidos" id="txtApellidos"/>
                </div>
            </div> 

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputSexo">Sexo</label>
                    <select class="form-control form-control-sm" required="" aria-required="true" type="text" name="txtSexo" id="txtSexo" >
                        <option value="" disabled="" selected="">Seleccione...</option>
                        <option value="Femenino">Femenino</option>
                        <option value="Masculino">Masculino</option>
                        <option value="Prefiero no decirlo">Prefiero no decirlo</option>
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label for="inputFechaNacimiento">Fecha de nacimiento</label>
                    <input class="form-control" required="" type="date" name="txtFechaNacimiento" id="txtFechaNacimiento"/>
                </div>
            </div>  
            
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputDireccion">Correo electrónico</label>
                    <input class="form-control" required="required" type="email" name="txtCorreo" id="txtCorreo" />
                </div>
                <div class="form-group col-md-6">
                    <label for="inputContrasena">Contraseña actual</label>
                    <input class="form-control" autocomplete="current-password"  aria-required="true" type="password" name="txtPassword" required id="txtPassword" />
                </div>
            </div> 

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputTipoDocumento">Tipo documento</label>
                    <select class="form-control form-control-sm" name="txtTipoDocumento" id="txtTipoDocumento">
                        <option value="" disabled="" selected="">Seleccione...</option>
                        <option value="Cedula de Ciudadanía">Cedula de Ciudadanía</option>
                        <option value="Cedula de Extranjeria">Cedula de Extranjeria</option>
                        <option value="Tarjeta de Identidad">Tarjeta de Identidad</option>
                    </select>              
                </div>
                <div class="form-group col-md-6">
                    <label for="inputDocumento">Documento</label>
                    <input class="form-control" min="1" required="required" type="number" value="'.$id_cedula.'" readonly step="1" name="txtDocumento" id="txtDocumento" />
                </div>
            </div> 

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputTelefono">Telefono</label>
                    <input class="form-control" required="required" type="number" name="txtTelefono" id="txtTelefono" />
                </div>
                <div class="form-group col-md-6">
                    <label for="inputMunicipio">Municipio</label>
                    <input class="form-control" required="" type="text" name="txtMunicipio" id="txtMunicipio" />
                </div>
            </div>
            
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label class="control-label" for="user_tipo_de_poblacion_id">Tipo de poblacion</label>
                    <select class="form-control select" name="txtTipoPoblacion" id="txtTipoPoblacion" required>
                        <option value="" disabled="" selected="">Seleccione...</option>
                        <option value="Desplazados por la violencia">Desplazados por la violencia</option>
                        <option value="Víctimas del conflicto armado">Víctimas del conflicto armado</option>
                        <option value="Discapacitados">Discapacitados</option>
                        <option value="Indígenas">Indígenas</option>
                        <option value="Convenio INPEC">Convenio INPEC</option>
                        <option value="Jóvenes vulnerables">Jóvenes vulnerables</option>
                        <option value="Adolescentes en conflicto con la ley penal">Adolescentes en conflicto con la ley penal</option>
                        <option value="Mujeres cabeza de hogar">Mujeres cabeza de hogar</option>
                        <option value="Negritudes">Negritudes</option>
                        <option value="Afrocolombianos">Afrocolombianos </option>
                        <option value="Palenques">Palenques</option>
                        <option value="Raizales">Raizales</option>
                        <option value="ROM">ROM</option>
                        <option value="Desplazados por fenómenos naturales y desplazados por fenómenos naturales cabeza de hogar">Desplazados por fenómenos naturales y desplazados por fenómenos naturales cabeza de hogar</option>
                        <option value="Proceso de reintegración y adolescentes desvinculados de Grupo armados organizados al margen de la ley">Proceso de reintegración y adolescentes desvinculados de Grupo armados organizados al margen de la ley</option>
                        <option value="Tercera edad">Tercera edad</option>
                        <option value="Adolescente trabajador">Adolescente trabajador</option>
                        <option value="Remitidos por el PAL">Remitidos por el PAL</option>
                        <option value="Soldados campesinos">Soldados campesinos</option>
                        <option value="Sobrevivientes minas antipersonas">Sobrevivientes minas antipersonas</option>
                        <option value="Comunidad LGBTI">Comunidad LGBTI</option>
                    </select>              
                </div>
            </div>

            <input type="text" style="display: none;" value="" id="id_curso" name="id_curso">   

            <div class="form-row">
                <div class="form-group col-md-12">
                    <label class="control-label" for="user_tipo_de_poblacion_id">Documento PDF</label>
                    <select class="form-control select" name="documento" id="documento" onchange="seleccionDocumento()" required>
                        <option disabled="" selected="" value="">Seleccione</option>
                        <option value="1">Anexar 1 solo Documento en PDF</option>
                        <option value="2">Tomar Foto Documento por ambas caras</option>
                        <option value="3">Entregar Documento en fisico</option>
                        </select>
                </div>

            </div>
            
            <div class="opcion1" style="display:none" id ="opcion1" name="opcion1">

                <div class="mb-3">
                <label for="formFile" class="form-label">Seleccione PDF</label>
                <!-- MAX_FILE_SIZE debe preceder al campo de entrada del fichero -->
                <input type="hidden" name="MAX_FILE_SIZE" value="3000000" />
                <input class="form-control" type="file" id="filePDF" name="filePDF" required accept="application/pdf">
                </div>

            </div>

            <div class="opcion2" style="display:none" id ="opcion2" name="opcion2">

                <div class="mb-3">
                <label for="formFile" class="form-label">Capturar 1ra cara del documento</label>
                <!-- MAX_FILE_SIZE debe preceder al campo de entrada del fichero -->
                <input type="hidden" name="MAX_FILE_SIZE" value="3000000" />
                <input class="form-control" type="file" id="filePDF1" name="filePDF1" required accept="image/jpg, image/jpeg">
                </div>
                <div class="mb-3">
                <label for="formFile" class="form-label">Capturar 2da cara del documento</label>
                <!-- MAX_FILE_SIZE debe preceder al campo de entrada del fichero -->
                <input type="hidden" name="MAX_FILE_SIZE" value="3000000" />
                <input class="form-control" type="file" id="filePDF2" name="filePDF2" required accept="image/jpg, image/jpeg">
                </div>

            </div>

            
            
            

            <div class="modal-footer">

       <button type="button" onclick="cerrar()" class="gfgcerrar btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
       <button type="submit" class="btn btn-primary">Inscribir</button>
       
      </div>



          </form>';












}











?>