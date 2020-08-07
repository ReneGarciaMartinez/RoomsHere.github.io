<?php
$opcion="agregar";
if(isset($_POST['valor'])){
  $opcion=$_POST['valor'];
  $id=$_POST['id_user'];

  $conect= mysqli_connect("localhost","root","","hola");
$conect->set_charset("utf8");
$sql= "SELECT * from usuario where id_usuario=".$id;
$getUs= mysqli_query($conect,$sql);
if($getUs->num_rows>0){
  while($registro=$getUs->fetch_object()){
    $user=$registro;
  break;
  }
}

}
@session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <title>Sistema</title>
</head>
<?php
      require("header.php");

?>
<body>
    <div class="  container pt-5">
        <div class="row">
             <div class="col-sm-8 offset-1">
             
             <?php if($opcion=='editaruser'){
               
               ?>
             <div class="card" >
  <div class="card-body">
    <h5 class="card-title">Editar Usuario</h5>
    <hr>
    <form action="userController.php" method="POST">
  <div class="form-group">
  <input type='hidden' value="<?php echo $user->id_usuario; ?>" name='id_user'>
    <label >Nombre</label>
    <input type="text" class="form-control" name="name_u" value="<?php echo $user->nombre; ?>"  >
  </div>
  <div class="form-group">
    <label >Apellido paterno</label>
    <input type="text" class="form-control" name="ap_u"  value="<?php echo $user->apellido_p; ?>">
  </div>
  <div class="form-group">
    <label >Apellido Materno</label>
    <input type="text" class="form-control" name="am_u"  value="<?php echo $user->apellido_m; ?>">
  </div>
  <div class="form-group">
    <label >Telefono</label>
    <input type="text" class="form-control" name="telefono_u"  value="<?php echo $user->telefono; ?>">
  </div>
  <div class="form-group">
    <label >Direccion</label>
    <input type="text" class="form-control" name="direc_u"  value="<?php echo $user->direccion; ?>">
  </div>
  <div class="form-group">
  <label for="inputState">Activo</label>
        <select name="activo_u" class="form-control">
         <option value=" <?php if($user->activo==1) {
          echo "1";
         }else {
           echo "0";
         }?>"selected><?php if($user->activo==1) {
          echo "Activo";
         }else {
           echo "Inactivo";
         }?></option>
         <option value="0">Activo</option>
          <option value="1">Inactivo</option>
        </select>
   </div>
   <div class="form-group">
   <label for="inputState">Perfil</label>
        <select name="perfil_u" class="form-control">
         <option value="
         <?php switch ($user->perfil) {
           case '0':
             echo "0";
             break;
        case '1':
              echo "1";
            break;
        case '2':
              echo "2";
            break;
          
         }?>
          "selected><?php switch ($user->perfil) {
           case '0':
             echo "Comun";
             break;
        case '1':
              echo "Anunciante";
            break;
        case '2':
              echo "Administrador";
            break;
          
         }?></option>
         <option value="0">Comun</option>
          <option value="1">Anunciante</option>
          <option value="2">Administrador</option>
        </select>
        </div>
  <div class="form-group">
    <label >Usuario</label>
    <input type="text" class="form-control" name="User_u" value="<?php echo $user->User; ?>" >
  </div>
  <div class="form-group">
    <label >Contraseña</label>
    <input type="password" class="form-control" name="pass_u" value="<?php echo $user->pass; ?>" >
  </div>
  
  <button type="submit" class="btn btn-primary">Actualizar</button>
  </div>
  <input type="hidden" value="editaruser" name="valor">
</div>

<?php }else{?>
  <form action="userController.php" method="POST">
  <div class="form-row">
    <div class="col-md-4 mb-3">
      <label >Nombre</label>
      <input type="text" class="form-control " maxlength="20" pattern="[a-zA-Z]+" name="name_u" required>
      
    </div>
    <div class="col-md-4 mb-3">
      <label >Apellido paterno</label>
      <input type="text" class="form-control" maxlength="20" pattern="[a-zA-Z]+"  name="ap_u">
     
    </div>
    <div class="col-md-4 mb-3">
      <label >Apellido materno</label>
      <input type="text" class="form-control "  maxlength="20" pattern="[a-zA-Z]+"  name="am_u">
      
    </div>
  </div>
  <div class="form-row">
    <div class="col-md-9 mb-3">
      <label >Direccion</label>
      <input type="text" class="form-control" name="direc_u" maxlength="70" required>
    </div>
    
    <div class="col-md-3 mb-3">
      <label >Telefono</label>
      <input type="text" class="form-control" name="telefono_u" pattern="[0-9]+" minlength="10" maxlength="10" required>
    </div>
  </div>
  <div class="form-row">
    <div class="col-md-4 mb-3">
      <label >Usuario</label>
      <input type="text" class="form-control" name="User_u" maxlength="15" placeholder="Usuario" required>
    </div>
  </div>
  <div class="form-row">
    <div class="col-md-4 mb-3">
      <label >Contraseña</label>
      <input type="password" class="form-control"  name="pass_u" placeholder="Contraseña" maxlength="15" required>
    </div>
  </div>
  <input type="hidden" value="registrarusuario" name="valor">
  <button class="btn btn-primary" type="submit">Registrarse</button>
</form>
  <!--
    <div class="card" >
  <div class="card-body">
    <h5 class="card-title">Nuevo Usuario</h5>
    <form action="userController.php" method="POST">
  <div class="form-group">
    <label >Nombre</label>
    <input type="text" class="form-control" name="name_u"  >
  </div>
  <div class="form-group">
    <label >Apellido paterno</label>
    <input type="text" class="form-control" name="ap_u"  >
  </div>
  <div class="form-group">
    <label >Apellido Materno</label>
    <input type="text" class="form-control" name="am_u"  >
  </div>
  <div class="form-group">
    <label >Usuario</label>
    <input type="text" class="form-control" name="User_u"  >
  </div>
  <div class="form-group">
    <label >Contraseña</label>
    <input type="password" class="form-control" name="pass_u"  >
  </div>
  
  <button type="submit" class="btn btn-primary">Agregar</button>
  </div>
  <input type="hidden" value="agregarusuario" name="valor">
</div>
-->
<?php } ?>
             </div>
         </div>
     </div>

</body>
<?php require("footer.php");?>
</html>