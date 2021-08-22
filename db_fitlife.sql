-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: arioliveira.duckdns.org:3106
-- Tempo de geração: 30-Maio-2021 às 22:18
-- Versão do servidor: 10.3.18-MariaDB-1:10.3.18+maria~bionic-log
-- versão do PHP: 7.2.19-0ubuntu0.18.04.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Banco de dados: `db_fitlife`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_categorias`
--

CREATE TABLE `tb_categorias` (
  `categoria_id` int(11) NOT NULL,
  `categoria_nome` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_categorias`
--

INSERT INTO `tb_categorias` (`categoria_id`, `categoria_nome`) VALUES
(1, 'Ar livre'),
(2, 'Fazer em Casa');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_usuarios`
--

CREATE TABLE `tb_usuarios` (
  `usu_codigo` int(11) NOT NULL,
  `usu_nome` varchar(100) NOT NULL,
  `usu_login` varchar(90) NOT NULL,
  `usu_senha` varchar(50) NOT NULL,
  `usu_idade` varchar(5) DEFAULT NULL,
  `usu_peso` varchar(6) DEFAULT NULL,
  `usu_etnia` varchar(50) DEFAULT NULL,
  `usu_estatura` varchar(4) DEFAULT NULL,
  `usu_sexo` varchar(50) NOT NULL,
  `usu_ndc` varchar(50) NOT NULL,
  `usu_tiposanguíneo` varchar(50) NOT NULL,
  `usu_fatorRH` varchar(50) NOT NULL,
  `usu_pressao1` varchar(3) DEFAULT NULL,
  `usu_pressao2` varchar(3) DEFAULT NULL,
  `usu_repouso` varchar(3) DEFAULT NULL,
  `usu_ultimoCheck` varchar(4) DEFAULT NULL,
  `usu_testesesforço` varchar(50) NOT NULL,
  `usu_estresse` varchar(10) NOT NULL,
  `usu_anemia` varchar(10) NOT NULL,
  `usu_glicose` varchar(5) DEFAULT NULL,
  `usu_colesterol` varchar(5) DEFAULT NULL,
  `usu_HDL` varchar(5) DEFAULT NULL,
  `usu_LDL` varchar(5) DEFAULT NULL,
  `usu_triglicérides` varchar(5) DEFAULT NULL,
  `usu_fumante` varchar(5) NOT NULL,
  `usu_qntdecigarros` varchar(4) DEFAULT NULL,
  `usu_condicao` varchar(20) NOT NULL,
  `usu_parou` varchar(5) DEFAULT NULL,
  `usu_alergias` varchar(50) NOT NULL,
  `usu_fatordesencadeante` varchar(50) NOT NULL,
  `usu_doencasanteriores` varchar(50) NOT NULL,
  `usu_doencasfamiliares` varchar(50) NOT NULL,
  `usu_cirurgiasinternações` varchar(50) NOT NULL,
  `usu_lesões` varchar(50) NOT NULL,
  `usu_medicação` varchar(50) NOT NULL,
  `usu_emergencia` varchar(50) NOT NULL,
  `usu_telefone` varchar(15) NOT NULL,
  `usu_medico` varchar(90) NOT NULL,
  `usu_telefonedomédico` varchar(15) NOT NULL,
  `usu_conveniomedico` varchar(50) NOT NULL,
  `usu_hospitalouclinica` varchar(50) NOT NULL,
  `usu_pratica` varchar(5) NOT NULL,
  `usu_atividadesfisicas` varchar(50) NOT NULL,
  `usu_qntsemana` varchar(5) DEFAULT NULL,
  `usu_duracaodasecao` varchar(5) DEFAULT NULL,
  `usu_intensidade2` varchar(15) NOT NULL,
  `usu_praticou` varchar(5) NOT NULL,
  `usu_haquantotempo` varchar(5) DEFAULT NULL,
  `usu_porquantotempo` varchar(5) DEFAULT NULL,
  `usu_qntaporsemana` varchar(5) DEFAULT NULL,
  `usu_duracao` varchar(5) DEFAULT NULL,
  `usu_intensidade` varchar(15) NOT NULL,
  `usu_admin` tinyint(1) DEFAULT 0,
  `usu_alteracao` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_usuarios`
--

