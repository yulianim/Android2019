<?PHP
$hostname_localhost="localhost";
$database_localhost="bd_usuario";
$username_localhost="root";
$password_localhost="";

$conexion=mysqli_connect($hostname_localhost,$username_localhost,$password_localhost,$database_localhost);

	$id=$_POST["id"];
	$nombre = $_POST["nombre"];
	$apellidos = $_POST["apellidos"];
	$edad= $_POST["edad"];
	
	$sql="UPDATE usuario SET nombre=? , apellidos=?, edad=? WHERE id=?";
	$stmt=$conexion->prepare($sql);
	$stmt->bind_param('sssd',$nombre,$apellidos,$edad,$id);
		
	if($stmt->execute()){
		echo "actualiza";
	}else{
		echo "noActualiza";
	}
	mysqli_close($conexion);
?>
