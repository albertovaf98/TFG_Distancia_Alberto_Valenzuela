<?php 
    $sname= "localhost";

    $unmae= "root";
    
    $password = "";
    
    $db_name = "tfg";
    
    $conn = mysqli_connect($sname, $unmae, $password, $db_name);
    
    if (!$conn) {
    
       die("Error no hay conexion: ".mysqli_connect_error());
    
    }
    $dni = $_POST["dni"];
    $npass = $_POST["newpass"];
    $cat =$_POST["categoria"];
    $nom = $_POST["nombre"];
    $apl = $_POST["apellidos"];
    $npass = md5($napss);
      
       
    mysqli_query($conn,"INSERT INTO usuarios (dni, nombre, apelldios, contrasena, cat) values ('$dni', '$nom', '$apl', '$npass', '$cat')");
    header("location:administrador.html");

?>