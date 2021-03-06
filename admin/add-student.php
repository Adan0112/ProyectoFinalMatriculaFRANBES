<?php 
  $corepage = explode('/', $_SERVER['PHP_SELF']);
    $corepage = end($corepage);
    if ($corepage!=='index.php') {
      if ($corepage==$corepage) {
        $corepage = explode('.', $corepage);
       header('Location: index.php?page='.$corepage[0]);
     }
    }

  if (isset($_POST['addstudent'])) {
  	$name = $_POST['nombre'];
  	$roll = $_POST['documento'];
  	$address = $_POST['direccion'];
  	$pcontact = $_POST['telefono'];
  	$class = $_POST['formacion'];
  	
  	$photo = explode('.', $_FILES['photo']['nombre']);
  	$photo = end($photo); 
  	$photo = $roll.date('Y-m-d-m-s').'.'.$photo;

  	$query = "INSERT INTO `estudiante` (`id`, `nombre`, `documento`, `formacion`, `direccion`, `telefono`, `photo`) VALUES ('$name', '$roll', '$class', '$address', '$pcontact','$photo');";
  	if (mysqli_query($db_con,$query)) {
  		$datainsert['insertsucess'] = '<p style="color: green;">Estudiante Ingresado Exitosamente</p>';
  		move_uploaded_file($_FILES['photo']['tmp_name'], 'images/'.$photo);
  	}else{
  		$datainsert['inserterror']= '<p style="color: red;">Estudiante no ingresado, revise la información diligenciada.</p>';
  	}
  }
?>
<h1 class="text-primary"><i class="fas fa-user-plus"></i>  Agregar Estudiante<small class="text-warning"> Nuevo Estudiante</small></h1>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
     <li class="breadcrumb-item" aria-current="page"><a href="index.php">Panel de Control </a></li>
     <li class="breadcrumb-item active" aria-current="page">Agregar Estudiante</li>
  </ol>
</nav>

<div class="row">
	
<div class="col-sm-6">
		<?php if (isset($datainsert)) {?>
	<div role="alert" aria-live="assertive" aria-atomic="true" class="toast fade" data-autohide="true" data-animation="true" data-delay="2000">
	  <div class="toast-header">
	    <strong class="mr-auto">Alerta de inserción de estudiantes</strong>
	    <small><?php echo date('d-M-Y'); ?></small>
	    <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
	      <span aria-hidden="true">&times;</span>
	    </button>
	  </div>
	  <div class="toast-body">
	    <?php 
	    	if (isset($datainsert['insertsucess'])) {
	    		echo $datainsert['insertsucess'];
	    	}
	    	if (isset($datainsert['inserterror'])) {
	    		echo $datainsert['inserterror'];
	    	}
	    ?>
	  </div>
	</div>
		<?php } ?>
	<form enctype="multipart/form-data" method="POST" action="">
		<div class="form-group">
		    <label for="nombre">Nombre de Estudiante</label>
		    <input name="nombre" type="text" class="form-control" id="nombre" value="<?= isset($name)? $name: '' ; ?>" required="">
	  	</div>
	  	<div class="form-group">
		    <label for="documento">Número de Documento</label>
		    <input name="documento" type="text" value="<?= isset($roll)? $roll: '' ; ?>" class="form-control" pattern="[0-9]{8}" id="documento" required="">
	  	</div>
	  	<div class="form-group">
		    <label for="direccion">Dirección de Estudiante</label>
		    <input name="direccion" type="text" value="<?= isset($address)? $address: '' ; ?>" class="form-control" id="direccion" required="">
	  	</div>
	  	<div class="form-group">
		    <label for="telefono">Teléfono de Contacto</label>
		    <input name="telefono" type="text" class="form-control" id="telefono" pattern="[0-9]{12}" value="<?= isset($pcontact)? $pcontact: '' ; ?>" placeholder="51........." required="">
	  	</div>
	  	<div class="form-group">
		    <label for="formacion">Nivel Formacion</label>
		    <select name="formacion" class="form-control" id="formacion" required="">
		    	<option>Seleccionar</option>
		    	<option value="Nivel Basico">Nivel Basico</option>
		    	<option value="Nivel Intermedio">Nivel Intermedio</option>
		    	<option value="Nivel Avanzado">Nivel Avanzado</option>
		    </select>
	  	</div>
	  	<div class="form-group">
		    <label for="photo">Fotografía de Estudiante</label>
		    <input name="photo" type="file" class="form-control" id="photo" required="">
	  	</div>
	  	<div class="form-group text-center">
		    <input name="addstudent" value="Agregar Estudiante" type="submit" class="btn btn-danger">
	  	</div>
	 </form>
</div>
</div>