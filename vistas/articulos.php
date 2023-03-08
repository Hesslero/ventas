<?php
    session_start();
    if(isset($_SESSION['usuario'])){

    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Articulos</title>
    <?php require_once "menu.php"; ?>  
</head>
<body>
    <div class="container">
        <h1>Artículos</h1>
        <div class="row">
            <div class="col-sm-4">
                <form id="frmArticulos" enctype="multipart/form-data">
                    <label>Categoria</label>
                    <select name="categoriaSelect" id="categoriaSelect" class="form-control input-sm">
                        <option value="A">Selecciona Categoria</option>
                    </select>
                    <label>Nombre</label>
                    <input type="text" class="form-control input-sm" name="nombre" id="nombre">
                    <label>Descripción</label>
                    <input type="text" class="form-control input-sm" name="descripcion" id="descripcion">
                    <label>Cantidad</label>
                    <input type="text" class="form-control input-sm" name="cantidad" id="cantidad">
                    <label>Precio</label>
                    <input type="text" class="form-control input-sm" name="precio" id="precio">
                    <label>Imagen</label>
                    <input type="file" id="imagen" name="imagen">
                    <p></p>
                    <span id="btnAgregarArticulo" class="btn btn-primary">Agregar</span>
               </form>
            </div>
            <div class="col-sm-8">
               <div id="tablaArticulosLoad"></div>
              
            </div>
        </div>
    </div>
</body>
</html>

<script type="text/javascript">
    $(document).ready(function(){
        $('#tablaArticulosLoad').load("articulos/tablaArticulos.php");

        $('#btnAgregarArticulo').click(function(){
            vacios=validarFormVacio('frmArticulos');

            if (vacios > 0){
                alertify.alert("Debes llenar todos los campos!!");
                return false;
            }

        datos=$('#frmArticulos').serialize();
        $.ajax({
            type:"POST",
            data:datos,
             url:"../procesos/articulos/agregaArticulos.php",
            success:function (r) {    
              if (r==1)  {
                  alertify.success("Artículo agregado con éxito");
              } else {
                alertify.error("No se pudo agregar el artículo");
              }

            }   
        }); 
    });
});

</script>

<?php
    
    } else {
        header("location:../index.php");
    }
?>
