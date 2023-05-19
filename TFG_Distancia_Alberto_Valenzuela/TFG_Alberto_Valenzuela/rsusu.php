<?php 
    $sname= "localhost";

    $unmae= "root";
    
    $password = "";
    
    $db_name = "tfg";
    
    $conn = mysqli_connect($sname, $unmae, $password, $db_name);
    
    if (!$conn) {
    
       die("Error no hay conexion: ".mysqli_connect_error());
    
    }
    $dni = $_POST["usuario"];
    $npass = $_POST["newpass"];
    $npass = md5($npass);
    $res = mysqli_query($conn,"SELECT * FROM usuarios WHERE dni  = '$dni'");
    $log = mysqli_num_rows($res);

    if($log ==1){         
       $n=mysqli_query($conn, "UPDATE usuarios SET contrasena ='$npass' where dni='$dni'");
       header("location:administrador.html");
    }else if($log ==0){
        header("location:rusuaios.html");
    }

?>