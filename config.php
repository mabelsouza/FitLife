<?php
if (session_status() === PHP_SESSION_NONE) session_start();

$conexao = new mysqli("arioliveira.duckdns.org", "root", 'ifrn', "db_fitlife", 3106);
date_default_timezone_set('America/Sao_Paulo');
mysqli_set_charset($conexao, "utf8");

ini_set('default_charset', 'UTF-8');
if (mysqli_connect_errno())
	die(mysqli_connect_errno());

$site = 'http://arioliveira.duckdns.org:3110/alunos/edfisica/desenvolvimento/pi';