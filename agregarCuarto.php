
<?php
$opcion="agregar";
if(isset($_POST['valor'])){
  $opcion=$_POST['valor'];
  $id=$_POST['id_cuarto'];

  $conect= mysqli_connect("localhost","root","","hola");
$conect->set_charset("utf8");
$sql= "SELECT * from datos where id_cuarto=".$id;
$getUs= mysqli_query($conect,$sql);
if($getUs->num_rows>0){
  while($registro=$getUs->fetch_object()){
    $cuarto=$registro;
  break;
  }
}

}else{
  
  $conect= mysqli_connect("localhost","root","","hola");
          $conect->set_charset("utf8");
          $sql= "SELECT * FROM datos WHERE id_cuarto = (SELECT MAX(id_cuarto) FROM datos)";
          $getUs= mysqli_query($conect,$sql);
          
          if($getUs->num_rows>0){
                  while($row = mysqli_fetch_array($getUs)){
               
               
          $nombre_carpeta=$row["id_cuarto"]+1;
              
                  }
                  $nombre_carpeta="id_cuarto".$nombre_carpeta;
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
?>
<body>
    <div class="  container pt-5">
        <div class="row">
             <div class="col-sm-8 offset-sm-1">
             
             <?php if($opcion=='editarcuarto'){
               
               ?>
  <div class="card_editar card" >
  <div class="card-body">
    <h5 class="card-title">Editar Usuario</h5>
    <form action="cuartoController.php" method="POST" enctype="multipart/form-data">
    <div class="form-row">
       <div class="form-group col-md-4">
        <label for="inputState">Tipo de inmueble</label>
        <select name="inmueble" class="form-control">
         <option selected><?php echo $cuarto->tipo_de_inmueble;?></option>
          <option>Casa</option>
          <option>Cuarto</option>
		    <option>Departamento</option>
         </select>
      </div>
      <div class="form-group col-md-4">
        <label for="inputState">Numero de cuartos</label>
        <select name="num_cuartos" class="form-control">
         <option selected><?php echo $cuarto->numero_de_cuartos;?></option>
         <option >1</option>
		      <option>2</option>
		      <option>3</option>
		      <option>4</option>
	    	  <option>5</option>
		      <option>6</option>
	    	  <option>7</option>
	    	  <option>8</option>
	    	  <option>9</option>
	    	  <option>9+</option>
        </select>
      </div>
      <div class="form-group col-md-4">
        <label for="inputState">Numero de baños</label>
        <select name="num_baños" class="form-control">
        <option selected><?php echo $cuarto->num_de_baños;?></option>
         <option >1</option>
		      <option>2</option>
		      <option>3</option>
		      <option>4</option>
	    	  <option>5</option>
		      <option>6</option>
	    	  <option>7</option>
	    	  <option>8</option>
	    	  <option>9</option>
	    	  <option>9+</option>
        </select>
      </div>
    </div>
    
    
  <div class="form-row">  
    <div class="form-group col-md-8">
      <label for="inputEmail4">Direccion</label>
      <input type="text" class="form-control" value="<?php echo $cuarto->direccion_c;?>" name="direccion" placeholder="Ejemplo: Benito Juarez #3 San Pablo Huixtepec">
    </div>
    <div class="form-group col-md-4">
        <label for="inputState">Amueblado</label>
        <select name="amueblado" class="form-control">
         <option selected><?php echo $cuarto->amueblado;?></option>
         <option >Amueblado</option>
          <option>Semiamueblado</option>
		      <option>No amueblado</option>
        </select>
      </div>
  </div>
    <h5>Servicios</h5>
    <hr>
      <!--between ,aroun, center-->
    <!--stretch, start, end, center/// flex-fill-->
    <div class="form-row">
    <div class="form-group col-md-3">
        <label for="inputState">TV</label>
        <select name="tv" class="form-control">
         <option selected><?php echo $cuarto->tv;?></option>
         <option >si</option>
          <option>no</option>
        </select>
      </div>
    <div class="form-group col-md-3">
        <label for="inputState">Internet</label>
        <select name="internet" class="form-control">
         <option selected><?php echo $cuarto->internet;?></option>
         <option >si</option>
          <option>no</option>
        </select>
      </div>
 
       
<div class="form-group col-md-3">
        <label for="inputState">Agua caliente</label>
        <select name="agua_caliente" class="form-control">
         <option selected><?php echo $cuarto->agua_caliente;?></option>
         <option >si</option>
          <option>no</option>
        </select>
      </div>


  <div class="form-group col-md-3">
        <label for="inputState">Estacionamiento</label>
        <select name="estacionamiento" class="form-control">
         <option selected><?php echo $cuarto->estacionamiento;?></option>
         <option >si</option>
          <option>no</option>
        </select>
      </div>
      </div>

    </section>
    <hr>
  <div class="form-row">
    <div class="form-group col-md-4">
      <label >Precio(MX$)</label>
      <input type="text" class="form-control" name="precio" value="<?php echo $cuarto->precio;?>">
    </div>
    <div class="form-group col-md-4">
        <label for="inputState">Precio de servicios.</label>
        <input type="text" class="form-control" name="servicio_precio" value="<?php echo $cuarto->precio_servicio;?>">
      </div>
      <div class="form-group col-md-4">
      <label >Deposito(MX$)</label>
      <input type="text" class="form-control" name="deposito" value="<?php echo $cuarto->deposito;?> ">
    </div>
    </div>
 
  
  
  <div class="form-group col-md-12">
    <label for="Descripcion">Descripcíon </label>
    <textarea class="form-control"  name="descripcion" ><?php echo $cuarto->descripcion;?></textarea>
  </div>
  <div class="form-group col-md-4">
  <label >Telefono</label>
  <input type="text" class="form-control" name="tel" value="<?php echo $cuarto->telefono_c;?>">
  </div>
  <form>
 <!-- <div class="form-group">
    <label for="exampleFormControlFile1">Imagen del cuarto</label>
    <input type="file" class="form-control-file" name="imagen">
  </div>
-->
  <hr>
  
  <button type="submit" class="btn btn-primary">Actualizar</button>
  </div>
  <input type="hidden" value="editarcuarto" name="valor">
  <input type="hidden" value="<?php echo $id;?>" name="id_c">
</div>

<?php }else{?>
  <div class="c_agregar card" >
  <div class="card-body">
    <h5 class="card-title">Registrar Cuarto </h5>
    <hr>
    <form   action="cuartoController.php" method="POST" enctype="multipart/form-data">
    <div class="form-row">
       <div class="form-group col-md-4">
        <label for="inputState">Tipo de inmueble</label>
        <select name="inmueble" class="form-control">
         <option selected>Cuarto</option>
          <option>Casa</option>
          <option>Cuarto</option>
		    <option>Departamento</option>
         </select>
      </div>
      <div class="form-group col-md-4">
        <label for="inputState">Numero de cuartos</label>
        <select name="num_cuartos" class="form-control">
         <option selected>1</option>
		      <option>2</option>
		      <option>3</option>
		      <option>4</option>
	    	  <option>5</option>
		      <option>6</option>
	    	  <option>7</option>
	    	  <option>8</option>
	    	  <option>9</option>
        </select>
      </div>
      <div class="form-group col-md-4">
        <label for="inputState">Numero de baños</label>
        <select name="num_baños" class="form-control">
         <option selected>1</option>
		      <option>2</option>
		      <option>3</option>
		      <option>4</option>
	    	  <option>5</option>
		      <option>6</option>
	    	  <option>7</option>
	    	  <option>8</option>
	    	  <option>9</option>
        </select>
      </div>
    </div>
    
    
  <div class="form-row">  
    <div class="form-group col-md-8">
      <label for="inputEmail4">Direccion</label>
      <input type="text" class="form-control" name="direccion" placeholder="Ejemplo: Benito Juarez #3 San Pablo Huixtepec">
    </div>
    <div class="form-group col-md-4">
        <label for="inputState">Amueblado</label>
        <select name="amueblado" class="form-control">
         <option selected>Amueblado</option>
          <option>Semiamueblado</option>
		      <option>No amueblado</option>
        </select>
      </div>
  </div>
    <h5>Servicios</h5>
    <hr>
      <!--between ,aroun, center-->
    <!--stretch, start, end, center/// flex-fill-->
    <div class="form-row">
    <div class="form-group col-md-3">
        <label for="inputState">TV</label>
        <select name="tv" class="form-control">
         <option selected>si</option>
          <option>no</option>
        </select>
      </div>
    <div class="form-group col-md-3">
        <label for="inputState">Internet</label>
        <select name="internet" class="form-control">
         <option selected>si</option>
          <option>no</option>
        </select>
      </div>
 
       
<div class="form-group col-md-3">
        <label for="inputState">Agua caliente</label>
        <select name="agua_caliente" class="form-control">
         <option selected>si</option>
          <option>no</option>
        </select>
      </div>


  <div class="form-group col-md-3">
        <label for="inputState">Estacionamiento</label>
        <select name="estacionamiento" class="form-control">
         <option selected>si</option>
          <option>no</option>
        </select>
      </div>
      </div>

    </section>
    <hr>
  <div class="form-row">
    <div class="form-group col-md-4">
      <label >Precio(MX$)</label>
      <input type="text" class="form-control" name="precio" maxlength="10" pattern="[0-9]+" placeholder="(MX$)Por mes "required >
    </div>
    <div class="form-group col-md-4">
        <label for="inputState">Precio de servicios.</label>
        <input type="text" class="form-control" maxlength="10" pattern="[0-9]+" name="servicio_precio" placeholder="(MX$)Por mes "required >
      </div>
      <div class="form-group col-md-4">
      <label >Deposito(MX$)</label>
      <input type="text" class="form-control" maxlength="10" pattern="[0-9]+" name="deposito" placeholder="(MX$)Deposito por daños"required >
    </div>
  </div>
  
  
  <div class="form-group col-md-12">
    <label for="Descripcion">Descripcíon </label>
    <textarea class="form-control" id="exampleFormControlTextarea1" maxlength="250" name="descripcion" rows="3" required placeholder="Longitud maxima 150"></textarea>
  </div>
  <div class="form-group col-md-4">
  <label >Telefono</label>
  <input type="text" class="form-control" name="tel" maxlength="10" pattern="[0-9]+" placeholder="Telefono de contacto" required >
  </div>
 <div class="row">
  <div class="form-group col-md-4">
    <label for="exampleFormControlFile1">Imagen principal</label>
    <input type="file" name="file"  required>
  </div>
  <div class="form-group col-md-4 offset-1">
    <label for="exampleFormControlFile1 " required>Imagen 2</label>
    <input type="file" name="file2">
  </div>
  </div>
  <div class="row">
  <div class="form-group col-md-4 ">
    <label for="exampleFormControlFile1" required>Imagen 3</label>
    <input type="file" name="file3">
  </div>
  <div class="form-group col-md-4  offset-1">
    <label for="exampleFormControlFile1" required>Imagen 4</label>
    <input type="file" name="file4">
  </div>
  </div>
  <br>
  <hr>
  <div class="form-group text-center">
  <input type="hidden" value="<?php echo $nombre_carpeta; ?>" name="carpeta">
  <button type="submit" class="btn btn-primary ">Agregar</button>
  </div>
  <input type="hidden" value="agregarcuarto" name="valor">
</div>
</form>
<?php } ?>
             </div>
         </div>
         </div>
         </div>
     

</body>
<?php require("footer.php");?>
</html>