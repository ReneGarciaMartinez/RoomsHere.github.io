<?php
@session_start();
$id_usuario=$_SESSION["id_user"];

    include("cuartosModel.php");
    $accionpredefinida="verusers";
    $accion= isset($_POST['valor'])?$_POST['valor']:$accionpredefinida;

    switch($accion){
        case 'agregarcuarto':
            $id_usuario=$_SESSION["id_user"];
            $inmueble_v=$_POST["inmueble"];
            $cuartos_v=$_POST["num_cuartos"];
            $baños_v=$_POST["num_baños"];
            $direccion_v=$_POST["direccion"];
            $amueblado_v=$_POST["amueblado"];

            $tv_v=$_POST["tv"];
            $internet_v=$_POST["internet"];
            $agua_v=$_POST["agua_caliente"];
            $estacionamiento_v=$_POST["estacionamiento"];

            $precio_v=$_POST["precio"];
            $servicio_v=$_POST["servicio_precio"];
            $deposito_v=$_POST["deposito"];
            $descripcion_v=$_POST["descripcion"];
            $tel=$_POST["tel"];
            $carpeta=htmlspecialchars($_POST['carpeta']);
            $ruta="uploads/";
            $directorio = $ruta.$carpeta;
            if (!is_dir($directorio)) {
                $crear=mkdir($directorio,0777,true);
            }
            $directorio = $directorio."/";
    $archivo = $directorio . basename($_FILES["file"]["name"]);
    $archivo2 = $directorio . basename($_FILES["file2"]["name"]);
    $archivo3 = $directorio . basename($_FILES["file3"]["name"]);
    $archivo4 = $directorio . basename($_FILES["file4"]["name"]);

    $tipoArchivo = strtolower(pathinfo($archivo, PATHINFO_EXTENSION));
   

    
    // valida que es imagen
    $checarSiImagen = getimagesize($_FILES["file"]["tmp_name"]);

    //var_dump($size);

    if($checarSiImagen != false){

        //validando tamaño del archivo
        $size = $_FILES["file"]["size"];

        if($size > 50000000000000000 ){
            echo "El archivo tiene que ser menor a 500kb";
        }else{

            //validar tipo de imagen
            if($tipoArchivo == "jpg" || $tipoArchivo == "jpeg"){
                // se validó el archivo correctamente
                if(move_uploaded_file($_FILES["file"]["tmp_name"], $archivo )){
                    if(move_uploaded_file($_FILES["file2"]["tmp_name"], $archivo2 )){
                        if(move_uploaded_file($_FILES["file3"]["tmp_name"], $archivo3 )){
                            if(move_uploaded_file($_FILES["file4"]["tmp_name"], $archivo4 )){
                                addCuarto($id_usuario,$inmueble_v,$cuartos_v,$baños_v,$direccion_v,$amueblado_v,$tv_v,$internet_v,$agua_v,$estacionamiento_v,$precio_v,$servicio_v,$deposito_v,$descripcion_v,$tel,$archivo,$archivo2,$archivo3,$archivo4);
                            }else{
                                echo "Hubo un error en la subida del archivo";
                            }
                        }else{
                            echo "Hubo un error en la subida del archivo";
                        }
                    }else{
                        echo "Hubo un error en la subida del archivo";
                    }
                }else{
                    echo "Hubo un error en la subida del archivo";
                }
            }else{
                echo "Solo se admiten archivos jpg/jpeg";
            }
        }
    }else{
        echo "El documento no es una imagen";
    }

            
            
             break;
        case 'eliminaruser':
            $id =$_POST['id_user'];
            deleteUser($id);
            break;

        case 'editaruser':
                $id =$_POST['id_user'];
                $name=$_POST["name_u"];
                $ap=$_POST["ap_u"];
                $am=$_POST["am_u"];
                $user=$_POST["User_u"];
                $pass=$_POST["pass_u"];
                
                updateUser($id,$name,$ap,$am,$user,$pass);
                 break;
         case 'agregarmensaje':
            $id =$_POST['id_usuario'];
            $nombre =$_POST['nombre'];
            $telefono =$_POST['telefono'];
            $descripcion =$_POST['descripcion'];
            $id_cuarto=$_POST['id_cuarto'];
            addMensaje($id,$nombre,$telefono,$descripcion,$id_cuarto);
            break;
        case 'eliminarmensaje':
            $id_mensaje =$_POST['id_mensaje'];
            deleteMensaje($id_mensaje);
            break;
         case 'editarcuarto':
            
                $inmueble_v=$_POST["inmueble"];
                $id_cuarto=$_POST["id_c"];
                $cuartos_v=$_POST["num_cuartos"];
                $baños_v=$_POST["num_baños"];
                $direccion_v=$_POST["direccion"];
                $amueblado_v=$_POST["amueblado"];
                $tv_v=$_POST["tv"];
                $internet_v=$_POST["internet"];
                $agua_v=$_POST["agua_caliente"];
                $estacionamiento_v=$_POST["estacionamiento"];
                $precio_v=$_POST["precio"];
                $servicio_v=$_POST["servicio_precio"];
                $deposito_v=$_POST["deposito"];
                $descripcion_v=$_POST["descripcion"];
                $tel=$_POST["tel"];
                
                
               
                
                updateCuarto($id_cuarto,$inmueble_v,$cuartos_v,$baños_v,$direccion_v,$amueblado_v,$tv_v,$internet_v,$agua_v,$estacionamiento_v,$precio_v,$servicio_v,$deposito_v,$descripcion_v,$tel);
                 break;
    }


?>