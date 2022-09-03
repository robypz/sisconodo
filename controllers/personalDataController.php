<?php
session_start();
if (!isset($_SESSION["username"])) {
    header("Location: ../index.php");
    exit;
}


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
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SISCONODO: Home</title>
    <link rel="stylesheet" href="../assets/css/main.css">
</head>

<body>

    <div id="wrap">
        <header id="header">
            <div id="logo">
                <img src="../assets/img/blue_logo.png" alt="" id="logo-img">
                <h1 id="tittle">SISCONODO</h1>
            </div>
        </header>

        <div id="container">

            <aside id="sidebar">
                <nav>
                    <ul>
                        <li>
                            <a href="../views/home.php">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M2 13.5V7h1v6.5a.5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5V7h1v6.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5zm11-11V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z" />
                                    <path fill-rule="evenodd" d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z" />
                                </svg>
                                Inicio
                            </a>
                        </li>
                        <li>
                            <a href="personalDataController.php">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#545454" class="bi bi-file-earmark-person" viewBox="0 0 16 16">
                                    <path d="M11 8a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                                    <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2v9.255S12 12 8 12s-5 1.755-5 1.755V2a1 1 0 0 1 1-1h5.5v2z" />
                                </svg>Información personal
                            </a>
                        </li>

                        <li>
                            <a href="familyDataController.php?dni=<?php if (isset($_GET["dni"])) {
                                                                        echo $_GET["dni"];
                                                                    } ?>">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-lines-fill" viewBox="0 0 16 16">
                                    <path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm-5 6s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zM11 3.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5zm.5 2.5a.5.5 0 0 0 0 1h4a.5.5 0 0 0 0-1h-4zm2 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1h-2zm0 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1h-2z" />
                                </svg>Datos familiares
                            </a>
                        </li>

                        <li>
                            <a href="../views/solicitudes.php">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clipboard-plus" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M8 7a.5.5 0 0 1 .5.5V9H10a.5.5 0 0 1 0 1H8.5v1.5a.5.5 0 0 1-1 0V10H6a.5.5 0 0 1 0-1h1.5V7.5A.5.5 0 0 1 8 7z" />
                                    <path d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1h1a1 1 0 0 1 1 1V14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V3.5a1 1 0 0 1 1-1h1v-1z" />
                                    <path d="M9.5 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5h3zm-3-1A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3z" />
                                </svg>Solitudes
                            </a>
                        </li>
                        <?php if ($_SESSION["user_type"] == "ROOT") : ?>
                            <li>
                                <a href="../views/registerUserForm.php">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-plus" viewBox="0 0 16 16">
                                        <path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H1s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C9.516 10.68 8.289 10 6 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z" />
                                        <path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z" />
                                    </svg>Registro de usuarios
                                </a>
                            </li>
                        <?php endif; ?>

                        <li>
                            <a href="contractController.php">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-spreadsheet" viewBox="0 0 16 16">
                                    <path d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2zm2-1a1 1 0 0 0-1 1v4h10V2a1 1 0 0 0-1-1H4zm9 6h-3v2h3V7zm0 3h-3v2h3v-2zm0 3h-3v2h2a1 1 0 0 0 1-1v-1zm-4 2v-2H6v2h3zm-4 0v-2H3v1a1 1 0 0 0 1 1h1zm-2-3h2v-2H3v2zm0-3h2V7H3v2zm3-2v2h3V7H6zm3 3H6v2h3v-2z" />
                                </svg>Nómina</a>
                        </li>

                        <li>
                            <a href="Signoff.php"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-right" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z" />
                                    <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z" />
                                </svg>Cerrar sesión</a>
                        </li>
                    </ul>
                </nav>
            </aside>

            <section id="content">
                <div id="section">


                    <h2 id="section-name">Datos</h2>
                    <div id="section-content">
                        <form action="personalDataController.php" method="get" id="search-data">
                            <input type="number" name="dni" required value="<?php if(isset($_GET['dni'])){ echo $_GET['dni']; }; ?>">
                            <input type="submit" value="Buscar">
                            
                        </form>

                        

                        <div class="clearfix"></div>

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
                                        <p><a title="Descargar titulo" href="../uploads/titulos/<?php echo $academicData['title_url']; ?>" download="<?php echo $academicData['title_url']; ?>">Descargar titulo</a></p>
                                        <br>
                                <?php
                                    endwhile;
                                endif;
                                ?>

                            </div>

                            <div id="medical-data" class="data">
                                <?php
                                if (isset($_GET["dni"])) : ?>

                                    <h3>Datos médicos</h3>
                                    <?php
                                    while ($medicalData = $mdr->fetch(PDO::FETCH_ASSOC)) :
                                    ?>
                                        <p><b>evaluacio Psycopedagogica:</b><a title="Descargar titulo" href="../uploads/evaluacionesPsycopedagogicas/<?php echo $medicalData['psychopedagogical_evaluation_url']; ?>" download="<?php echo $academicData['psychopedagogical_evaluation_url']; ?>">Descargar</a></p>
                                        <p><b>Certificado Médico</b><a title="Descargar titulo" href="../uploads/certificadosMedicos/<?php echo $medicalData['medical_certificate_url']; ?>" download="<?php echo $academicData['medical_certificate_url']; ?>">Descargar</a></p>
                                        <br>

                                <?php
                                    endwhile;
                                endif;
                                ?>
                            </div>
                            <?php
                                if (isset($_GET["dni"])) :
                                ?>

                                <?php if($fdr->rowCount()!=0): ?>
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
                        
                        <?php if(isset($_GET['dni'])): ?>
                        <a href="../controllers/personalDataReport.php?dni=<?php echo $_GET['dni'] ?>" class="generar-reporte"><button>Generar Reporte</button></a>
                        <?php endif; ?>

                    </div>
                </div>
            </section>

            <footer id="footer">
                <p>Universidad Nacional Experimental de los Llanos Centrales "Rómulo Gallegos"</p>
                Desarrollado por Robert Yepez Área de Ingeniería de Sistemas - 2022 &copy;
            </footer>
        </div>
    </div>
</body>

</html>