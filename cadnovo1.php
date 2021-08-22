<?php
session_start();
if (isset($_SESSION['login'])) {
	header("Location: meucadastro.php");
	return;
}
$error = NULL;
if (isset($_POST['login'])) {
	extract($_POST);
	include("config.php");

	$query = $conexao->query('SELECT usu_nome FROM tb_usuarios LIMIT 1');
	$admin = 0;
	if ($query && $query->num_rows == 0)
		$admin = 1;

	$query = $conexao->query("SELECT * FROM tb_usuarios WHERE usu_login='$login'");
	if ($query->fetch_assoc()) {
		$error = 'Já existe um usuário com este login.';
	} else {
		$conexao->query("INSERT INTO tb_usuarios (" .
			"usu_nome,usu_login, usu_senha, usu_idade, usu_peso, usu_etnia," .
			"usu_estatura, usu_sexo, usu_ndc,usu_tiposanguíneo, usu_fatorRH," .
			"usu_pressao1, usu_pressao2, usu_repouso, usu_ultimoCheck, usu_testesesforço, usu_estresse," .
			"usu_anemia, usu_glicose, usu_colesterol, usu_HDL, usu_LDL, usu_triglicérides, usu_fumante," .
			"usu_qntdecigarros,usu_condicao,usu_parou, usu_alergias, usu_fatordesencadeante,usu_doencasanteriores," .
			"usu_doencasfamiliares,usu_cirurgiasinternações, usu_lesões, usu_medicação,usu_emergencia," .
			"usu_telefone,  usu_pratica,  usu_atividadesfisicas,usu_qntsemana, usu_duracaodasecao," .
			"usu_intensidade2,  usu_praticou, usu_haquantotempo, usu_porquantotempo, usu_admin) VALUES (" .
			"'$nome','$login','$senha','$idade', '$peso', '$etnia', '$estatura', '$sexo', '$condicionamento'," .
			"'$tpsanguineo','$fatorrh', '$pressao1', '$pressao2', '$frequencia', '$checkup', '$testeesforco'," .
			"'$estresse', '$anemia', '$glicose','$colesterol', '$hdl', '$ldl', '$triglicerides'," .
			"'$fumante', '$qtddcigarros','$condicao','$parou','$alergias','$desencadiante','$danteriores'," .
			"'$dfamiliar','$cirurgias','$lesao', '$medicacao', '$emergencia','$telefone','$pratica'," .
			"'$atividade', '$qntddsemana', '$duracao','$intensidade','$praticou','$tempo', '$tempo2'," .
			$admin . ")");

		if (mysqli_error($conexao)) {
			print_r(mysqli_error($conexao));
			die();
		} else {
			$_SESSION['login'] = $login;
			header("Location: meucadastro.php");
			return;
		}
	}
}


