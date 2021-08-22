<?php
session_start();
if (!isset($_SESSION['login'])) {
	header("Location: login1.php");
	return;
}

$login = $_SESSION['login'];
include('config.php');

$query = $conexao->query("SELECT usu_admin FROM tb_usuarios WHERE usu_login='$login'");
$row = $query->fetch_assoc();

if ($row) {
	if ($row['usu_admin'] == false) {
		header('Location: meucadastro.php');
		return;
	}
} else {
	session_destroy();
	header('Location: login1.php');
	return;
}
?>
<?php include("design1.php"); ?>
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container" style="padding-top: 20px;">
        <div class="panel panel-default">
            <div class="panel-heading">Usuários</div>
            <table class="table">
                <thead>
                <tr>
                    <th>Nome</th>
                    <th>Login</th>
                    <th>Idade</th>
                    <th>Peso</th>
                    <th>Ações</th>
                </tr>
                </thead>
                <tbody>
				<?php
				$query = $conexao->query("SELECT * FROM tb_usuarios");

				while ($row = $query->fetch_assoc()) :
					?>
                    <tr>
                        <td><?php echo $row['usu_nome']; ?></td>
                        <td><?php echo $row['usu_login']; ?></td>
                        <td><?php echo $row['usu_idade']; ?></td>
                        <td><?php echo $row['usu_peso']; ?></td>
                        <td>
                            <div class="container-fluid">
                                <div class="row">
									<?php if ($row['usu_admin']) : ?>
                                        <a href="acoes/alteraradmin.php?user=<?php echo $row['usu_codigo'] ?>&admin=0"
                                           class="btn btn-danger">Remover Admin</a>
									<?php else : ?>
                                        <a href="acoes/alteraradmin.php?user=<?php echo $row['usu_codigo'] ?>&admin=1"
                                           class="btn btn-success">Tornar Admin</a>
									<?php endif; ?>
                                    <span class="dropdown">
                                                <button class="btn btn-warning dropdown-toggle" type="button"
                                                        id="opcoes" data-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="true">
                                                    Outras ações
                                                    <span class="caret"></span>
                                                </button>
                                                <ul class="dropdown-menu" aria-labelledby="opcoes">
                                                    <li>
                                                        <a href="admin-editarusuario.php?user=<?php echo $row['usu_codigo'] ?>">
                                                            <span class="glyphicon glyphicon-pencil"
                                                                  aria-hidden="true"></span>
                                                            Editar
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="enviarvideo.php?user=<?php echo $row['usu_codigo'] ?>">
                                                            <span class="glyphicon glyphicon-facetime-video"
                                                                  aria-hidden="true"></span>
                                                            Enviar Vídeo
                                                        </a>
                                                    </li>
                                                </ul>
                                            </span>
                                </div>
                            </div>
                        </td>
                    </tr>
				<?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include("design2.php"); ?>
    
    