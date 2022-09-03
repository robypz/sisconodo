<?php 
    if (!isset($_GET['login'])) {
        $_GET['login']=0;
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SISCONODO UNERG</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body id="index">

    <div class="wrap">
        <header id="header">
            <div id="logo">
                <img src="assets/img/white_logo.png" alt=""><h1>SISCONODO UNERG</h1>
            </div>
        </header>

        <div class="clearfix"></div>

        <section id="content">
            
            <div class="login">
                <h2>Iniciar Sesión</h2>
                <form action="controllers/login.php" method="post">
                    <label for="username"><img src="assets/img/person-fill.svg" alt="Bootstrap" width="32" height="32"></label>
                    <input type="text" name="username" id="username" placeholder="Usuario">
                    <div class="clearfix"></div>
                    <label id="lock-fill" for="password"><img src="assets/img/lock-fill.svg" alt="Contraseña"></label>
                    <input type="password" name="password" id="password" placeholder="********">
                    <div class="clearfix"></div>
                    <input type="submit" value="Ingresar">
                </form>
                
            </div>
        </section>
    </div>    
</body>
<?php if($_GET['login']=='false'): ?>
    <script>
        alert('Datos incorrectos verifique su usuario o clave');
    </script>
<?php $_GET['login']=0; endif; ?>
</html>