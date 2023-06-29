
<?php
    @session_start();
    include_once '../../lib/config.php';
    include_once '../../lib/functions.php';
    include_once '../../conexion/conectar.php';
    if(empty($_POST["nom"])){
        $errors[]="Ingrese el Nombre";
    }elseif(empty($_POST["app"])){
        $errors[]="Ingrese su Apellido Paterno";
    }elseif(empty($_POST["apm"])){
        $errors[]="Ingrese su Apellido Materno";
    }elseif(empty($_POST["tdoc"])){
        $errors[]="Seleccione Tipo de Documento";
    }elseif(empty($_POST["doc"])){
        $errors[]="Ingrese el Nro. de Documento";
    }elseif(empty($_POST["ema"])){
        $errors[]="Ingrese su correo electronico";
    }elseif(empty($_POST["cel"])){
        $errors[]="Ingrese su nro de celular";
    }elseif(empty($_POST["sex"])){
        $errors[]="Marca el  genero";
    }elseif(empty($_POST["pass"])){
        $errors[]="Ingrese la contraseña";
    }elseif(       
        !empty($_POST["nom"]) &&
        !empty($_POST["app"]) &&
        !empty($_POST["apm"]) &&
        !empty($_POST["tdoc"]) &&
        !empty($_POST["doc"]) && 
        !empty($_POST["ema"]) &&
        !empty($_POST["cel"]) &&
        !empty($_POST["sex"]) &&
        !empty($_POST["pass"])
    ){
        $id = $_SESSION['codUsu'];
        $nom = $_POST["nom"];
        $app = $_POST["app"];
        $apm = $_POST["apm"];
        $tdoc = $_POST["tdoc"];
        $doc = $_POST["doc"];
        $ema = $_POST["ema"];
        $cel = $_POST["cel"];
        $sex = $_POST["sex"];
        $pass= $_POST["pass"];

        $pass1 = encrypt($doc,$llave);//Encriptar la contraseña actual
        $sql = "SELECT * FROM usuario WHERE  emaUsu ='$ema'";
        $consulta= $conector->query($sql);
        $uno_verificar=$consulta->num_rows;
            if($uno_verificar>0){
                   $errors[]="Correo  ya esta registrado, intenta con otro diferente";    
            }else{
                $sql = "SELECT * FROM usuario WHERE  emaUsu ='$ema' OR docUsu='$doc'";
                $consulta2= $conector->query($sql);
                $verificarDoc=$consulta2->num_rows;
                if($verificarDoc>0){
                   $errors[]="DNI  ya esta registrado, intenta con otro diferente";    
                }else{
                    $sql = "INSERT INTO usuario (nomUsu,appUsu,apmUsu,tdoUsu,docUsu,emaUsu,celUsu,sexUsu,pasUsu) VALUES
                    ('".$nom."','".$app."','".$apm."','".$tdoc."','".$doc."','".$ema."','".$cel."','".$sex."','".$pass1."')";
                    $insert = $conector->query($sql);
                    if($insert===TRUE){
                        $messages[]= "Ingreso los datos correctamente";
                    
                    }else{
                        $errors[]="No se actualizo la contraseña"; 
                    }
                }
            }
            }else{
               $errors[]="Error Desconocido";
    }

    if(isset($errors)){
        echo '<div class="alert alert-danger" role="alert">';
        echo '<b>Error</b>! ';
              foreach($errors as $error){
                    echo $error;
              } 
        echo '</div>';
    }

    if(isset($messages)){
        echo '<div class="alert alert-success" role="alert">';
        echo '<b>Bien</b>! ';
              foreach($messages as $sms){
                    echo $sms;
              } 
        echo '</div>';
    }
?>