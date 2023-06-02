<!doctype html>

<html lang="es">
    
    <head>
        
        <meta charset="utf-8">
        
        <title> Enfermeria </title> 
        <link rel="icon" type="image/jpg" href="imagenes/favicon.jpg"/>   
        
        <meta name="viewport" content="width=device-width, initial-scale=1.0">       
        
        <link href="https://fonts.googleapis.com/css?family=Nunito&display=swap" rel="stylesheet"> 
        
        <link rel="stylesheet" href=".css/estilos.css">
        
        <style type="text/css">
            
        </style>
        
        <style type="text/css">
            body{
                font-family: 'Overpass', sans-serif;
                font-weight: normal;
                font-size: 100%;
                color: #1b262c;
                display: flex;
                align-items: center;
                justify-content: center;
                
                margin:0 auto;
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
            
            #buscar{
                margin-top:-10%;
                margin-right:5%;
            }
            input{
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
            button{
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
                
                margin-top: 10px
            
            }
            table {
                border-collapse: collapse;
                width: 100%;
                max-width: 900px;
                margin-right: 60px;
             }
  
            th, td {
                padding: 10px;
                text-align: center;
                background-color:  #CFD1DA;
                
            }
            
            th {
                background-color: #333;
                color: white;
            }
            
            tr:nth-child(even) {
                background-color: #f2f2f2;
            }
            
            td:first-child, th:first-child {
                width: 20%;
                
            }
            
            td:nth-child(2), th:nth-child(2) {
                width: 20%;
            }
            
            td:nth-child(3), th:nth-child(3) {
                width: 20%;
            }
            
            td:nth-child(4), th:nth-child(4) {
                width: 20%;
            }
            
            td:last-child, th:last-child {
                width: 20%;
            }
            
       
        </style>
        
        <script>                       
            function cerrarSesion() {

                window.location.href = "index.php";
                }
        </script>
        
    </head>
    
    <body>
        <div id="buscar">
            <form method="post">
            <input  type="number" name="nhc" placeholder="NHC Paciente" maxlength="6" required>
            <button type="submit" value ="submit" title="Ingresar" >Buscar</button>
            
            <button onclick="cerrarSesion()">Cerrar sesión</button>       
            </form>
        <br>
       
            <table>
                <tr>
                    <th >NHC</th>
                    <th>Fecha</th>                    
                    <th> Consulta </th>
                </tr>
                
            
            
       
    <?php
            $sname= "localhost";

            $unmae= "root";
            
            $password = "";
            
            $db_name = "tfg";                
            
            $conn = mysqli_connect($sname, $unmae, $password, $db_name);
            
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                if (isset($_POST['nhc'])) {                
                    $nhc = $_POST['nhc'];
                    $consul = mysqli_query($conn,"SELECT * FROM pacientes  WHERE NHC  = '$nhc'");
                    $rev = mysqli_num_rows($consul);
                    if($rev == 1){
                        $consul = mysqli_query($conn,"SELECT * FROM consulta  WHERE NHC_paciente  = '$nhc'");
                            
                        while ($cont = mysqli_fetch_array($consul)){   
                            echo '<tr>';               
                            echo "<td>".$cont['NHC_paciente'] ."</td>";
                            echo "<td>".$cont['fech_consul']."</td>";
                            echo "<td>".$cont['consulta'] ."</td>";
                            echo'</tr>';
                        }
                        
                    }
                    
                }
            }       
                    
        ?>
                

            </table> 
         </div>
    </body>
</html>