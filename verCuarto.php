
<?php
$opcion="agregar";
if(isset($_POST['valor'])){
  $opcion=$_POST['valor'];
  $id=$_POST['id_cuarto'];

  $conect= mysqli_connect("localhost","root","","hola");
$conect->set_charset("utf8");
$sql= "SELECT d.*, u.* from datos as d, usuario as u WHERE u.id_usuario=d.id_usuario AND d.id_cuarto=$id";
$getCuarto= mysqli_query($conect,$sql);
if($getCuarto->num_rows>0){
  while($registro=$getCuarto->fetch_object()){
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
    <link rel="stylesheet" href="estilo.css">
</head>
<?php
$perfil=$_SESSION["perfil"];
if($perfil==2){
    require("headerAdmin.php");
}else{
    if($perfil==1){
        require("headerAnunciante.php");
    }else{
        require("headerComun.php");
    }
}
require("cuartosModel.php");
?>
<body>
    <div class="  container pt-12">
        <div class="row">
        <div class="col-lg-12 pt-3 pb-3 offset-2">
                <h3>Tipo de inmueble: <?php echo $cuarto->tipo_de_inmueble; ?></h3> 
            </div>
             <div class="col-sm-6 "> 
                 <div class="col-sm-12">           
                    <!--<div class="card bg-dark text-white" style="width: 18rem; height: 11.5rem; ">
                          <img src="<?php echo $cuarto->imagen?>" class="img_card card-img-top " alt="...">
                    </div>
                    -->
                    <div class="row">
                    <?php 
                    if ($cuarto->imagen== ''){
                      $img1= 'https://img.freepik.com/vector-gratis/ilustracion-cuarto-limpieza-hombre-househusband-o-colegial-aspiradora_33099-412.jpg?size=626&ext=jpg';
                  } 
                  else{
                      $img1 = $cuarto->imagen;
                  }
                  if ($cuarto->imagen2== ''){
                    $img2= 'https://img.freepik.com/vector-gratis/ilustracion-cuarto-limpieza-hombre-househusband-o-colegial-aspiradora_33099-412.jpg?size=626&ext=jpg';
                } 
                else{
                    $img2 = $cuarto->imagen2;
                }  
                
                if ($cuarto->imagen3== ''){
                  $img3= 'https://img.freepik.com/vector-gratis/ilustracion-cuarto-limpieza-hombre-househusband-o-colegial-aspiradora_33099-412.jpg?size=626&ext=jpg';
              } 
              else{
                  $img3 = $cuarto->imagen3;
              }
              if ($cuarto->imagen4== ''){
                $img4= 'https://img.freepik.com/vector-gratis/ilustracion-cuarto-limpieza-hombre-househusband-o-colegial-aspiradora_33099-412.jpg?size=626&ext=jpg';
            } 
            else{
                $img4 = $cuarto->imagen4;
            }
                  ?>
                    
  <div class="col-3">
    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
      <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true"><img src="<?php echo $img1?>" class="img-fluid" alt="Responsive image"></a>
      <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false"><img src="<?php echo $img2?>" class="img-fluid" alt="Responsive image"></a>
      <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false"><img src="<?php echo $img3?>" class="img-fluid" alt="Responsive image"></a>
      <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false"><img src="<?php echo $img4?>" class="img-fluid" alt="Responsive image"></a>
    </div>
  </div>
  <div class="col-9">
    <div class="tab-content pt-4" id="v-pills-tabContent">
      <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab"><img src="<?php echo $img1?>" class=" card-img-top img-thumbnail" style="height: 230px;" ></div>
      <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab"><img src="<?php echo $img2?>" class=" card-img-top img-thumbnail" style="height: 230px;"></div>
      <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab"><img src="<?php echo $img3?>" class=" card-img-top img-thumbnail" style="height: 230px;"></div>
      <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab"><img src="<?php echo $img4?>" class=" card-img-top img-thumbnail" style="height: 230px;"></div>
    </div>
  </div>
</div>

<div class="col-sm-12 pt-5">           
                    
                    <div class="alert alert-light text-dark border-5 border-secondary" role="alert">
                    <h3>Datos del propietario:</h3>
                        <div class="alert alert-light text-dark  border-secondary" role="alert">
                        <h5>Nombre:</h5>
                         <p><?php echo $cuarto->nombre; ?> <?php echo $cuarto->apellido_p; ?> <?php echo $cuarto->apellido_m; ?></p> 
                         <hr>
                    <h5>Direccion:</h5>
                        <p><?php echo $cuarto->direccion; ?></p> 
                      <h5>Telefono:</h5>
                        <p><?php echo $cuarto->telefono; ?></p> 
                    
                        </div>
                       <center>
                        <button id="btn-abrir-popup" class=" btn btn-primary btn-abrir-popup ">Mensaje</button>
                        </center>
                      </div>
                        
                     </div>
</div>    
</div> 
            <div class="col-sm-6 "> 
            <div class="col-sm-12">           
                    
                    <div class="alert alert-light text-dark border-5 border-secondary" role="alert">
                    <h3>Datos del inmueble:</h3>
                        <p><?php echo $cuarto->descripcion ?></p>
                        <div class="alert alert-light text-dark  border-secondary" role="alert">
                    <h5>Direccion:</h5>
                        <p><?php echo $cuarto->direccion_c; ?></p> 
                    <hr>
                    <h5>Telefono:</h5>
                         <p><?php echo $cuarto->telefono_c; ?></p> 
                         <hr> 
                    <h5>Numero de cuartos:</h5>
                         <p><?php echo $cuarto->numero_de_cuartos; ?></p> 
                         <hr> 
                    <h5>Numero de baños:</h5>
                         <p><?php echo $cuarto->num_de_baños; ?></p> 
                   
                        </div>
                        <h3>Servicios del inmueble:</h3>
                        <div class="alert alert-light text-dark  border-secondary" role="alert">
                          <h5>TV:</h5>
                            <p><?php echo $cuarto->tv; ?></p> 
                            <hr> 
                            <h5>Internet:</h5>
                            <p><?php echo $cuarto->internet; ?></p>
                            <hr> 
                            <h5>Agua caliente:</h5>
                            <p><?php echo $cuarto->agua_caliente; ?></p>
                            <hr> 
                            <h5>Estacionamiento:</h5>
                            <p><?php echo $cuarto->estacionamiento; ?></p>
                        </div>
                        <h3>Precio:</h3>
                        <div class="alert alert-light text-dark  border-secondary" role="alert">
                          <h5>Precio:</h5>
                            <p><?php echo $cuarto->precio; ?></p> 
                            <hr> 
                            <h5>Precio por los servicios:</h5>
                            <p><?php echo $cuarto->precio_servicio; ?></p>
                            <hr> 
                            <h5>Deposito inicial:</h5>
                            <p><?php echo $cuarto->deposito; ?></p>
                            <hr> 
                            
                        </div>
                       
                      </div>
                        
                     </div>
                     
                 </div> 
                              
                    
		</article>
		<div class="overlay" id="overlay">
			<div class="popup" id="popup">
				<a href="#" id="btn-cerrar-popup" class=" btn-cerrar-popup"><i class="fas fa-times"></i></a>
				<h3>¿Te intera el cuarto?</h3>
				<h4>Dejale un mensaje al propietario.</h4>
				<form action='cuartoController.php' method='POST'>
					<div class="contenedor-inputs">
						<input type="text" placeholder="Tu nombre" name="nombre">
						<input type="text" placeholder="Tu telefono" name="telefono">
            <textarea class="form-control" id="exampleFormControlTextarea1" name="descripcion" rows="3"></textarea>
            <input type='hidden' value="<?php echo $cuarto->id_cuarto; ?>" name='id_cuarto'>
            <input type='hidden' value="<?php echo $cuarto->id_usuario; ?>" name='id_usuario'>
            <input type="hidden" value="agregarmensaje" name="valor">
          </div>
          
          <div>
            <br>
          </div>
					<input type="submit" class="btn-submit" value="Enviar">
				</form>
			    </div>
		     </div>
                
        </div> 
    </div> 


	<script src="jvs/popup.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

</body>

</html>