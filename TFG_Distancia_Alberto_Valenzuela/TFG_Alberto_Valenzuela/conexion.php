<?php 
$dni = $_POST['usuario'];
$pass = $_POST['password'];

 session_start();
 $_SESSION['usuario'] = $dni;
  $sname= "localhost";

    $unmae= "root";
    
    $password = "";
    
    $db_name = "tfg";
    
    $conn = mysqli_connect($sname, $unmae, $password, $db_name);  
          
        
    $usu = mysqli_query($conn,"SELECT * FROM usuarios WHERE dni  = '".$dni."'and contrasena = '".$pass."'");
    $log1 =mysqli_num_rows($usu);
    
    if($log1 == 1){
        $quey = "SELECT * FROM usuarios WHERE dni='$dni' and contrasena= '$pass'";
        $val = mysqli_query($conn,$quey);
        $log =mysqli_fetch_array($val);
        if($log ['cat'] == 1){
            header("location:administrador.html");
        }
        elseif($log ['cat'] == 2){
            header("location: medico.php");
        }elseif($log ['cat'] == 3){ 
                header("Location: enfermeria.php");
        }elseif($log ['cat'] == 4){
            header("location: administrativo.php");
        } 
    }else if($log1 == 0){
        
        header("location:index.html");
    }



?>
   