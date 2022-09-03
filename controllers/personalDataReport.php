<?php
session_start();
if (!isset($_SESSION["username"])) {
    header("Location: ../index.php");
    exit;
}
?>
<?php
require("../models/personalData.php");
require("../models/academicData.php");
require("../models/medicalData.php");
require("../models/familyData.php");

$pd = new PersonalData();
$ad = new AcademicData();
$md = new MedicalData();
$fd = new FamilyData();

if (isset($_GET["dni"])) {
    $pdr = $pd->select($_GET["dni"]);
    $adr = $ad->select($_GET["dni"]);
    $mdr = $md->select($_GET["dni"]);
    $fdr = $fd->select($_GET["dni"]);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SISCONODO : Reporte de Contratos</title>
    <link rel="stylesheet" href="../assets/css/main.css">
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
        }

        img {
            display: block;
            float: left;
            width: 20%;
        }

        h1 {
            display: block;
            float: left;
            text-align: center;
            width: 80%;
            font-size: 16px;
        }

        h2 {
            clear: both;
            float: none;
            text-align: center;
            font-size: 18px;
        }
    </style>
</head>

<body>
    <img src="../assets/img/blue_logo.png" alt="">
    <h1>REPUBLICA BOLIVARIANA DE VENEZUELA<br>MINISTERIO DE PODER POPULAR PARA LA EDUCACIÓN SUPERIOR <br> UNIVERSIDAD NACIONAL EXPERIMENTAL DE LOS LLANOS CENTRALES<br>"RÓMULO GALLEGOS"</h1>
    <br>
    <br>
    <h2>Datos</h2>
    <br>
    <br>
    <div id="section-content">

        <div id="person">
            <div id="personal-data" class="data">
                <?php
                if (isset($_GET["dni"])) : ?>
                    <h3>Datos personales</h3>
                    <?php
                    while ($personaldata = $pdr->fetch(PDO::FETCH_ASSOC)) :
                    ?>
                        <div class="personal-image">
                            <img src="../uploads/photos/<?php echo $personaldata['photo']; ?>" alt="" class="image">
                        </div>

                        <div class="personal-data">
                            <p><b>Cedula:</b><?php echo $personaldata['dni']; ?></p>
                            <p><b>Nombre:</b><?php echo $personaldata['name']; ?></p>
                            <p><b>Apellido:</b><?php echo $personaldata['surname']; ?></p>
                            <p><b>Fecha de nacimiento:</b><?php echo $personaldata['birthday']; ?></p>
                            <p><b>Estado civil:</b><?php echo $personaldata['marital_status']; ?></p>
                            <p><b>Genero:</b><?php echo $personaldata['gender']; ?></p>
                            <p><b>Telefono movil:</b><?php echo $personaldata['mobile_phone']; ?></p>
                            <p><b>Teléfono fijo:</b><?php echo $personaldata['telephone']; ?></p>
                            <br>

                        </div>
                <?php
                    endwhile;
                endif;
                ?>
            </div>

            <div class="clearfix"></div>

            <div id="academic-data" class="data">

                <?php
                if (isset($_GET["dni"])) : ?>

                    <h3>Datos académicos</h3>
                    <?php
                    while ($academicData = $adr->fetch(PDO::FETCH_ASSOC)) :
                    ?>
                        <p><b>Titulo:</b><?php echo $academicData['title']; ?></p>
                        <p><b>Cursos:</b><?php echo $academicData['courses']; ?></p>
                        <p><b>Meritos:</b><?php echo $academicData['merits']; ?></p>
                        <p><b>Experiencias:</b><?php echo $academicData['experiences']; ?></p>
                        <br>
                <?php
                    endwhile;
                endif;
                ?>

            </div>
            <?php
            if (isset($_GET["dni"])) :
            ?>

                <?php if ($fdr->rowCount() != 0) : ?>
                    <div id="family-data" class="data">
                        <h3>Datos familiares</h3>
                        <?php
                        while ($familyData = $fdr->fetch(PDO::FETCH_ASSOC)) :
                        ?>
                            <p><b>Cedula:</b><?php echo $familyData['f_dni']; ?></p>
                            <p><b>Nombre:</b><?php echo $familyData['name']; ?></p>
                            <p><b>Apellido:</b><?php echo $familyData['surname']; ?></p>
                            <p><b>Consanguinidad:</b><?php echo $familyData['kinship']; ?></p>
                            <br>
                            <br>
                        <?php
                        endwhile; ?>
                    <?php endif; ?>

                    </div>
                <?php endif; ?>

        </div>

    </div>
</body>
<script>
    window.print();
</script>

</html>