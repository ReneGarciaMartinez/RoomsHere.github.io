<?php
@session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <title>Usuarios</title>
</head>
<?php
$perfil=$_SESSION["perfil"];
switch($perfil){
  case '1':
      require("headerAnunciante.php");
  break;

  case '2':
      require("headerAdmin.php");
  break;

  case '0':
      require("headerComun.php");
  break;
}

require("userModel.php");
?>
<body>
    <div class="  container pt-5">
        <div class="row">
            <div class="col-lg-10">
                <h1> Usuarios</h1> 
            </div>
            <div class="col-lg-22">
            <a href="agregarUsuario2.php" type='button' class='btn btn-primary'>Agregar Usuario</a>
               
             </div>
             
<div class="col-sm-12">
             
 <table class="table">
  <thead>
    <tr>
      <th scope="col">Nombre</th>
      <th scope="col">Apellidos</th>
      <th scope="col">Usuario</th>
      <th scope="col">Telefono</th>
      <th scope="col">Dirección</th>
      <th scope="col">Opciones</th>
    
    </tr>
  </thead>
  <tbody>
  <?php
                 getUsers();
                ?>
  </tbody>
</table>
             
             </div> 
        </div>
    </div>

</body>
<?php require("footer.php");?>
</html>