<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/index.css">
    <link rel="stylesheet" href="./css/footer.css">
    <!--Iconos-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.0/font/bootstrap-icons.min.css">

</head>
<body>
<div class="hero_area">
<header class="header_section">
        <div class="container-fluid nav_container">
            <nav class="custom_nav-container navbar-expand-lg">
                <a class="navbar-brand" href=""></a>
                <div class="navbar-collapse">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./Calendario/modulos/inicio.php">Calendario</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./publicar/eventos.php">Eventos</a>
                        </li>
                        <?php if (isset($_SESSION['id_rol']) && $_SESSION['id_rol'] == 1): ?>
                            <li class="nav-item">
                                <a class="nav-link" href="./publicar/formulario.php">Publicar</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="./GestionVoluntarios/administrador.php">Solicitudes</a>
                            </li>
                        <?php endif; ?>
                        <li class="nav-item">
                            <a class="nav-link" href="./GestionVoluntarios/FormularioVoluntariado.php">Voluntariado</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./contacto_sugerencia/contacto.php">Contacto</a>
                        </li>
                    </ul>
                </div>
                
                <div class="auth-section">
    <?php if (isset($_SESSION['nombre'])) : ?>
        <span>Hola, <?= $_SESSION['nombre']; ?></span>
        <a class="nav-link" href="./controlador/controlador_logout.php">Salir</a>
    <?php else : ?>
        <div class="auth-links2">
            <a class="nav-link login" href="./web/login.php"><i class="fas fa-sign-in-alt"></i> LOGIN</a>
        </div>
    <?php endif; ?>
    <?php if (isset($_SESSION['id_rol']) && $_SESSION['id_rol'] == 2): ?>
        <form method="POST" action="">
            <button type="submit" name="actualizar_rol" class="admin-btn">
            <i class="fa fa-address-card" aria-hidden="true"></i></button>
        </form>
    <?php endif; ?>
</div>
            </nav>
        </div>
    </header>
