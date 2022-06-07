
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <title>Gestor de Personas.</title>
        <!-- Favicon icon -->
        <link rel="icon" type="image/png" sizes="16x16" href="../../assets/images/loader.gif">
        <link href="../css/style.css" rel="stylesheet">
        <script src="../js/modernizr-3.6.0.min.js"></script>
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
                <div class="nav-header">
                    <div class="brand-logo"><a href=""><img style="width: 70px; height: 40px;" src="../../assets/images/loader.gif"></a>
                    </div>               
                </div>
                <div class="header-content"> 
                    <div class="header-right">
                        <ul>
                            <li class="icons"><a href="javascript:void(0)"><i class="mdi mdi-account f-s-20" aria-hidden="true"></i><div class="pulse-css"></div></a>
                                <div class="drop-down dropdown-profile animated bounceInDown">
                                    <div class="dropdown-content-body">
                                        <ul>

                                            <li><a href="../../../../Html/logout.php"><i class="icon-power"></i> <span>Logout</span></a>
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
                        <li><a href="../indexMain.php"><i class=" mdi mdi-view-dashboard"></i> <span class="nav-text">Inicio</span></a>
                        </li>
                        <li class="nav-label">Modúlos</li>
                       

                        <li><a class="has-arrow" href="#" aria-expanded="false"><i class="mdi mdi-nfc-variant"></i> <span class="nav-text">Personas</span></a>
                            <ul aria-expanded="false">
                                <li><li><a class="has-arrow" href="#" aria-expanded="false"><i class="mdi mdi-nfc-variant"></i> <span class="nav-text">Usuarios</span></a>
                                    <ul aria-expanded="false">
                                        <li><a href="../../../../Html/usuariosRegistrar.php">Crear Usuario</a>
                                        </li>
                                        <li><a href="../../../../Html/usuariosBuscar.php">Buscar Usuario</a>
                                        </li>
                                        <li><a href="../../../../Html/usuariosModificar.php">Modificar Usuario</a>
                                        </li>
                                </li>
                            </ul>
                        </li>
                        </li>
                        <li><a href="../../../../Html/empleadosRegistrar.php">Crear Persona</a>
                        </li>
                        <li><a href="../../../../Html/empleadosBuscar.php">Buscar Persona</a>
                        </li>
                        <li><a href="../../../../Html/empleadosModificar.php">Modificar Persona</a>
                        </li>
                        <li><a href="../../../../Html/empleadosEliminar.php">Eliminar Persona</a>
                        </li>
                    </ul>
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
                                <li class="breadcrumb-item"><a href="javascript:void(0)">Menú principal</a>
                                </li>
                                <li class="breadcrumb-item active">Administrador</li>
                            </ol>
                        </div>
                    </div>

                    

                    <?php
                    require '../../../../Html/database.php';
                    $sql = "SELECT PARENTESCO, PRIMER_NOMBRE, SEGUNDO_NOMBRE, PRIMER_APELLIDO, SEGUNDO_APELLIDO, TIPO_IDENTIFICACION, NUME_IDENTIFICACION, EDAD
                            FROM PERSONAS_FAMILIARES WHERE estadoP = 'activo' ORDER BY PRIMER_NOMBRE DESC limit 10";
                    $records = $con->prepare($sql);
                    $records->bindParam(':id', $_SESSION['users_id']);
                    $records->execute();
                    $tabla = '';
                    while ($results = $records->fetch(PDO::FETCH_ASSOC)) {
                        $tabla .= "<tr>";
                        $tabla .= "<td>$results[PARENTESCO]</td>";
                        $tabla .= "<td>$results[PRIMER_NOMBRE]</td>";
                        $tabla .= "<td>$results[SEGUNDO_NOMBRE]</td>";
                        $tabla .= "<td>$results[PRIMER_APELLIDO]</td>";
                        $tabla .= "<td>$results[SEGUNDO_APELLIDO]</td>";
                        $tabla .= "<td>$results[TIPO_IDENTIFICACION]</td>";
                        $tabla .= "<td>$results[NUME_IDENTIFICACION]</td>";
                        $tabla .= "<td>$results[EDAD]</td>";
                        $tabla .= "</tr>";
                    }
                    ?> 

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Totalidad de Personas</h4>
                                     <br>
                                    <a href="../../../../Html/empleadosRegistrar.php" class="btn btn-rounded btn-success">Registrar nuevo</a>
                                    <div class="table-responsive">
                                        <br>
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
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <tr>
                                                                            <?php
                                                                            echo $tabla
                                                                            ?>
                                                                        </tr>

                                            </tbody>
                                        </table>
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
        <script src="../../assets/plugins/common/common.min.js"></script>
        <!-- Custom script -->
        <script src="../js/custom.min.js"></script>
        <!-- Chartjs chart -->
        <script src="../../assets/plugins/chartjs/Chart.bundle.js"></script>
        <!-- Custom dashboard script -->
        <script src="../js/dashboard-1.js"></script>
    </body>

</html>