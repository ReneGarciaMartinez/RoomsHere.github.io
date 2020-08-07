<?php
@session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <title>Mis Mensajes</title>
    <script src="https://kit.fontawesome.com/e530d88f76.js" crossorigin="anonymous"></script>
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
<body >
    <div class="container pt-5 ">
        <div class="row" >
            <div class="col-lg-9">
                <h1> Mensajes</h1> 
            </div>
            
<?php
                 getmisMensajes();
                ?>

        </div>
    </div>

</body>
<?php require("footer.php");?>
</html>