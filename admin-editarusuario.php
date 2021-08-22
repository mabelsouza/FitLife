<?php
if (!isset($_GET['user'])) {
	header("Location: admin-usuarios.php");
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
	header("Location: admin-usuarios.php");
	return;
}

$usuario = $query->fetch_assoc();
?>
<?php include("design1.php"); ?>
    <!-- Page Content -->
    <div id="page-wrapper">
        <form action="admin-editarusuario.php" method="POST">
            <input type="hidden" name="codigo" value="<?php echo $usuario['usu_codigo'] ?>"/>
            <div class="row">
                <div class="col-md-6">
                    <div>
                        Nome
                        <input type="text" class="form-control" name="nome" value='<?php echo $usuario['usu_nome'] ?>'/>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            Etnia
                            <select class="form-control" name="etnia">
                                <option value="Mestiço" <?php echo $usuario["usu_etnia"] == 'Mestiço' ? "selected" : ''; ?>>
                                    Mestiço
                                </option>
                                <option value="Branco" <?php echo $usuario["usu_etnia"] == 'Branco' ? "selected" : ''; ?>>
                                    Branco
                                </option>
                                <option value="Negro" <?php echo $usuario["usu_etnia"] == 'Negro' ? "selected" : ''; ?>>
                                    Negro
                                </option>
                                <option value="Oriental" <?php echo $usuario["usu_etnia"] == 'Oriental' ? "selected" : ''; ?>>
                                    Oriental
                                </option>
                                <option value="Espánico" <?php echo $usuario["usu_etnia"] == 'Espánico' ? "selected" : ''; ?>>
                                    Espánico
                                </option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            Sexo
                            <select class="form-control" name="sexo">
                                <option value="Masculino" <?php echo $usuario["usu_sexo"] == 'Masculino' ? "selected" : ''; ?>>
                                    Masculino
                                </option>
                                <option value="Feminino" <?php echo $usuario["usu_sexo"] == 'Feminino' ? "selected" : ''; ?>>
                                    Feminino
                                </option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            Teste de esforço
                            <select class="form-control" name="testeesforco">
                                <option value="sim" <?php echo $usuario["usu_testesesforço"] == 'sim' ? "selected" : ''; ?>>
                                    Sim
                                </option>
                                <option value="nao" <?php echo $usuario["usu_testesesforço"] == 'nao' ? "selected" : ''; ?>>
                                    Não
                                </option>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            Tipo sanguíneo
                            <select class="form-control" name="tpsanguineo">
                                <option value="A" <?php echo $usuario["usu_tiposanguíneo"] == 'A' ? "selected" : "" ?>>
                                    A
                                </option>
                                <option value="B" <?php echo $usuario["usu_tiposanguíneo"] == 'B' ? "selected" : "" ?>>
                                    B
                                </option>
                                <option value="O" <?php echo $usuario["usu_tiposanguíneo"] == 'O' ? "selected" : "" ?>>
                                    O
                                </option>
                                <option value="AB" <?php echo $usuario["usu_tiposanguíneo"] == 'AB' ? "selected" : "" ?>>
                                    AB
                                </option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            Fator RH
                            <select class="form-control" name="fatorrh">
                                <option value="positivo" <?php echo $usuario["usu_fatorRH"] == 'positivo' ? "selected" : "" ?>>
                                    positivo
                                </option>
                                <option value="negativo" <?php echo $usuario["usu_fatorRH"] == 'negativo' ? "selected" : "" ?>>
                                    negativo
                                </option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            Estresse
                            <select class="form-control" name="estresse">
                                <option value="naotem" <?php echo $usuario["usu_estresse"] == 'naotem' ? "selected" : "" ?>>
                                    Não tem
                                </option>
                                <option value="pouco" <?php echo $usuario["usu_estresse"] == 'pouco' ? "selected" : "" ?>>
                                    Pouco
                                </option>
                                <option value="moderado" <?php echo $usuario["usu_estresse"] == 'moderado' ? "selected" : "" ?>>
                                    Moderado
                                </option>
                                <option value="muito" <?php echo $usuario["usu_estresse"] == 'muito' ? "selected" : "" ?>>
                                    Muito
                                </option>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            Anemia
                            <select class="form-control" name="anemia">
                                <option value="sim" <?php echo $usuario["usu_anemia"] == 'sim' ? "selected" : "" ?>>
                                    Sim
                                </option>
                                <option value="nao" <?php echo $usuario["usu_anemia"] == 'nao' ? "selected" : "" ?>>
                                    Não
                                </option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            Fumante
                            <select class="form-control" name="fumante">
                                <option value="sim" <?php echo $usuario["usu_fumante"] == 'sim' ? "selected" : "" ?>>
                                    Sim
                                </option>
                                <option value="nao" <?php echo $usuario["usu_fumante"] == 'nao' ? "selected" : "" ?>>
                                    Não
                                </option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            Quantidade de cigarros
                            <input type="number" class="form-control" name="qtddcigarros"
                                   value="<?php echo $usuario["usu_qntdecigarros"] ?>"/>
                        </div>


                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            Parou de fumar?
                            <select class="form-control" name="condicao">
                                <option value="sim" <?php echo $usuario["usu_condicao"] == 'sim' ? "selected" : "" ?>>
                                    Sim
                                </option>
                                <option value="nao" <?php echo $usuario["usu_condicao"] == 'nao' ? "selected" : "" ?>>
                                    Não
                                </option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            Há quanto tempo parou
                            <input type="number" class="form-control" name="parou"
                                   value="<?php echo $usuario['usu_parou'] ?>"/>
                        </div>
                        <div class="col-md-4">
                            Alergias
                            <select class="form-control" name="alergias">
                                <option value="sim" <?php echo $usuario["usu_alergias"] == 'sim' ? "selected" : "" ?>>
                                    Sim
                                </option>
                                <option value="nao" <?php echo $usuario["usu_alergias"] == 'nao' ? "selected" : "" ?>>
                                    Não
                                </option>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            Fator desencadiante
                            <input type="text" class="form-control" name="desencadiante"
                                   value="<?php echo $usuario['usu_fatordesencadeante'] ?>"/>
                        </div>
                        <div class="col-md-6">
                            Nível de condicionamento
                            <select class="form-control" name="condicionamento">
                                <option value="sedentario" <?php echo $usuario["usu_ndc"] == 'sedentario' ? "selected" : "" ?>>
                                    Sedentario
                                </option>
                                <option value="ativo" <?php echo $usuario["usu_ndc"] == 'ativo' ? "selected" : "" ?>>
                                    ativo
                                </option>
                                <option value="atleta" <?php echo $usuario["usu_ndc"] == 'atleta' ? "selected" : "" ?>>
                                    atleta
                                </option>
                            </select>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            Pratica alguma atividade física
                            <select class="form-control" name="pratica">
                                <option value="sim" <?php echo $usuario["usu_pratica"] == 'sim' ? "selected" : "" ?>>
                                    Sim
                                </option>
                                <option value="nao" <?php echo $usuario["usu_pratica"] == 'nao' ? "selected" : "" ?>>
                                    Não
                                </option>
                            </select>

                        </div>
                        <div class="col-md-6">
                            Qual
                            <input type="text" class="form-control" name="atividade"
                                   value="<?php echo $usuario['usu_atividadesfisicas'] ?>"/>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            Quantas vezes por semana
                            <input type="number" class="form-control" name="qntddsemana"
                                   value="<?php echo $usuario["usu_qntsemana"] ?>"/>

                        </div>
                        <div class="col-md-4">
                            Duração da seção em minutos
                            <input type="number" class="form-control" name="duracao"
                                   value=" <?php echo $usuario["usu_duracaodasecao"] ?>"/>
                        </div>

                        <div class="col-md-4">
                            Intensidade
                            <select class="form-control" name="intensidade">
                                <option value="baixa" <?php echo $usuario["usu_intensidade2"] == 'baixa' ? "selected" : "" ?>>
                                    Baixa
                                </option>
                                <option value="media" <?php echo $usuario["usu_intensidade2"] == 'media' ? "selected" : "" ?>>
                                    Média
                                </option>
                                <option value="alta" <?php echo $usuario["usu_intensidade2"] == 'alta' ? "selected" : "" ?>>
                                    Alta
                                </option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-4">
                            Idade
                            <input type="number" class="form-control" name="idade"
                                   value="<?php echo $usuario['usu_idade'] ?>"/>
                        </div>
                        <div class="col-md-4">
                            Peso
                            <input type="number" step="0.01" class="form-control" name="peso"
                                   value="<?php echo $usuario['usu_peso'] ?>"/>
                        </div>
                        <div class="col-md-4">
                            Estatura
                            <input type="number" step="0.01" class="form-control" name="estatura" placeholder="1.65"
                                   value="<?php echo $usuario['usu_estatura'] ?>">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            Glicose
                            <input type="number" class="form-control" name="glicose"
                                   value="<?php echo $usuario['usu_glicose'] ?>"/>
                        </div>
                        <div class="col-md-4">
                            HDL
                            <input type="number" class="form-control" name="hdl"
                                   value="<?php echo $usuario['usu_HDL'] ?>"/>
                        </div>
                        <div class="col-md-4">
                            LDL
                            <input type="number" class="form-control" name="ldl"
                                   value="<?php echo $usuario['usu_LDL'] ?>"/>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            Colesterol
                            <input type="number" class="form-control" name="colesterol"
                                   value="<?php echo $usuario['usu_colesterol'] ?>"/>
                        </div>
                        <div class="col-md-4">
                            Triglicérideos
                            <input type="number" class="form-control" name="triglicerides"
                                   value="<?php echo $usuario['usu_triglicérides'] ?>"/>
                        </div>
                        <div class="col-md-4">
                            Último checkup
                            <input type="number" class="form-control" name="checkup"
                                   value="<?php echo $usuario['usu_ultimoCheck'] ?>"/>
                        </div>
                    </div>

                    Pressão Arterial
                    <div class="row">
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="pressao1" placeholder="Sistólica"
                                   value="<?php echo $usuario['usu_pressao1'] ?>"/>
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="pressao2" placeholder="Diastólica"
                                   value="<?php echo $usuario['usu_pressao2'] ?>"/>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            Freq. cardiaca em repouso
                            <input type="number" class="form-control" name="frequencia"
                                   value="<?php echo $usuario['usu_repouso'] ?>"/>
                        </div>
                        <div class="col-md-6">
                            Doenças Anteriores
                            <input type="text" class="form-control" name="danteriores"
                                   value="<?php echo $usuario['usu_doencasanteriores'] ?>"/>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            Doenças familiares
                            <input type="text" class="form-control" name="dfamiliar"
                                   value="<?php echo $usuario['usu_doencasfamiliares'] ?>"/>
                        </div>
                        <div class="col-md-6">
                            Cirurgias e/ou internações
                            <input type="text" class="form-control" name="cirurgias"
                                   value="<?php echo $usuario['usu_cirurgiasinternações'] ?>"/>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            Lesões
                            <input type="text" class="form-control" name="lesao"
                                   value="<?php echo $usuario['usu_lesões'] ?>"/>
                        </div>
                        <div class="col-md-6">
                            Medicação
                            <input type="text" class="form-control" name="medicacao"
                                   value="<?php echo $usuario['usu_medicação'] ?>"/>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            Em caso de emergencia avisar
                            <input type="text" class="form-control" name="emergencia"
                                   value="<?php echo $usuario['usu_emergencia'] ?>"/>
                        </div>
                        <div class="col-md-6">
                            Telefone
                            <input type="text" class="form-control" name="telefone"
                                   value="<?php echo $usuario['usu_telefone'] ?>"/>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            Já praticou alguma atividade física
                            <select class="form-control" name="praticou">
                                <option value="sim" <?php echo $usuario['usu_praticou'] == 'sim' ? 'selected' : '' ?>>
                                    Sim
                                </option>
                                <option value="nao" <?php echo $usuario['usu_praticou'] == 'nao' ? 'selected' : '' ?>>
                                    Não
                                </option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            Há quanto tempo(anos)
                            <input type="text" class="form-control" name="tempo"
                                   value="<?php echo $usuario['usu_haquantotempo'] ?>"/>
                        </div>
                        <div class="col-md-4">
                            por quanto tempo(anos)
                            <input type="text" class="form-control" name="tempo2"
                                   value="<?php echo $usuario['usu_porquantotempo'] ?>"/>
                        </div>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-success">Salvar</button>
        </form>
    </div>
<?php include("design2.php"); ?>