<?php
if (!isset($_GET['user'])) {
	header("Location: index.php");
	return;
}

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

extract($_GET);
$query = $conexao->query("SELECT * FROM tb_usuarios WHERE usu_codigo=" . $user);
if (!$query || $query->num_rows == 0) {
	header("Location: index.php");
	return;
}

$usuario = $query->fetch_assoc();
?>
<?php include("design1.php"); ?>
    <div id="page-wrapper">
        <div class="container" style="padding-top: 20px;">
            <div class="panel panel-default">
                <div class="panel-heading">Enviar um vídeo para <?php echo $usuario['usu_nome']; ?></div>
                <div class="panel-body">
					<?php
					$query = $conexao->query("SELECT * FROM tb_videos");
					if ($query->num_rows == 0) :
						?>
                        Sem vídeos disponíveis :/
					<?php else : ?>
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="embed-responsive embed-responsive-16by9">
                                        <video src="" controls></video>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th>Nome</th>
                                            <th>Ações</th>
                                        </tr>
                                        </thead>
                                        <tbody>
										<?php
										while ($row = $query->fetch_assoc()) :
											?>
                                            <tr>
                                                <td><?php echo $row['video_nome']; ?></td>
                                                <td>
                                                        <span class="dropdown">
                                                            <button class="btn btn-warning dropdown-toggle"
                                                                    type="button" id="opcoes" data-toggle="dropdown"
                                                                    aria-haspopup="true" aria-expanded="true">
                                                                Outras ações
                                                                <span class="caret"></span>
                                                            </button>
                                                            <ul class="dropdown-menu" aria-labelledby="opcoes">
                                                                <li>
                                                                    <a href="#"
                                                                       onclick="javascript:verVideo('<?php echo 'videos/' . $row['video_arquivo_nome'] ?>')">
                                                                        <span class="glyphicon glyphicon-facetime-video"
                                                                              aria-hidden="true"></span>
                                                                        Ver prévia
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a href="<?php echo 'acoes/enviarvideousuario.php?usuario=' . $_GET['user'] . '&video=' . $row['video_codigo'] ?>">
                                                                        <span class="glyphicon glyphicon-send"
                                                                              aria-hidden="true"></span>
                                                                        Enviar esse
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </span>
                                                </td>
                                            </tr>
										<?php endwhile; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
					<?php endif; ?>
                </div>
                <div class="panel-footer">
                    <form action="<?php echo $site . '/acoes/enviarvideo.php' ?>" method="POST"
                          enctype="multipart/form-data">
                        Enviar um novo vídeo agora
                        <input type="file" accept="video/*" name="video" required/>
                        <input type="submit" class="btn btn-success" value="Enviar"/>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /#page-wrapper -->
    <script>
        function verVideo(url) {
            document.getElementsByTagName('video')[0].src = url;
        }
    </script>
<?php include("design2.php"); ?>