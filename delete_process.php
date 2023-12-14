<?php
include("global.php");
//sanitize user input
$id = intval($_GET["id"]);
//execute the query
mysqli_query($connection, "delete from Service where ServiceID = $id");
//redirect to listing page
header("Location: view_services.php");
?>