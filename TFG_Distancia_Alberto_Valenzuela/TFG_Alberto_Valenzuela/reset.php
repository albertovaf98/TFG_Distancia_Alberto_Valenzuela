<?php 
    $sname= "localhost";

    $unmae= "root";
    
    $password = "";
    
    $db_name = "tfg";
    
    $conn = mysqli_connect($sname, $unmae, $password, $db_name);
    
    if (!$conn) {
    
       die("Error no hay conexion: ".mysqli_connect_error());
    
    }
    $npass2 = $_POST ["npass2"];
    $npass1= $_POST ["npass1"];
    $ndni= $_POST ["nusuario"];
    $pass = $_POST["pass"];
    $npass2=md5($npass2);

    $newpass = mysqli_query($conn,"SELECT * FROM usuarios WHERE dni  = '".$ndni."'and contrasena = '".$pass."'");
    $log1 =mysqli_num_rows($newpass);
    
        if($log1 == 1){
            if($npass1 == $npass2){
                mysqli_query($conn, "UPDATE usuarios SET contrasena ='$npass2' where dni='$ndni'");
                $quey = "SELECT * FROM usuarios WHERE dni='$ndni'";
                $val = mysqli_query($conn,$quey);
                $log =mysqli_fetch_array($val);
                if($log ['cat'] == 1){
                    header("location:administrador.html");
                }
                elseif($log ['cat'] == 2){
                    header("location: medico.html");
                }elseif($log ['cat'] == 3){ 
                        header("Location: enfermeria.html");
                }elseif($log ['cat'] == 4){
                    header("location: administrativo.html");
                }} 
                
         
        }else if ($log1==0){
            header("Location: reset.html");
        }

    
?>