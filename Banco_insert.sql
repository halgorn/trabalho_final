CREATE TABLE `cliente` (
  `id_cliente` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  
  `nome` varchar(45) DEFAULT NULL,
  `cpf` varchar(45) DEFAULT NULL,
  `telefone` varchar(45) DEFAULT NULL,
  `endereco` varchar(45) DEFAULT NULL,
  `id_vendedor` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`id_cliente`, `nome`, `cpf`, `telefone`, `endereco`, `id_vendedor`) VALUES
(4, 'Pedro 23213', NULL, '8643-70333232112312359', 'Rua Paul222222o Cordeiro, 1222', 3),
(5, '3sdasdo Dhon', '321.432.42223.00', '437332-4242', 'Ruasadasd , 210312', 2);


-- --------------------------------------------------------

--
-- Estrutura da tabela `fabricante`
--

CREATE TABLE `fabricante` (
  `id_fabricante` int NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `nome` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `marca`
--

CREATE TABLE `marca` (
  `id_marca` int NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `nome` varchar(45) DEFAULT NULL,
  `id_fabricante` int DEFAULT NULL 
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

CREATE TABLE `produto` (
  `id_produto` int NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `nome` varchar(45) DEFAULT NULL,
  `valor` double DEFAULT NULL,
  `id_marca` int DEFAULT NULL,
  `id_fabricante` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `produto`
--




-- --------------------------------------------------------

--
-- Estrutura da tabela `produto_has_venda`
--

CREATE TABLE `produto_has_venda` (
  `id_produto` int NOT NULL,
  `id_venda` int NOT NULL,
  `quantidade` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `venda`
--

CREATE TABLE `venda` (
  `id_venda` int NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `data_venda` date DEFAULT NULL,
  `data_pagamento` date DEFAULT NULL,
  `id_vendedor` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `venda`
--

INSERT INTO `venda` (`id_venda`, `data_venda`, `data_pagamento`, `id_vendedor`) VALUES
(1, '2021-08-08', '2021-03-08', 1),
(2, '2021-12-04', '2021-10-11', 3),
(3, '2021-11-01', '2021-10-30', 2),
(4, '2021-11-10', '2021-10-15', 5),
(5, '2021-12-01', '2021-10-29', 4);

-- --------------------------------------------------------

--
-- Estrutura da tabela `vendedor`
--

CREATE TABLE `vendedor` (
  `id_vendedor` int NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `nome` varchar(45) DEFAULT NULL,
  `cpf` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `vendedor`
--

INSERT INTO `vendedor` (`id_vendedor`, `nome`, `cpf`) VALUES
(1, 'we dds', '32ss4-586.384-89'),
(2, 'wewe Prado', '42ss3.235.432-43'),
(3, 'fdf fdf', '4ss32.345.754-09'),
(4, '3333a sdsd', '04ss8.549.495-43'),
(5, 'dwwwn Salvatori', '5ss46.755.908.00');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `cliente`
--
ALTER TABLE `cliente`
  ADD KEY `id_vendedor` (`id_vendedor`);

--
-- Índices para tabela `fabricante`
--


--
-- Índices para tabela `marca`
--

--
-- Índices para tabela `produto`
--
ALTER TABLE `produto`
  ADD KEY `id_marca` (`id_marca`),
  ADD KEY `id_fabricante` (`id_fabricante`);

--
-- Índices para tabela `produto_has_venda`
--
ALTER TABLE `produto_has_venda`
  ADD KEY `id_produto` (`id_produto`),
  ADD KEY `id_venda` (`id_venda`);

--
-- Índices para tabela `venda`
--
ALTER TABLE `venda`
  ADD KEY `id_vendedor` (`id_vendedor`);

--
-- Índices para tabela `vendedor`
--

--
-- AUTO_INCREMENT de tabelas despejadas
--


--
-- Limitadores para a tabela `cliente`
--
ALTER TABLE `cliente`
  ADD CONSTRAINT `cliente_ibfk_1` FOREIGN KEY (`id_vendedor`) REFERENCES `vendedor` (`id_vendedor`);

--
-- Limitadores para a tabela `marca`
--
ALTER TABLE `marca`
  ADD CONSTRAINT `id_fabricante` FOREIGN KEY (`id_fabricante`) REFERENCES `fabricante` (`id_fabricante`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `produto`
--
ALTER TABLE `produto`
  ADD CONSTRAINT `id_marca` FOREIGN KEY (`id_marca`) REFERENCES `marca` (`id_marca`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `produto_ibfk_1` FOREIGN KEY (`id_fabricante`) REFERENCES `fabricante` (`id_fabricante`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `produto_has_venda`
--
ALTER TABLE `produto_has_venda`
  ADD CONSTRAINT `id_produto` FOREIGN KEY (`id_produto`) REFERENCES `produto` (`id_produto`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `id_venda` FOREIGN KEY (`id_venda`) REFERENCES `venda` (`id_venda`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `venda`
--
ALTER TABLE `venda`
  ADD CONSTRAINT `id_vendedor` FOREIGN KEY (`id_vendedor`) REFERENCES `vendedor` (`id_vendedor`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

