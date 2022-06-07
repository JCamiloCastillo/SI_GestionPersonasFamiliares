
<?php 

require 'database.php';
if(isset($_GET['id'])){
	$id = (int) $_GET['id'];
	$sql="UPDATE PERSONAS_FAMILIARES Set estadoP = 'inactivo' Where estadoP = 'activo' AND NUME_IDENTIFICACION =  $_GET[id]";
	// echo "<script>
	// alert('".$sql."');
	// </script>";
	echo $sql;
	if ($con->query($sql)) {
		
		header('Location: ../Html/empleadosEliminar.php');

	}else{
		
		header('Location: ../Html/empleadosEliminar.php');
	}
}else{		
	echo "<script>
	alert('Error');
	</script>
	"; 
}
?>

