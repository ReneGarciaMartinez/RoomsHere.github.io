
<link rel="stylesheet" href="css/s_home.css">
<?php

function addCuarto($id_usuario,$inmueble_v,$cuartos_v,$baños_v,$direccion_v,$amueblado_v,$tv_v,$internet_v,$agua_v,$estacionamiento_v,$precio_v,$servicio_v,$deposito_v,$descripcion_v,$tel,$archivo,$archivo2,$archivo3,$archivo4){
    $conect= mysqli_connect("localhost","root","","hola");
    $conect->set_charset("utf8");
    $date = date('Y-m-d H:i:s');
   
$sql= "INSERT INTO `datos` ( `id_usuario`, `tipo_de_inmueble`, `numero_de_cuartos`, `num_de_baños`, `direccion_c`, `amueblado`, `tv`, `internet`, `agua_caliente`, `estacionamiento`, `precio`, `precio_servicio`, `deposito`, `descripcion`, `telefono_c`, `fecha_reg`, `imagen`, `imagen2`, `imagen3`, `imagen4`, `id_premium`, `activo`) 
     VALUES ( '$id_usuario', '$inmueble_v', '$cuartos_v', '$baños_v', '$direccion_v', '$amueblado_v', '$tv_v', '$internet_v', '$agua_v', '$estacionamiento_v', '$precio_v', '$servicio_v', '$deposito_v', '$descripcion_v', '$tel', '$date','$archivo','$archivo2','$archivo3','$archivo4', '0', '1')";
    $agregarCuarto= mysqli_query($conect,$sql);
    if($agregarCuarto){
        echo "<script type=\"text/javascript\">alert(\"Cuarto Agregado\");</script>";
        echo"<script type='text/javascript'>
        window.location='../modules/cuartos.php';
        </script>";
    }
}
function addMensaje($id,$nombre,$telefono,$descripcion,$id_cuarto){
  $conect= mysqli_connect("localhost","root","","hola");
  $conect->set_charset("utf8");
  $date = date('Y-m-d H:i:s');
  $sql= "INSERT INTO `mensajes` ( `nombre`, `numero`, `mensaje`, `id_destinatario`, `id_cuarto`) VALUES ('$nombre', '$telefono', '$descripcion', '$id', '$id_cuarto')";
  $agregarCuarto= mysqli_query($conect,$sql);
  if($agregarCuarto){
      
      echo"<script type='text/javascript'>
      window.location='../modules/Cuartos.php';
      </script>";
  }
}
function getCuartos(){
    
$conect= mysqli_connect("localhost","root","","hola");
$conect->set_charset("utf8");
$sql= "SELECT * FROM `datos` where activo=1";
$getUs= mysqli_query($conect,$sql);
$i=0;
if($getUs->num_rows>0){
        while($row = mysqli_fetch_array($getUs)){
          
     ?>
     <div class="col-sm-4 pt-1 pb-3">           
     <div class="card" style="width: 18rem; height: 28rem;">
          <img src="<?php echo $row["imagen"]?>" class="img_card card-img-top " alt="...">
          <div class="card-body">
            <h2 class="card-title"><?php echo $row["tipo_de_inmueble"]?></h2>
            <h5>Precio: $<?php echo $row["precio"]?> </h5>
            <p class="card-text"><?php echo $row["descripcion"]?></p>
   
    
    
  </div>
  <div class="card-footer text-muted text-center">
  <form action='verCuarto.php' method='POST'>
    <input type='hidden' value="<?php echo $row["id_cuarto"];?>" name='id_cuarto'>
    <input type='hidden' value='vercuarto' name='valor'>
    <input type="submit"value="Ver mas" class="btn btn-primary">
  </form>
  </div>
</div>
</div> 

<?php
        
        }
    }   
}
function geteditarCuartos(){
  
  $conect= mysqli_connect("localhost","root","","hola");
  $conect->set_charset("utf8");
  $sql= "SELECT * FROM `datos` where activo=1";
  $getUs= mysqli_query($conect,$sql);
  $i=0;
  if($getUs->num_rows>0){
          while($row = mysqli_fetch_array($getUs)){
            
       ?>
       <div class="col-sm-4 pt-1 pb-3">           
       <div class="card" style="width: 18rem; height: 28rem;">
            <img src="<?php echo $row["imagen"]?>" class="img_card card-img-top " alt="...">
            <div class="card-body">
              <h2 class="card-title"><?php echo $row["tipo_de_inmueble"]?></h2>
              <h5>Precio: $<?php echo $row["precio"]?> </h5>
              <p class="card-text"><?php echo $row["descripcion"]?></p>
     
      
      
    </div>
    <div class="card-footer text-muted text-center">
    <form action='agregarCuarto.php' method='POST'>
    <input type='hidden' value="<?php echo $row["id_cuarto"];?>" name='id_cuarto'>
    <input type='hidden' value='editarcuarto' name='valor'>
    <input type="submit"value="Editar" class="btn btn-primary">
  </form>
    </div>
  </div>
  </div> 
  
  <?php
          
          }
      }   
  }
