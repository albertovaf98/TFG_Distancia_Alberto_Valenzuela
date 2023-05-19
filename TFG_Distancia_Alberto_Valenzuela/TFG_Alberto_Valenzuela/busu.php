<?php
                $sname= "localhost";

                $unmae= "root";
                
                $password = "";
                
                $db_name = "tfg";                
                
                $conn = mysqli_connect($sname, $unmae, $password, $db_name);

                $dni = $_POST["usuario"];
                $res = mysqli_query($conn,"SELECT * FROM usuarios WHERE dni  = '$dni'");
                $log = mysqli_num_rows($res);
                if($log ==1){         
                    $borrar=mysqli_query($conn, "DELETE FROM usuarios where dni ='$dni'");
                    header("location:administrador.html");
                 }else if($log ==0){
                     header("location:busuarios.html");
                 }


            ?>