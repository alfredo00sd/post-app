<?php
//CREATE TABLE `tarea6`.`articulos` ( `ArtCode` INT(100) NOT NULL AUTO_INCREMENT , `nombre` VARCHAR(25) NOT NULL , `precio` DECIMAL(13,12) NOT NULL , `cantidad` INT(100) NOT NULL , `subtotal` DECIMAL(13,12) NOT NULL , PRIMARY KEY (`ArtCode`(100))) ENGINE = InnoDB CHARSET=utf16 COLLATE utf16_spanish2_ci;
$mensaje="";

if($_POST)
{
$instalar=Array("servidor"=>$_POST['servidor'],"user"=>$_POST['usuario'],"clave"=>"","bd"=>$_POST['bd']);
//var_dump($instalar);    
//print_r ($instalar);
$my_config="
<?php
//BD Credentials
define('ASG_HOSTNAME','localhost');
define('ASG_USERNAME','{$instalar['user']}');
define('ASG_PASSWORD','{$instalar['clave']}');
define('ASG_DATABASE','{$instalar['bd']}');

//base url de la webapp
define('ASG_BASE_URL','http://{$instalar['servidor']}/tarea9');
";

file_put_contents("my_config.php",$my_config);

    $link=mysqli_connect("localhost",$instalar['user'],$instalar['clave']);
    //var_dump($link);
    if($link==true){
    
    $sql="CREATE DATABASE IF NOT EXISTS {$instalar['bd']}";
    mysqli_query($link,$sql);

    mysqli_query($link,"USE {$instalar['bd']}");

    $sql="DROP TABLE IF EXISTS `users`;";
    mysqli_query($link,$sql);  
  
    $sql="CREATE TABLE `users` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
        `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
        `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
        `gender` enum('Masculino','Femenino') COLLATE utf8_unicode_ci NOT NULL,
        `phone` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
        `created` datetime NOT NULL,
        `modified` datetime NOT NULL,
        `status` enum('1','0') COLLATE utf8_unicode_ci NOT NULL,
        PRIMARY KEY (`id`)
       ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;";
    mysqli_query($link,$sql);  
  
    $sql="DROP TABLE IF EXISTS `articulos`;";
    mysqli_query($link,$sql);  
  
$sql="CREATE TABLE `articulos` (
       `id` INT(80) NOT NULL AUTO_INCREMENT ,
       `titulo` VARCHAR(30) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL ,
        `resumen` TEXT NOT NULL , 
        `descripcion` TEXT NOT NULL , 
        `fecha` DATE NOT NULL , 
        `user` int(50) DEFAULT NULL,
 
        PRIMARY KEY (`id`)) ENGINE = InnoDB;
";
    mysqli_query($link,$sql);

    echo "<script>
            alert('Exito sistema configurado correctamente!!:D');
            window.location='http://{$instalar['servidor']}/tarea9/';
          </script>";
}
}
$mensaje="Hola bienvenid@ a su Instalador de Base de Datos magico, donde podras configurar la BD y continuar trabajando con la aplicacion
PD:Ingresa correctamente los datos o tendras muchos errores :)   

Es importante para la URL de la app ojo si usas el apache en el puerto por default solo pon localhost de lo contrario localhos:elpuerto";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Instalador</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/landing-page.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
   include libraries(jQuery, bootstrap) -->


</head>
<body class="modal-body" style="background-image:url('img/banner-bg.jpg');">
 <div class="container-fluid">
    <div class="jumbotron">
    <div class="row">
    
    <div class="text-center">
    <h3>Digite el servidor, usuario, clave y base de datos para continuar</h3>
    <form action="" method="post">
    <div class="col col-sm-6">
 
    <div class="form-group input-group">
    <label for="servidor" class="input-group-addon">Servidor</label>
    <input value="" type="text" placeholder="ej: localhost:80" name="servidor" class="form-control" required> 
    </div>
    
    <div class="form-group input-group">
    <label for="usuario" class="input-group-addon">Usuario</label>
    <input value="" type="text" name="usuario" placeholder="ej: root" class="form-control" required> 
    </div>
    
    <div class="form-group input-group">
    <label for="clave" class="input-group-addon">Contraseña</label>
    <input value="" type="password" name="clave" placeholder="ej: mysql" class="form-control" required> 
    </div>
    

    <div class="form-group input-group">
    <label for="bd" class="input-group-addon">Base de Datos</label>
    <input value="" type="text" name="bd" placeholder="ej: facil_BD" class="form-control" required> 
    </div>
    <button type="submit" class="btn btn-success btn-xs btn-block">Conectar</button>
    </div>
    <div class="col col-sm-6"><textarea disabled name="mensaje" class="form-control" cols="30" rows="10"><?php echo $mensaje;?></textarea></div>
    </form>
    </div>
    </div>
    </div>
</body>
</html>