function getCuartosVip(){
    $conect= mysqli_connect("localhost","root","","hola");
    $conect->set_charset("utf8");
    $sql= "SELECT * FROM `datos` where activo=1 and id_premium=1";
    $getUs= mysqli_query($conect,$sql);
    $i=0;
    if($getUs->num_rows>0){
            while($row = mysqli_fetch_array($getUs)){
         ?>
         
         <!-- <ol class="carousel-indicators">
   <li data-target="#carouselExampleIndicators" data-slide-to="<?php echo$i;?>" class="<?php if($i==0){echo"active";}?>"></li>
  </ol>-->
<div class="carousel-item <?php if($i==0){echo"active";} ?> bg-dark">
<img src="<?php echo $row["imagen"]?>" class="img-carru d-block w-100 " style="height: 350px;">
          <div class="carousel-caption text-right text-white ">
          <h2 class="carru_t card-title text-white" style="text-shadow: 3px -5px 5px rgb(0, 0, 0);" ><?php echo $row["tipo_de_inmueble"] ?></h2>
          <h5 class="carru_t text-white" style="text-shadow: -3px -5px 5px rgb(0, 0, 0);">Precio: $<?php echo $row["precio"]?> </h5>

            <p class="carru_t text-white" style="text-shadow: -3px -5px 5px rgb(0, 0, 0);"><?php echo $row["descripcion"]?></p>
            <form action='verCuarto.php' method='POST'>
    <input type='hidden' value="<?php echo $row["id_cuarto"];?>" name='id_cuarto'>
    <input type='hidden' value='vercuarto' name='valor'>
    <input type="submit"value="Ver mas" class="btn btn-primary">
  </form>
          </div>
        </div>
      
  <!--       <div class="col-sm-4">           
    <div class="card" style="width: 18rem; height: 28rem;">
      <img src="<?php echo $row["imagen"]?>); ?>" class="img_card card-img-top " alt="...">
      <div class="card-body">
        <h2 class="card-title"><?php echo $row["tipo_de_inmueble"]?></h2>
        <h5>Precio: $<?php echo $row["precio"]?> </h5>
        <p class="card-text"><?php echo $row["descripcion"]?></p>
       

      </div>
      <div class="card-footer text-muted text-center">
      <form action='verCuarto.php' method='POST'>
    <input type='hidden' value="<?php echo $row["id_cuarto"];?>" name='id_cuarto'>
    <input type='hidden' value='vercuarto' name='valor'>
    <input type="submit"value="Ver mas" class="btn btn-primary">
  </form>
      </div>
    </div>
    </div> 
            -->
        <?php
        
$i=$i+1;
            }
        }   
    }
    function getmisCuartos(){
        @session_start();
        $conect= mysqli_connect("localhost","root","","hola");
        $conect->set_charset("utf8");
        $id_usuario=$_SESSION["id_user"];
        $sql= "SELECT * FROM `datos` where activo=1 and id_usuario='$id_usuario'";
        $getUs= mysqli_query($conect,$sql);
        
        if($getUs->num_rows>0){
                while($row = mysqli_fetch_array($getUs)){
             ?>
             <div class="col-sm-4 pt-1 pb-3">           
        <div class="card" style="width: 18rem; height: 28rem;">
          <img src="<?php echo $row["imagen"]?>" class="img_card card-img-top " alt="...">
          <div class="card-body">
            <h2 class="card-title"><?php echo $row["tipo_de_inmueble"]?></h2>
            <h5>Precio: $<?php echo $row["precio"]?> </h5>
            <p class="card-text"><?php echo $row["descripcion"]?></p>
           
            
            
          </div>
          <div class="card-footer text-muted text-center">
      <form action='agregarCuarto.php' method='POST'>
    <input type='hidden' value="<?php echo $row["id_cuarto"];?>" name='id_cuarto'>
    <input type='hidden' value='editarcuarto' name='valor'>
    <input type="submit"value="Editar" class="btn btn-primary">
  </form>
      </div>
        </div>
        </div> 
        
            <?php
                }
            }   
        }
        function getmisMensajes(){
          @session_start();
          $conect= mysqli_connect("localhost","root","","hola");
          $conect->set_charset("utf8");
          $id_usuario=$_SESSION["id_user"];
          $sql= "SELECT d.*, m.* from datos as d, mensajes as m WHERE d.id_cuarto=m.id_cuarto and m.id_destinatario='$id_usuario'";
          $getUs= mysqli_query($conect,$sql);
          
          if($getUs->num_rows>0){
                  while($row = mysqli_fetch_array($getUs)){
               ?>
               <div class="col-sm-4">           
               <div class="card mb-3 border-5 border-secondary" style="max-width: 540px;">
  <div class="row no-gutters">
    <div class="col-md-5 pt-4 pl-1">
      <img src="<?php echo $row["imagen"]?>" class="card-img img-thumbnail" alt="...">
      <form class="pb-2 pt-2 pl-2" action='cuartoController.php' method='POST' 
      onSubmit="if(!confirm('¿Realmente quiere eliminar este mensaje?')){return false;}">
        <input type='hidden' name='id_mensaje' value="<?php echo $row["id_mensaje"];?>">
        <input type='hidden' value='eliminarmensaje' name='valor'>
        <input type="submit" value="Eliminar mensaje" class="btn-sm btn-danger ">
      </form>
    </div>
    <div class="col-md-7">
      <div class="card-body">
        <h5 class="card-title">Nombre: <?php echo $row["nombre"]?></h5>
        <p class="card-text">Mensaje: <?php echo $row["mensaje"]?></p>
        <p class="card-text"><small class="text-muted">Telefono: <?php echo $row["numero"]?></small></p>
      </div>
      
  </label>
    </div>
  </div>
</div>
          </div> 
          
              <?php
                  }
              }   
          }

