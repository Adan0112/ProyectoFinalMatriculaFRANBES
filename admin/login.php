<?php require_once 'db_con.php'; 
session_start();
if(isset($_SESSION['user_login'])){
	header('Location: index.php');
}
	if (isset($_POST['login'])) {
		$username= $_POST['nombre_usuario'];
		$password= $_POST['password'];


		$input_arr = array();

		if (empty($username)) {
			$input_arr['input_user_error']= "Se requiere nombre de usuario!";
		}

		if (empty($password)) {
			$input_arr['input_pass_error']= "Se requiere contraseña!";
		}

		if(count($input_arr)==0){
			$query = "SELECT * FROM `usuario` WHERE `nombre_usuario` = '$username';";
			$result = mysqli_query($db_con, $query);
			if (mysqli_num_rows($result)==1) {
				$row = mysqli_fetch_assoc($result);
				if ($row['password']==sha1(md5($password))) {
					if ($row['estado_usuario']=='activo') {
						$_SESSION['user_login']=$username;
						header('Location: index.php');
					}else{
						$status_inactive = "Su estado está inactivo, póngase en contacto con el administrador o el soporte";
					}
				}else{
					$worngpass= "Contraseña o Usuario Incorrecto!";	
				}
			}else{
				$usernameerr= "Nombre de usuario no existe";
			}
		}
		
	}


?>
<!doctype html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css"/>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <title>Acceso Administrativo</title>
  </head>
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../css/fontawesome.min.css">
    <link rel="stylesheet" href="../css/solid.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css"/>
    <link rel="stylesheet" type="text/css" href="../css/style.css">

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="../js/jquery-3.5.1.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/jquery.dataTables.min.js"></script>
    <script src="../js/dataTables.bootstrap4.min.js"></script>
    <script src="../js/fontawesome.min.js"></script>
    <script src="../js/script.js"></script>
    <title>Panel de Control</title>
  </head>
  <body >
  <div style="height: 60px; background: #007bff; color: #fff; width: 100%; margin: 0;">
  <h1 class="text-center">Academia de Natacion Franbes</h1>
  </div>

</div>
 
    <div   class="container"><br>
          <h1 class="text-center">Acceso Administrativo</h1><hr><br>
          <div class="d-flex justify-content-center">
          	<?php if(isset($usernameerr)){ ?> <div role="alert" aria-live="assertive" aria-atomic="true" align="center" class="toast alert alert-danger fade hide" data-delay="2000"><?php echo $usernameerr; ?></div><?php };?>
          		<?php if(isset($worngpass)){ ?> <div role="alert" aria-live="assertive" aria-atomic="true" align="center" class="toast alert alert-danger fade hide" data-delay="2000"><?php echo $worngpass; ?></div><?php };?>
          		<?php if(isset($status_inactive)){ ?> <div role="alert" aria-live="assertive" aria-atomic="true" align="center" class="toast alert alert-danger fade hide" data-delay="2000"><?php echo $status_inactive; ?></div><?php };?>
          </div>
          <div class="row animate__animated animate__pulse">
            <div class="col-md-4 offset-md-4">
             	<form method="POST" action="">
				  <div class="form-group row">
				    <div class="col-sm-12">
				      <input type="text" class="form-control" name="nombre_usuario" value="<?= isset($username)? $username: ''; ?>" placeholder="Usuario" id="inputEmail3"> <?php echo isset($input_arr['input_user_error'])? '<label>'.$input_arr['input_user_error'].'</label>':''; ?>
				    </div>
				  </div>
				  <div class="form-group row">
				    <div class="col-sm-12">
				      <input type="password" name="password" class="form-control" id="inputPassword3" placeholder="Contraseña"><label><?php echo isset($input_arr['input_pass_error'])? '<label>'.$input_arr['input_pass_error'].'</label>':''; ?>
				    </div>
				  </div>
				  <div class="text-center">
				      <button type="submit" name="login" class="btn btn-warning">Ingresar</button>
				    </div>
				    <p>Si aún no tienes una cuenta de usuario, puedes <a href="register.php">Registrate</a></p>
				  </div>
				</form>
            </div>
          </div>
    </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="../js/jquery-3.5.1.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
        <script type="text/javascript">
    	$('.toast').toast('show')

    </script>
  </body>
</html>