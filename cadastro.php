<?php
session_start();
include("config.php");
extract($_POST);

$sql = "select count(*) as total from tb_usuarios where usu_login = '$usuario'";
$result = mysqli_query($sql);
$row = mysqli_fetch_assoc($result);
if ($row['total'] == 1) {
	$_SESSION['usuario_existe'] = true;
	header("location:cadastro.php");
	exit;
}
?>