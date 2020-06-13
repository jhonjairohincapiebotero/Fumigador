<?php 

	$conexion=mysqli_connect('localhost','root','','codigoBarra');
	
	$nombre=$_POST['nombre'];

	$sql="INSERT into t_productos (nombre) values ('$nombre')";
	$result=mysqli_query($conexion,$sql);

	$id=mysqli_insert_id($conexion);//obtenemos el ultimo id agregado
	$codigo=$id.date('is');//milisegundos
	$sql="UPDATE t_productos 
			set codigo='$codigo'
			where id_producto='$id'";
	$result=mysqli_query($conexion,$sql);

	header("Location:../index.php");
 ?>