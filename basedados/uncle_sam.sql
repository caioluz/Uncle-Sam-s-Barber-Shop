-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Tempo de geração: 21/06/2022 às 07:43
-- Versão do servidor: 5.7.34
-- Versão do PHP: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `uncle_sam`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `agendamento`
--

CREATE TABLE `agendamento` (
  `cod_agendamento` int(15) UNSIGNED NOT NULL,
  `cod_cliente` int(10) UNSIGNED NOT NULL,
  `cod_barbeiro` int(10) UNSIGNED NOT NULL,
  `cod_servico` int(10) UNSIGNED NOT NULL,
  `data_hora` datetime NOT NULL,
  `status` varchar(30) NOT NULL DEFAULT 'agendado'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `agendamento`
--

INSERT INTO `agendamento` (`cod_agendamento`, `cod_cliente`, `cod_barbeiro`, `cod_servico`, `data_hora`, `status`) VALUES
(9, 5, 1, 1, '2022-06-19 15:00:00', 'cancelado'),
(10, 5, 1, 2, '2022-06-19 15:50:00', 'concluido'),
(11, 5, 1, 1, '2022-07-06 10:00:00', 'agendado'),
(12, 5, 1, 3, '2022-07-06 10:50:00', 'agendado');

-- --------------------------------------------------------

--
-- Estrutura para tabela `barbeiro`
--

CREATE TABLE `barbeiro` (
  `cod_barbeiro` int(10) UNSIGNED NOT NULL,
  `nome` varchar(100) NOT NULL,
  `imagem` varchar(60) DEFAULT NULL,
  `cod_unidade` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `barbeiro`
--

INSERT INTO `barbeiro` (`cod_barbeiro`, `nome`, `imagem`, `cod_unidade`) VALUES
(1, 'João Carlos', 'foto_1.jpg', 1),
(2, 'Mateus Silva', 'foto_2.jpg', 1),
(3, 'Alice Parra', 'foto_3.jpg', 1),
(4, 'Athos Souza', 'foto_4.jpg', 1),
(5, 'Alysson Veloso', 'foto_5.jpg', 2),
(6, 'Fábio Dantas', 'foto_6.jpg', 2),
(7, 'Mel  Braga', 'foto_7.jpg', 2),
(8, 'Athos  Spice', 'foto_8.jpg', 2);

-- --------------------------------------------------------

--
-- Estrutura para tabela `barbeiro_servico`
--

CREATE TABLE `barbeiro_servico` (
  `cod_barbeiro` int(10) UNSIGNED NOT NULL,
  `cod_servico` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `barbeiro_servico`
--

INSERT INTO `barbeiro_servico` (`cod_barbeiro`, `cod_servico`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(1, 2),
(2, 2),
(3, 2),
(4, 2),
(5, 2),
(6, 2),
(7, 2),
(8, 2),
(1, 3),
(2, 3),
(3, 3),
(4, 3),
(5, 3),
(6, 3),
(7, 3),
(8, 3),
(1, 4),
(2, 4),
(3, 4),
(4, 4),
(5, 4),
(6, 4),
(7, 4),
(8, 4),
(1, 5),
(2, 5),
(5, 5),
(6, 5);

-- --------------------------------------------------------

--
-- Estrutura para tabela `cliente`
--

CREATE TABLE `cliente` (
  `cod_cliente` int(10) UNSIGNED NOT NULL,
  `cpf` varchar(14) NOT NULL,
  `nome` varchar(60) NOT NULL,
  `logradouro` varchar(60) NOT NULL,
  `bairro` varchar(60) NOT NULL,
  `cidade` varchar(60) NOT NULL,
  `estado` varchar(60) NOT NULL,
  `cep` varchar(9) NOT NULL,
  `telefone` varchar(16) NOT NULL,
  `email` varchar(60) NOT NULL,
  `senha` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `cliente`
--

INSERT INTO `cliente` (`cod_cliente`, `cpf`, `nome`, `logradouro`, `bairro`, `cidade`, `estado`, `cep`, `telefone`, `email`, `senha`) VALUES
(1, '227.247.390-35', 'Miguel Duarte', '', '', '', '', '', '(31) 98888-7777', 'miguelduarte@gmail.com', '416f8f6e105370e7b9d0fd983141f00b613477f8'),
(2, '060.296.250-12', 'Paulo Souza', 'Rua Sinfrônio Brochado, 310', 'Barreiro', 'Belo Horizonte', 'MG', '32146-023', '(31) 98888-7777', 'paulosouza89@gmail.com', '08370365ed62e64343e64bed6bc51b91fbfab311'),
(3, '841.802.270-10', 'Leo Guimarães', 'Rua Professor Moraes, 230', 'Savassi', 'Belo Horizonte', 'MG', '30120-040', '(31) 98888-7777', 'leo.professor@gmail.com', '0e1521617b28d42e760310a5e45d6782d2e84528'),
(4, '332.115.220-77', 'João Silva', '', '', '', '', '', '(31) 98888-7777', 'jb.silva@gmail.com', '80bee7d96034dcabd7687ea183ef738965fd2057'),
(5, '012.333.555-80', 'Arllison Lima', 'Av. Brasil, 3000', 'Santa Efigênia', 'Belo Horizonte', 'MG', '30120-050', '(31) 98888-7777', 'arllison@gmail.com', '$argon2id$v=19$m=65536,t=4,p=1$NTZFTXJYRmN1Y2wyNjhDNA$2yg0HFxXjqpyQAk5UKB5i7tc5eBg/wyTyJHvuaS3VfA'),
(6, '033.444.555-66', 'Mateus Duarte', 'Av. Contorno, 120', 'Centro', 'Contagem', 'MG', '32100-100', '(31) 98888-7777', 'mduarte@gmail.com', '$argon2id$v=19$m=65536,t=4,p=1$N1N0UzBPZ3k1c2tQOFB2ZA$YPKJslLfx71rkG2+0tSAHCuJfaY/iBQCf5KchxKA6kk');

-- --------------------------------------------------------

--
-- Estrutura para tabela `servico`
--

CREATE TABLE `servico` (
  `cod_servico` int(10) UNSIGNED NOT NULL,
  `nome` varchar(100) NOT NULL,
  `duracao` int(3) UNSIGNED NOT NULL,
  `imagem` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `servico`
--

INSERT INTO `servico` (`cod_servico`, `nome`, `duracao`, `imagem`) VALUES
(1, 'Corte Tradicional', 50, 'mustache-2.png'),
(2, 'Corte Máquina', 30, 'mustache-2.png'),
(3, 'Barba', 30, 'mustache-1.png'),
(4, 'Selagem', 120, 'mustache-3.png'),
(5, 'Relaxamento', 40, 'mustache-4.png');

-- --------------------------------------------------------

--
-- Estrutura para tabela `unidade`
--

CREATE TABLE `unidade` (
  `cod_unidade` int(10) UNSIGNED NOT NULL,
  `cnpj` varchar(18) NOT NULL,
  `logradouro` varchar(50) NOT NULL,
  `bairro` varchar(30) NOT NULL,
  `cidade` varchar(60) NOT NULL,
  `estado` varchar(60) NOT NULL,
  `cep` varchar(9) NOT NULL,
  `telefone` varchar(60) NOT NULL,
  `descricao` varchar(30) NOT NULL,
  `imagem` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `unidade`
--

INSERT INTO `unidade` (`cod_unidade`, `cnpj`, `logradouro`, `bairro`, `cidade`, `estado`, `cep`, `telefone`, `descricao`, `imagem`) VALUES
(1, '82.527.626/0001-01', 'Rua Sinfrônio Brochado, 310', 'Barreiro', 'BH', 'MG', '32146-023', '(31) 3210-9080', 'Barreiro', 'unidade-barreiro.jpeg'),
(2, '82.527.626/0001-15', 'Av. Antônio Carlos, 1200', 'Pampulha', 'BH', 'MG', '31234-650', '(31) 3210-9070', 'Pampulha', 'unidade-pampulha.jpeg');

-- --------------------------------------------------------

--
-- Estrutura para tabela `unidade_servico`
--

CREATE TABLE `unidade_servico` (
  `cod_unidade` int(10) UNSIGNED NOT NULL,
  `cod_servico` int(10) UNSIGNED NOT NULL,
  `valor` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `unidade_servico`
--

INSERT INTO `unidade_servico` (`cod_unidade`, `cod_servico`, `valor`) VALUES
(1, 1, '80.00'),
(1, 2, '50.00'),
(1, 3, '45.00'),
(1, 4, '60.00'),
(1, 5, '100.00'),
(2, 1, '75.00'),
(2, 2, '50.00'),
(2, 3, '45.00');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `agendamento`
--
ALTER TABLE `agendamento`
  ADD PRIMARY KEY (`cod_agendamento`),
  ADD KEY `fk_agendamento_cliente` (`cod_cliente`),
  ADD KEY `fk_agendamento_barbeiro` (`cod_barbeiro`),
  ADD KEY `fk_agendamento_servico` (`cod_servico`);

--
-- Índices de tabela `barbeiro`
--
ALTER TABLE `barbeiro`
  ADD PRIMARY KEY (`cod_barbeiro`),
  ADD KEY `fk_barbeiro_unidade` (`cod_unidade`);

--
-- Índices de tabela `barbeiro_servico`
--
ALTER TABLE `barbeiro_servico`
  ADD PRIMARY KEY (`cod_barbeiro`,`cod_servico`),
  ADD KEY `fk_barbeiro_servico_servico` (`cod_servico`);

--
-- Índices de tabela `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`cod_cliente`);

--
-- Índices de tabela `servico`
--
ALTER TABLE `servico`
  ADD PRIMARY KEY (`cod_servico`);

--
-- Índices de tabela `unidade`
--
ALTER TABLE `unidade`
  ADD PRIMARY KEY (`cod_unidade`);

--
-- Índices de tabela `unidade_servico`
--
ALTER TABLE `unidade_servico`
  ADD PRIMARY KEY (`cod_unidade`,`cod_servico`),
  ADD KEY `fk_unidade_servico_servico` (`cod_servico`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `agendamento`
--
ALTER TABLE `agendamento`
  MODIFY `cod_agendamento` int(15) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `barbeiro`
--
ALTER TABLE `barbeiro`
  MODIFY `cod_barbeiro` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `cliente`
--
ALTER TABLE `cliente`
  MODIFY `cod_cliente` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `servico`
--
ALTER TABLE `servico`
  MODIFY `cod_servico` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `unidade`
--
ALTER TABLE `unidade`
  MODIFY `cod_unidade` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `agendamento`
--
ALTER TABLE `agendamento`
  ADD CONSTRAINT `fk_agendamento_barbeiro` FOREIGN KEY (`cod_barbeiro`) REFERENCES `barbeiro` (`cod_barbeiro`),
  ADD CONSTRAINT `fk_agendamento_cliente` FOREIGN KEY (`cod_cliente`) REFERENCES `cliente` (`cod_cliente`),
  ADD CONSTRAINT `fk_agendamento_servico` FOREIGN KEY (`cod_servico`) REFERENCES `servico` (`cod_servico`);

--
-- Restrições para tabelas `barbeiro`
--
ALTER TABLE `barbeiro`
  ADD CONSTRAINT `fk_barbeiro_unidade` FOREIGN KEY (`cod_unidade`) REFERENCES `unidade` (`cod_unidade`);

--
-- Restrições para tabelas `barbeiro_servico`
--
ALTER TABLE `barbeiro_servico`
  ADD CONSTRAINT `fk_barbeiro_servico_barbeiro` FOREIGN KEY (`cod_barbeiro`) REFERENCES `barbeiro` (`cod_barbeiro`),
  ADD CONSTRAINT `fk_barbeiro_servico_servico` FOREIGN KEY (`cod_servico`) REFERENCES `servico` (`cod_servico`);

--
-- Restrições para tabelas `unidade_servico`
--
ALTER TABLE `unidade_servico`
  ADD CONSTRAINT `fk_unidade_servico_servico` FOREIGN KEY (`cod_servico`) REFERENCES `servico` (`cod_servico`),
  ADD CONSTRAINT `fk_unidade_servico_unidade` FOREIGN KEY (`cod_unidade`) REFERENCES `unidade` (`cod_unidade`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
