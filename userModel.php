<link rel="stylesheet" href="css/estilo.css">
<?php

function addUser($name,$ap,$am,$dir,$tel,$user,$pass){
    $conect= mysqli_connect("localhost","root","","hola");
    $conect->set_charset("utf8");
    $sql= "SELECT User FROM `usuario`";
$getUs= mysqli_query($conect,$sql);
$c=0;
if($getUs->num_rows>0){
        while($row = mysqli_fetch_array($getUs)){
     if ($row["User"]==$user) {
        echo "<script type=\"text/javascript\">alert(\"Usuario existente, intente con otro usuario.\");</script>";
        echo"<script type='text/javascript'>
        window.location='../modules/agregarUsuario2.php';
        </script>";
        $c=1;
     }
   
        }
    }
if ($c==0) {
    $sql= "INSERT INTO `usuario` (`nombre`, `apellido_p`, `apellido_m`, `telefono`, `direccion`, `User`, `pass`, `id_premium`, `activo`, `perfil`) VALUES ('$name', '$ap', '$am', '$tel', '$dir', '$user', '$pass', '0', '1', '0')";
    $agregarUser= mysqli_query($conect,$sql);
    if($agregarUser){
        echo "<script type=\"text/javascript\">alert(\"Usuario Agregado\");</script>";
        echo"<script type='text/javascript'>
        window.location='../modules/usuarios.php';
        </script>";
    }else{
        echo"fallo";
    }
}else{
    echo "<script type=\"text/javascript\">alert(\"Fallo al agregar el usuario\");</script>";
    echo"<script type='text/javascript'>
    window.location='../modules/agregarUsuario2.php';
    </script>";
}
    
}
function addUsuario($name,$ap,$am,$dir,$tel,$user,$pass){
    $conect= mysqli_connect("localhost","root","","hola");
    $conect->set_charset("utf8");
    $sql= "SELECT User FROM `usuario`";
$getUs= mysqli_query($conect,$sql);
$c=0;
if($getUs->num_rows>0){
        while($row = mysqli_fetch_array($getUs)){
     if ($row["User"]==$user) {
        echo "<script type=\"text/javascript\">alert(\"Usuario existente, intente con otro usuario.\");</script>";
        echo"<script type='text/javascript'>
        window.location='../modules/login.php';
        </script>";
        $c=1;
     }
   
        }
    }
if ($c==0) {
    $sql= "INSERT INTO `usuario` (`nombre`, `apellido_p`, `apellido_m`, `telefono`, `direccion`, `User`, `pass`, `id_premium`, `activo`, `perfil`) VALUES ('$name', '$ap', '$am', '$tel', '$dir', '$user', '$pass', '0', '1', '0')";
    $agregarUser= mysqli_query($conect,$sql);
    if($agregarUser){
        echo "<script type=\"text/javascript\">alert(\"Usuario Agregado\");</script>";
        echo"<script type='text/javascript'>
        window.location='../modules/login.php';
        </script>";
    }else{
        echo"fallo";
    }
}else{
    echo "<script type=\"text/javascript\">alert(\"Fallo al agregar el usuario\");</script>";
    echo"<script type='text/javascript'>
    window.location='../modules/login.php';
    </script>";
}
    
}
function getUsers(){
    
$conect= mysqli_connect("localhost","root","","hola");
$conect->set_charset("utf8");
$sql= "SELECT * FROM `usuario` WHERE activo =1";
$getUs= mysqli_query($conect,$sql);

if($getUs->num_rows>0){
        while($row = mysqli_fetch_array($getUs)){
     ?>
      <tr>
      <th scope='col'><?php echo $row["nombre"]?></th>
      <th scope='col'><?php echo $row["apellido_p"]." ".$row["apellido_m"]?></th>
      <th scope='col'><?php echo $row["User"]?></th>
      <th scope='col'><?php echo $row["telefono"]?></th>
      <th scope='col'><?php echo $row["direccion"]?></th>
      <th scope='col'>

      <form class="pb-1" action='userController.php' method='POST' 
      onSubmit="if(!confirm('¿Realmente quiere eliminar este usuario?')){return false;}">
        <input type='hidden' name='id_user' value="<?php echo $row["id_usuario"];?>">
        <input type='hidden' value='eliminaruser' name='valor'>
        <input type="submit"value="Eliminar" class="btn-sm btn-danger">
      </form>

      <form action='agregarUsuario2.php' method='POST'>
      <input type='hidden' value="<?php echo $row["id_usuario"];?>" name='id_user'>
      <input type='hidden' value='editaruser' name='valor'>
      <input type="submit" value="  Editar  " class="btn-sm btn-primary">
    </form>
    </th>
    </tr>
    <?php
        }
    }   
}

function deleteUser($id){
        $conect= mysqli_connect("localhost","root","","hola");
        $conect->set_charset("utf8");
        $sql= "UPDATE `usuario` SET `activo` = '0' WHERE `usuario`.`id_usuario` =".$id;
$delUs= mysqli_query($conect,$sql);
if($delUs){
    echo "<script type=\"text/javascript\">alert(\"Usuario Eliminado\");</script>";
    echo"<script type='text/javascript'>
    window.location='../modules/usuarios.php';
    </script>";
}
}

function updateUser($id,$name,$ap,$am,$user,$pass,$dir,$tel,$activo,$perfil){
    $conect= mysqli_connect("localhost","root","","hola");
    $conect->set_charset("utf8");
    $sql= "UPDATE `usuario` SET `apellido_p` = '$ap', `apellido_m` = '$am', `nombre` = '$name', `User` = '$user', `pass` = '$pass', `direccion` = '$dir', `telefono` = '$tel', `activo` = '$activo', `perfil` = '$perfil' WHERE `usuario`.`id_usuario` =".$id;
    $updateUser= mysqli_query($conect,$sql);
    if($updateUser){
        echo "<script type=\"text/javascript\">alert(\"Usuario Actualizado\");</script>";
        echo"<script type='text/javascript'>
        window.location='../modules/usuarios.php';
        </script>";
    }
}
?>