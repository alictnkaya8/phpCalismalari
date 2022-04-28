<?php

session_start();

$gelenDilSecimi = $_GET["dilSecimi"];
$_SESSION["siteDili"] = $gelenDilSecimi;
header("Location:index.php");
exit();
?>