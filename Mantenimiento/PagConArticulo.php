<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Articulos</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
        <link href="../css/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <?php include './Conexion.php'; ?>
        <?php require_once './Producto.php'; ?>


        <div id="eliminar" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-warning">
                        <h4 class="text-center"><span class="fa fa-cog fa-spin fa-2x fa-fw"></span>Articulos</h4>
                    </div>
                    <div class="modal-body">
                        <form class="form-horizontal" name="frmCategoia"  method="post" action="ArtGrabar.php">
                            <div class="row">
                                <input type="hidden" name="opc" id="opc" value='E' /><br>
                                <input type="hidden" name="id" id="id"  value='' /><br>
                                <label class="control-label col-md-8">Esta Seguro de Eliminar El Articulo</label>
                                <div class="col-md-12">
                                    <input type="text" class="form-control" name="des" maxlength="45"
                                           id="des" value ="" readonly="true">
                                </div>
                            </div>
                            <div class="btn-group">
                                <div class=" control-label col-xs-4">
                                    <button type="submit" class=" btn btn-info "><span class="fa fa-check-square"></span>YES</button>

                                </div>
                                <div class="control-label col-xs-8">
                                    <a href="#" data-dismiss="modal" class="btn btn-danger"><span class="fa fa-arrow-left">NO</a>

                                </div>

                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
        <div class="container">
            <br><br>
            <div class="row">
                <div class="modal-header btn-primary">
                    <h4 class="text-center"><span class="fa fa-cog fa-spin fa-2x fa-fw"></span>Consulta de Articulo</h4>
                </div>

            </div>
            <br>
            <div class="row-fluid">

              <div class="span12">
                <ul class="breadcrumb">
                  <li><a href="../Menu.php">Inicio</a><span class="divider"></span></li>
                  <li><a href="javascript:window.location.reload();" class="active">Consultar Articulos</a> <span class="divider"></span></li>
                </ul>
              </div>

            </div>
            <a href="PagManArticulo.php?id=0&opc=I" id="btnNuevo" class="btn btn-warning" title="Nuevo Registro" ><i class="glyphicon glyphicon-file"></i> Nuevo Registro</a>
              <a href="reporte.php" class="btn btn-warning" title="Generar Reporte" ><i class="glyphicon glyphicon-file"></i> Reporte</a>
            <a href="../Menu.php?" id="btnsalir" class="btn btn-info" title="Salir"><i class="glyphicon glyphicon-home"></i> Menú</a>
            <br><br>
            <form name="form1" method="post" action="PagConArticulo.php" id="cdr" >
                <p>
                    <input type="text" class="from-control" placeholder=" Ingrese la descripcion a Buscar"  name="buscador" id="buscador" style="background: white ; width:400px ; border-radius: 5px; border-color: green ; height: 34px ; text-align: left" />
                    <input id="Buscar" class="btn btn-success" style="width: 200px" title="Buscar" type="submit" name="Submit" value="Buscar" />
                </p>
            </form>

            <div class="panel panel-primary">
                <div class="panel-heading">Consulta</div>
                <div class="panel-body">

                    <table class="table  table-hover table-bordered table-striped">
                        <thead>
                            <tr class="bg-primary">
                                <?php
                                $cabecera = array("ID", "Foto", "Descripcion", "Categoría", "Marca", "Precio", "Stock", "Saldo", "Accion");
                                foreach ($cabecera as $datos) {
                                    echo "<th class='text-center'>$datos</th>";
                                }
                                ?>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $busca = "";
                            if (isset($_POST['buscador'])) {
                                $busca = $_POST['buscador'];
                            }
                            $con = new Conexion();
                            $registros = $con->consultar("select id_Producto,foto_Producto, descripcion_Producto, Descripcion_Categoria, Descripcion_Marca, precio_Producto, stock_Producto from producto, categoria, marca where producto.id_Categoria=categoria.id_Categoria and producto.id_Marca=marca.id_Marca and descripcion_Producto LIKE '%" . $busca . "%'");

                            while ($reg = $registros->fetch_array()) {
                                $saldo = ($reg[5] * $reg[6]);
                                ?>
                                <tr>
                                    <td><?= $reg[0]; ?></td>
                                    <?php
                                    if (file_exists($reg[1])) {
                                        echo"<td> <img id='imagen' bgcolor='#222' src='$reg[1]' width='50' height=40'  style='border: 4px solid #168E97'/></td>";
                                    } else {
                                        echo "<td>No existe Foto</td>";
                                    }
                                    ?>
                                    <td><?= $reg[2]; ?></td>
                                    <td><?= $reg[3]; ?></td>
                                    <td><?= $reg[4]; ?></td>
                                    <td><?= $reg[5]; ?></td>
                                    <td><?= $reg[6]; ?></td>
                                    <td><?= $saldo; ?></td>
                                    <td class="text-center">
                                        <a href="PagManArticulo.php?id=<?= $reg[0] ?>&opc=M" rel="edit" class="btn btn-success btn-sm"> <i class="glyphicon glyphicon-edit"></i> Editar</a>
                                        <a id="openmodal" data-toggle="modal" href="#eliminar" data-id="<?= $reg[0] ?>" data-des="<?= $reg[2] ?>"  class="btn btn-danger btn-sm"><i class="glyphicon glyphicon-remove"></i> Eliminar</a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <?php include('./pie.php'); ?>

        </div>

        <script src="../js/jquery-3.2.1.min.js" type="text/javascript"></script>
        <script src="../js/bootstrap.min.js" type="text/javascript"></script>
        <script>
            $(document).ready(function (e) {
                $('#eliminar').on('show.bs.modal', function (e) {
                    var id = $(e.relatedTarget).data().id;
                    var des = $(e.relatedTarget).data().des;
                    $(e.currentTarget).find('#id').val(id);
                    $(e.currentTarget).find('#des').val(des);

                });
            });
        </script>
    </body>
</html>
