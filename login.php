<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/estilo_login.css">
    <link rel="shortcut icon" href="img/room.ico" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <title>Rooms Here</title>
    <script src="https://kit.fontawesome.com/e530d88f76.js" crossorigin="anonymous"></script>
</head>
<body>
    <main>
    <div class="contenedor__todo">
         <div class="caja__trasera">
             <div class="caja__trasera-login">
                <h3>¿Ya tienes cuenta?</h3>
                <p>Inicia sesión para entrar a la pagina</p>
                <button id="btn__iniciar-sesion">Iniciar Sesión</button>
            </div>
            <div class="caja__trasera-register">
                <h3>¿Aun no tienes cuenta?</h3>
                <p>Regístrate para que puedas iniciar sesion</p>
                <button id="btn__registrarse">Regístrarse</button>
            </div>
        </div>
        <div class="contenedor__login-register">
            <form action="../controllers/usuariosController.php" method="POST" class="formulario__login">
                <h2><i class="fa fa-bed" aria-hidden="true"></i> Rooms Here</h2>
                <h4 class="text-primary">Iniciar sesión</h4>
                <input type="text" placeholder="Usuario" maxlength="15" name="user">
                <input type="password" placeholder="Contraseña" maxlength="15" name="password">
                <button type="submit" class="btn ">Entrar</button>
            </form>
            <form action="userController.php" method="POST" class="formulario__register">
                <h2>Registrarse</h2>
                <input type="text" class="form-control " maxlength="20" pattern="[a-zA-Z]+" name="name_u" placeholder="Nombre(s)" required>
                <input type="text" class="form-control" maxlength="20" pattern="[a-zA-Z]+"  name="ap_u" placeholder="Apellido Paterno">
                <input type="text" class="form-control "  maxlength="20" pattern="[a-zA-Z]+"  name="am_u" placeholder="Apellido Materno">
                <input type="text" class="form-control" name="direc_u" maxlength="70" placeholder="Dirección" required>
                <input type="text" class="form-control" name="telefono_u" pattern="[0-9]+" minlength="10" maxlength="10" placeholder="Telefono" required>
                <input type="text" class="form-control" name="User_u" maxlength="15" placeholder="Usuario"  required>
                <input type="password" class="form-control"  name="pass_u" placeholder="Contraseña" maxlength="15"  required>
                <input type="hidden" value="registrarusuario" name="valor">
                <button  type="submit" >Registrarse</button>
            </form>
        </div>
    </div>
    
    </main>
    <script src="jvs/script.js"></script>
</body>

</html>