INSERT INTO `tb_usuarios` (`usu_codigo`, `usu_nome`, `usu_login`, `usu_senha`, `usu_idade`, `usu_peso`, `usu_etnia`, `usu_estatura`, `usu_sexo`, `usu_ndc`, `usu_tiposanguíneo`, `usu_fatorRH`, `usu_pressao1`, `usu_pressao2`, `usu_repouso`, `usu_ultimoCheck`, `usu_testesesforço`, `usu_estresse`, `usu_anemia`, `usu_glicose`, `usu_colesterol`, `usu_HDL`, `usu_LDL`, `usu_triglicérides`, `usu_fumante`, `usu_qntdecigarros`, `usu_condicao`, `usu_parou`, `usu_alergias`, `usu_fatordesencadeante`, `usu_doencasanteriores`, `usu_doencasfamiliares`, `usu_cirurgiasinternações`, `usu_lesões`, `usu_medicação`, `usu_emergencia`, `usu_telefone`, `usu_medico`, `usu_telefonedomédico`, `usu_conveniomedico`, `usu_hospitalouclinica`, `usu_pratica`, `usu_atividadesfisicas`, `usu_qntsemana`, `usu_duracaodasecao`, `usu_intensidade2`, `usu_praticou`, `usu_haquantotempo`, `usu_porquantotempo`, `usu_qntaporsemana`, `usu_duracao`, `usu_intensidade`, `usu_admin`, `usu_alteracao`) VALUES
(2, 'Ana Dantas', 'ana', 'ana123', '13', '50.00', 'Mestiço', '1.80', 'Feminino', 'sedentario', 'A', 'positivo', '45', '45', '90', '2020', 'sim', 'naotem', 'nao', '5', '5', '5', '5', '5', 'nao', '0', 'nao', '0', 'nao', 'Nenhum', 'Não', 'Não', 'Não', 'No joelho', 'Nada', 'Mãe', '(84)9999-9956', 'João', '843395-1155', 'ser', 'clinica', 'nao', 'Vôlei', '0', '0', 'baixa', 'nao', '0', '0', '0', '0', '', 0, 1),
(4, 'david', 'david', 'david123', '21', '75.00', '', '0.00', '', 'atleta', 'A', 'positivo', '0', '0', '90', '0', '', 'pouco', 'nao', '0', '0', '0', '0', '0', 'nao', '0', '', '0', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0', '0', '', '', '0', '0', '0', '0', '', 1, 0),
(6, 'Isabel Cristina', 'isabel', 'isabel123', '30', '60.00', 'Branco', '1.60', 'Feminino', 'ativo', 'O', 'positivo', '0', '0', '0', '0', 'nao', 'moderado', 'nao', '0', '0', '0', '0', '0', 'nao', '0', 'nao', '0', 'nao', '', '', '', '', '', '', '', '', '', '', '', '', 'sim', 'crosfit', '5', '90', 'media', 'sim', '0', '5', '0', '0', '', 1, 0),
(7, 'iara', 'iara12', '123iara', '0', '0.00', '', '0.00', '', 'sedentario', '', '', '0', '0', '0', '0', '', '', '', '0', '0', '0', '0', '0', '', '0', '', '0', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0', '0', '', '', '0', '0', '0', '0', '', 0, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_usuario_video`
--

CREATE TABLE `tb_usuario_video` (
  `usuvid_codigo` int(11) NOT NULL,
  `usu_codigo` int(11) NOT NULL,
  `video_codigo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_videos`
--

CREATE TABLE `tb_videos` (
  `video_codigo` int(11) NOT NULL,
  `video_nome` varchar(50) NOT NULL,
  `video_arquivo_nome` varchar(50) NOT NULL,
  `descricao` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_video_categoria`
--

CREATE TABLE `tb_video_categoria` (
  `video_codigo` int(11) NOT NULL,
  `categoria_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `tb_categorias`
--
ALTER TABLE `tb_categorias`
  ADD PRIMARY KEY (`categoria_id`);

--
-- Índices para tabela `tb_usuarios`
--
ALTER TABLE `tb_usuarios`
  ADD PRIMARY KEY (`usu_codigo`);

--
-- Índices para tabela `tb_usuario_video`
--
ALTER TABLE `tb_usuario_video`
  ADD PRIMARY KEY (`usuvid_codigo`),
  ADD KEY `usu_codigo` (`usu_codigo`),
  ADD KEY `video_codigo` (`video_codigo`);

--
-- Índices para tabela `tb_videos`
--
ALTER TABLE `tb_videos`
  ADD PRIMARY KEY (`video_codigo`);

--
-- Índices para tabela `tb_video_categoria`
--
ALTER TABLE `tb_video_categoria`
  ADD PRIMARY KEY (`video_codigo`,`categoria_id`),
  ADD KEY `categoria_id` (`categoria_id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tb_categorias`
--
ALTER TABLE `tb_categorias`
  MODIFY `categoria_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `tb_usuarios`
--
ALTER TABLE `tb_usuarios`
  MODIFY `usu_codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `tb_usuario_video`
--
ALTER TABLE `tb_usuario_video`
  MODIFY `usuvid_codigo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tb_videos`
--
ALTER TABLE `tb_videos`
  MODIFY `video_codigo` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `tb_usuario_video`
--
ALTER TABLE `tb_usuario_video`
  ADD CONSTRAINT `tb_usuario_video_ibfk_1` FOREIGN KEY (`usu_codigo`) REFERENCES `tb_usuarios` (`usu_codigo`),
  ADD CONSTRAINT `tb_usuario_video_ibfk_2` FOREIGN KEY (`video_codigo`) REFERENCES `tb_videos` (`video_codigo`);

--
-- Limitadores para a tabela `tb_video_categoria`
--
ALTER TABLE `tb_video_categoria`
  ADD CONSTRAINT `tb_video_categoria_ibfk_1` FOREIGN KEY (`video_codigo`) REFERENCES `tb_videos` (`video_codigo`),
  ADD CONSTRAINT `tb_video_categoria_ibfk_2` FOREIGN KEY (`categoria_id`) REFERENCES `tb_categorias` (`categoria_id`);
COMMIT;
