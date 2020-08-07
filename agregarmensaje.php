
<?php
$opcion="agregar";
if(isset($_POST['valor'])){
    $opcion=$_POST['valor'];
    $id_cuarto=$_POST['id_cuarto'];
  
    $conect= mysqli_connect("localhost","root","","hola");
  $conect->set_charset("utf8");
  $sql= "SELECT * from datos where id_cuarto=".$id_cuarto;
  $getUs= mysqli_query($conect,$sql);
  if($getUs->num_rows>0){
    while($registro=$getUs->fetch_object()){
      $cuarto=$registro;
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
    <title>Rooms Here</title>
    <link rel="stylesheet" href="s_home.css">
</head>
<?php
require("header.php");
?>
<body>
    <div class="  container pt-5">
        <div class="row">
             <div class="col-sm-8 offset-sm-1">
  <div class="c_agregar card" >
  <div class="card-body">
    <h5 class="card-title">Mensaje</h5>
    <hr>
    <form action="cuartoController.php" method="POST">
    <div class="form-row">
    <div class="form-group col-md-6">
    <input type='hidden' value="<?php echo $cuarto->id_usuario; ?>" name='id_usuario'>
    <input type='hidden' value="<?php echo $cuarto->id_cuarto; ?>" name='id_cuarto'>
      <label >Nombre</label>
      <input type="text" class="form-control" name="nombre" placeholder="nombre">
    </div>
    <div class="form-group col-md-6">
        <label for="inputState">Telefono</label>
        <input type="text" class="form-control" name="telefono" placeholder="Telefono">
      </div>
      
  </div>
    <div class="form-row">
       <div class="form-group col-md-12">   
  <div class="form-group">
    <label for="Descripcion">Descripcíon </label>
    <textarea class="form-control" id="exampleFormControlTextarea1" name="descripcion" rows="3"></textarea>
  </div>
  <form>
  <button type="submit" class="btn btn-primary ">Agregar</button>
  </div>
  <input type="hidden" value="agregarmensaje" name="valor">
</div>
</form>

             </div>
         </div>
     </div>

</body>

</html>