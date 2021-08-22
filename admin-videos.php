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
    <div id="page-wrapper">
        <div class="container" style="padding-top: 20px;">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-md-6">Categorias</div>
                                        <div class="col-md-6">
                                            <span href="#" class="text-primary pull-right" data-toggle="modal"
                                                  data-target="#novaCategoria"
                                                  style="cursor: pointer">Nova categoria</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
							<?php
							$categorias = [];
							$query = $conexao->query("SELECT * FROM tb_categorias");
							if ($query->num_rows == 0) :
								?>
                                <div class="panel-body">
                                    Sem categorias disponíveis :/
                                </div>
							<?php else : ?>
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>Categoria</th>
                                        <th>Ações</th>
                                    </tr>
                                    </thead>
                                    <tbody>
									<?php
									while ($row = $query->fetch_assoc()) :
										array_push($categorias, ['categoria_id' => $row['categoria_id'], 'categoria_nome' => $row['categoria_nome']]);
										?>
                                        <tr>
                                            <td><?php echo $row['categoria_nome']; ?></td>
                                            <td>
                                                <span class="dropdown">
                                                    <button class="btn btn-warning dropdown-toggle" type="button"
                                                            id="opcoes" data-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="true">
                                                        Outras ações
                                                        <span class="caret"></span>
                                                    </button>
                                                    <ul class="dropdown-menu" aria-labelledby="opcoes">
                                                        <li>
                                                            <a href="#" data-toggle="modal" data-target="#editarCategoria"
                                                            onclick="editarCategoria(<?php echo $row['categoria_id']; ?>, '<?php echo $row['categoria_nome']; ?>')">
                                                                <span class="glyphicon glyphicon-pencil"
                                                                      aria-hidden="true"></span>
                                                                Editar
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="<?php echo "$site/acoes/deletarcategoria.php?id=" . $row['categoria_id'] ?>">
                                                                <span class="glyphicon glyphicon-trash"
                                                                      aria-hidden="true"></span>
                                                                Excluir
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </span>
                                            </td>
                                        </tr>
									<?php endwhile; ?>
                                    </tbody>
                                </table>
							<?php endif; ?>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-md-6">Vídeos</div>
                                        <div class="col-md-6">
                                            <span href="#" class="text-primary pull-right" data-toggle="modal"
                                                  data-target="#novoVideo" style="cursor: pointer">Novo vídeo</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
							<?php
							$query = $conexao->query("SELECT * FROM tb_videos");
							if ($query->num_rows == 0) :
								?>
                                <div class="panel-body">
                                    Sem vídeos disponíveis :/
                                </div>
							<?php else : ?>
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>Nome</th>
                                        <th>Categorias</th>
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
												<?php
												$query = $conexao->query("SELECT vc.categoria_id AS cat FROM tb_videos AS v LEFT JOIN tb_video_categoria AS vc ON vc.video_codigo=v.video_codigo");
												$video_categorias = [];
												while ($cat = $query->fetch_assoc())
													array_push($video_categorias, $cat['cat']);

												foreach ($categorias as $c) {
													echo '<div class="input-group">';
													if (in_array($c['categoria_id'], $video_categorias))
														echo '<input onclick="javascript:alterarCategoria(this, ' . $row['video_codigo'] . ')" type="checkbox" name="' . $c['categoria_nome'] . '" id="cat-' . $c['categoria_id'] . '" checked/>';
													else
														echo '<input onclick="javascript:alterarCategoria(this, ' . $row['video_codigo'] . ')" type="checkbox" name="' . $c['categoria_nome'] . '" id="cat-' . $c['categoria_id'] . '"/>';
													echo '<label for="cat-' . $c['categoria_id'] . '">  ' . $c['categoria_nome'] . '</label>';
													echo '</div>';
												}
												?>
                                            </td>
                                            <td>
                                                <span class="dropdown">
                                                    <button class="btn btn-warning dropdown-toggle" type="button"
                                                            id="opcoes" data-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="true">
                                                        Outras ações
                                                        <span class="caret"></span>
                                                    </button>
                                                    <ul class="dropdown-menu" aria-labelledby="opcoes">
                                                        <li>
                                                            <a href="<?php echo $site . "/acoes/deletarvideo.php?id=" . $row['video_codigo']; ?>">
                                                                <span class="glyphicon glyphicon-trash"
                                                                      aria-hidden="true"></span>
                                                                Excluir
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </span>
                                            </td>
                                        </tr>
									<?php endwhile; ?>
                                    </tbody>
                                </table>
							<?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" tabindex="-1" role="dialog" id="novaCategoria">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Nova categoria</h4>
                </div>
                <div class="modal-body">
                    <form action="<?php echo $site . '/acoes/criarcategoria.php' ?>" method="POST">
                        <input class="form-control" type="text" name="categoria" placeholder="Minha nova categoria"
                               required/>
                        <input type="submit" class="btn btn-success" value="Criar"/>
                    </form>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>
    <div class="modal fade" tabindex="-1" role="dialog" id="editarCategoria">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Editar categoria</h4>
                </div>
                <div class="modal-body">
                    <form action="<?php echo $site . '/acoes/editarcategoria.php' ?>" method="POST">
                        <input class="form-control" type="hidden" name="id" id="editandocategoriaid"/>
                        <input class="form-control" type="text" name="categoria" id="editandocategoria"
                               required/>
                        <input type="submit" class="btn btn-success" value="Pronto"/>
                    </form>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>
    <div class="modal fade" tabindex="-1" role="dialog" id="novoVideo">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Novo vídeo</h4>
                </div>
                <div class="modal-body">
                    <form action="<?php echo $site . '/acoes/enviarvideo.php' ?>" method="POST"
                          enctype="multipart/form-data">
                        <div>
                            Vídeo
                            <input class="form-control" type="file" accept="video/*" name="video" required/>
                        </div>
                        <div>
                            <div class="input-group">
                                <label for="categoria">Categorias</label>
                                <select class="form-control" name="categorias[]" id="categoria" multiple required>
									<?php
									$id = 0;
									foreach ($categorias as $row):
										?>
                                        <option value="<?php echo $row['categoria_id']; ?>"><?php echo $row['categoria_nome'] ?></option>
									<?php endforeach; ?>
                                </select>
                            </div>
                            <div>
                                <label for="descricao">Descricao</label>
                                <textarea name="descricao" id="descricao"
                                          class="form-control" required></textarea>
                            </div>
                        </div>
                        <input type="submit" class="btn btn-success" value="Enviar"/>
                    </form>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>
    <!-- /#page-wrapper -->
    <script>
        async function alterarCategoria(el, video) {
            const categoria = el.id.replace('cat-', '');
            const adicionar = el.checked;
            alert("Categoria " + el.name + " " + (adicionar ? "adicionada" : "removida"));

            const data = new FormData();
            data.append("adicionar", adicionar);
            data.append("categoria", categoria);
            data.append("video", video)

            const request = new XMLHttpRequest();
            request.open('POST', '<?php echo $site . "/acoes/alterarvideocategoria.php" ?>');
            request.send(data);
        }

        function editarCategoria(id, categoria) {
            document.getElementById('editandocategoria').value = categoria;
            document.getElementById('editandocategoriaid').value = id;
        }
    </script>
<?php include("design2.php"); ?>