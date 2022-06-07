
<?php
require 'database.php';
$message = '';
/* el dilema esta de aca para abajo, conecta correctamente */
if (!empty($_POST['nombre_usuario']) && !empty($_POST['passwordusuario']) && !empty($_POST['PRIMER_NOMBRE']) && !empty($_POST['SEGUNDO_NOMBRE']) && !empty($_POST['PRIMER_APELLIDO']) && !empty($_POST['SEGUNDO_APELLIDO']) && !empty($_POST['TIPO_IDENTIFICACION']) && !empty($_POST['NUM_IDENTIFICACION']) && !empty($_POST['EDAD'])){
    $sql = "INSERT INTO USUARIO (nombre_usuario, passwordusuario, PRIMER_NOMBRE, SEGUNDO_NOMBRE, PRIMER_APELLIDO, SEGUNDO_APELLIDO, TIPO_IDENTIFICACION, NUM_IDENTIFICACION, EDAD, estadoUS) VALUES (:nombre_usuario, :passwordusuario, :PRIMER_NOMBRE, :SEGUNDO_NOMBRE, :PRIMER_APELLIDO, :SEGUNDO_APELLIDO, :TIPO_IDENTIFICACION, :NUM_IDENTIFICACION, :EDAD, 'activo')";
    $stmt = $con->prepare($sql);
    
    $stmt->bindParam(':nombre_usuario', $_POST['nombre_usuario']);
    $stmt->bindParam(':passwordusuario', $_POST['passwordusuario']);
    $stmt->bindParam(':PRIMER_NOMBRE', $_POST['PRIMER_NOMBRE']);
    $stmt->bindParam(':SEGUNDO_NOMBRE', $_POST['SEGUNDO_NOMBRE']);
    $stmt->bindParam(':PRIMER_APELLIDO', $_POST['PRIMER_APELLIDO']);
    $stmt->bindParam(':SEGUNDO_APELLIDO', $_POST['SEGUNDO_APELLIDO']);
    $stmt->bindParam(':TIPO_IDENTIFICACION', $_POST['TIPO_IDENTIFICACION']);
    $stmt->bindParam(':NUM_IDENTIFICACION', $_POST['NUM_IDENTIFICACION']);    
    $stmt->bindParam(':EDAD', $_POST['EDAD']);
    if ($stmt->execute()) {
        
        echo "	
				<script>

				alert('Registro exitoso');

				</script>
				";
    } else {
   	
        echo "	
				<script>

				alert('Error');

				</script>
				";
    }
}
else{
    echo "	
				<script>

				alert('Error, campos vacios');

				</script>
				";
}
?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <title>Gestor de Personas.</title>
        <!-- Favicon icon -->
        <link rel="icon" type="image/png" sizes="16x16" href="../Dashboard/ule-dashboard/assets/images/loader.gif">



        <!-- Torstr -->
        <link href="../Dashboard/ule-dashboard/assets/plugins/toastr/css/toastr.min.css" rel="stylesheet">

        <!-- Custom Stylesheet -->
        <link href="../Dashboard/ule-dashboard/assets/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css" rel="stylesheet">
        <!-- Page plugins css -->
        <link href="../Dashboard/ule-dashboard/assets/plugins/clockpicker/dist/jquery-clockpicker.min.css" rel="stylesheet">
        <!-- Color picker plugins css -->
        <link href="../Dashboard/ule-dashboard/assets/plugins/jquery-asColorPicker-master/css/asColorPicker.css" rel="stylesheet">
        <!-- Date picker plugins css -->
        <link href="../Dashboard/ule-dashboard/assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min.css" rel="stylesheet">
        <!-- Daterange picker plugins css -->
        <link href="../Dashboard/ule-dashboard/assets/plugins/timepicker/bootstrap-timepicker.min.css" rel="stylesheet">
        <link href=".../Dashboard/ule-dashboard/assets/plugins/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
        <link href="../Dashboard/ule-dashboard/assets/plugins/sweetalert/css/sweetalert.css" rel="stylesheet">



        <link href="../Dashboard/ule-dashboard/main/css/style.css" rel="stylesheet">


        <script src="../Dashboard/ule-dashboard/main/../js/modernizr-3.6.0.min.js"></script>
    </head>

    <body class="v-light vertical-nav fix-header fix-sidebar">
        <div id="preloader">
            <div class="loader">
                <svg class="circular" viewBox="25 25 50 50"><circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10"/></svg>
            </div>
        </div>
        <div id="main-wrapper">
            <!-- header -->
            <div class="header">
               
                <div class="header-content">
                   
                    <div class="header-right">
                        <ul>



                            <li class="icons"><a href="javascript:void(0)"><i class="mdi mdi-account f-s-20" aria-hidden="true"></i><div class="pulse-css"></div></a>
                                <div class="drop-down dropdown-profile animated bounceInDown">
                                    <div class="dropdown-content-body">
                                        <ul>

                                            <li><a href="../Html/logout.php"><i class="icon-power"></i> <span>Logout</span></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <!-- content body -->
            <div class="content-body">
                <div class="container">
                    <div class="row page-titles">
                        <div class="col p-0">
                            <h4>Bienvenido.</h4>
                        </div>
                        <div class="col p-0">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0)">Usuarios</a>
                                </li>
                                <li class="breadcrumb-item active">Registrar</li>
                            </ol>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="form-validation">
                                        <form class="form-valide" action="" method="post">
                                              <center> <h2>Registrar usuarios</h2> </center><br><br>
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label">Nombre Usuario<span class="text-danger">*</span>
                                                </label>
                                                <div class="col-lg-6">
                                                    <input type="text" class="form-control" id="nombre_usuario" name="nombre_usuario" placeholder="Ingrese nombre para su usuario">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label">Password de usuario<span class="text-danger">*</span>
                                                </label>
                                                <div class="col-lg-6">
                                                    <input type="password" class="form-control" id="passwordusuario" name="passwordusuario" placeholder="Ingrese la password de usuario">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label">Primer Nombre<span class="text-danger">*</span>
                                                </label>
                                                <div class="col-lg-6">
                                                    <input type="text" class="form-control" id="PRIMER_NOMBRE" name="PRIMER_NOMBRE" placeholder="Ingrese el primer nombre del usuario">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label">Segundo Nombre<span class="text-danger">*</span>
                                                </label>
                                                <div class="col-lg-6">
                                                    <input type="text" class="form-control" id="SEGUNDO_NOMBRE" name="SEGUNDO_NOMBRE" placeholder="Ingrese segundo nombre del usuario">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label">Primer apellido<span class="text-danger">*</span>
                                                </label>
                                                <div class="col-lg-6">
                                                    <input type="text" class="form-control" id="PRIMER_APELLIDO" name="PRIMER_APELLIDO" placeholder="Ingrese primer apellido del usuario">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label">Segundo Apellido<span class="text-danger">*</span>
                                                </label>
                                                <div class="col-lg-6">
                                                    <input type="text" class="form-control" id="SEGUNDO_APELLIDO" name="SEGUNDO_APELLIDO" placeholder="Ingrese segundo apellido del usuario">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label">Tipo Identificacion<span class="text-danger">*</span>
                                                </label>
                                                <div class="col-lg-6">
                                                    <input type="text" class="form-control" id="TIPO_IDENTIFICACION" name="TIPO_IDENTIFICACION" placeholder="Ingrese tipo de identificacion">
                                                </div>
                                            </div>
                                              
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label">Numero identificacion<span class="text-danger">*</span>
                                                </label>
                                                <div class="col-lg-6">
                                                    <input type="text" class="form-control" id="NUM_IDENTIFICACION" name="NUM_IDENTIFICACION" placeholder="Ingrese numero de identidad"onkeyup="this.value = validarNumeros(this.value)" maxlength="20">
                                                </div>
                                            </div>
                                              
                                            <div class="form-group row">
                                                <label class="col-lg-4 col-form-label">EDAD<span class="text-danger">*</span>
                                                </label>
                                                <div class="col-lg-6">
                                                    <input type="text" class="form-control" id="EDAD" name="EDAD" placeholder="Ingrese la edad" onkeyup="this.value = validarNumeros(this.value)" maxlength="20">
                                                </div>
                                            </div>
                                            


                                            <div class="form-group row">
                                                <div class="col-lg-8 ml-auto">
                                                    <button type="submit" class="btn btn-rounded btn-outline-success">Registrar</button>
                                                </div>
                                            </div>
                                            
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>




                <!-- #/ container -->
            </div>



            <!-- #/ content body -->
            <!-- footer -->
            <div class="footer">
                <div class="copyright">
                    <p>Copyright &copy; <a href="https://ule.merkulov.design">Ule</a> 2019, by <a href="https://1.envato.market/tf-merkulove" target="_blank">merkulove</a></p>
                </div>
            </div>
            <!-- #/ footer -->
        </div>
        <!-- Common JS -->
        <script src="../Dashboard/ule-dashboard/assets/plugins/common/common.min.js"></script>
        <!-- Custom script -->
        <script src="../Dashboard/ule-dashboard/main/js/custom.min.js"></script>
        <!-- Form Validation -->
        <script src="../Dashboard/ule-dashboard/assets/plugins/validation/jquery.validate.min.js"></script>
        <script src="../Dashboard/ule-dashboard/assets/plugins/validation/jquery.validate-init.js"></script>


        <!-- Common JS -->
        <script src="../Dashboard/ule-dashboard/assets/plugins/common/common.min.js"></script>
        <!-- Custom script -->
        <script src="../Dashboard/ule-dashboard/main/js/custom.min.js"></script>
        <script src="../Dashboard/ule-dashboard/assets/plugins/moment/moment.js"></script>
        <script src="../Dashboard/ule-dashboard/assets/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>
        <!-- Clock Plugin JavaScript -->
        <script src="../Dashboard/ule-dashboard/assets/plugins/clockpicker/dist/jquery-clockpicker.min.js"></script>
        <!-- Color Picker Plugin JavaScript -->
        <script src="../Dashboard/ule-dashboard/assets/plugins/jquery-asColorPicker-master/libs/jquery-asColor.js"></script>
        <script src="../Dashboard/ule-dashboard/assets/plugins/jquery-asColorPicker-master/libs/jquery-asGradient.js"></script>
        <script src="../Dashboard/ule-dashboard/assets/plugins/jquery-asColorPicker-master/dist/jquery-asColorPicker.min.js"></script>
        <!-- Date Picker Plugin JavaScript -->
        <script src="../Dashboard/ule-dashboard/assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
        <!-- Date range Plugin JavaScript -->
        <script src="../Dashboard/ule-dashboard/assets/plugins/timepicker/bootstrap-timepicker.min.js"></script>
        <script src="../Dashboard/ule-dashboard/assets/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>


        <script src="../Dashboard/ule-dashboard/assets/plugins/sweetalert/js/sweetalert.min.js"></script>
        <script src="../Dashboard/ule-dashboard/assets/plugins/sweetalert/js/sweetalert.init.js"></script>

        <!-- Toastr -->
        <script src="../Dashboard/ule-dashboard/assets/plugins/toastr/js/toastr.min.js"></script>
        <script src="../Dashboard/ule-dashboard/assets/plugins/toastr/js/toastr.init.js"></script>

        <script>
                                                        // MAterial Date picker
                                                        $('#mdate').bootstrapMaterialDatePicker({
                                                            weekStart: 0,
                                                            time: false
                                                        });
                                                        $('#mdateMin').bootstrapMaterialDatePicker({
                                                            weekStart: 0,
                                                            time: false,
                                                            minDate: new Date()
                                                        });
                                                        $('#date-format').bootstrapMaterialDatePicker({
                                                            format: 'dddd DD MMMM YYYY - HH:mm'
                                                        });

                                                        $('#min-date').bootstrapMaterialDatePicker({
                                                            format: 'DD/MM/YYYY HH:mm',
                                                            minDate: new Date()
                                                        });
        </script>


        <script src="../js/validarCampos.js" type="text/javascript"></script>
    </body>

</html>