<!DOCTYPE html>
<html>
  <head>
        <meta charset="utf-8">
        
        <title> Resetear contraseña </title> 
        <link rel="icon" type="image/jpg" href="imagenes/favicon.jpg"/>   
        
        <meta name="viewport" content="width=device-width, initial-scale=1.0">       
        
        <link href="https://fonts.googleapis.com/css?family=Nunito&display=swap" rel="stylesheet"> 
        
        <link rel="stylesheet" href="css/estilos.css">
        
        <style type="text/css">
            #contenedor {
                display: flex;
                align-items: center;
                justify-content: center;
                
                margin: 0;
                padding: 0;
                min-width: 100vw;
                min-height: 100vh;
                width: 100%;
                height: 100%;
                
                background-image: url(imagenes/fondoweb.jpg);
                background-position: center;
                background-size: cover;
                opacity: 0.70;
                filter: alpha(opacity=50)
            }

            #login {
                width: 100%;
                max-width: 320px;
                min-width: 320px;
                padding: 30px 30px 50px 30px;
                background-color: #000000;
                
                -webkit-box-shadow: 0px 0px 5px 5px rgba(0,0,0,0.15);
                -moz-box-shadow: 0px 0px 5px 5px rgba(0,0,0,0.15);
                box-shadow: 0px 0px 50px 5px rgba(0,0,0,0.15);
                
                border-radius: 3px 3px 3px 3px;
                -moz-border-radius: 3px 3px 3px 3px;
                -webkit-border-radius: 3px 3px 3px 3px;
                
                box-sizing: border-box;
                
                opacity: 1;
                filter: alpha(opacity=1);
            }

            #login label {
                display: block;
                font-family: 'Overpass', sans-serif;
                font-size: 120%;
                color:#3c4245;
                
                margin-top: 15px;
            }

            #login input {
                font-family: 'Overpass', sans-serif;
                font-size: 110%;
                color: #7f94a0;
                
                display: block;
                width: 100%;
                height: 50px;
                
                margin-bottom: 10px;
                padding: 5px 5px 5px 10px;
                
                box-sizing: border-box;
                
                border: none;
                border-radius: 3px 3px 3px 3px;
                -moz-border-radius: 3px 3px 3px 3px;
                -webkit-border-radius: 3px 3px 3px 3px;
            }

            #login input::placeholder {
                font-family: 'Overpass', sans-serif;
                color: #000000;
            }

            #login button {
                font-family: 'Overpass', sans-serif;
                font-size: 110%;
                color:#1b262c;
                width: 100%;
                height: 40px;
                border: none;
                
                border-radius: 3px 3px 3px 3px;
                -moz-border-radius: 3px 3px 3px 3px;
                -webkit-border-radius: 3px 3px 3px 3px;
                
                background-color: #dfcdc3;
                
                margin-top: 10px;
            }

            #login button:hover {
                background-color: #3c4245;
                color:#dfcdc3;
            }

            #derecho {
            
                text-align: center;
                width: 100%;
                
            
                
                padding:20px 20px 20px 50px;
                box-sizing: border-box;
            }

            .titulo {
                font-size: 300%;
                color: black;
            }

            .logo-empresa img {
                width: 60%;
            }


            .pie-form {
                font-size: 90%;
                text-align: center;    
                margin-top: 15px;
            }

            .pie-form a {
                display: block;
                text-decoration: none;
                color: #dfcdc3;
                margin-bottom: 3px;
            }

            .pie-form a:hover {
                color: #719192;
            }
            #login select {
                font-family: 'Overpass', sans-serif;
                font-size: 110%;
                color: #7f94a0;
                
                display: block;
                width: 100%;
                height: 50px;
                
                margin-bottom: 10px;
                padding: 5px 5px 5px 10px;
                
                box-sizing: border-box;
                
                border: none;
                border-radius: 3px 3px 3px 3px;
                -moz-border-radius: 3px 3px 3px 3px;
                -webkit-border-radius: 3px 3px 3px 3px;
            }

            #login select::placeholder {
                font-family: 'Overpass', sans-serif;
                color: #000000;
            }

            #contenedor {
                display: flex;
                flex-direction: row;
                height: 100vh;
                width: 100vw;
                overflow: hidden;
            }
            .error{
            text-align: center;
            
            color: red;
            font-weight: bold;
            }
            .bien{
            text-align: center;
            
            color: green;
            font-weight: bold;
            }
            
        </style>
        
        <script type="text/javascript">
        
        </script>
  </head>
  <body>      
    <div id="contenedor">        
        <div id="log">
            <div id="derecho">
                <div class="titulo">
                   Borrar Usuario
                </div>

            <div id="login">
                    <form method="post" id="loginform">
                        <input id="usuario" type="text" name="usuario" placeholder="Usuario" maxlength="9" required>
                                               
                        <button  type="submit" title="Ingresar" name="Ingresar" href="administrador.html">Borrar</button>
                    </form>
                    <br>
                        <a href="administrador.html" id="reset">Volver a pagina principal</a>
                    <br>
        
                    <?php 
                        $sname= "localhost";

                        $unmae= "root";
                        
                        $password = "";
                        
                        $db_name = "tfg";
                        
                        $conn = mysqli_connect($sname, $unmae, $password, $db_name);
                        
                        if (!$conn) {
                        
                        die("Error no hay conexion: ".mysqli_connect_error());
                        
                        }
                        if (isset($_POST['Ingresar'])) {
                            $dni = $_POST["usuario"];
                            $res = mysqli_query($conn,"SELECT * FROM usuarios WHERE dni  = '$dni'");
                            $log = mysqli_num_rows($res);
                            if($log ==1){         
                                $borrar=mysqli_query($conn, "DELETE FROM usuarios where dni ='$dni'");
                                echo "<br>";
                                echo '<div class="bien">Usuario eliminado correctamente</div>';
                            }else if($log ==0){
                                echo "<br>";
                                echo '<div class="error">El usuario no existe</div>';
                            }
                    }
                    ?>
            </div>
        </div>
    </div>                   
  </body>
</html>
