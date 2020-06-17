<?PHP
$hostname_localhost="localhost";
$database_localhost="id11823861_bdregistro1";
$username_localhost="id11823861_root";
$password_localhost="12345678";
$json=array();
		$conexion=mysqli_connect($hostname_localhost,$username_localhost,$password_localhost,$database_localhost);
		$consulta="select *from usuario";
		$resultado=mysqli_query($conexion,$consulta);
		
		while($registro=mysqli_fetch_array($resultado)){
				$json['usuario'][]=$registro;
			}
		mysqli_close($conexion);
		echo json_encode($json);
?>