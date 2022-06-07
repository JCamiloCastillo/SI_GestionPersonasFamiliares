
<?php

include_once 'database.php';
$sentencia_select = $con->prepare("SELECT PARENTESCO, PRIMER_NOMBRE, SEGUNDO_NOMBRE, PRIMER_APELLIDO, SEGUNDO_APELLIDO, TIPO_IDENTIFICACION, NUME_IDENTIFICACION, EDAD
                                            FROM PERSONAS_FAMILIARES WHERE estadoP = 'activo' ORDER BY PRIMER_NOMBRE ASC");
$sentencia_select->execute();
$resultado = $sentencia_select->fetchAll();


// metodo buscar
if (isset($_POST['btn_buscar'])) {
    $buscar_text = $_POST['buscar'];
    $select_buscar = $con->prepare("SELECT PARENTESCO, PRIMER_NOMBRE, SEGUNDO_NOMBRE, PRIMER_APELLIDO, SEGUNDO_APELLIDO, TIPO_IDENTIFICACION, NUME_IDENTIFICACION, EDAD
    FROM PERSONAS_FAMILIARES WHERE estadoP = 'activo' AND NUME_IDENTIFICACION LIKE :campo ORDER BY PRIMER_NOMBRE ASC;"
    );

    $select_buscar->execute(array(
        ':campo' => "%" . $buscar_text . "%"
    ));

    $resultado = $select_buscar->fetchAll();
}
?>

<?php
include_once 'database.php';

if (isset($_POST['btn_buscar_again'])) {

    $sentencia_select = $con->prepare("SELECT PARENTESCO, PRIMER_NOMBRE, SEGUNDO_NOMBRE, PRIMER_APELLIDO, SEGUNDO_APELLIDO, TIPO_IDENTIFICACION, NUME_IDENTIFICACION, EDAD
                                                FROM PERSONAS_FAMILIARES WHERE estadoP = 'activo' ORDER BY PRIMER_NOMBRE ASC");
    $sentencia_select->execute();
    $resultado = $sentencia_select->fetchAll();
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
        <link href="../Dashboard/ule-dashboard/sasets/plugins/sweetalert/css/sweetalert.css" rel="stylesheet">



        <link href="../Dashboard/ule-dashboard/main/css/style.css" rel="stylesheet">
        <script src="../Dashboard/ule-dashboard/main/../js/modernizr-3.6.0.min.js"></script>
    </head>

    <body class="v-light vertical-nav fix-header fix-sidebar">
        <form action="empleadosModificar.php" method="POST">

            <div id="preloader">
                <div class="loader">
                    <svg class="circular" viewBox="25 25 50 50"><circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10"/></svg>
                </div>
            </div>
            <div id="main-wrapper">
                <!-- header -->
                <div class="header">
                    <div class="nav-header">
                        <div class="brand-logo"><a href="../Dashboard/ule-dashboard/dashboardIndex.php"><img style="width: 70px; height: 40px;" src="../Dashboard/ule-dashboard/assets/images/loader.gif"></a>
                        </div>

                    </div>
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
                <!-- #/ header -->
                <!-- sidebar -->
                <div class="nk-sidebar">
                    <div class="nk-nav-scroll">
                        <ul class="metismenu" id="menu">
                            <li class="nav-label">Menú</li>
                            <li><a href="../Dashboard/ule-dashboard/dashboardIndex.php"><i class=" mdi mdi-view-dashboard"></i> <span class="nav-text">Inicio</span></a>
                            </li>
                            <li class="nav-label">Modúlos</li>


                            <li><a class="has-arrow" href="#" aria-expanded="false"><i class="mdi mdi-nfc-variant"></i> <span class="nav-text">Empleados</span></a>
                                <ul aria-expanded="false">
                                    <li><li><a class="has-arrow" href="#" aria-expanded="false"><i class="mdi mdi-nfc-variant"></i> <span class="nav-text">Usuarios</span></a>
                                        <ul aria-expanded="false">
                                            <li><a href="../html/usuariosRegistrar.php">Crear Usuario</a>
                                            </li>
                                            <li><a href="../html/usuariosBuscar.php">Buscar Usuario</a>
                                            </li>
                                            <li><a href="../html/usuariosModificar.php">Modificar Usuario</a>
                                            </li>
                                    </li>
                                </ul>
                            </li>
                            </li>
                            <li><a href="../html/empleadosRegistrar.php">Crear Persona</a>
                            </li>
                            <li><a href="../html/empleadosBuscar.php">Buscar Persona</a>
                            </li>
                            <li><a href="../html/empleadosModificar.php">Modificar Persona</a>
                            </li>
                            <li><a href="../html/empleadosEliminar.php">Eliminar Persona</a>
                            </li>
                        </ul>
                        </li>

                        </ul>
                    </div>
                    <!-- #/ nk nav scroll -->
                </div>
                <!-- #/ sidebar -->
                <!-- content body -->
                <div class="content-body">
                    <div class="container">
                        <div class="row page-titles">
                            <div class="col p-0">
                                <h4>Bienvenido.</h4>
                            </div>
                            <div class="col p-0">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="javascript:void(0)">Personas</a>
                                    </li>
                                    <li class="breadcrumb-item active">Modificar</li>
                                </ol>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="form-validation">
                                            <form class="form-valide" action="#" method="post">
                                                <center> <h2>Modificar personas</h2> </center><br><br>
                                                <div class="form-group row">

                                                    <label class="col-lg-4 col-form-label">N° identificacion de la persona<span class="text-danger">*</span>
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <input type="text" class="form-control" id="buscar" name="buscar" value="<?php if (isset($buscar_text)) echo $buscar_text; ?>" placeholder="Ingrese el N° de identificacion de la persona" onkeyup="this.value = validarNumeros(this.value)" maxlength="12">
                                                    </div>
                                                </div>



                                                <div class="form-group row">
                                                    <div class="col-lg-8 ml-auto">
                                                        <button type="submit" name="btn_buscar" class="btn btn-rounded btn-outline-secondary">Buscar Registro</button>
                                                        <button type="submit"name="btn_buscar_again" id="btn_buscar_again" class="btn btn-rounded btn-outline-info">Buscar todos los registros</button>
                                                    </div>
                                                </div>


                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <h4 class="card-title">Personas Registradas</h4>
                                                                <div class="table-responsive">
                                                                    <table class="table table-bordered table-striped verticle-middle">
                                                                        <thead>
                                                                            <tr>
                                                                                <th scope="col">Parentesco</th>
                                                                                <th scope="col">Primer Nombre</th>
                                                                                <th scope="col">Segundo Nombre</th>
                                                                                <th scope="col">Primer Apellido</th>
                                                                                <th scope="col">Segundo Apellido</th>
                                                                                <th scope="col">Tipo Identificacion</th>
                                                                                <th scope="col">Numero Identidad</th>
                                                                                <th scope="col">Edad</th>
                                                                                <th scope="col">Accion</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <tr>
                                                                                <?php foreach ($resultado as $fila): ?>
                                                                                <tr >
                                                                                    <td><?php echo $fila['PARENTESCO']; ?></td>
                                                                                    <td><?php echo $fila['PRIMER_NOMBRE']; ?></td>
                                                                                    <td><?php echo $fila['SEGUNDO_NOMBRE']; ?></td>
                                                                                    <td><?php echo $fila['PRIMER_APELLIDO']; ?></td>
                                                                                    <td><?php echo $fila['SEGUNDO_APELLIDO']; ?></td>
                                                                                    <td><?php echo $fila['TIPO_IDENTIFICACION']; ?></td>
                                                                                    <td><?php echo $fila['NUME_IDENTIFICACION']; ?></td>
                                                                                    <td><?php echo $fila['EDAD']; ?></td>
                                                                                    <td><a onclick="modificar(<?php echo $fila['NUME_IDENTIFICACION']; ?>)" class="btn btn-rounded btn-warning" >Modificar</a></td>
                                                                                </tr>
                                                                            <?php endforeach ?>
                                                                            </tr>

                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>




                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--                <div class="col-lg-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <h4 class="card-title">Sweet Success</h4>
                                                <div class="card-content">
                                                    <div class="sweetalert m-t-30">
                                                        <button class="btn btn-success btn sweet-success">Sweet Success</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                         /# card 
                                    </div>-->


                    <!--                <div class="col-lg-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <h4 class="card-title">Toastr Bottom Center</h4>
                                                <div class="card-content">
                                                    <div class="toastr m-t-15">
                                                        <div class="text-left">
                                                            <button type="button" class="btn btn-success m-b-10 m-l-5" id="toastr-success-bottom-center">Success</button>
                                                            <button type="button" class="btn btn-info m-b-10 m-l-5" id="toastr-info-bottom-center">Info</button>
                                                            <button type="button" class="btn btn-warning m-b-10 m-l-5" id="toastr-warning-bottom-center">Warning</button>
                                                            <button type="button" class="btn btn-danger m-b-10 m-l-5" id="toastr-danger-bottom-center">Error</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                         /# card 
                                    </div>-->

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


            <script src="../js/validarCampos.js" type="text/javascript"></script>

        </form>
    </body>

</html>