<!--
Crear un login y una página para registrar a un nuevo usuario con los siguientes datos:
usuario y contraseña.


(index.html) Login 	  -> Si el usuario existe 	 -> principal.html
(index.html) Login    -> Si el usuario no existe -> (index.html) Login
 registrar.html       -> Nuevo usuario           -> (index.html) Login

El login tendrá la opción para registrar.
Usar "estilos.css" en el ejercicio.

-->

<?php

include("conexion.php");

$nombre = $_POST["usuario"];
$nombre2 = $_POST["nombre"];
$apellido = $_POST["apellidos"];
$email = $_POST["email"];
$pass   = $_POST["pass"];

//Login
if(isset($_POST["btningresar"]))
{
	$query = mysqli_query($conn,"SELECT * FROM registro WHERE usuario = '$nombre' AND nombre=$nombre2 AND password='$pass'");
	$nr = mysqli_num_rows($query);
	
	if($nr==1)
	{
		echo "<script> alert('Bienvenido $nombre'); window.location='principal.html' </script>";
	}else
	{
		echo "<script> alert('Usuario no existe'); window.location='index.html' </script>";
	}
}

//Registrar
if(isset($_POST["btnregistrar"]))
{
	$sqlgrabar = "INSERT INTO registro(usuario,nombre,apellidos,email,password,) values ('$nombre','$nombre2','$apellido','$email','$pass')";
	
	if(mysqli_query($conn,$sqlgrabar))
	{
		echo "<script> alert('Usuario registrado con exito: $nombre'); window.location='index.html' </script>";
	}else 
	{
		echo "Error: ".$sql."<br>".mysql_error($conn);
	}
}


?>