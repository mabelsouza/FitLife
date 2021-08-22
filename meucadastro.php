<?php
session_start();
if (!isset($_SESSION['login'])) {
	header("Location: login1.php");
	return;
}
?>
<?php include("design1.php"); ?>

<div id="page-wrapper">
	<?php
	include('./config.php');
	$query = $conexao->query("SELECT * FROM tb_usuarios WHERE usu_login='" . $_SESSION['login'] . "'");
	$user = $query->fetch_assoc();
	?>
    <div class="row">
        <div style="margin-left: 15px;" class="col-md-12">
            <div class="row">
                <h3>Cadastro Geral</h3>
            </div>
        </div>
        <div style="margin-left: 180px;" class="col-md-8">
            <div>
                Nome
                <input type="text" class="form-control" name="nome" value='<?php echo $user['usu_nome'] ?>' disabled/>
            </div>
            <div>
                Usuario
                <input type="text" class="form-control" name="login" value='<?php echo $user['usu_login'] ?>' disabled/>
            </div>

            <div class="row">
                <div class="col-md-4">
                    Etnia
                    <select class="form-control" name="etnia" disabled>
                        <option value="Mestiço" <?php echo $user["usu_etnia"] == 'Mestiço' ? "selected" : ''; ?>>
                            Mestiço
                        </option>
                        <option value="Branco" <?php echo $user["usu_etnia"] == 'Branco' ? "selected" : ''; ?>>Branco
                        </option>
                        <option value="Negro" <?php echo $user["usu_etnia"] == 'Negro' ? "selected" : ''; ?>>Negro
                        </option>
                        <option value="Oriental" <?php echo $user["usu_etnia"] == 'Oriental' ? "selected" : ''; ?>>
                            Oriental
                        </option>
                        <option value="Espánico" <?php echo $user["usu_etnia"] == 'Espánico' ? "selected" : ''; ?>>
                            Espánico
                        </option>
                    </select>
                </div>
                <div class="col-md-4">
                    Sexo
                    <select class="form-control" name="sexo" disabled>
                        <option value="Masculino" <?php echo $user["usu_sexo"] == 'Masculino' ? "selected" : ''; ?>>
                            Masculino
                        </option>
                        <option value="Feminino" <?php echo $user["usu_sexo"] == 'Feminino' ? "selected" : ''; ?>>
                            Feminino
                        </option>
                    </select>
                </div>
                <div class="col-md-4">
                    Idade
                    <input type="number" class="form-control" name="idade" value="<?php echo $user['usu_idade'] ?>"
                           disabled/>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    Peso
                    <input type="number" step="0.01" class="form-control" name="peso"
                           value="<?php echo $user['usu_peso'] ?>" disabled/>
                </div>
                <div class="col-md-4">
                    Estatura
                    <input type="number" step="0.01" class="form-control" name="estatura" placeholder="1.65"
                           value="<?php echo $user['usu_estatura'] ?>" disabled/>
                </div>
                <div class="col-md-4">
                    Último checkup
                    <input type="number" class="form-control" name="checkup"
                           value="<?php echo $user['usu_ultimoCheck'] ?>" disabled/>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    Em caso de emergencia avisar
                    <input type="text" class="form-control" name="emergencia"
                           value="<?php echo $user['usu_emergencia'] ?>" disabled/>
                </div>
                <div class="col-md-6">
                    Telefone
                    <input type="text" class="form-control" name="telefone" value="<?php echo $user['usu_telefone'] ?>"
                           disabled/>
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
                    <select class="form-control" name="anemia" disabled>
                        <option value="sim" <?php echo $user["usu_anemia"] == 'sim' ? "selected" : "" ?>>Sim</option>
                        <option value="nao" <?php echo $user["usu_anemia"] == 'nao' ? "selected" : "" ?>>Não</option>
                    </select>
                </div>
                <div class="col-md-4">
                    Fumante
                    <select class="form-control" name="fumante" disabled>
                        <option value="sim" <?php echo $user["usu_fumante"] == 'sim' ? "selected" : "" ?>>Sim</option>
                        <option value="nao" <?php echo $user["usu_fumante"] == 'nao' ? "selected" : "" ?>>Não</option>
                    </select>
                </div>
                <div class="col-md-4">
                    Quantidade de cigarros
                    <input type="number" class="form-control" name="qtddcigarros"
                           value="<?php echo $user["usu_qntdecigarros"] ?>" disabled/>
                </div>


            </div>
            <div class="row">
                <div class="col-md-4">
                    Parou de fumar?
                    <select class="form-control" name="condicao" disabled>
                        <option value="sim" <?php echo $user["usu_condicao"] == 'sim' ? "selected" : "" ?>>Sim</option>
                        <option value="nao" <?php echo $user["usu_condicao"] == 'nao' ? "selected" : "" ?>>Não</option>
                    </select>
                </div>
                <div class="col-md-4">
                    Há quanto tempo parou
                    <input type="number" class="form-control" name="parou" value="<?php echo $user['usu_parou'] ?>"
                           disabled/>
                </div>
                <div class="col-md-4">
                    Alergias
                    <select class="form-control" name="alergias" disabled>
                        <option value="sim" <?php echo $user["usu_alergias"] == 'sim' ? "selected" : "" ?>>Sim</option>
                        <option value="nao" <?php echo $user["usu_alergias"] == 'nao' ? "selected" : "" ?>>Não</option>
                    </select>
                </div>
            </div>


            <div class="row">
                <div class="col-md-6">
                    Fator desencadiante
                    <input type="text" class="form-control" name="desencadiante"
                           value="<?php echo $user['usu_fatordesencadeante'] ?>" disabled/>
                </div>
                <div class="col-md-6">
                    Nível de condicionamento
                    <select class="form-control" name="condicionamento" disabled>
                        <option value="sedentario" <?php echo $user["usu_ndc"] == 'sedentario' ? "selected" : "" ?>>
                            Sedentario
                        </option>
                        <option value="ativo" <?php echo $user["usu_ndc"] == 'ativo' ? "selected" : "" ?>>ativo</option>
                        <option value="atleta" <?php echo $user["usu_ndc"] == 'atleta' ? "selected" : "" ?>>atleta
                        </option>
                    </select>
                </div>

            </div>

            <div class="row">
                <div class="col-md-6">
                    Pratica alguma atividade física
                    <select class="form-control" name="pratica" disabled>
                        <option value="sim" <?php echo $user["usu_pratica"] == 'sim' ? "selected" : "" ?>>Sim</option>
                        <option value="nao" <?php echo $user["usu_pratica"] == 'nao' ? "selected" : "" ?>>Não</option>
                    </select>
                </div>
                <div class="col-md-6">
                    Qual
                    <input type="text" class="form-control" name="atividade"
                           value="<?php echo $user['usu_atividadesfisicas'] ?>" disabled/>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    Quantas vezes por semana
                    <input type="number" class="form-control" name="qntddsemana"
                           value="<?php echo $user["usu_qntsemana"] ?>" disabled/>

                </div>
                <div class="col-md-4">
                    Duração da seção em minutos
                    <input type="number" class="form-control" name="duracao"
                           value=" <?php echo $user["usu_duracaodasecao"] ?>" disabled/>
                </div>

                <div class="col-md-4">
                    Intensidade
                    <select class="form-control" name="intensidade" disabled>
                        <option value="baixa" <?php echo $user["usu_intensidade2"] == 'baixa' ? "selected" : "" ?>>
                            Baixa
                        </option>
                        <option value="media" <?php echo $user["usu_intensidade2"] == 'media' ? "selected" : "" ?>>
                            Média
                        </option>
                        <option value="alta" <?php echo $user["usu_intensidade2"] == 'alta' ? "selected" : "" ?>>Alta
                        </option>
                    </select>

                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    Teste de esforço
                    <select class="form-control" name="testeesforco" disabled>
                        <option value="sim" <?php echo $user["usu_testesesforço"] == 'sim' ? "selected" : ''; ?>>Sim
                        </option>
                        <option value="nao" <?php echo $user["usu_testesesforço"] == 'nao' ? "selected" : ''; ?>>Não
                        </option>
                    </select>
                </div>
                <div class="col-md-4">
                    Tipo sanguíneo
                    <select class="form-control" name="tpsanguineo" disabled>
                        <option value="A" <?php echo $user["usu_tiposanguíneo"] == 'A' ? "selected" : "" ?>>A</option>
                        <option value="B" <?php echo $user["usu_tiposanguíneo"] == 'B' ? "selected" : "" ?>>B</option>
                        <option value="O" <?php echo $user["usu_tiposanguíneo"] == 'O' ? "selected" : "" ?>>O</option>
                        <option value="AB" <?php echo $user["usu_tiposanguíneo"] == 'AB' ? "selected" : "" ?>>AB
                        </option>
                    </select>
                </div>
                <div class="col-md-4">
                    Fator RH
                    <select class="form-control" name="fatorrh" disabled>
                        <option value="positivo" <?php echo $user["usu_fatorRH"] == 'positivo' ? "selected" : "" ?>>
                            positivo
                        </option>
                        <option value="negativo" <?php echo $user["usu_fatorRH"] == 'negativo' ? "selected" : "" ?>>
                            negativo
                        </option>
                    </select>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    Glicose
                    <input type="number" class="form-control" name="glicose" value="<?php echo $user['usu_glicose'] ?>"
                           disabled/>
                </div>
                <div class="col-md-4">
                    HDL
                    <input type="number" class="form-control" name="hdl" value="<?php echo $user['usu_HDL'] ?>"
                           disabled/>
                </div>
                <div class="col-md-4">
                    LDL
                    <input type="number" class="form-control" name="ldl" value="<?php echo $user['usu_LDL'] ?>"
                           disabled/>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    Colesterol
                    <input type="number" class="form-control" name="colesterol"
                           value="<?php echo $user['usu_colesterol'] ?>" disabled/>
                </div>
                <div class="col-md-4">
                    Triglicérideos
                    <input type="number" class="form-control" name="triglicerides"
                           value="<?php echo $user['usu_triglicérides'] ?>" disabled/>
                </div>
                <div class="col-md-4">
                    Estresse
                    <select class="form-control" name="estresse" disabled>
                        <option value="naotem" <?php echo $user["usu_estresse"] == 'naotem' ? "selected" : "" ?>>Não
                            tem
                        </option>
                        <option value="pouco" <?php echo $user["usu_estresse"] == 'pouco' ? "selected" : "" ?>>Pouco
                        </option>
                        <option value="moderado" <?php echo $user["usu_estresse"] == 'moderado' ? "selected" : "" ?>>
                            Moderado
                        </option>
                        <option value="muito" <?php echo $user["usu_estresse"] == 'muito' ? "selected" : "" ?>>Muito
                        </option>
                    </select>
                </div>
            </div>

            Pressão Arterial
            <div class="row">
                <div class="col-md-6">
                    <input type="text" class="form-control" name="pressao1" placeholder="Sistólica"
                           value="<?php echo $user['usu_pressao1'] ?>" disabled/>
                </div>
                <div class="col-md-6">
                    <input type="text" class="form-control" name="pressao2" placeholder="Diastólica"
                           value="<?php echo $user['usu_pressao2'] ?>" disabled/>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    Freq. cardiaca em repouso
                    <input type="number" class="form-control" name="frequencia"
                           value="<?php echo $user['usu_repouso'] ?>" disabled/>
                </div>
                <div class="col-md-6">
                    Doenças Anteriores
                    <input type="text" class="form-control" name="danteriores"
                           value="<?php echo $user['usu_doencasanteriores'] ?>" disabled/>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    Doenças familiares
                    <input type="text" class="form-control" name="dfamiliar"
                           value="<?php echo $user['usu_doencasfamiliares'] ?>" disabled/>
                </div>
                <div class="col-md-6">
                    Cirurgias e/ou internações
                    <input type="text" class="form-control" name="cirurgias"
                           value="<?php echo $user['usu_cirurgiasinternações'] ?>" disabled/>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    Lesões
                    <input type="text" class="form-control" name="lesao" value="<?php echo $user['usu_lesões'] ?>"
                           disabled/>
                </div>
                <div class="col-md-6">
                    Medicação
                    <input type="text" class="form-control" name="medicacao"
                           value="<?php echo $user['usu_medicação'] ?>" disabled/>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    Já praticou alguma atividade física
                    <select class="form-control" name="praticou" disabled>
                        <option value="sim" <?php echo $user['usu_praticou'] == 'sim' ? 'selected' : '' ?>>Sim</option>
                        <option value="nao" <?php echo $user['usu_praticou'] == 'nao' ? 'selected' : '' ?>>Não</option>
                    </select>
                </div>
                <div class="col-md-4">
                    Há quanto tempo(anos)
                    <input type="text" class="form-control" name="tempo"
                           value="<?php echo $user['usu_haquantotempo'] ?>" disabled/>
                </div>
                <div class="col-md-4">
                    por quanto tempo(anos)
                    <input type="text" class="form-control" name="tempo2"
                           value="<?php echo $user['usu_porquantotempo'] ?>" disabled/>
                </div>
            </div>
        </div>

    </div>
</div>

<?php include("design2.php"); ?>
    
    