 <?php  
 $connect = mysqli_connect("localhost", "root", "", "Bd_Familiares");  
 session_start();  
 /*
 if(isset($_SESSION["nombre_usuario"]))  
 {  
      header("location:../Html/Index.php");
 }  */
 
 if(isset($_POST["login"]))  
 {  
      if(empty($_POST["nombre_usuario"]) || empty($_POST["passwordusuario"]))  
      {  
           echo '<script>alert("Por favor ingrese informacion en ambos campos.")</script>';  
      }  
      else  
      {  
           $username = mysqli_real_escape_string($connect, $_POST["nombre_usuario"]);  
           $password = mysqli_real_escape_string($connect, $_POST["passwordusuario"]);  
           //$password = md5($password);  
           $query = "SELECT * FROM usuario WHERE nombre_usuario = '$username' AND passwordusuario = '$password'";  
           $result = mysqli_query($connect, $query);  
           if(mysqli_num_rows($result) >= 1)  
           {  
                $_SESSION['nombre_usuario'] = $username;  
                header("location:../Dashboard/ule-dashboard/main/template-vertical-nav/index_vertical_nav.php");
                
           }  
           else  
           {  
                echo '<script>alert("Error. Usuario o contraseña incorrectos.")</script>';  
           }  
      }  
 }  
 ?> 
<!DOCTYPE html>
<html lang="en" class="h-100" id="login-page1">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <title>Gestor de Personas.</title>
        <!-- Favicon icon -->
        <link rel="icon" type="image/png" sizes="16x16" href="../Dashboard/ule-dashboard/assets/images/loader.gif">
        <!-- Custom Stylesheet -->
        <link href="../Dashboard/ule-dashboard/main/css/style.css" rel="stylesheet">
        <script src="../Dashboard/ule-dashboard/main/js/modernizr-3.6.0.min.js"></script>
    </head>
    <body style="background-color: #b200ff;">
        
        <div class="login-bg h-100">
            <div class="container h-100">
                <div class="row justify-content-center h-100">
                    <div class="col-xl-6">
                        <div class="form-input-content">
                            <div class="card">
                                <div class="card-body">

    
                                    <h4 class="text-center m-t-15">Inicio de sesión</h4>
                                    <form class="m-t-30 m-b-30" action="index.php" method="POST">
                                        <div class="form-group">
                                            <label>Nombre de usuario</label>
                                            <input type="text" class="form-control" name="nombre_usuario" id="nombre_usuario" placeholder="Nombre de usuario">
                                        </div>
                                        <div class="form-group">
                                            <label>Contraseña</label>
                                            <input type="password" name="passwordusuario" id="passwordusuario" class="form-control" placeholder="Contraseña">
                                        </div>   
                                        <div class="text-center m-b-15 m-t-15">
<!--                                            <button style="color: #000000;" class="btn btn-rounded btn-outline-info" type="submit">Sign in</button>-->
                                            <input type="submit" name="login" value="Login" class="btn btn-info" />  
                                        </div>
                                        <li><a href="../html/usuarioIniRegistro.php">Registrar Usuario</a>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- #/ container -->
        <!-- Common JS -->
        <script src=".../Dashboard/ule-dashboard/assets/plugins/common/common.min.js"></script>
        <!-- Custom script -->
        <script src="../Dashboard/ule-dashboard/main/js/custom.min.js"></script>
    </body>

</html>