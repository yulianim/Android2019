<?PHP
$hostname_localhost ="localhost";
$database_localhost ="bd_usuario";
$username_localhost ="root";
$password_localhost ="";

$json=array();

	if(isset($_GET["id"])){
		$id=$_GET["id"];
				
		$conexion = mysqli_connect($hostname_localhost,$username_localhost,$password_localhost,$database_localhost);

		$consulta="select nombre,apellidos, edad from usuario where id= '{$id}'";
		$resultado=mysqli_query($conexion,$consulta);
			
		if($registro=mysqli_fetch_array($resultado)){
			$json['usuario'][]=$registro;
		
		}else{
			$resulta["nombre"]=0;
			$resulta["apellidos"]='no registra';
			$resulta["edad"]='no registra';
			$json['usuario'][]=$resulta;
		}
		
		mysqli_close($conexion);
		echo json_encode($json);
	}
	else{
		$resulta["success"]=0;
		$resulta["message"]='Ws no Retorna';
		$json['usuario'][]=$resulta;
		echo json_encode($json);
	}
?>