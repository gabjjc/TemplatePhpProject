<?php
include_once "../middleware/JWT.php";
$data = JWT::validate($_GET['jwt']);


echo "Id: " . $data['id_usuario'] . "<br>Usuario:" . $data['usuario'] . "<br> email:" . $data['email'];