function deleteMensaje($id_mensaje){
  $conect= mysqli_connect("localhost","root","","hola");
  $conect->set_charset("utf8");
  $sql= "DELETE FROM `mensajes` WHERE `mensajes`.`id_mensaje` = ".$id_mensaje;
$delUs= mysqli_query($conect,$sql);
if($delUs){
echo "<script type=\"text/javascript\">alert(\"mensaje Eliminado\");</script>";
echo"<script type='text/javascript'>
window.location='../modules/mensajes.php';
</script>";
}
}


function updateCuarto($id_cuarto,$inmueble_v,$cuartos_v,$baños_v,$direccion_v,$amueblado_v,$tv_v,$internet_v,$agua_v,$estacionamiento_v,$precio_v,$servicio_v,$deposito_v,$descripcion_v,$tel){
  @session_start();
  
  $conect= mysqli_connect("localhost","root","","hola");
  $conect->set_charset("utf8");
  $sql= "UPDATE `datos` SET `tipo_de_inmueble` = '$inmueble_v', `numero_de_cuartos` = '$cuartos_v', `num_de_baños` = '$baños_v', `direccion_c` = '$direccion_v', `amueblado` = '$amueblado_v', `tv` = '$tv_v', `internet` = '$internet_v', `agua_caliente` = '$agua_v', `estacionamiento` = '$estacionamiento_v', `precio` = '$precio_v', `precio_servicio` = '$servicio_v', `deposito` = '$deposito_v', `descripcion` = '$descripcion_v', `telefono_c` = '$tel' WHERE `datos`.`id_cuarto` = $id_cuarto";
  $updateUser= mysqli_query($conect,$sql);
  if($updateUser){

  switch ($_SESSION["perfil"]) {
    case '1':
      echo "<script type=\"text/javascript\">alert(\"Usuario Actualizado\");</script>";
        echo"<script type='text/javascript'>
          window.location='../modules/miscuartos.php';
          </script>";
      break;
    case '2':
        echo "<script type=\"text/javascript\">alert(\"Usuario Actualizado\");</script>";
        echo"<script type='text/javascript'>
            window.location='../modules/editarcuartos.php';
            </script>";
        break;
  }

  }
}
?>