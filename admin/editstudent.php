<?php 
  $corepage = explode('/', $_SERVER['PHP_SELF']);
    $corepage = end($corepage);
    if ($corepage!=='index.php') {
      if ($corepage==$corepage) {
        $corepage = explode('.', $corepage);
       header('Location: index.php?page='.$corepage[0]);
     }
    }
    
    $id = base64_decode($_GET['id']);
    $oldPhoto = base64_decode($_GET['photo']);

  if (isset($_POST['updatestudent'])) {
  	$name = $_POST['nombre'];
  	$roll = $_POST['documento'];
  	$address = $_POST['direccion'];
  	$pcontact = $_POST['telefono'];
  	$class = $_POST['formacion'];
  	
  	if (!empty($_FILES['photo']['nombre'])) {
  		 $photo = $_FILES['photo']['nombre'];
	  	 $photo = explode('.', $photo);
		 $photo = end($photo); 
		 $photo = $roll.date('Y-m-d-m-s').'.'.$photo;
  	}else{
  		$photo = $oldPhoto;
  	}
  	

  	$query = "UPDATE `estudiante` SET `nombre`='$name',`documento`='$roll',`formacion`='$class',`direccion`='$address',`telefono`='$pcontact',`photo`='$photo' WHERE `id`= $id";
  	if (mysqli_query($db_con,$query)) {
  		$datainsert['insertsucess'] = '<p style="color: green;">Student Updated!</p>';
		if (!empty($_FILES['photo']['nombre'])) {
			move_uploaded_file($_FILES['photo']['tmp_name'], 'images/'.$photo);
			unlink('images/'.$oldPhoto);
		}	
  		header('Location: index.php?page=all-student&edit=success');
  	}else{
  		header('Location: index.php?page=all-student&edit=error');
  	}
  }
?>
<h1 class="text-primary"><i class="fas fa-user-plus"></i>  Editar Información de Estudiante<small class="text-warning"> Editar</small></h1>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
     <li class="breadcrumb-item" aria-current="page"><a href="index.php">Panel de Control </a></li>
     <li class="breadcrumb-item" aria-current="page"><a href="index.php?page=all-student">Todos los Estudiantes </a></li>
     <li class="breadcrumb-item active" aria-current="page">Agregar Estudiante</li>
  </ol>
</nav>

	<?php
		if (isset($id)) {
			$query = "SELECT `id`, `nombre`, `documento`, `formacion`, `direccion`, `telefono`, `photo`, `datetime` FROM `estudiante` WHERE `id`=$id";
			$result = mysqli_query($db_con,$query);
			$row = mysqli_fetch_array($result);
		}
	 ?>
<div class="row">
<div class="col-sm-6">
	<form enctype="multipart/form-data" method="POST" action="">
		<div class="form-group">
		    <label for="nombre">Nombre de Estudiante</label>
		    <input name="nombre" type="text" class="form-control" id="nombre" value="<?php echo $row['nombre']; ?>" required="">
	  	</div>
	  	<div class="form-group">
		    <label for="documento">Número de Documento</label>
		    <input name="documento" type="text" class="form-control" pattern="[0-9]{8}" id="documento" value="<?php echo $row['documento']; ?>" required="">
	  	</div>
	  	<div class="form-group">
		    <label for="direccion">Dirección de Estudiante</label>
		    <input name="direccion" type="text" class="form-control" id="direccion" value="<?php echo $row['direccion']; ?>" required="">
	  	</div>
	  	<div class="form-group">
		    <label for="telefono">Número de Contacto</label>
		    <input name="telefono" type="text" class="form-control" id="telefono" value="<?php echo $row['telefono']; ?>" pattern="[0-9]{12}" placeholder="51..." required="">
	  	</div>
	  	<div class="form-group">
		    <label for="formacion">Nivel Formacion</label>
		    <select name="formacion" class="form-control" id="formacion" required="" value="">
		    	<option>Seleccionar</option>
		    	<option value="Nivel Basico" <?= $row['formacion']=='Nivel Basico'? 'selected':'' ?>> Nivel Basico</option>
		    	<option value="Nivel Intermedio" <?= $row['formacion']=='Nivel Intermedio'? 'selected':'' ?>>Nivel Intermedio</option>
		    	<option value="Nivel Avanzado" <?= $row['formacion']=='Nivel Avanzado'? 'selected':'' ?>>Nivel Avanzado</option>
		    </select>
	  	</div>
	  	<div class="form-group">
		    <label for="photo">Fotografía</label>
		    <input name="photo" type="file" class="form-control" id="photo">
	  	</div>
	  	<div class="form-group text-center">
		    <input name="updatestudent" value="Editar Estudiante" type="submit" class="btn btn-danger">
	  	</div>
	 </form>
</div>
</div>