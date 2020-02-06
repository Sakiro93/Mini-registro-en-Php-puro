<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
 <head>
        <meta charset="UTF-8">
        <title>Mantenimientos</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
        
    </head>
    <body>
        
        
        <?php
          include_once './Conexion.php';
          if (isset($_GET['opc'])){
             if ($_GET['opc']=='I'){
                 $id='';
                 $des="";
                 
             }
             else {
                $con = new Conexion();
                if($_GET['Mes']=='C'){
                $registros=$con->consultar("select id_Categoria cod ,descripcion_Categoria des from categoria where id_Categoria =$_GET[id]");
                }else{
                    $registros=$con->consultar("select id_Marca cod ,descripcion_Marca des from marca where id_Marca =$_GET[id]");
                }
                if ($reg = $registros->fetch_array()) {
                   $id=$reg['cod'];
                   $des=$reg['des'];
                }
             }
             $titulo;
             $rutasalida;
             $Bandera;
             if ($_GET['Mes']=='C'){
                $titulo="Mantenimientos de Categorias";
                $rutasalida="PagConCategoria.php";
                $Bandera="C";
             }else{
                 $titulo="Mantenimientos de Marcas";
                $rutasalida="PagConMarcas.php";
                $Bandera="M";
             }
          }
          
          
        ?>
        <div class="container">
         <br><br>
         <div class="panel panel-primary">
                <div class="panel-heading">
                    <h4 class="text-center"><?=$titulo;?><span class="fa fa-cog fa-spin fa-2x fa-fw"></span></h4>
        </div>
        <div class="panel-body">
       
            <form class="form-horizontal" name="frmCategoria"  method="post" action="Grabar.php">
                <br>
                <input type="hidden" name="opc" id="opc" value='<?=$_GET['opc'];?>' /><br>    
                <input type="hidden" name="Mes" id="Mes" value='<?=$Bandera;?>' /><br>  
               
                <div class="form-group">
                    <div class="col-md-9">
                        <input type="hidden" class="form-control " name="id" maxlength="45" 
                               id="nombre" required="true" value='<?= $id; ?>'>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-xs-2" >Descripcion:</label>
                    <div class="col-xs-9">
                        <input type="text" class="form-control " name="des" maxlength="45"
                               id="descripcion" value ='<?= $des; ?>'  placeholder="Descripcion" required="true">
                    </div>
                </div>
                
                <div class="btn-group">
                    <div class="col-md-offset-4 col-md-2">
                        <button type="submit" class=" btn btn-info "><span class="glyphicon glyphicon-save"></span> Grabar</button>
                    </div>
                    
                    <div class="col-md-offset-3 col-md-2">
                        <a href='<?=$rutasalida;?>' id="btnSalir" class="btn btn-danger" <i class="glyphicon glyphicon-remove"></i> Cancelar.</a>
                     </div>
                </div>
            </form>
        </div>
         </div>     
            <?php include('./pie.php'); ?> 
        </div>    
        <script src="../../js/jquery-3.1.1.min.js" type="text/javascript"></script>
        <script src="../../js/bootstrap.min.js" type="text/javascript"></script>

    </body>
</html>