?>
<?php include("design1.php"); ?>

    <div id="page-wrapper">
        <div class="container-fluid">
            <!-- row -->
            <div class="row">
                <div class="col-md-12">
                    <div class="white-box">
                        <h3>Cadastro Geral</h3>

                        <form action="?" method="POST">
                            <div class="row">

                                <div style="margin-left: 180px;" class="col-md-8">
                                    <div>
                                        Nome
                                        <input type="text" class="form-control"
                                               name="nome" <?php echo(isset($nome) ? "value=\"$nome\"" : ''); ?>
                                               required/>
                                    </div>
                                    <div>
                                        Usuario
                                        <input type="text" class="form-control"
                                               name="login" <?php echo(isset($login) ? "value=\"$login\"" : ''); ?>
                                               required/>
                                    </div>
                                    <div>
                                        Senha
                                        <input type="password" class="form-control"
                                               name="senha" <?php echo(isset($senha) ? "value=\"$senha\"" : ''); ?>
                                               required/>
                                    </div>


                                    <div class="row">
                                        <div class="col-md-4">
                                            Etnia
                                            <select class="form-control" name="etnia" required>
                                                <option value="" disabled selected></option>
                                                <option value="Mestiço" <?php echo(isset($etnia) && $etnia == 'Mestiço' ? "selected" : ''); ?>>
                                                    Mestiço
                                                </option>
                                                <option value="Branco" <?php echo(isset($etnia) && $etnia == 'Branco' ? "selected" : ''); ?>>
                                                    Branco
                                                </option>
                                                <option value="Negro" <?php echo(isset($etnia) && $etnia == 'Negro' ? "selected" : ''); ?>>
                                                    Negro
                                                </option>
                                                <option value="Oriental" <?php echo(isset($etnia) && $etnia == 'Oriental' ? "selected" : ''); ?>>
                                                    Oriental
                                                </option>
                                                <option value="Espánico" <?php echo(isset($etnia) && $etnia == 'Espánico' ? "selected" : ''); ?>>
                                                    Espánico
                                                </option>
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            Sexo
                                            <select class="form-control" name="sexo" required>
                                                <option value="" disabled selected></option>
                                                <option value="Masculino" <?php echo(isset($sexo) && $sexo == 'Masculino' ? "selected" : ''); ?>>
                                                    Masculino
                                                </option>
                                                <option value="Feminino" <?php echo(isset($sexo) && $sexo == 'Feminino' ? "selected" : ''); ?>>
                                                    Feminino
                                                </option>
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            Idade
                                            <input type="number" class="form-control" name="idade" required/>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            Peso
                                            <input type="number" step="0.01" class="form-control" name="peso" required/>
                                        </div>
                                        <div class="col-md-4">
                                            Estatura
                                            <input type="number" step="0.01" class="form-control" name="estatura"
                                                   placeholder="1.65" required>
                                        </div>
                                        <div class="col-md-4">
                                            Último checkup
                                            <input type="number" class="form-control" name="checkup"/>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            Em caso de emergencia avisar
                                            <input type="text" class="form-control" name="emergencia"/>
                                        </div>
                                        <div class="col-md-6">
                                            Telefone
                                            <input type="text" class="form-control" name="telefone"/>
                                        </div>
                                    </div>

                                </div>

                                <div style="margin-left: 15px;" class="col-md-12">
                                    <div class="row">
                                        <h3>Dados de Saúde</h3>
                                    </div>
                                </div>

                                <div style="margin-left: 180px;" class="col-md-8">
                                    <div class="row">
                                        <div class="col-md-4">
                                            Anemia
                                            <select class="form-control" name="anemia" required>
                                                <option value="" disabled selected></option>
                                                <option value="sim">Sim</option>
                                                <option value="nao">Não</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            Fumante
                                            <select class="form-control" name="fumante" required>
                                                <option value="" disabled selected></option>
                                                <option value="sim">Sim</option>
                                                <option value="nao">Não</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            Quantidade de cigarros
                                            <input type="number" class="form-control" name="qtddcigarros"/>
                                        </div>


                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            Parou de fumar?
                                            <select class="form-control" name="condicao" required>
                                                <option value="" disabled selected></option>
                                                <option value="sim">Sim</option>
                                                <option value="nao">Não</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            Há quanto tempo parou
                                            <input type="number" class="form-control" name="parou"/>
                                        </div>
                                        <div class="col-md-4">
                                            Alergias
                                            <select class="form-control" name="alergias" required>
                                                <option value="" disabled selected></option>
                                                <option value="sim">Sim</option>
                                                <option value="nao">Não</option>
                                            </select>
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-md-6">
                                            Fator desencadiante
                                            <input type="text" class="form-control" name="desencadiante"/>
                                        </div>
                                        <div class="col-md-6">
                                            Nível de condicionamento
                                            <select class="form-control" name="condicionamento" required>
                                                <option value="" disabled selected></option>
                                                <option value="sedentario">Sedentario</option>
                                                <option value="ativo">ativo</option>
                                                <option value="atleta">atleta</option>
                                            </select>
                                        </div>

                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            Pratica alguma atividade física
                                            <select class="form-control" name="pratica" required>
                                                <option value="" disabled selected></option>
                                                <option value="sim">Sim</option>
                                                <option value="nao">Não</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            Qual
                                            <input type="text" class="form-control" name="atividade"/>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            Quantas vezes por semana
                                            <input type="number" class="form-control" name="qntddsemana"/>

                                        </div>
                                        <div class="col-md-4">
                                            Duração da seção em minutos
                                            <input type="number" class="form-control" name="duracao"/>
                                        </div>

                                        <div class="col-md-4">
                                            Intensidade
                                            <select class="form-control" name="intensidade" required>
                                                <option value="" disabled selected></option>
                                                <option value="baixa">Baixa</option>
                                                <option value="media">Média</option>
                                                <option value="alta">Alta</option>
                                            </select>

                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            Teste de esforço
                                            <select class="form-control" name="testeesforco" required>
                                                <option value="" disabled selected></option>
                                                <option value="sim" <?php echo(isset($testeesforco) && $testeesforco == 'sim' ? "selected" : ''); ?>>
                                                    Sim
                                                </option>
                                                <option value="nao" <?php echo(isset($testeesforco) && $testeesforco == 'nao' ? "selected" : ''); ?>>
                                                    Não
                                                </option>
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            Tipo sanguíneo
                                            <select class="form-control" name="tpsanguineo" required>
                                                <option value="" disabled selected></option>
                                                <option value="A">A</option>
                                                <option value="B">B</option>
                                                <option value="O">O</option>
                                                <option value="AB">AB</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            Fator RH
                                            <select class="form-control" name="fatorrh" required>
                                                <option value="" disabled selected></option>
                                                <option value="positivo">positivo</option>
                                                <option value="negativo">negativo</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            Glicose
                                            <input type="number" class="form-control" name="glicose"/>
                                        </div>
                                        <div class="col-md-4">
                                            HDL
                                            <input type="number" class="form-control" name="hdl"/>
                                        </div>
                                        <div class="col-md-4">
                                            LDL
                                            <input type="number" class="form-control" name="ldl"/>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            Colesterol
                                            <input type="number" class="form-control" name="colesterol"/>
                                        </div>
                                        <div class="col-md-4">
                                            Triglicérideos
                                            <input type="number" class="form-control" name="triglicerides"/>
                                        </div>
                                        <div class="col-md-4">
                                            Estresse
                                            <select class="form-control" name="estresse" required>
                                                <option value="" disabled selected></option>
                                                <option value="naotem">Não tem</option>
                                                <option value="pouco">Pouco</option>
                                                <option value="moderado">Moderado</option>
                                                <option value="muito">Muito</option>
                                            </select>
                                        </div>
                                    </div>

                                    Pressão Arterial
                                    <div class="row">
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" name="pressao1"
                                                   placeholder="Sistólica">
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" name="pressao2"
                                                   placeholder="Diastólica">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            Freq. cardiaca em repouso
                                            <input type="number" class="form-control" name="frequencia"/>
                                        </div>
                                        <div class="col-md-6">
                                            Doenças Anteriores
                                            <input type="text" class="form-control" name="danteriores"/>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            Doenças familiares
                                            <input type="text" class="form-control" name="dfamiliar"/>
                                        </div>
                                        <div class="col-md-6">
                                            Cirurgias e/ou internações
                                            <input type="text" class="form-control" name="cirurgias"/>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            Lesões
                                            <input type="text" class="form-control" name="lesao"/>
                                        </div>
                                        <div class="col-md-6">
                                            Medicação
                                            <input type="text" class="form-control" name="medicacao"/>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            Já praticou alguma atividade física
                                            <select class="form-control" name="praticou" required>
                                                <option value="" disabled selected></option>
                                                <option value="sim">Sim</option>
                                                <option value="nao">Não</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            Há quanto tempo(anos)
                                            <input type="text" class="form-control" name="tempo"/>
                                        </div>
                                        <div class="col-md-4">
                                            por quanto tempo(anos)
                                            <input type="text" class="form-control" name="tempo2"/>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <button type="submit" class="btn btn-primary center-block">Cadastrar</button>

                        </form>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>


<?php include("design2.php"); ?>