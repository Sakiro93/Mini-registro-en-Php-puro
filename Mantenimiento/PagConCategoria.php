<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Categoria</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <?php include './Conexion.php'; ?>

        <div id="eliminar" class="modal fade">
            <div class="modal-dialog">   
                <div class="modal-content"> 
                    <div class="modal-header bg-warning">
                        <h4 class="text-center"><span class="fa fa-cog fa-spin fa-2x fa-fw"></span>Categorias</h4>         
                    </div>
                    <div class="modal-body">
                        <form class="form-horizontal" name="frmCategoia"  method="post" action="Grabar.php"> 
                            <div class="row">
                                <input type="hidden" name="opc" id="opc" value='E' /><br>
                                <input type="hidden" name="id" id="id"  value='' /><br>
                                <input type="hidden" name="Mes" id="Mes"  value='C' /><br>
                                <label class="control-label col-md-8">Esta Seguro de Eliminar A:</label>
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
                    <h4 class="text-center"><span class="fa fa-cog fa-spin fa-2x fa-fw"></span>Consulta de Categorias</h4>         
                </div>

            </div>
            <br>

            <a href="Mantenimiento.php?id=0&opc=I&Mes=C" id="btnNuevo" class="btn btn-warning" title="Nuevo Registro"><i class="glyphicon glyphicon-file"></i> Nuevo Registro</a>
            <a href="../Menu.php?" id="btnsalir" class="btn btn-info" title="Salir"><i class="glyphicon glyphicon-home"></i> Menú</a>
            <br><br>
            <form name="form1" method="post" action="PagConCategoria.php" id="cdr" >
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
                                <th>Id</th>
                                <th>Descripcion</th>
                                <th class="text-center">Accion</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $busca = "";
                            if (isset($_POST['buscador'])) {
                                $busca = $_POST['buscador'];
                            }
                            $con = new Conexion();
                            $registros = $con->consultar("select id_Categoria cod,descripcion_Categoria des from categoria where descripcion_Categoria LIKE '%" . $busca . "%'");

                            while ($reg = $registros->fetch_array()) {
                                $id = $reg['cod'];
                                $des = $reg['des'];
                                ?>
                                <tr>
                                    <td><?= $id; ?></td>
                                    <td><?= $des; ?></td>
                                    <td class="text-center">
                                        <a href="Mantenimiento.php?id=<?= $id ?>&opc=M&Mes=C" rel="edit" class="btn btn-success btn-sm"> <i class="glyphicon glyphicon-edit"></i> Editar</a>
                                        <a id="openmodal" data-toggle="modal" href="#eliminar" data-id="<?= $id ?>" data-des="<?= $des ?>"  class="btn btn-danger btn-sm"><i class="glyphicon glyphicon-remove"></i> Eliminar</a>
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
