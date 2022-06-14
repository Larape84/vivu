

<?php 

	class conectar{
		public function conexion(){
			$conexion=mysqli_connect('localhost',
										'root',
										'',
										'u249939424_vivuWeb');
			return $conexion;
		}
	}


 ?>