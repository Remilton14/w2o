-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 07/03/2022 às 21:16
-- Versão do servidor: 10.4.21-MariaDB
-- Versão do PHP: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `u76543_w2o_db`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `colaboradores`
--

CREATE TABLE `colaboradores` (
  `id_colaborador` int(11) NOT NULL,
  `nome_colaborador` varchar(120) NOT NULL,
  `telefone_colaborador` varchar(20) NOT NULL,
  `email_colaborador` varchar(85) NOT NULL,
  `empresa_id` int(11) NOT NULL,
  `datecreate` datetime NOT NULL,
  `datemodified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `colaboradores`
--

INSERT INTO `colaboradores` (`id_colaborador`, `nome_colaborador`, `telefone_colaborador`, `email_colaborador`, `empresa_id`, `datecreate`, `datemodified`) VALUES
(1, 'Mario Santos Pereira', '(47) 2345-2345', 'mario@gmail.com', 1, '2022-03-07 19:09:11', '2022-03-07 19:09:11'),
(3, 'teste', '(23) 4234-2342', 'teste@teste.com', 4, '2022-03-07 19:55:28', '2022-03-07 20:39:07'),
(4, 'Teste 2', '(23) 4234-2342', 'teste22@teste2.com', 1, '2022-03-07 20:36:51', NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `empresas`
--

CREATE TABLE `empresas` (
  `id_empresa` int(11) NOT NULL,
  `razao_social` varchar(90) NOT NULL,
  `cnpj` varchar(20) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `email` varchar(70) NOT NULL,
  `endereco` text DEFAULT NULL,
  `datecreate` datetime NOT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `empresas`
--

INSERT INTO `empresas` (`id_empresa`, `razao_social`, `cnpj`, `telefone`, `email`, `endereco`, `datecreate`, `modified`) VALUES
(1, 'Raimunda e Eloá Contábil ME', '89.106.325/0001-67', '(16) 3566-5732', 'financeiro@raimundaeeloacontabilme.com.br', 'Rua Alberto Gomes de Faria - CEP:15990-726 - nº 323 - Bairro: Conjunto Residencial João Vital - Matão/SP', '2022-03-02 20:53:31', NULL),
(2, 'Empresa teste', '07.022.569/0001-05', '(91) 9843-9020', 'ton@gmail.com', '318 Travessa L-3', '2022-03-07 18:02:24', '2022-03-07 18:47:11'),
(3, 'empresa teste 2', '07.022.569/0001-05', '(91) 9843-9020', 'ton@gmail.com', '318 Travessa L-3', '2022-03-07 18:03:13', '2022-03-07 18:49:18'),
(4, 'Empresa teste 3', '60.595.827/0001-17', '(91) 9843-9020', 'teste@teste.com', '318 Travessa L-3', '2022-03-07 18:03:34', '2022-03-07 18:50:53');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `colaboradores`
--
ALTER TABLE `colaboradores`
  ADD PRIMARY KEY (`id_colaborador`),
  ADD KEY `empresa_id` (`empresa_id`);

--
-- Índices de tabela `empresas`
--
ALTER TABLE `empresas`
  ADD PRIMARY KEY (`id_empresa`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `colaboradores`
--
ALTER TABLE `colaboradores`
  MODIFY `id_colaborador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `empresas`
--
ALTER TABLE `empresas`
  MODIFY `id_empresa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `colaboradores`
--
ALTER TABLE `colaboradores`
  ADD CONSTRAINT `colaboradores_ibfk_1` FOREIGN KEY (`empresa_id`) REFERENCES `empresas` (`id_empresa`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
