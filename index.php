<?php require_once 'admin/db_con.php'; ?>
<!doctype html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css"/>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>Matrícula de Estudiantes</title>
  </head>
  <body>
  <div style="height: 60px; background: #007bff; color: #fff; width: 100%; margin: 0;">
  <h1 class="text-center">Academia de Natacion "Franbes"</h1>
  </div>

    <div class="container"><br>
      <a class="btn btn-primary float-right" href="admin/login.php">Panel Administrativo</a>
          <h1 class="text-center">Sistema de Matrícula de Estudiantes</h1><br>

          <div class="row">
            <div class="col-md-4 offset-md-4">
              <form method="POST">
            <table class="text-center infotable">
              <tr>
                <th colspan="2">
                  <p class="text-center">Información del Estudiante</p>
                </th>
              </tr>
              <tr>
                <td>
                   <p>Selecciona Nivel Formacion</p>
                </td>
                <td>
                   <select class="form-control" name="choose">
                     <option value="">
                       Seleccionar
                     </option>
                     <option value="Nivel Basico">
                     Nivel Basico
                     </option>
                     <option value="Nivel Intermedio">
                     Nivel Intermedio
                     </option>
                     <option value="Nivel Avanzado">
                     Nivel Avanzado
                     </option>
                   </select>
                </td>
              </tr>

              <tr>
                <td>
                  <p><label for="documento">Número Matricula</label></p>
                </td>
                <td>
                  <input class="form-control" type="text" pattern="[0-9]{8}" id="documento" placeholder="8 dígitos..." name="documento">
                </td>
              </tr>
              <tr>
                <td colspan="2" class="text-center">
                  <input class="btn btn-danger" type="submit" name="showinfo">
                </td>
              </tr>
            </table>
          </form>
            </div>
          </div>
        <br>
        <?php if (isset($_POST['showinfo'])) {
          $choose= $_POST['choose'];
          $roll = $_POST['documento'];
          if (!empty($choose && $roll)) {
            $query = mysqli_query($db_con,"SELECT * FROM `estudiante` WHERE `documento`='$roll' AND `formacion`='$choose'");
            if (!empty($row=mysqli_fetch_array($query))) {
              if ($row['documento']==$roll && $choose==$row['formacion']) {
                $stroll= $row['documento'];
                $stname= $row['nombre'];
                $stclass= $row['formacion'];
                $city= $row['direccion'];
                $photo= $row['photo'];
                $pcontact= $row['telefono'];
              ?>
        <div class="row">
          <div class="col-sm-6 offset-sm-3">
            <table class="table table-bordered">
              <tr>
                <td rowspan="5"><h3>Información de Estudiante</h3><img class="img-thumbnail" src="admin/images/<?= isset($photo)?$photo:'';?>" width="250px"></td>
                <td>Nombre</td>
                <td><?= isset($stname)?$stname:'';?></td>
              </tr>
              <tr>
                <td>Número de Documento</td>
                <td><?= isset($stroll)?$stroll:'';?></td>
              </tr>
              <tr>
                <td>Nivel Formacion</td>
                <td><?= isset($stclass)?$stclass:'';?></td>
              </tr>
              <tr>
                <td>Dirección</td>
                <td><?= isset($city)?$city:'';?></td>
              </tr>
              <tr>
                <td>Fecha de Ingreso</td>
                <td><?= isset($pcontact)?$pcontact:'';?></td>
              </tr>
            </table>
          </div>
         
        </div> 
        
        
      <?php 
          }else{
                echo '<p style="color:red;">Por favor ingrese un número válido de matricula y nivel formacion</p>';
              }
            }else{
              echo '<p style="color:red;">Tu información ingresada no coincide</p>';
            }
            }else{?>
              <script type="text/javascript">alert("Datos no encontrados");</script>
            <?php }
          }; ?>
        
    </div>
    
    <hr>
    <p class="text-center"><strong>DESARROLLADOR</strong><br>TRINIDAD<br>ESPECIALIDAD:<br>ANALISIS DE SISTEMAS</p>
    <br>
    


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery-3.5.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>