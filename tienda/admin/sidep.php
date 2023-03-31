<?php
session_start();
include('include/config.php');
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin| Actualizar Contraseña</title>
    <link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
    <link type="text/css" href="css/theme.css" rel="stylesheet">
    <link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
    <link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600' rel='stylesheet'>

</head>

<body>
    <?php include('include/header.php'); ?>

    <div class="span3">
        <div class="sidebar">
            <ul class="widget widget-menu unstyled">
                <li>
                    <a class="collapsed" data-toggle="collapse" href="#togglePages">
                        <i class="menu-icon icon-cog"></i>
                        <i class="icon-chevron-down pull-right"></i><i class="icon-chevron-up pull-right"></i>
                        Administrar pedidos
                    </a>
                    <ul id="togglePages" class="collapse unstyled">
                        <li>
                            <a href="todays-orders.php">
                                <i class="icon-tasks"></i>
                                Pedidos de hoy

                            </a>
                        </li>
                        <li>
                            <a href="pending-orders.php">
                                <i class="icon-tasks"></i>
                                Pedidos pendientes

                            </a>
                        </li>
                        <li>
                            <a href="delivered-orders.php">
                                <i class="icon-inbox"></i>
                                Pedidos entregados

                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="manage-users.php">
                        <i class="menu-icon icon-group"></i>
                        Administrar usuarios
                    </a>
                </li>
            </ul>
            <ul class="widget widget-menu unstyled">
                <li><a href="category.php"><i class="menu-icon icon-tasks"></i> Crear Categoria </a></li>
                <li><a href="subcategory.php"><i class="menu-icon icon-tasks"></i>Sub Categoria </a></li>
                <li><a href="insert-product.php"><i class="menu-icon icon-paste"></i>Insertar Producto </a></li>
                <li><a href="manage-products.php"><i class="menu-icon icon-table"></i>Administrar Productos </a></li>

            </ul>
            <!--/.widget-nav-->

            <ul class="widget widget-menu unstyled">
                <li><a href="user-logs.php"><i class="menu-icon icon-tasks"></i>Usuarios Log</a></li>
                <li>
                    <a href="logout.php">
                        <i class="menu-icon icon-signout"></i>
                        Cerrar Sesión
                    </a>
                </li>
            </ul>
        </div>
        <!--/.sidebar-->
    </div>
    <!--/.span3-->

    <?php include('include/footer.php'); ?>

    <script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
    <script src="scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
    <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="scripts/flot/jquery.flot.js" type="text/javascript"></script>
</body>

</html>