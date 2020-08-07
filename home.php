<?php
@session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/e530d88f76.js" crossorigin="anonymous"></script>
    <title>Rooms Here</title>
    <link rel="stylesheet" href="css/s_home2.css">
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

require("cuartosModel.php");
?>
<body>
    
    <div class="  container pt-5">
        <div class="row">
            <div class="col-lg-12">
            <h1 class="bienvenido text-center"> Bienvenido a Rooms Here</h1> 
            <h3 class="usuario"><i class="user_icon fa fa-user" aria-hidden="true"></i> <?php echo $_SESSION["name"]." ".$_SESSION["app"]." ".$_SESSION["apm"] ?></h3>
<hr>

        </div>
<div class="col-lg-12 pb-3">
<center>
<div class="col-lg-7 ">
<div id="myCarousel" class="carousel slide " data-ride="carousel">
    <div class="carousel-inner">
      <?php
                 getCuartosVip();
                ?>
    <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
  </div>
  </center>
  </div>
 
<!-- Termina Carrusel -->
        
    </div>
<hr>
<main>

        <h1 class="title text-primary">¿Por qué utilizar rooms here?</h1>

        <div class="container-box">

            <div class="box box1">
                <img src="img/img4.svg" alt="">
                <h2>Buscar cuarto</h2>
                
                <div class="container-p">
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Dignissimos minus non voluptatibus rem harum iste vero magnam voluptate, id laboriosam?...
                    <a title="Buscar cuarto" href="cuartos.php" class=" btn btn-primary  text-white text-center">Buscar cuarto</a>

                    </p>
                </div>

                
            </div>

            <div class="box box2">
                <img src="img/img7.svg" alt="">
                <h2>Promocionar cuarto</h2>
                <div class="container-p">
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Dignissimos minus non voluptatibus rem harum iste vero magnam voluptate, id laboriosam?...
                    <?php   if($perfil==2){
                ?>
                    <a title="Promocionar Cuarto" href="agregarCuarto.php" class="btn btn-primary miboton text-white text-center"> Promocionar</a>
                <?php
            }else{
                if($perfil==1){
                    ?>
<a title="Promocionar Cuarto" href="agregarCuarto.php" class="btn btn-primary miboton text-white text-center"> Promocionar</a>                <?php    
                }else{
                    
                ?>
                <a title="Promocionar Cuarto" id="btn-abrir-popup" class=" btn btn-primary btn-abrir-popup text-white text-center">Promocionar</a>  

              

                <?php
                }
            }
            ?>
                    </p>
                </div>

               
            </div>

            <div class="box box3">
                <img src="img/img6.svg" alt="">
                <h2>¿Necesitas ayuda?</h2>
                <div class="container-p">
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit.. Dignissimos minus non voluptatibus rem harum iste vero magnam voluptate, id laboriosam?...
                    
                    <a title="Preguntas frecuentes"  class=" btn btn-primary  text-white text-center pt-1">Preguntas frecuentes</a>

                    </p>
                </div>
               
            </div>
            
        </div>

    </main>
<center>
<div class="  container pt-5">
    <div class="row">
                <div class=" bg-succes col-lg-8   p-4 offset-sm-2">
                    <div class="caja"><h4>¡Bienvenido a Rooms Here!</h4>
                        <div class="caja-texto">En esta pagina podras buscar un cuarto que este en renta en la comunidad de San Pablo Huixtepec y que se adapte a tus necesidades.</div>
                        <div class="caja-texto">Si eres dueño de un cuarto en renta lo podras ingresar a la pagina para promocionarlo.</div>
                        <div class="caja-texto">¡Empezemos!</div>
                        <div class="p-3">
                            <a title="Buscar Cuarto" href="cuartos.php" class="btn btn-lg miboton"> <i class="fa fa-search" aria-hidden="true"></i></a>
                            <?php
            if($perfil==2){
                ?>
                    <a title="Promocionar Cuarto" href="agregarCuarto.php" class="btn btn-lg miboton"> <i class="fa fa-upload" aria-hidden="true"></i></a>
                <?php
            }else{
                if($perfil==1){
                    ?>
<a title="Promocionar Cuarto" href="agregarCuarto.php" class="btn btn-lg miboton"> <i class="fa fa-upload" aria-hidden="true"></i></a>                <?php    
                }
            }
            ?>
                        
                        </div>


                    </div>

                </div>
            </div>
            </div>
            </center>
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