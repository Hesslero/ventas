<?php
    session_start();
    if(isset($_SESSION['usuario'])){
    //echo $_SESSION['usuario'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categorias</title>
    <?php require_once "menu.php"; ?>
</head>
<body>
        <div>
            <div class="container">
                <h1>Categorias</h1>
                <div class="row">
                    <div class="col-sm-4">
                        <form id="frmCategorias">
                            <label>Categoria</label>
                            <input type="text" class="form-control input-sm" name="categoria" id="categoria">
                            <p></p>
                            <span class="btn btn-primary" id="btnAgregaCategoria">Agregar</span>
                        </form>
                    </div>
                    <div class="col-sm-6">
                        <div id="tablaCategoriaLoad">


                        </div>                   
                    
                    </div>
                </div>            
            </div>         
        </div>
</body>
</html>
<script type="text/javascript">
    $(document).ready(function(){
        $('#tablaCategoriaLoad').load("categorias/tablaCategorias.php");

        $('#btnAgregaCategoria').click(function(){
            vacios=validarFormVacio('frmCategorias');

            if (vacios > 0){
                alertify.alert("Debes llenar todos los campos!!");
                return false;
            }

        datos=$('#frmCategorias').serialize();
        $.ajax({
            type:"POST",
            data:datos,
             url:"../procesos/categorias/agregaCategoria.php",
            success:function (r) {    
              if (r==1)  {
                  alertify.success("Categoria Agregada con Exito");
              }else {
                alertify.error("No se pudo agregar categoria");
              }

    }
}); 
});

    });

</script>



<?php

    }else{
        header("location:../index.php");
    }
?>