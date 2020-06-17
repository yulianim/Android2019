<?PHP
$hostname_localhost="localhost";
$database_localhost="bd_usuario";
$username_localhost="root";
$password_localhost="";
$json=array();
	if(isset($_GET["nombre"]) && isset($_GET["apellidos"]) && isset($_GET["edad"])){
		$nombre=$_GET['nombre'];
		$apellidos=$_GET['apellidos'];
		$edad=$_GET['edad'];
		
		$conexion=mysqli_connect($hostname_localhost,$username_localhost,$password_localhost,$database_localhost);
		
		$insert="INSERT INTO usuario(nombre, apellidos, edad) VALUES ('{$nombre}','{$apellidos}','{$edad}')";
		$resultado_insert=mysqli_query($conexion,$insert);
		
		if($resultado_insert){
			$consulta="SELECT * FROM usuario WHERE nombre = '{$nombre}'";
			$resultado=mysqli_query($conexion,$consulta);
			if($registro=mysqli_fetch_array($resultado)){
				$json['usuario'][]=$registro;
			}
			mysqli_close($conexion);
			echo json_encode($json);
		}
		else{
			$resulta["nombre"]=0;
			$resulta["apellidos"]='No Registra';
			$resulta["edad"]='No Registra';
			$json['usuario'][]=$resulta;
			echo json_encode($json);
		}
	}
	else{
			$resulta["nombre"]=0;
			$resulta["apellidos"]='WS No retorna';
			$resulta["edad"]='WS No retorna';
			$json['usuario'][]=$resulta;
			echo json_encode($json);
		}
?>