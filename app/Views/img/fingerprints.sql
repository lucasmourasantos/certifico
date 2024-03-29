-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 23/06/2019 às 00:03
-- Versão do servidor: 10.3.16-MariaDB
-- Versão do PHP: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `fingerprints`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `certificado`
--

CREATE TABLE `certificado` (
  `id` int(10) UNSIGNED NOT NULL,
  `evento_id` int(10) UNSIGNED NOT NULL,
  `layout` varchar(255) DEFAULT NULL,
  `ass` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Despejando dados para a tabela `certificado`
--

INSERT INTO `certificado` (`id`, `evento_id`, `layout`, `ass`) VALUES
(1, 1, 'b0f291dbb5dedf1a70175351e4278ada.jpg', 'f44b03070deaab79e3f4091e2f6a6858.png'),
(2, 2, '5026e40344e7fc743db1603f5c68ac04.jpg', '5018baa49d238f6ba345780c8dda94d5.png'),
(3, 3, '976bf33beec8b033e0b7b9fc010ef2e9.jpg', '0df18dea83c0fd4ec6e5de89fe716962.png'),
(4, 4, 'e7adfe8f7e121ac274e7cdf942a9774b.png', 'f94e3a462f85968e4a39bff9a5ed79ea.png'),
(5, 5, 'dfd8cde4bc153c3bd2d5ae757d91df5b.jpg', 'd791c76674eb3dd8a88e6d32bd3d3585.png');

-- --------------------------------------------------------

--
-- Estrutura para tabela `curso`
--

CREATE TABLE `curso` (
  `id` int(10) UNSIGNED NOT NULL,
  `evento_id` int(10) UNSIGNED NOT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `ministrante` varchar(255) DEFAULT NULL,
  `ch` int(10) UNSIGNED DEFAULT NULL,
  `ch_min` int(10) UNSIGNED DEFAULT NULL,
  `inicio` varchar(10) DEFAULT NULL,
  `fim` varchar(10) DEFAULT NULL,
  `turno` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `curso`
--

INSERT INTO `curso` (`id`, `evento_id`, `nome`, `ministrante`, `ch`, `ch_min`, `inicio`, `fim`, `turno`) VALUES
(1, 1, 'SEGURANÇA PARA APLICAÇÕES WEB', 'Manoel Messias', 12, 8, '12/02/2019', '15/02/2019', 'Manhã'),
(2, 1, 'DESIGN RESPONSIVO E UX', 'Jesiel', 12, 8, '12/02/2019', '15/02/2019', 'Tarde'),
(3, 1, 'CLOUD COMPUTING', 'Rogério', 12, 8, '12/02/2019', '15/02/2019', 'Manhã'),
(4, 1, 'BANCO DE DADOS PARA WEB', 'Rogério', 12, 10, '12/02/2019', '15/02/2019', 'Tarde'),
(5, 1, 'PROGRAMAÇÃO WEB BACK END', 'João Paulo', 12, 8, '12/02/2019', '15/02/2019', 'Noite'),
(6, 4, 'Ecologia e Ecossistemas', 'Msc Professor Visitante', 17, 8, '12/02/2019', '15/02/2019', 'Manhã'),
(7, 4, 'Citologia', 'Professor', 12, 8, '12/02/2019', '15/02/2019', 'Tarde'),
(8, 4, 'Protozoários', 'Outro Professor', 12, 8, '12/02/2019', '15/02/2019', 'Noite'),
(9, 3, 'Gestão de Microempresas', 'Professor Local', 12, 8, '12/02/2019', '15/02/2019', 'Tarde'),
(10, 3, 'Acupuntura', 'Virgínia Portela', 12, 8, '12/02/2019', '15/02/2019', 'Manhã'),
(11, 3, 'Massoterapia', 'Virgínia Leila', 12, 8, '12/02/2019', '15/02/2019', 'Manhã'),
(12, 2, 'Robótica', 'Claudio', 12, 8, '12/02/2019', '15/02/2019', 'Noite'),
(13, 2, 'Análise de Imagens de Ressonância Magnética', 'Marcos', 12, 8, '12/02/2019', '15/02/2019', 'Tarde'),
(14, 2, 'Enfermagem Domiciliar', 'Pedro', 12, 8, '12/02/2019', '15/02/2019', 'Manhã'),
(15, 5, 'Curso I UNOPAR', 'Professor', 12, 8, '12/02/2019', '15/02/2019', 'Manhã'),
(16, 5, 'Curso II UNOPAR', 'Professor', 12, 8, '12/02/2019', '15/02/2019', 'Noite'),
(17, 5, 'Curso III UNOPAR', 'Professor', 12, 8, '12/02/2019', '15/02/2019', 'Tarde'),
(18, 6, 'UNINTER CURSO I', 'Professor de TI mesmo', 10, 8, '10/05/2019', '12/05/2019', 'Manhã'),
(19, 6, 'UNINTER CURSO II', 'Professor', 12, 8, '12/02/2019', '11/11/1111', 'Noite');

-- --------------------------------------------------------

--
-- Estrutura para tabela `evento`
--

CREATE TABLE `evento` (
  `id` int(10) UNSIGNED NOT NULL,
  `instituicao_id` int(10) UNSIGNED NOT NULL,
  `nome` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `evento`
--

INSERT INTO `evento` (`id`, `instituicao_id`, `nome`) VALUES
(1, 1, 'EITEC'),
(2, 3, 'SINFO'),
(3, 4, 'Semana Científica'),
(4, 2, 'SEMEAU'),
(5, 5, 'Curso UNOPAR'),
(6, 6, 'Curso UNINTER'),
(12, 7, 'NÃƒÂ£o pode ser ÃƒÂ© msm');

-- --------------------------------------------------------

--
-- Estrutura para tabela `instituicao`
--

CREATE TABLE `instituicao` (
  `id` int(10) UNSIGNED NOT NULL,
  `nome` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `instituicao`
--

INSERT INTO `instituicao` (`id`, `nome`) VALUES
(1, 'Instituto Federal de Educação - IFPI'),
(2, 'Universidade Estadual - UESPI'),
(3, 'Universidade Federal - UFPI'),
(4, 'Faculdade Rsá - IESRSA'),
(5, 'Universidade Norte do Paraná - UNOPAR'),
(6, 'UNINTER'),
(7, 'É isso ai mesmo');

-- --------------------------------------------------------

--
-- Estrutura para tabela `participante`
--

CREATE TABLE `participante` (
  `id` int(10) UNSIGNED NOT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `sexo` varchar(50) DEFAULT NULL,
  `rg` varchar(11) DEFAULT NULL,
  `cpf` varchar(14) DEFAULT NULL,
  `data_nasc` varchar(10) DEFAULT NULL,
  `cep` varchar(10) DEFAULT NULL,
  `rua` varchar(255) DEFAULT NULL,
  `bairro` varchar(255) DEFAULT NULL,
  `cidade` varchar(255) DEFAULT NULL,
  `estado` varchar(255) DEFAULT NULL,
  `f1` blob DEFAULT NULL,
  `fone` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `participante`
--

INSERT INTO `participante` (`id`, `nome`, `sexo`, `rg`, `cpf`, `data_nasc`, `cep`, `rua`, `bairro`, `cidade`, `estado`, `f1`, `fone`) VALUES
(1, 'Lucas de Moura Santos', 'Masculino', '3.035.388', '046.028.433-95', '05/12/1991', '64603030', 'Avenida Frei Damião', 'Belo Norte', 'Picos', 'PI', 0x00f87f01c82ae3735cc0413709ab71f0b714559703e25aef98890f07a8b0316cfab9c8fd828edf88e8e39c1c09b79c7d5990c5f13aea15ad080c01a1234fcf2799a9ec5f542c808d5a351784c0a5714160ef136d5595f78c4fcc34d942575282935e914c0de20e7dce453782cd6df6e79774a42c76890896e9227c078e03b1d09b7337189928454b7c7559a2382e81b4096af6d847de0c85824d36478e90f289ce13a8462b6f77572dfe0887872fd10af8276c5f7f29e054ede8641a8baad38fe310ef581c7ecf87991ad0c51bd1c4a5a2a555e8c844d5026da971c063799456e3ddbe3a184f706baad83d07396ed9e9838c633ae864d61cca09c87dc04bbdf7a8fa27ced45faf95b570b4e4b8b92e3a0f729145237a295aeb76bb2ac2f35d7e51b22eca1b956b02d838d988e25cfc775821fd4773ec198a872fbe191ae18a33f65819d83c42dbcad994717bf986726944f6fad53796a8dbbdd8be0c5ee52d3164f78769920adb13a8bdd676bcb111b4ef19951cfa8ed29b63cc7586f609c810de41da6f00f88001c82ae3735cc0413709ab71b04e155597a112dde37e1020ea008cc66eac7eec739177455e3a85d8d890e96bfc09c3ec0d4e2fb008c5415e5e20402b37dc7a8820a6f4d72530a48452b8e8e951732ff963751f069fecf729cf5354ee121db98dab739e300c74f8e10e3961295d4e928962adb8b99cb3c399dbe8a2fc7c4ff3363d6e67c9ab0531de3a1b854a21fe31e19fff8fe391784c2af8376a02134684c388f81e09a9fffe519c679840ad871f1a250efbf0c52456d9b32b46309a19610a7e775d235da3a1669536a2ca07da197da6e05040443002fcb83a76f62bebe58411b77764771fcdff9bb28ddb13e3bfd284ecfdbaebe3f81dab446ec4acab5c35c6a269e4d5bccbb21d49d3c4a1559ba665f232e90ff7e5e95565e9616089c3963e5c4509e5402a8618f49525b33c9d3d26b114347f8d9b17e0e2f6c1f0c32abb85fc97c1a067265ff906c6fe695009b0b0477d96a53932a1946c8c8aa414665ae3ef1ad253fad18978f0dcb8d9d1720d8ad55464f790e8f9f117ef4a88b5b698776f00f88101c82ae3735cc0413709ab7170b7145597379c47dc98d79dcde46098e78825840ae98a99728550d74af372e6d33b043a6db1762ace33a0fbebf70076fc2ee513c664ad4f48a1b9ac69985ffaecc673eef49345a9c0b5b7669df7445efa63b83ca062d11d95c3dfa8a404cd2501b6a0ad5cdc5046b3d3286bbc33a47ade0ded235aeeaf97163b0a286e30b414e4ed72c5bd6b70e32c44bb21b0678984146b8526d197636241334bf4cdb883b295380b680821b4ff19e491d179b360c74cc1a99f90674bae2e2d4b1bcaddd4c1c9f7043c658c094883a13808cf39873d74ff1d71141744113a8d9e8cf66427a3f6a681de218105d58b3da0cb1e59b362aafbdd385db1304a2eaceadb134ddefa0af1e6a2507cc4fe4eb666aa361cba5627c4e9d1a2813b6d13aab1648c04a0b5ad9636e4cfe5106abf5301ee867b6e4d629a057a9774e14eaa3693927f276171c964a531f0ade0887cee49cd94c5a62c7b49186e44b98b0dd89c624af1954b4582d59c3d049d1ab720a0e602b6462d3298a686c29f516f00e87f01c82ae3735cc0413709ab7130ac145597ba7fcf6916ec2171dc7b9c7ff38ecf0e5924b63c6d62422cb917a6ba841c88433aae20cee4521eabe3383c07b678e2f2c96f903a8624282437ca87bb64dcd439ce999907223fd14be56276216a4dce885dda244522fb95545f2303081f20e66d4c2b7aaa5db4eccf64d14f70fce681d3e2e7c7fa699a0d879a467d6270af3eb561247115c4ca39ed28a052dc641bf4058d77093216715bc4fcc2b4a60349a4135562d2e7044a610f21dd700eff5286978aee153a1a6c032deb8d12a406205a5f567d8b4d185daa0a1a643525a481aa24899f1e3ae8ee6e2589f8f9374cb02214373b60a2c5504cfb1e74b6e42da629dffb995cb3a4667700a5e29222c2c3391a2c59b605f6281705580e301165088e7fa03cec96a102d0a84610426224e58e713cf92c83b898db8761ed67dedf50585ed3c58d6e98a7c2db3f69dd21fca75998da0ccd8a5aa2679d351cfe832cb8966cf59aa952970dac2005836de8a3b0da2e60b33cb904e7cf677654899ad931eb6f0000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000, '89988081210'),
(2, 'Bruna Fiori Castro', 'Feminino', '2.453.907', '299.016.263-15', '21/06/2001', '64603030', 'Avenida Frei Damião', 'Belo Norte', 'Picos', 'PI', 0x00f88101c82ae3735cc0413709ab71f08f145597ac0b0b3b68bbf8aec147c829c86ead4b0d437c21ed7688f9a1fbeccbf9e84066ef4558e40013794f93418bfe90839c35713f07300d15f04094cec2a5295db4fbc898002d37ba95beb7847ed94e9de854c4ff02b6c715dc111175902e389f139f2b94d145f78b0a1c9c2d36c74b9a67251006d6943a47b0aee028498f44395817c413b0cb6d1409a1dd1758fc098e39e06d08b02a40760414375f7c62ea49f8aa8a986ba012d8b8c4b7416c0c02b5437b5317dbf897f08c3038a18a7e28cd9a2530675a919b2613be7c23cf01f62fd42ca52c0e4b12bcffc20aa7e66880fc375c67f79344a7803d6dd2fcc8bfd4b5bb5e8bfee23427bf51f411bc70a3de960886d3f11abf5ba346460e9b5f297052ebb2811baca2435b48147108e30fc1973e7dd365a5f9f0a534e233c27555824b025b05fd502710491a409c75d7336036d10000334d5fe0875ddce38ef3e4c3b6da928616bddba089c0303c8781833f5884686089e3da007ded6288badc411287c398cc6f00f87e01c82ae3735cc0413709ab713080145597a74bf31144a631d22c34a0a8d84b6eaddd03a5f6f2733be93b6f7f939183e8ca9002b317be98b39608a624b9054d45693b33ee22813d655b2f5a4a112420918792aead16bc7b83bf8e533fea3f18dfcb0e7c143f038eac00f63d40c91debae9e9a06f000f7defcd7de007ab1eaa27b4170738543d11dd6fa565a5b274f9fed801d2f1b36fb994c23e0260a06b3ea6871f506dac843d74d3989627b0f9b83372c41e8b0c450d89064627b3939b62c54c6f93bf9daeeb424b3e12a4d1419d989a4b55e2a1dce026f8e1dbfbda7135c59f366b6e5b816d20ada55d938760f63c932a62140773004e9902fc9339750406bdf83d0d0bad09882cd3efe33b322f00d246bc66841c25591585ae44f48adf027873e28cdc0b1c31dbafc66c69129f4fc8987719524df256805c07b2cff177f1b7bedcda5bb79d1404f1f7f2eea5f4f2bcdd52fc2e35ac64e7e69fefc1a6c9924096092c57641c394eaefb71e1b05a81f6be86f1fa36c6fe55eb52da746a6a96f00f88001c82ae3735cc0413709ab7130fd145597de231d0eaa31b211a814f1d89db2114700a425427a06aaa70c2aa9b25e93efb4e94e0134ef4149c71ca9a07e9901c944fe8bfa4486ba570addc51c06715e9545c1463c98ce7d596353cdf8ae5f72ee92679f2d4e7cefedff5ed0700667d921dbbbed2edd3ed49270c95122fd4a9ffeca3120d1d087ca48e8ecf4321735f0fcbbb306492b2120ac15d4828a91b8925009915511664e4b149b63c898d9e93f3d668ab8fee938c6c6ef563d1a2ff171130deaa80a581388a9097d836405ead046640e41947f22adc480e9be035238612bed457b090e582600a83af2788349f4245c8d658d094d5b7ee6723c4eaa0132f35e2d47d1805fa94a9d4bb08f4bd502b514942507cade720dde99334b37029867fb780f7f9fec3d67de8409fa102324928aeb3bb2565698c825e780eaaa6d94085f8b133f2d3dd3b5ced8b14c5b9a6347162b995e6b5e431b54f0cd1cfceb4d49850ffc2627c6ec82b54a9ea7ab54df7930c3f6fe73209e0935675ae681a4758b226f00e88001c82ae3735cc0413709ab71b082145597c450e2f11cda4e8caeb6743c9568a406a8da6ff4663aa938d3d594e0b0864597cefae7a8e9f7ae1d714947c4706dd94d6a492d845b60bf2de18fbabd7564448813ea93929db780ea41d424cb22ca5093a824f002a82469618ddc176bd422cf7ed85d40c656d55ad3c7a8d4b123af145e38416d2099ce71b125991d1580bade3d266b74d6dd7b779fe942dde253ff383f1454bf2ca437e3c3c5cdb0a7b77b9f55dd43c9cb01bed1463a1b914b362fb98e1e3d9cc1608a2c9a357d868e024f7358d507c7786f439f3cd677bbcd40b5a2d570b00e02604d9ecbe2c24b0b09da493a22fa8bdcbf513212fb6cb7360624879b6bb1b0663607109d6aebcf1a768797e026c56f6769b5cef205388f9f3f1b73bc847c6427790f793d433abf1547feff75b6799970ec8685c89abf1b42101876630ddd7d6550b17fb1a1fea3b56a3598a753b74b064ec8d8eb0c543af37b0ebf41aec5cb6ed38c2aa8fca71b4fb692bd511135855fee0756570cbe69e57dd313af6f0000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000, '89988081210'),
(3, 'Bruno Silva Sousa', 'Masculino', '1.111.111', '662.502.933-53', '21/06/2001', '64603030', 'Avenida Frei Damião', 'Belo Norte', 'Picos', 'PI', 0x00f88101c82ae3735cc0413709ab71b0bb145597dc52599e569a9550f1a84db221530dbbdc6d03d5cb08ac5f67f575df647115aed64a006b7b311673b0eddda98ba36bd18317697e1f165630ece1c1886d072abc0d414f14a8cb5e6c23b5d03e9e0eef29c46345eb8b4e74cdf06b12337c1d4e3ab37dfdeac8dd2a326c075995b65436413f98584ff95a98232a6a6dab15552a42dc5f16141ecfadbaa134bfe7731ee7027f48fd0a60b4aafc0af4e428ba5afa844a3b99f06b9ae80c875d0627ecf5dd1112363898aedbb2c5dfeef31f627c673377dd7cdf4d07d0299893be458c2fde0e596e7195000f39f5350cb4ee4dcba7d4de2fa5431db000ea042343cd1a463262f308769e511b2dee494f0f8624545db60a5b5cd8f26cd31209e9b3043be0536386c1665c96a500173434408082c0dc047d8deb2051676420f570d5b2c11f10a06f27e761b27e160b25812c3d51fe2c6289975f9d7605a5d1f4b49721f86447adf0acc18aa297db2f5a4d8ad3cba3cc860c99e95449a7ffb188de1ca1da69f758d96f00f88101c82ae3735cc0413709ab71b0a814559759cf864b5fbbb12a37f06a72e276ed02baa613b52dac1b8be007f4fbffb1cab556675661419b74f930ef8e13a01a4c92ebdfd7c5b198004b7928a4ae10ece43cf26b32addfedaad483bebcf2d16b8e2f1ee34c6c2bf35442e6134c43241de327e3a419c096b2e8f9d084ddff1a61219b120371affae1928b9074743144ce043bebe387527ef9c562abe4f2ab3cb8b71eb28233274306d9628b8b52b66ee76cdd718c851c56c9d41ea345ad59d89093d64e7212fe7ebaf1b15eabd4a69ad7ffa38320c24f9503cd87201ac78d0f2cf4a9a086bb5f6cf51501edf794c55c31193785e1e48db5fda9bfc8bfd19e9ffb149aa38cdea3fecb4f68cdc53eb52ed12fe1781e7c0e99488f75f2d8f31e1b4e2a770c1bd6edc3e0b68ec4785e1cf236ee047d352740087957c74f7b7ef8080f443948828f61ef057c00b4158a0975976ee12fc786f3c8ff103503ea620266c1bf4b321b359bab08a04a70d8dcdb8379eb5a7630c03cf194b306d670cde61d7c1e647e6f00f87f01c82ae3735cc0413709ab7130af145597d5b80c083c56233909d23b083f670570961e09fe4efa61af28e5e1810152b4c5bb2ec5195c004c1c50b1fe5bc812843ecf873e07f57e0c8626017707734f1bd18173c13a9e33afbd0e2c3556bf091e83590984b9f78004213270357eb3a5ba113367b409d2e5f6cca91aeb88b3c753125e51c9005293f954c6733ca2ea2baf006bab22bb09f31a5ca71c991167ddbdced6b1c98d18a082da6b39bcdfa036b28c9f63313c8c0041a550f134d8fbf232d5feb6036ab8b8cd8e37bffcc48484bd06ea9520e5e2a8712029d29350e1571318e039fd75c88e6b4e78285b2887b7a0a24932e3e061f3411fd8489b53118adf96881f0234ec6c55174aa655e115b260dc3d26ab43001689d12b0aad9d15b7a338555aefa9446c921fdb9d64fc0a90500b956f2b2619223045262976bc7b5077245f603a2d85e0c5ffa63f9d31ac0403cc9fd682f1d50bfd8308906f58c57364c4a60eb732c9c05d1dce8d6e63a80bd00b4b2faf4fcdbd6dfb04cac8c03ac7fc6f00e88101c82ae3735cc0413709ab713081145597e9332122db147fc9380ab5704248ed9781cf09883206b3530ad3a3e1ba85c47d7ca39df3fc551d088757bd8265aaa1b1cd9bb0987c4acf9c239f86bdfdffcf2c51fe2c7e345d9a0aef40c88b535b0d655166482ad3da1f15d87583d543ace42e24cf466bf6057916f34ee913649de4369a8f5a74f39814ef5c6a0d7e4ef6fcb396c579389f30bb680d0d5d35c91ad7e49764df1fbbafad8787d10516b92c28c73751135bf16f36333acda053d0febcdfbf1ca97af50e23a8d75b474225ce1fd6df89564a1931d16fa5f750f40bfa093a91773b458f12878524f53772bd212b4b63d23c5f71400e4fc971514899771b6df116abf1d82d35ddf71ef7ac55c922f66ed1c23ced2e49ee6111ae51f824fbb33d289a1d8cad11bceb19470e6ada7627f611a783767045bfdc3101de4d9365b405bde464e7831f684f118dfdaf07b19e20bf44d3fdefe424e54b9844b21d84b8f9e70917d5fed625fe5f9af4264d94ef15d1bcd94ed5b43daf396807fb8f9aafd16f0000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000, '89988081210'),
(4, 'Teste', 'Masculino', '11111', '060.432.223-29', '11/11/1111', '64600148', 'Avenida Nossa Senhora de Fátima', 'Canto da Varzea', 'Picos', 'PI', 0x00f88101c82ae3735cc0413709ab7130f21455973a0c6775c7bf89c99f8b7dc9a8e1c61333c72141aae0830ffaf130f82c28d4518d1ce818e800cfc5b43c53ef8809925083d3a871552a3ebfe528caef9678b453c797fa895b73446c1d1ace6a7071fbefc8a1534c4ed7aa7e5a6e7572397aef62a0de009c10fa7e5093ca8691fc61a679c3126ac1f2f882b940390ef4137f46b3560469f404e99d2df9c9072f5e2286f4af7c42f1c52c8b5e0c90fb706c37a5fb36c13b633df1b413649f8a84dca63d4c5b8a5c3a1e80735745de438fe8b5914adf3985bae5c8f655ed4d80a42809585183fdd7ee32d9591091b772899c0d4f9c1ad577f5415162df0fad7305803e296a179f6dbe6c9fc153ea2b41a123831872f6921bb640cb702e3f1fe3ccee964394697828f9aa2085c3373f7180c3510821e0cfe92fe4c841ac6f21b3b3a8c8132a9bcf317908cdbec4f597f09cb82f0cc706a855bd807623558499ed2e120398e6da071b8bf2ea37b7c6414a13626d5b9c982b3aa6ef13e8d9a41241f18a72c72acb6f00f83201c82ae3735cc0413709ab71f089145597ed7edbbf8f6328d4df5f0f28c41c481220201b0fb00896501e0fdfd1e507c820293336f804e1b9d01e673e900ae55dd927a21af68925d2362f23bc50040e2b82c32dc1474bcfbb0d802a689479a34d5381b5dfb2e0dc942e7958edacfe43fd3075e9f0475428cfca9ff36ab13ba528777512ac1896fcc6cdddecd5982e79d658fc833ee7e9ac7eecb5a8ce1acb7005845475298bfe7ed6586af1f4f9b05863f0d720a95efe31d09d782ef9c79f351305a4d1ce514a8b33600355e759c02c073a2ed7b244ec068d532534e6dacebaa300d9d820f4dbb9c5091a82bad1dfe55898916b293721d27b019ce37c64007c6b20a50213013ff4253eb2c3855abd6fd52620587b24a589e702fa53a867e266086cce1d9e0ab714ee0969b1349a3c522f5c5adb6f00f85601c82ae3735cc0413709ab7170f3145597f5c4dbf22e69b06473825736dba6b23fd023925d66865d72089e5596aab67793f4b68828b1a7c0c221c4609c9f0b1e2be18c807f15a9b83a5e91a7601b4655d73c0489ea13e33fb3bfc6605bbe7dd1baa4384c3f6fea973c794221fa4eb94cbc620fe711d17444a8d6a34502f1cbfb4a87cd9f80a676950935ebfb76535b9c7c0df8f8cef03e8f24f60818506bc32beb04a7d0b93fcfb1bd7e4127ce9b5131fe29e8ef52e4255846da9db3ff7b0eeb0f973b467d55021fa437ece11e8f0f7500ca10a85d7014496e2a9f4cbc2f4594fcab26fc9be5e3faff9d6faeebda1afc09f5859d1097e292606d6d11cbd705da57f1eac56effc2f917f09ffa1af3b6f3a2cd4116c4ca7082bb4e7286badb648fabca02f96dd6b5299bd63c97dc95991acca8b0fc0d40ea0f114266f139d1b664040d183e3fbe2e6ed4541337e282dba8e63c83d9df22286f00e87f01c82ae3735cc0413709ab7130851455972555506db5a9d28db557cd07b2a4fff48604b364166df0cf1b8f03770299a34bd2b5c2baa3494d03d07f316962e57b423de68f11cee4856638a59e67f28f7f4ac38b7c86d56c8eba85d32e89e21e2744bc238c8b08d0c677c105a86dec91267b52b92a8d79dcaa0ea9cef13ebf955ccbcd9edb0474ffadd5d1bb10711c30e8793a88159c39ed333cc6bf20c7d1e1900c778d044b96d876df37b9a1d1c9df1bad14167c9ac8263c655ea0b13bd0993121d85fba01690e96a860557a43f0ce87d5d7a64697463c764d099f765ab6e36b7de3f9f5f98b9aecbfa944d1a043ca11dd55caedee8b909d708caf4bacb14120cf4a80c91ce0d309fe93e760ccadf7e4b1b653af12703a8d492d4e7b1c508827a36c6442fed05d1109597650856ad2e4287adf78811c8f3bc06e20f17840d2605c85a729aa4027ab27906e02efc69e52f1e2b76dba16d51c4cd95af5398126e7847e927089b8d3109c16ffe855c43cbb4c4140fb6cc7580833e7fc3a32f12be96f00000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000, '89988081210');

-- --------------------------------------------------------

--
-- Estrutura para tabela `participante_tem_curso`
--

CREATE TABLE `participante_tem_curso` (
  `participante_id` int(10) UNSIGNED NOT NULL,
  `curso_id` int(10) UNSIGNED NOT NULL,
  `evento_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Despejando dados para a tabela `participante_tem_curso`
--

INSERT INTO `participante_tem_curso` (`participante_id`, `curso_id`, `evento_id`) VALUES
(1, 3, 1),
(1, 4, 1),
(1, 12, 2),
(3, 12, 2),
(3, 13, 2),
(2, 11, 3),
(2, 7, 4),
(2, 8, 4),
(3, 6, 4),
(4, 16, 5),
(4, 18, 6);

-- --------------------------------------------------------

--
-- Estrutura para tabela `ponto`
--

CREATE TABLE `ponto` (
  `id` int(10) UNSIGNED NOT NULL,
  `curso_id` int(10) UNSIGNED NOT NULL,
  `participante_id` int(10) UNSIGNED NOT NULL,
  `data_2` varchar(10) DEFAULT NULL,
  `hora` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Despejando dados para a tabela `ponto`
--

INSERT INTO `ponto` (`id`, `curso_id`, `participante_id`, `data_2`, `hora`) VALUES
(1, 3, 1, '19/05/2019', '16:52'),
(2, 3, 1, '19/05/2019', '16:53'),
(3, 3, 1, '19/05/2019', '16:54'),
(4, 4, 1, '19/05/2019', '16:54'),
(5, 4, 1, '19/05/2019', '16:55'),
(6, 12, 1, '19/05/2019', '16:56'),
(7, 12, 1, '19/05/2019', '16:56'),
(8, 4, 1, '19/05/2019', '17:46'),
(9, 3, 1, '19/05/2019', '17:47'),
(10, 12, 1, '19/05/2019', '17:50'),
(11, 12, 1, '19/05/2019', '17:51'),
(12, 12, 1, '19/05/2019', '17:51'),
(13, 4, 1, '19/05/2019', '17:52'),
(14, 4, 1, '19/05/2019', '17:52'),
(15, 12, 1, '19/05/2019', '18:00'),
(16, 12, 1, '19/05/2019', '18:01'),
(17, 8, 2, '19/05/2019', '18:01'),
(18, 12, 3, '19/05/2019', '18:01'),
(19, 8, 2, '19/05/2019', '18:02'),
(20, 12, 3, '19/05/2019', '18:25'),
(21, 12, 3, '19/05/2019', '18:25'),
(22, 8, 2, '19/05/2019', '18:25'),
(23, 8, 2, '19/05/2019', '18:29'),
(24, 12, 3, '19/05/2019', '18:29'),
(25, 8, 2, '19/05/2019', '18:31'),
(26, 12, 3, '19/05/2019', '18:31'),
(27, 12, 1, '19/05/2019', '18:33'),
(28, 12, 1, '19/05/2019', '18:33'),
(29, 12, 1, '20/05/2019', '19:49'),
(30, 8, 2, '20/05/2019', '19:49'),
(31, 12, 3, '20/05/2019', '19:49'),
(32, 12, 3, '20/05/2019', '19:49'),
(33, 8, 2, '20/05/2019', '19:50'),
(34, 12, 3, '20/05/2019', '19:51'),
(35, 8, 2, '20/05/2019', '19:51'),
(36, 12, 1, '20/05/2019', '19:51'),
(37, 16, 4, '20/05/2019', '19:52'),
(38, 4, 1, '30/05/2019', '17:02');

-- --------------------------------------------------------

--
-- Estrutura para tabela `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `usuario` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `senha` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `users`
--

INSERT INTO `users` (`id`, `usuario`, `email`, `senha`) VALUES
(2, 'admin', 'lucasmourasantos@gmail.com', '21232f297a57a5a743894a0e4a801fc3'),
(3, 'lucas', 'lucasmourasantos@gmail.com', '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Estrutura para tabela `validacao`
--

CREATE TABLE `validacao` (
  `id` int(10) UNSIGNED NOT NULL,
  `cpf` varchar(14) DEFAULT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `curso` varchar(255) DEFAULT NULL,
  `codigo` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `validacao`
--

INSERT INTO `validacao` (`id`, `cpf`, `nome`, `curso`, `codigo`) VALUES
(1, '046.028.433-95', 'Lucas de Moura Santos', 'CLOUD COMPUTING', 'bsnMb1Z'),
(2, '046.028.433-95', 'Lucas de Moura Santos', 'BANCO DE DADOS PARA WEB', 'OaUD2Lp'),
(3, '046.028.433-95', 'Lucas de Moura Santos', 'Robótica', '9mxc7he'),
(4, '299.016.263-15', 'Bruna Fiori Castro', 'Protozoários', 'vaogRjW'),
(5, '046.028.433-95', NULL, 'Robótica', 'JrxlThA'),
(6, '046.028.433-95', 'Lucas de Moura Santos', 'CLOUD COMPUTING', 'gbWgznE'),
(7, '046.028.433-95', 'Lucas de Moura Santos', 'CLOUD COMPUTING', 'VVyXH48'),
(8, '046.028.433-95', 'Lucas de Moura Santos', 'BANCO DE DADOS PARA WEB', 'FrKDv0R'),
(9, '046.028.433-95', NULL, 'Robótica', 'YdHbck2'),
(10, '046.028.433-95', NULL, 'Robótica', 'mlwUoPd');

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `certificado`
--
ALTER TABLE `certificado`
  ADD PRIMARY KEY (`id`),
  ADD KEY `certificado_FKIndex1` (`evento_id`);

--
-- Índices de tabela `curso`
--
ALTER TABLE `curso`
  ADD PRIMARY KEY (`id`),
  ADD KEY `curso_FKIndex1` (`evento_id`);

--
-- Índices de tabela `evento`
--
ALTER TABLE `evento`
  ADD PRIMARY KEY (`id`),
  ADD KEY `evento_FKIndex1` (`instituicao_id`);

--
-- Índices de tabela `instituicao`
--
ALTER TABLE `instituicao`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `participante`
--
ALTER TABLE `participante`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `participante_tem_curso`
--
ALTER TABLE `participante_tem_curso`
  ADD PRIMARY KEY (`participante_id`,`curso_id`),
  ADD KEY `participante_has_curso_FKIndex1` (`participante_id`),
  ADD KEY `participante_has_curso_FKIndex2` (`curso_id`),
  ADD KEY `participante_tem_curso_FKIndex3` (`evento_id`);

--
-- Índices de tabela `ponto`
--
ALTER TABLE `ponto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ponto_FKIndex1` (`participante_id`),
  ADD KEY `ponto_FKIndex2` (`curso_id`);

--
-- Índices de tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `validacao`
--
ALTER TABLE `validacao`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `certificado`
--
ALTER TABLE `certificado`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `curso`
--
ALTER TABLE `curso`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de tabela `evento`
--
ALTER TABLE `evento`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `instituicao`
--
ALTER TABLE `instituicao`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `participante`
--
ALTER TABLE `participante`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `ponto`
--
ALTER TABLE `ponto`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `validacao`
--
ALTER TABLE `validacao`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
