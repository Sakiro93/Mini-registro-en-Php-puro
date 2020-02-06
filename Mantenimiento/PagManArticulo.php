<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Mantenimiento de Articulo</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>

        <?php
        include_once './Conexion.php';
        include_once './Producto.php';
        if (isset($_GET['opc'])) {
            if ($_GET['opc'] == 'I') {
                $linea = new Producto(0, "../Fotos/no_imagen.png", "", '', '', '', '', 0);
            } else {
                $con = new Conexion();
                $registros = $con->consultar("select id_Producto,foto_Producto, descripcion_Producto, id_Categoria, id_Marca, precio_Producto, stock_Producto, iva_Producto from producto where id_Producto=$_GET[id]");
                if ($reg = $registros->fetch_array()) {
                    $linea = new Producto($reg[0], $reg[1], $reg[2], $reg[3], $reg[4], $reg[5], $reg[6], $reg[7]);
                }
            }
        }
        ?>

        <div class="container">
            <br><br>
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h4 class="text-center">Mantenimiento De Articulo<span class="fa fa-cog fa-spin fa-2x fa-fw"></span></h4>
                </div>
                <br>

                <div class="span12">
                    <ul class="breadcrumb">
                        <li><a href="../Menu.php">Inicio</a><span class="divider"></span></li>
                        <li><a href="PagConArticulo.php">Consultar Articulos</a><span class="divider"></span></li>
                        <li><a href="javascript:window.location.reload();" class="active">Mantenimiento Articulos</a> <span class="divider"></span></li>
                    </ul>
                </div>

                <div class="panel-body">

                    <form class="form-horizontal" name="frmCategoria"  ENCTYPE="multipart/form-data" method="post" action="ArtGrabar.php">

                        <input type="hidden" name="opc" id="opc" value='<?= $_GET['opc']; ?>' /><br>

                        <div class="form-group">
                            <div class="col-md-9">
                                <input type="hidden" class="form-control " name="id" maxlength="45"
                                       id="nombre" required="true" value='<?= $linea->__getVar("id_Producto"); ?>'>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-9">
                                <input type="hidden" class="form-control " name="foto" maxlength="45"
                                       id="nombre" required="true" value='<?= $linea->__getVar("foto_Producto"); ?>'>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xs-5 col-lg-push-1">
                                <div class="panel panel-info">
                                    <div class="panel-heading">
                                        <strong class="panel-title">Foto</strong>
                                    </div>
                                    <div class="panel-body" style="min-height: 250px ">

                                        <table class="totales col-xs-offset-1" style="display: block">
                                            <tbody>
                                                <tr>
                                            <div class="col-xs-3">
                                                <img   id="imagen" bgcolor="#222" src='<?= $linea->__getVar("foto_Producto"); ?>' width="330" height="295"  style="border: 4px solid #168E97"/><br><br>

                                            </div>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="panel-footer">
                                        <input id="cargarimagen"  style=" width:  "   name="imagen" type="file" name="Imagen"  >
                                    </div>
                                </div>

                            </div>
                            <div class="col-xs-6 col-lg-offset-1">
                                <div class="panel panel-info">
                                    <div class="panel-heading">
                                        <strong class="panel-title">Datos del articulo</strong>
                                    </div>
                                    <div class="panel-body" style="min-height: 250px ">
                                        <div class="from-group">
                                            <label class="control-label col-xs-3"style="text-align: left">Descripcion:</label>
                                            <div class="col-xs-8">
                                                <input type="text" class="form-control " name="descripcion" maxlength="45"
                                                       id="descripcion" value ='<?= $linea->__getVar("descripcion_Producto"); ?>'  placeholder="Descripcion" required="true">
                                            </div>
                                        </div>
                                        <br><br>
                                        <br>

                                        <label class="control-label col-xs-3" style="text-align: left">Categoria:</label>
                                        <div class="col-xs-8">
                                            <select name="categoria" id="categoria" class="form-control" required="true">
                                                <option value="">Seleccione</option>
                                                <?php
                                                $con = new Conexion();
                                                $registros = $con->consultar("select * from categoria");
                                                while ($reg = $registros->fetch_array()) {
                                                    if ($linea->__getVar("id_Categoria") == $reg[0]) {
                                                        echo '<option value="' . $reg[0] . '" selected="">' . $reg[1] . '</option>';
                                                    } else {
                                                        echo '<option value="' . $reg[0] . '" >' . $reg[1] . '</option>';
                                                    }
                                                }
                                                ?>
                                            </select>
                                        </div>

                                        <br><br>
                                        <br>
                                        <label class="control-label col-xs-3"style="text-align: left">Marca:</label>
                                        <div class="col-xs-8">
                                            <select name="marca" id="marca" class="form-control" required="true">
                                                <option value="">Seleccione</option>

                                            </select>
                                        </div>
                                        <br><br>
                                        <br>
                                        <label class="control-label col-xs-3" style="text-align: left" >Precio:</label>
                                        <div class="col-xs-8">
                                            <input type="number" class="form-control " name="precio" maxlength="20"
                                                   id="descripcion" value ='<?= $linea->__getVar("precio_Producto"); ?>' placeholder="Precio" step="any" min="0" required="true">
                                        </div>
                                        <br><br>
                                        <br>
                                        <label class="control-label col-xs-3"style="text-align: left">Stock:</label>
                                        <div class="col-xs-8">
                                            <input type="number" class="form-control " name="stock" maxlength="10"
                                                   id="descripcion" value ='<?= $linea->__getVar("stock_Producto"); ?>' placeholder="Stock" min="0" required="true">
                                        </div>
                                        <br><br>
                                        <br>
                                        <label class="control-label col-xs-3"style="text-align: left" >IVA:</label>
                                        <div class="col-xs-3">
                                            <div class="checkbox col-xs-8" >
                                                <input name="iva" type="checkbox" value='1'
                                                <?php
                                                if ($linea->__getVar("iva_Producto") == 1) {
                                                    echo ' checked=""';
                                                }
                                                ?>
                                                       >Activo
                                            </div>
                                        </div>
                                        <br><br>
                                        <br>

                                    </div>
                                </div>
                            </div>


                        </div>
                        <div class="panel-footer">
                            <div class="row">

                                <div class="btn-group">
                                    <div class=" col-md-offset-4 col-md-2">
                                        <button id="grabar" type="submit" class=" btn btn-info "><span class="glyphicon glyphicon-save"></span> Grabar</button>
                                    </div>
                                    <div class="col-md-offset-3 col-md-2">
                                        <a href="PagConArticulo.php" id="btnSalir" class="btn btn-danger" <i class="glyphicon glyphicon-remove"></i> Cancelar.</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>
                <?php include('./pie.php'); ?>
            </div>

            <script src="../js/jquery-3.2.1.min.js" type="text/javascript"></script>
            <script src="../js/bootstrap.min.js" type="text/javascript"></script>

            <script>
                //Script para ingresar imágenes.
                $(function () {
                    $('#cargarimagen').on('change', function () {
                        var rutaimg = $(this).val();
                        var extension = rutaimg.substring(rutaimg.length - 3, rutaimg.length);
                        if (extension.toLowerCase() === 'png' || extension.toLowerCase() === 'jpg') {
                            $('#imagen').fadeIn("fast").attr('src', URL.createObjectURL(event.target.files[0]));
                        } else {
                            $(this).val('');
                            $('#imagen').fadeIn("fast").attr('src', '<?= $linea->__getVar("foto_Producto"); ?>');
                            alert('Ingrese solo imágenes');
                        }
                    });

                    $('#categoria').click(function () {
                        var params = {
                            'caso': $('#categoria').val()
                        };

                        $.ajax({
                            data: params,
                            url: 'ctrTarea.php',
                            type: 'POST',
                            dataType: 'JSON',
                            success: function (data) {
                                $('#marca').html('');
                                var opt = '<option value="">Seleccione</option>';
                                for (var ci of data) {
                                    opt += "<option value=" + ci.codigo + ">" + ci.nombre + "</option>";
                                }
                                $('#marca').append(opt);

                            }
                        });
                    });

                });
            </script>
    </body>
</html>
