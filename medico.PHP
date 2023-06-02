<!DOCTYPE html>
<html>
  <head>
        <meta charset="utf-8">
        
        <title> Medico </title> 
        <link rel="icon" type="image/jpg" href="imagenes/favicon.jpg"/>   
        
        <meta name="viewport" content="width=device-width, initial-scale=1.0">       
        
        <link href="https://fonts.googleapis.com/css?family=Nunito&display=swap" rel="stylesheet"> 
        
        <link rel="stylesheet" href="css/estilos.css">
        
        <style type="text/css">
            body{
                font-family: 'Overpass', sans-serif;
                font-weight: normal;
                font-size: 100%;
                color: #1b262c;
                display: flex;
                align-items: center;
                justify-content: center;
                
                margin: 0;
                padding: 0;
                min-width: 100vw;
                min-height: 100vh;
                width: 100%;
                height: 100%;
                
                background-image:url(imagenes/fondoweb.jpg);
                background-position: center;
                background-size: cover;
                opacity: 0.9;
                filter: alpha(opacity=50)
            }
            
            .tabla{
                margin: 0 auto;
            }
            table {
                border-collapse: collapse;
                width: 100%;
                max-width: 900px;
                margin-right: 60px;
             }
  
            th, td {
                padding: 10px;
                text-align: left;
            }
            
            th {
                background-color: #333;
                color: white;
            }
            
            tr{
                background-color: #f2f2f2;
            }
            button {
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
            button:hover {
                background-color: #3c4245;
                color:#dfcdc3;
            }
            input {
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
           	
        </style>
        <script>                       
            function cerrarSesion() {

                window.location.href = "index.php";
                }
        </script>
        
    
  </head>
  <body>
    
        <div class="tabla">       
     
        <?php
                $sname= "localhost";

                $unmae= "root";
                
                $password = "";
                
                $db_name = "tfg";
                
                $conn = mysqli_connect($sname, $unmae, $password, $db_name);
                
                $consul = mysqli_query($conn,"SELECT * FROM agenda");
                if (mysqli_num_rows($consul) > 0) {
                    echo "<table id='agenda'>";
                    echo "<tr>";
                    echo "<th >NHC</th>";
                    echo "<th>Nombre</th>";
                    echo "<th>Apellidos</th>";
                    echo "<th> Dia consulta </th>";
                    echo "<th> Hora de consulta </th>";
                    echo "<th> Consulta </th>";
                    while ($cont = mysqli_fetch_assoc($consul)){
    
                        $nom = mysqli_query($conn, "SELECT * FROM pacientes WHERE NHC =".$cont['nhc_paciente']);
                        $nomb = mysqli_fetch_assoc($nom);
                        $fech=$cont['fech_consul'];
                        echo"<tr>";
                        echo "<td >".$cont['nhc_paciente'] ."</td>";
                        echo "<td >".$nomb['NOMBRE']."</td>";
                        echo "<td >".$nomb['APELLIDOS']."</td>";                       
                        echo "<td>".$fech."</td>";
                        echo "<td>".$cont['hora'] ."</td>";
                        echo "<td>";
                        echo "<form method='POST' >";    
                        echo "<input type='hidden' name='cod' value='". $cont['cod']. "'>";               
                        echo "<input type='hidden' name='id' value='". $cont['nhc_paciente']. "'>";
                        echo "<input type='text' name='consulta' placeholder='Conusulta' required>";
                        echo " <button  type='submit' title='ingresar' name='agregar'>Guardar</button>";
                        echo "</form>";
                        echo "</td>";
                        echo "</tr>";
                    
                }
                       
            }
                    
            echo "</table>";
            
            if (isset($_POST['agregar'])) {
                $n = $_POST['id'];
                $cod = $_POST['cod'];
                $consul=$consulta = $_POST['consulta'];
                $cons = mysqli_query ($conn,"INSERT INTO consulta (cod, NHC_paciente, consulta, fech_consul) VALUES (NULL,'$n', '$consul','$fech')");
                $borrar=mysqli_query($conn, "DELETE FROM agenda where cod ='$cod'");
                echo '<script>window.location.href = window.location.href;</script>';
            }      
                    
                    

                    mysqli_close($conn);
            ?>
           <button onclick="cerrarSesion()">Cerrar sesión</button>
        
        
        </div>
                
        </body>
</html>