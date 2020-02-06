<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>SGSC Web </title>
        <link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="../css/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>
        <link href="../css/login.css" rel="stylesheet" type="text/css"/>

        <style>
            body{
                background-image: url('../img/menu/fondo.jpg');
                background-position: center center;
                background-repeat: no-repeat;
                background-attachment: fixed;
                background-size: 100%,100%;
                background-color: #464646;
            }
            .logomain:hover{
                background: #b1dcf8;
                cursor: pointer;
            }
            .cuentahover:hover{
                background-color: #b1dcf8;
            }
            .clavehover:hover{
                background: #b1dcf8;
            }
        </style>
    </head>
    <body>
    <nav class="navbar navbar-blue navbar-fixed-top" role="navigation" style="background: #081FA0  ; padding-bottom: 1px; padding-top: 2px;" >
            <div class="container">
                <ul class="nav nav-pills">
                    <div class="navbar-header page-scroll">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand page-scroll" href="login.php">Registros®</a>
                    </div>
                </ul>
            </div>
        </nav>

        <div class="span_3_of_2">
            <div >
                <div class="row-fluid">
                    <div class="col-lg-12" style="margin-top: 35px;">
                        <div class="col-lg-offset-7">
                            <div class="card card-container" id="conForm">
                                <h4 class="text-center">Ingresa a SGSC</h4>
                                <img id="profile-img" class="profile-img-card" src="../img/menu/avatar.png" />
                                <p id="profile-name" class="profile-name-card"></p>
                                <form class="form-signin" id="frm-login">
                                    <div style="display: none" class="alert alert-danger alert-dismissable" id="error"></div>
                                    <input type="text" id="cuenta" name="cuenta" class="form-control cuentahover" placeholder="Ingresa Usuario" required autofocus>
                                    <input type="password" id="clave" name="clave" class="form-control clavehover" placeholder="ingrasa Password" required>
                                    <button id="btnLogin" class="btn btn-lg btn-primary btn-block btn-signin" type="submit">
                                        <span id="caption">Iniciar Session</span>
                                    </button>
                                </form><!-- /form -->
                                <div class="row-fluid text-center">
                                    <div id='loading' hidden="" >
                                        <img src="../img/menu/loading.gif" >
                                    </div>
                                </div>
                                <p style="margin-top: 15px; font-size: 12px;">
                                    En caso de problemas, contactarce a
                                    <a href="#">soporte@4c1.ec</a>
                                </p>
                                <p style="margin-top: -5px; font-size: 12px;">
                                    <a href="#">Olvido su cuenta o contraseña?</a>
                                </p>
                            </div><!-- /card-container -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="../js/jquery-3.2.1.min.js" type="text/javascript"></script>
        <script src="../js/bootstrap.min.js" type="text/javascript"></script>
        <script>
            $(function () {
                $('#frm-login').on({
                    submit: function (e) {
                        e.preventDefault();
                        $.ajax({
                            url: "iniciarsession.php",
                            type: 'POST',
                            data: {
                                cuenta: $('#cuenta').val(),
                                clave: $('#clave').val(),
                                action: 'login'
                            },
                            dataType: 'json',
                            beforeSend: function (xhr) {
                                $('#loading').show('slow');
                            }
                        }).done(function (data) {
                            console.log(data);
                            console.log('aqui1');
                            if (data.resp == true) {
                                window.location = '../Menu.php';
                            } else {
                                alert('El usuario es incorrecto');
                            }
                            $('#loading').hide('fast');
                        });
                        console.log('aqui2');
                        return false;
                    }
                });
            });
        </script>
    </body>
</html>
