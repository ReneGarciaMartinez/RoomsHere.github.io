<?php
@session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <title>Cuartos</title>
    <link rel="stylesheet" href="css/estilo.css">
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
    <div class="  container pt-5">
        <div class="row">
            <div class="col-lg-10">
                <h1> Cuartos</h1> 
            </div>
            <div class="col-lg-22  ">
            <?php
            if($perfil==2){
                ?>
                    <a href="agregarCuarto.php" type='button' class='btn btn-primary'>Agregar Cuarto</a>
                <?php
            }else{
                if($perfil==1){
                    ?>
                <a href="agregarCuarto.php" type='button' class='btn btn-primary'>Agregar Cuarto</a>
                <?php    
                }else{
                    
                ?>
                <button id="btn-abrir-popup" class=" btn btn-primary btn-abrir-popup ">Registrar cuarto</button>

                <?php
                }
            }
            ?>
              
             </div>
             </div>
             <div class="row">
                 
            
<?php
                 geteditarCuartos();
                ?>

        </div>
    </div>
    <div class="overlay" id="overlay">
			<div class="popup" id="popup">
				<a href="#" id="btn-cerrar-popup" class=" btn-cerrar-popup"><i class="fas fa-times"></i></a>
				<h3>¿Te intera anunciar tu inmueble?</h3>
				<h4>Registrate para mayor informacion.</h4>
				<form action='cuartoController.php' method='POST'>
					<div class="contenedor-inputs">
						<input type="text" placeholder="Nombre" name="nombre">
						<input type="text" placeholder="Telefono" name="telefono">
                        <input type="e-mail" placeholder="Correo" name="correo">
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
        <script src="jvs/popup.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
<?php require("footer.php");?>
</html>