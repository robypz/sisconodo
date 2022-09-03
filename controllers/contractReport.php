<?php
    session_start();
    if(!isset($_SESSION["username"])){
        header("Location: ../index.php");
        exit;
    }
?>
<?php
    require("../models/contract.php");

    $c= new Contract();
    $result=$c->select($_GET["dni"],$_GET["school"]);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SISCONODO : Reporte de Contratos</title>
    <style>
        body{
            font-family: Arial, Helvetica, sans-serif;
        }
        img{
            display: block;
            float: left;
            width: 20%;
        }

        h1{
            display: block;
            float: left;
            text-align: center;
            width: 80%;
            font-size: 16px;
        }
        h2{
            clear: both;
            float: none;
            text-align: center;
        }

        table{
            clear: both;
            float: none;
            margin-top: 50px;
            width: 100%;
        }

        tr{
            width: 100%;
        }

        td{
            text-align: center;
            width: 20%;
        }
    </style>
</head>
<body>
    <img src="../assets/img/blue_logo.png" alt="">
    <h1>REPUBLICA BOLIVARIANA DE VENEZUELA<br>MINISTERIO DE PODER POPULAR PARA LA EDUCACIÓN SUPERIOR <br> UNIVERSIDAD NACIONAL EXPERIMENTAL DE LOS LLANOS CENTRALES<br>"RÓMULO GALLEGOS"</h1>
    <h2>Nómina</h2>
    <table border=1>
        <tr>
            <td><b>Cedula</b></td>
            <td><b>Nombre</b></td>
            <td><b>Apellido</b></td>
            <td><b>Area</b></td>
            <td><b>Fecha de Contratación</b></td>
        </tr>

        <?php
            if($result):
            ?>
                                        
                <?php    
                    while($cr = $result->fetch(PDO::FETCH_ASSOC)):
                ?>
                        <tr>
                            <td><?php echo $cr["dni"]; ?></td>
                            <td><?php echo $cr["name"]; ?></td>
                            <td><?php echo $cr["surname"]; ?></td>
                            <td><?php echo $cr["school"]; ?></td>
                            <td><?php echo $cr["hiring_date"]; ?></td>
                        </tr>
                <?php
                    endwhile;
            endif;
        ?>

    </table>
</body>
<script>
    window.print();
</script>
</html>