</div>

  <!-- carousel -->
  <div class="carousel">
        <!-- list item -->
        <div class="list">
            <div class="item">
                <img src="../img/fotoRS.jpg">
                <div class="content">
                    <div class="author">Universidad Nacional Federico Villarreal</div>
                    <div class="title">CURES FIEI</div>
                    <div class="topic">Responsabilidad Social</div>
                    <div class="des">
                        <!-- lorem 50 -->
                        Somos estudiantes de la Universidad Nacional Federico Villarreal (UNFV), dedicados a promover la responsabilidad social a través de esta plataforma. Únete a nosotros para descubrir eventos, iniciativas y oportunidades para contribuir positivamente a nuestra comunidad universitaria y más allá.


                    </div>
                    <div class="buttons">
                        <button><a href="https://www.facebook.com/FIEIOficial?locale=es_LA">VER MAS</a></button>
                        
                    </div>
                </div>
            </div>
            <div class="item">
                <img src="../img/fotoRS2.jpg">
                <div class="content">
                    <div class="author">Universidad Nacional Federico Villarreal</div>
                    <div class="title">CURES FIEI</div>
                    <div class="topic">Responsabilidad Social</div>
                    <div class="des">
                    Somos estudiantes de la Universidad Nacional Federico Villarreal (UNFV), dedicados a promover la responsabilidad social a través de esta plataforma. Únete a nosotros para descubrir eventos, iniciativas y oportunidades para contribuir positivamente a nuestra comunidad universitaria y más allá.


                    </div>
                    <div class="buttons">
                        <button><a href="https://www.facebook.com/FIEIOficial?locale=es_LA">VER MAS</a></button>
                    </div>
                </div>
            </div>
            <div class="item">
                <img src="../img/UNFV.jpg">
                <div class="content">
                    <div class="author">Universidad Nacional Federico Villarreal</div>
                    <div class="title">CURES FIEI</div>
                    <div class="topic">Responsabilidad Social</div>
                    <div class="des">
                    Somos estudiantes de la Universidad Nacional Federico Villarreal (UNFV), dedicados a promover la responsabilidad social a través de esta plataforma. Únete a nosotros para descubrir eventos, iniciativas y oportunidades para contribuir positivamente a nuestra comunidad universitaria y más allá.


                    </div>
                    <div class="buttons">
                        <button><a href="https://www.facebook.com/FIEIOficial?locale=es_LA">VER MAS</a></button>
                        
                    </div>
                </div>
            </div>
            <div class="item">
                <img src="../img/fotoRS3.jpg">
                <div class="content">
                    <div class="author">Universidad Nacional Federico Villarreal</div>
                    <div class="title">CURES FIEI</div>
                    <div class="topic">Responsabilidad Social</div>
                    <div class="des">
                    Somos estudiantes de la Universidad Nacional Federico Villarreal (UNFV), dedicados a promover la responsabilidad social a través de esta plataforma. Únete a nosotros para descubrir eventos, iniciativas y oportunidades para contribuir positivamente a nuestra comunidad universitaria y más allá.


                    </div>
                    <div class="buttons">
                        <button><a href="https://www.facebook.com/FIEIOficial?locale=es_LA">VER MAS</a></button>
                        
                    </div>
                </div>
            </div>
        </div>
        <!-- list thumnail -->
        <div class="thumbnail">
            <div class="item">
                <img src="../img/fotoRS.jpg">
                <!--<div class="content">
                    <div class="title">
                        Name Slider
                    </div>
                    <div class="description">
                        Description
                    </div>
                </div>-->
            </div>
            <div class="item">
                <img src="../img/fotoRS2.jpg">
                <!--<div class="content">
                    <div class="title">
                        Name Slider
                    </div>
                    <div class="description">
                        Description
                    </div>
                </div>-->
            </div>
            <div class="item">
                <img src="../img/UNFV.jpg">
                <!--<div class="content">
                    <div class="title">
                        Name Slider
                    </div>
                    <div class="description">
                        Description
                    </div>
                </div>-->
            </div>
            <div class="item">
                <img src="../img/fotoRS3.jpg">
                <!--<div class="content">
                    <div class="title">
                        Name Slider
                    </div>
                    <div class="description">
                        Description
                    </div>
                </div>-->
            </div>
        </div>
        <!-- next prev -->

        <div class="arrows">
            <button id="prev"><</button>
            <button id="next">></button>
        </div>
        <!-- time running -->
        <div class="time"></div>
    </div>


    <footer class="pie-pagina">
        <div class="grupo-1">
            <div class="box">
                <figure>
                    <a href="#">
                        <img src="../img/logo_fiei_2021.png" alt="Logo de FIEI">
                    </a>
                </figure>
            </div>
            <div class="box">
                <h2>SOBRE NOSOTROS</h2>
                <p>Somos estudiantes de la Universidad Nacional Federico Villarreal (UNFV), dedicados a promover la responsabilidad social a través de esta plataforma. Únete a nosotros para descubrir eventos, iniciativas y oportunidades para contribuir positivamente a nuestra comunidad universitaria y más allá.</p>
                
            </div>
            <div class="box">
                <h2>SIGUENOS</h2>
                <div class="red-social">
                    <a href="https://www.facebook.com/UNFV.EDU" class="bi bi-facebook"></a>
                    <a href="#" class="bi bi-instagram"></a>
                    <a href="#" class="bi bi-twitter"></a>
                    <a href="#" class="bi bi-youtube"></a>
                </div>
            </div>
        </div>
        <div class="grupo-2">
            <small>&copy; 2024 <b>Universidad Nacional Federico Villarreal</b> - Todos los Derechos Reservados.</small>
        </div>
    </footer>

<script src="../js/script.js"></script>
<script src="../js/index.js"></script>

</body>
</html>