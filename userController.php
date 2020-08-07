<?php

    include("userModel.php");
    $accionpredefinida="verusers";
    $accion= isset($_POST['valor'])?$_POST['valor']:$accionpredefinida;

    switch($accion){
        case 'agregarusuario':
            $name=$_POST["name_u"];
            $ap=$_POST["ap_u"];
            $am=$_POST["am_u"];
            $dir=$_POST["direc_u"];
            $tel=$_POST["telefono_u"];
            $user=$_POST["User_u"];
            $pass=$_POST["pass_u"];
            
            addUser($name,$ap,$am,$dir,$tel,$user,$pass);
             break;
        case 'registrarusuario':
                $name=$_POST["name_u"];
                $ap=$_POST["ap_u"];
                $am=$_POST["am_u"];
                $dir=$_POST["direc_u"];
                $tel=$_POST["telefono_u"];
                $user=$_POST["User_u"];
                $pass=$_POST["pass_u"];
                
                addUsuario($name,$ap,$am,$dir,$tel,$user,$pass);
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
                $dir=$_POST["direc_u"];
                $tel=$_POST["telefono_u"];
                $activo=$_POST["activo_u"];
                $perfil=$_POST["perfil_u"];
                
                updateUser($id,$name,$ap,$am,$user,$pass,$dir,$tel,$activo,$perfil);
                 break;
    }


?>