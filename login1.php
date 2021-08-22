<?php
session_start();
if (isset($_SESSION['login'])) {
	header("Location: meucadastro.php");
	return;
}

$error = NULL;
if (isset($_POST['login'])) {
	include("config.php");
	extract($_POST);
	$consulta = $conexao->query("select * from tb_usuarios where usu_login = '$login' and usu_senha = '$senha'");
	$resultado = $consulta->fetch_assoc();
	if ($resultado) {
		$_SESSION['login'] = $resultado['usu_login'];
		header("Location: meucadastro.php");
		return;
	} else {
		$error = "Usuário ou senha inválido.<br/>";
	}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords"
          content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 4 admin, bootstrap 4, css3 dashboard, bootstrap 4 dashboard, severny admin bootstrap 4 dashboard, frontend, responsive bootstrap 4 admin template, my admin design, my admin dashboard bootstrap 4 dashboard template">
    <meta name="description"
          content="My Admin is powerful and clean admin dashboard template, inpired from Bootstrap Framework">
    <meta name="robots" content="noindex,nofollow">
    <title>My Admin Template by WrapPixel</title>
    <link rel="canonical" href="https://www.wrappixel.com/templates/myadmin-lite/"/>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <!-- Bootstrap Core CSS -->
    <link href="bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Menu CSS -->
    <link href="bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
<!-- Preloader -->
<div class="preloader">
    <div class="cssload-speeding-wheel"></div>
</div>
<div id="wrapper">
    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-static-top" style="margin-bottom: 0">
        <div class="navbar-header"><a class="navbar-toggle hidden-sm hidden-md hidden-lg " href="javascript:void(0)"
                                      data-toggle="collapse" data-target=".navbar-collapse"><i class="ti-menu"></i></a>
            <div class="top-left-part"><a class="logo" href="index.php"><i
                            class="glyphicon glyphicon-fire"></i>&nbsp;<span class="hidden-xs">Fitlife</span></a></div>
            <ul class="nav navbar-top-links navbar-left hidden-xs">
                <li><a href="javascript:void(0)" class="open-close hidden-xs hidden-lg waves-effect waves-light"><i
                                class="ti-arrow-circle-left ti-menu"></i></a></li>
            </ul>

        </div>
        <!-- /.navbar-header -->
        <!-- /.navbar-top-links -->
        <!-- /.navbar-static-side -->
    </nav>
	<?php include('comum/navbar.php'); ?>
    <!-- /.sidebar-collapse -->
</div>
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row bg-title " style="background: none;">
            <div class="col-lg-12">
                <h4 class="page-title text-center">Login</h4>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- row -->

        <div class="col-md-8 col-xs-12">
            <div class="white-box" style="width: 50%; margin-left: auto;">
                <form class="form-horizontal form-material" action="?" method="POST">
					<?php if (isset($error)): ?>
                        <div class="alert alert-danger"><?php echo $error ?></div>
					<?php endif; ?>
                    <div class="form-group">
                        <label class="col-md-12">Login</label>
                        <div class="col-md-12">
                            <input type="text" placeholder="Johnathan Doe" name="login"
                                   class="form-control form-control-line">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-12">Senha</label>
                        <div class="col-md-12">
                            <input type="password" placeholder="*********" name="senha"
                                   class="form-control form-control-line">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-12">
                            <button class="btn btn-success">Entrar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /.row -->

</div>
<!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
<footer class="footer text-center"> 2020 &copy; Myadmin brought to you by <a href="https://www.wrappixel.com/">wrappixel.com</a>
</footer>
</div>
<!-- /#wrapper -->
<!-- jQuery -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap Core JavaScript -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Menu Plugin JavaScript -->
<script src="bower_components/metisMenu/dist/metisMenu.min.js"></script>
<!--Nice scroll JavaScript -->
<script src="js/jquery.nicescroll.js"></script>
<!--Wave Effects -->
<script src="js/waves.js"></script>
<!-- Custom Theme JavaScript -->
<script src="js/myadmin.js"></script>
</body>

</html>