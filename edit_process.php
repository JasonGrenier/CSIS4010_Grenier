<?php
include_once "global.php";
$id = intval($_POST["id"]);
$price = intval($_POST["servicePrice"]);
$desc = mysqli_real_escape_string($connection, $_POST["serviceDescription"]);
$service = mysqli_real_escape_string($connection, $_POST["serviceName"]);
mysqli_query($connection, "update Service set ServiceName = '$service', Description = '$desc', Price = '$price' where ServiceID = '$id'") or die("Contact systems administrator");
header("Location: view_services.php");