<?php
session_start();
error_reporting(0);
include('includes/config.php');

$json = file_get_contents('php://input');
$datos = json_decode($json, true);

echo '<pre>';
print_r($datos);
echo '</pre>';

if (is_array($datos)) {
    $transaccion = $datos['detalles']['id'];
    mysqli_query($con, "update orders set paymentMethod='" . $transaccion . "' where userId='" . $_SESSION['id'] . "' and paymentMethod is null ");
    unset($_SESSION['cart']);
    echo "<script> alert ('Gracias por su compra !!');
        window.location = 'order-history.php'
        </script>";
}
