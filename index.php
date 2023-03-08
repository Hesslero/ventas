<?php
    require_once "clases/Conexion.php";
    $obj = new conectar();
    $conexion = $obj->conexion();

    $sql= "SELECT * FROM usuarios where email='admin'";
    $result=mysqli_query($conexion,$sql);
    $validar=0;
    if(mysqli_num_rows($result)>0){
        $validar=1;
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login de Usuario</title>
    <link rel="stylesheet" type="text/css" href="librerias/bootstrap/css/bootstrap.css">
    <script src="librerias/jquery-3.2.1.min.js"></script>    
    <script src="js/funciones.js"></script>
</head>
<body style="background-color:gray">
    <br><br><br>
    <div class="container">
        <div class="row">
            <div class="col-sm-4"></div>
            <div class="col-sm-4">            
                <div class="panel panel-primary">
                    <div class="panel panel-heading">Sistema de Ventas y Almacén</div>
                    <div class="panel panel-body">
                        <p>
                            <img src="img/ventas.jpg" height="190">
                        </p>
                        <form id="frmLogin" action="">
                                <label>Usuario</label>
                                <input type="text" class="form-control input-sm" name="usuario" id="usuario">
                                <label>Password</label>
                                <input type="password" class="form-control input-sm" name="password" id="password">
                                <p></p>
                                <span class="btn btn-primary btn-sm" id="entrarSistema">Entrar</span>
                                <!-- <a href="registro.php" class="btn btn-danger btn-sm">Registrar</a> -->
                                <?php if(!$validar): ?>
                                    <a href="registro.php" class="btn btn-danger btn-sm">Registrar</a>
                                <?php endif; ?>
                                

                        </form>
                        
                    </div>
                </div>
            </div>
            <div class="col-sm-4"></div>
        </div>
    </div>
</body>
</html>

<script type="text/javascript">
    $(document).ready(function(){
        $('#entrarSistema').click(function(){
            vacios=validarFormVacio('frmLogin');

            if (vacios > 0){
                alert("Debes llenar todos los campos!!");
                return false;
            }

            datos=$('#frmLogin').serialize();
                $.ajax({
                    type:"POST",
                    data:datos,
                    url:"procesos/regLogin/login.php",
                    success:function (r) {   

                        if(r==1){
                            window.location="vistas/inicio.php";
                        }else{
                            alert("No se pudo acceder :(");
                        }

                    }
                });
            });
    });
</script>