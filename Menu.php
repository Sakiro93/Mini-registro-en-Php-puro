
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="keywords" content="HTML,HTML 5">
        <meta name ="description" content="acerca de">
        <link href="css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <link href="font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css"/>
        <link href="css/estilos.css" rel="stylesheet" type="text/css"/>
    </head>
    <body >
        <nav class="navbar navbar-default navbar-fixed-top"> <!--  -->
            <div class="container">
                <ul class="nav nav-pills">
                    <div class="navbar-header page-scroll">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand page-scroll" href="Menu.php">Registros®</a>
                    </div>
                    <li role="presentation" class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                            Mantenimiento<span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="Mantenimiento/PagConArticulo.php"> Articulo</a> </li>
                            <li><a href="Mantenimiento/PagConCategoria.php"> Categoria</a> </li>
                            <li><a href="Mantenimiento/PagConMarcas.php"> Marca</a> </li>
                        </ul>
                    </li>
                    <li role="presentation" class="dropdown " >
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                            Acerca de nosotros<span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="#angel"> Angel Silva</a> </li>
                            <li><a href="#bryan"> Bryan Pazmiño</a> </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>

        <header>
            <div class="container">
                <div class="intro-text">
                    <div class="intro-lead-in">Bienvenidos </div>
                    <div class="intro-heading">A Registros de Articulos</div>
                </div>
            </div>
        </header>

        <section class="success" id="angel">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <h2 class="section-heading"><font color="#E62F2D">Acerca de:</font> <font color="#2C7BC1"> Angel Silva</font></h2>
                        <h3 class="section-subheading text-muted">Nació en el 15 de Agosto de 1997 en la Ciudad de Milagro<br>"Estudiante y Desarrollador de Software".</h3>
                    </div>
                </div>
                <div class="row">
                    <div class="team-member">
                        <img src="imagenes/Angel.jpg" class="img-responsive img-circle" alt="">
                        <h4>Angel Ismael Silva Acosta</h4>
                        <p class="text-muted">Ingeniería en Sistemas Computacionales</p>
                    </div>

                    <div class="col-lg-4 col-lg-offset-2">
                        <p>
                            Estudiante de la Universidad Estatal de Milagro...<br>Tiene la visión de ser un Profesional Competente y dispuesto a la Lucha por el desarrollo Tecnológico...<br> La Misión es disponer de servicios de desarrollo de Software en base a Ingeniería de Requisitos...
                        </p>
                    </div>
                    <div class="col-lg-4">
                        <p>Experiencia en diversos Lenguajes de Programación entre ellos están: Java, C Sharp, Visual Basic, Php y C++...<br> Reforma Laboral mediante las Ideologías del Extreme Programming (XP)...</p>
                    </div>

                </div>
            </div>
        </section>

        <section class="success" id="bryan">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <h2 class="section-heading"><font color="#E62F2D">Acerca de:</font> <font color="#2C7BC1"> Bryan Pazmiño</font></h2>
                       <h3 class="section-subheading text-muted">Nació en el 15 de Agosto de 1997 en la Ciudad de Esmeralda<br>"Estudiante y Desarrollador de Software".</h3>
                    </div>
                </div>
                <div class="row">

                    <div class="team-member">
                        <img src="imagenes/Bryan.jpg" class="img-responsive img-circle" alt="">
                        <h4>Bryan Javier Pazmiño Lema</h4>
                        <p class="text-muted">Ingeniería en Sistemas Computacionales</p>
                    </div>

                    <div class="col-lg-4 col-lg-offset-2">
                        <p>
                             Estudiante de la Universidad Estatal de Milagro proveniente de Esmeralda...<br>Tiene la visión de ser un Profesional Catedrático, necesitando de la Inversión Educacional para desarrollar nuevos cambios y mejoras en la tecnología...<br> La Misión es disponer de servicios de desarrollo de Software en base a Ingeniería de Requisitos...
                        </p>
                    </div>
                    <div class="col-lg-4">
                        <p>Experiencia en diversos Lenguajes de Programación entre ellos están: Java, C Sharp, Visual Basic, Php y C++...<br> Reforma Laboral mediante las Ideologías del Scrum...</p>
                    </div>

                </div>
            </div>
        </section>

        <!--Pie de página-->
        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <span class="copyright">Copyright &copy; Proyecto Registro® 2017</span>
                    </div>
                    <div class="col-md-4">
                        <ul class="list-inline social-buttons">
                            <li><a href="https://twitter.com/" target="_blank"><i class="fa fa-twitter text-info"></i></a>
                            </li>
                            <li><a href="https://www.facebook.com/" target="_blank"><i class="fa fa-facebook text-info"></i></a>
                            </li>
                            <li><a href="https://www.linkedin.com/" target="_blank"><i class="fa fa-linkedin text-info"></i></a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-4">
                        <ul class="list-inline quicklinks">
                            <li><a href="#">Politicas de privacidad</a>
                            </li>
                            <li><a href="#">Terminos de uso</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer>

        <script src="js/jquery-3.2.1.min.js" type="text/javascript"></script>
        <script src="js/bootstrap.js" type="text/javascript"></script>
        <script src="js/classie.js" type="text/javascript"></script>
        <script src="js/cbpAnimatedHeader.js" type="text/javascript"></script>
        <script src="js/funciones.js" type="text/javascript"></script>
    </body>
</html>
