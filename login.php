<?PHP
$hostname_localhost="localhost";
$database_localhost="bd";
$username_localhost="root";
$password_localhost="pass";

$json=array();

	if(isset($_GET["user"])){
		$user=$_GET["user"];
				
		$conexion = mysqli_connect($hostname_localhost,$username_localhost,$password_localhost,$database_localhost);

		$consulta="select password from user where user='{$user}'";
		$resultado=mysqli_query($conexion,$consulta);
			
		while ($row = mysqli_fetch_row($resultado)) {
                 $json[]=$row[0];
            }
		
		mysqli_close($conexion);
		echo json_encode($json);
	}
	else{
		$resulta["success"]=0;
		$resulta["message"]='Ws no Retorna';
		$json['user'][]=$resulta;
		echo json_encode($json);
	}
?>