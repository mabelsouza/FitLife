<?php
session_start();
if (!isset($_SESSION['login'])) {
	header("Location: login1.php");
	return;
}

include('./config.php');
$query = $conexao->query("SELECT * FROM tb_usuarios WHERE usu_login='" . $_SESSION['login'] . "'");
$user = $query->fetch_assoc();

?>
<!DOCTYPE html>

<?php include("design1.php"); ?>

<!-- Page Content -->
<div id="page-wrapper">
    <div class="container" style="padding-top: 20px;">
        <div class="panel panel-default">
            <div class="panel-heading">Videos</div>
			<?php
			$query = $conexao->query("SELECT video_nome, video_arquivo_nome FROM tb_usuario_video "
				. "LEFT JOIN tb_videos ON tb_videos.video_codigo=tb_usuario_video.video_codigo "
				. "WHERE usu_codigo='" . $user['usu_codigo'] . "'");

			if ($query->num_rows == 0) :
				?>
                <div class="panel-body">Nenhum vídeo recebido</div>
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
                                            <button class="btn btn-success"
                                                    onclick="javascript:verVideo('<?php echo $site . 'videos/' . $row['video_arquivo_nome'] ?>')">
                                                <span class="glyphicon glyphicon-facetime-video"
                                                      aria-hidden="true"></span>
                                                Ver
                                            </button>
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
    </div>
</div>

<script>
    function verVideo(url) {
        document.getElementsByTagName('video')[0].src = url;
    }
</script>
<?php include("design2.php"); ?>
   