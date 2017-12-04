SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;


INSERT INTO `aquisicao_aves` (`id`, `data_chegada`, `hora_chegada`, `data_saida`, `hora_saida`, `numero_gta`, `numero_nf`, `quantidade_total`, `quantidade_morta`, `raca`, `preco`, `vacinas`, `idade`, `id_usuario`, `observacoes`, `ativo`, `created_at`, `updated_at`) VALUES
(1, '2017-12-04', '10:13:00', '2017-12-05', '07:13:00', '004644', '324658154', 125, 0, 'Orpington', '620.00', 'Coccidiose, Pneumovírus', 70, 8, '-', 1, '2017-12-04 13:24:48', '2017-12-04 13:31:25'),
(2, '2017-11-11', '11:01:00', '2017-11-13', '08:30:00', '-', '-', 150, 0, 'Embrapa 051', '750.00', 'Anemia Infecciosa, Doença de Gumboro, Encefalomielite', 120, 27, 'N/A', 1, '2017-12-04 13:28:32', '2017-12-04 13:32:02'),
(3, '2017-05-04', '13:34:00', '2017-05-13', '11:40:00', '112481', '667814332', 30, 0, 'Caipira De Pescoço Pelado', '150.00', 'Anemia Infecciosa, Coccidiose, Coriza, Doença de Marek', 365, 12, 'N/A', 1, '2017-12-04 16:35:06', '2017-12-04 16:35:06'),
(4, '2017-05-04', '13:34:00', '2017-05-13', '11:40:00', '112481', '667814332', 30, 0, 'Caipira De Pescoço Pelado', '150.00', 'Anemia Infecciosa, Coccidiose, Coriza, Doença de Marek', 365, 12, 'N/A', 0, '2017-12-04 16:44:14', '2017-12-04 16:44:25'),
(5, '2017-03-11', '10:40:00', '2017-03-13', '15:10:00', '001451', '001341876', 300, 10, 'Caipira De Pescoço Pelado', '5000.00', 'Anemia Infecciosa, Bronquite Infecciosa, Coccidiose, Coriza', 369, 1, '-', 1, '2017-12-04 16:45:24', '2017-12-04 16:45:24'),
(6, '2017-12-04', '13:45:00', '2017-12-04', '13:45:00', '545454', '6546464645', 64545, 6464, 'Orpington', '654654.00', '-', 369, 1, '-', 0, '2017-12-04 16:46:19', '2017-12-04 16:46:29'),
(7, '2017-12-04', '13:46:00', '2017-12-04', '13:46:00', '654654', '654654', 654654, 65465, 'Rhode Island Red', '654654.00', '-', 1188, 1, 'aasss', 0, '2017-12-04 16:47:06', '2017-12-04 16:47:23');

INSERT INTO `coleta_ovos` (`id`, `data`, `hora`, `quantidade_coletado`, `quantidade_quebrado`, `id_usuario`, `observacoes`, `ativo`, `created_at`, `updated_at`) VALUES
(1, '2017-12-04', '08:06:00', 50, 3, 11, '-', 1, '2017-12-04 11:06:54', '2017-12-04 11:06:54'),
(2, '2017-12-03', '08:06:00', 37, 2, 25, '-', 1, '2017-12-04 11:07:17', '2017-12-04 11:07:17'),
(3, '2017-11-09', '10:05:00', 55, 3, 1, '3 ovos em formação quebraram', 1, '2017-12-04 11:08:37', '2017-12-04 11:08:37'),
(4, '2017-08-09', '13:58:00', 26, 3, 10, '-', 0, '2017-12-04 11:58:26', '2017-12-04 12:34:28'),
(5, '2017-12-04', '15:34:00', 63, 5, 1, '-', 1, '2017-12-04 12:35:18', '2017-12-04 12:35:18');

INSERT INTO `estoque` (`id`, `quantidade`, `preco`, `id_produto`, `ativo`, `created_at`, `updated_at`) VALUES
(1, '0.00', '0.00', 18, 0, '2017-12-04 18:40:30', '2017-12-04 18:45:14'),
(2, '0.00', '0.00', 2, 1, '2017-12-04 18:40:30', '2017-12-04 18:40:30'),
(3, '0.00', '0.00', 3, 1, '2017-12-04 18:40:30', '2017-12-04 18:40:30'),
(4, '0.00', '2.50', 4, 1, '2017-12-04 18:40:30', '2017-12-04 19:10:30'),
(5, '0.00', '4.00', 5, 1, '2017-12-04 18:40:30', '2017-12-04 19:07:39'),
(6, '0.00', '0.00', 6, 1, '2017-12-04 18:40:30', '2017-12-04 18:40:30'),
(7, '300.00', '5.00', 7, 1, '2017-12-04 18:40:30', '2017-12-04 19:24:40'),
(8, '100.00', '10.00', 8, 1, '2017-12-04 18:40:30', '2017-12-04 19:01:30');

INSERT INTO `fornecedor` (`id`, `nome`, `cpf_cnpj`, `telefone`, `endereco`, `observacoes`, `ativo`, `created_at`, `updated_at`) VALUES
(1, 'Reci Embalagens LTDA', '01.312.724/0001-33', '(11)5018-2020', 'Rua Dom Joaquim de Nazaré, 155  Vl. Nogueira  Diadema – SP', '-', 1, '2017-12-04 17:00:14', '2017-12-04 17:06:57'),
(2, 'PALONI COMERCIO E INDUSTRIA DE EMBALAGENS LTDA', '43.538.198/0003-36', '(11)2061-5544', 'Rua Agostinho Gomes, 878 -Ipiranga-São Paulo-SP', 'paloni@paloniembalagens.com.br', 1, '2017-12-04 17:03:23', '2017-12-04 17:03:23'),
(3, 'Coopermota Cooperativa Agroindustrial', '46.844.338/0006-35', '(18)3341-9400', 'Av Saudade, SN - Candido Mota - SP', '-', 1, '2017-12-04 17:06:21', '2017-12-04 17:06:41'),
(4, 'ZOETIS INDUSTRIA DE PRODUTOS VETERINARIOS LTDA', '43.588.045/0001-31', '0800 011 1919', 'R LUIZ FERNANDO RODRIGUES, 1701  Bairro BOA VISTA  - Campinas-SP', '-', 1, '2017-12-04 17:19:45', '2017-12-04 17:19:45');

INSERT INTO `fornecimento` (`id`, `lote`, `quantidade`, `data_fornecimento`, `preco`, `data_fabricacao`, `data_validade`, `numero_nf`, `observacoes`, `id_produto`, `id_usuario`, `id_fornecedor`, `ativo`, `created_at`, `updated_at`) VALUES
(1, '1', '300.00', '2017-12-04', '5000.00', '2017-11-04', '2017-12-04', '546891', '-', 7, 1, 1, 0, '2017-12-04 17:46:44', '2017-12-04 19:08:30'),
(2, '255', '100.00', '2017-12-04', '500.00', '2017-12-01', '2019-12-04', '551346', '-', 7, 8, 2, 0, '2017-12-04 19:06:01', '2017-12-04 19:08:33'),
(3, '1145', '200.00', '2017-12-04', '800.00', '2017-12-04', '2019-12-04', '445744', '-', 8, 10, 2, 0, '2017-12-04 19:07:39', '2017-12-04 19:08:36'),
(4, '1154', '200.00', '2017-12-04', '600.00', '2017-12-04', '2019-12-04', '569922', '-', 7, 1, 2, 0, '2017-12-04 19:10:30', '2017-12-04 19:21:44'),
(5, '1141', '300.00', '2017-12-04', '1500.00', '2017-12-04', '2019-12-04', '448464', '-', 7, 6, 2, 1, '2017-12-04 19:24:40', '2017-12-04 19:24:40');

INSERT INTO `funcao` (`id`, `funcao`, `observacoes`, `ativo`, `created_at`, `updated_at`) VALUES
(1, 'administrador', 'Usuário com acesso total ao sistema.', 1, '2017-12-04 11:06:02', '2017-12-04 11:06:02'),
(2, 'convidado', 'Usuário com acesso restrito à visualização de registros.', 1, '2017-12-04 11:06:02', '2017-12-04 11:06:02');

INSERT INTO `gaiola` (`id`, `numero_gaiola`, `quantidade_aves`, `ativo`, `created_at`, `updated_at`) VALUES
(1, 0, 4, 1, '2017-12-04 11:06:02', '2017-12-04 11:06:02'),
(2, 1, 4, 1, '2017-12-04 11:06:02', '2017-12-04 11:06:02'),
(3, 2, 4, 1, '2017-12-04 11:06:02', '2017-12-04 11:06:02'),
(4, 3, 1, 1, '2017-12-04 11:06:02', '2017-12-04 16:49:29'),
(5, 4, 4, 1, '2017-12-04 11:06:02', '2017-12-04 11:06:02'),
(6, 5, 4, 1, '2017-12-04 11:06:02', '2017-12-04 11:06:02'),
(7, 6, 4, 1, '2017-12-04 11:06:02', '2017-12-04 11:06:02'),
(8, 7, 4, 1, '2017-12-04 11:06:02', '2017-12-04 11:06:02'),
(9, 8, 4, 1, '2017-12-04 11:06:02', '2017-12-04 11:06:02'),
(10, 9, 4, 1, '2017-12-04 11:06:02', '2017-12-04 11:06:02'),
(11, 10, 4, 1, '2017-12-04 11:06:02', '2017-12-04 11:06:02'),
(12, 11, 4, 1, '2017-12-04 11:06:02', '2017-12-04 11:06:02'),
(13, 12, 4, 1, '2017-12-04 11:06:02', '2017-12-04 11:06:02'),
(14, 13, 4, 1, '2017-12-04 11:06:02', '2017-12-04 11:06:02'),
(15, 14, 4, 1, '2017-12-04 11:06:02', '2017-12-04 11:06:02'),
(16, 15, 4, 1, '2017-12-04 11:06:02', '2017-12-04 11:06:02'),
(17, 16, 4, 1, '2017-12-04 11:06:02', '2017-12-04 11:06:02'),
(18, 17, 4, 1, '2017-12-04 11:06:02', '2017-12-04 11:06:02'),
(19, 18, 4, 1, '2017-12-04 11:06:02', '2017-12-04 11:06:02'),
(20, 19, 4, 1, '2017-12-04 11:06:02', '2017-12-04 11:06:02'),
(21, 20, 4, 1, '2017-12-04 11:06:02', '2017-12-04 11:06:02'),
(22, 21, 4, 1, '2017-12-04 11:06:02', '2017-12-04 11:06:02'),
(23, 22, 4, 1, '2017-12-04 11:06:02', '2017-12-04 11:06:02'),
(24, 23, 4, 1, '2017-12-04 11:06:02', '2017-12-04 11:06:02'),
(25, 24, 4, 1, '2017-12-04 11:06:02', '2017-12-04 11:06:02'),
(26, 25, 4, 1, '2017-12-04 11:06:02', '2017-12-04 11:06:02'),
(27, 26, 4, 1, '2017-12-04 11:06:02', '2017-12-04 11:06:02'),
(28, 27, 4, 1, '2017-12-04 11:06:02', '2017-12-04 11:06:02'),
(29, 28, 4, 1, '2017-12-04 11:06:02', '2017-12-04 11:06:02'),
(30, 29, 4, 1, '2017-12-04 11:06:02', '2017-12-04 11:06:02');

INSERT INTO `morte_aves` (`id`, `data`, `hora`, `id_gaiola`, `id_usuario`, `quantidade_aves`, `observacoes`, `ativo`, `visualizado`, `created_at`, `updated_at`) VALUES
(1, '2017-12-04', '13:47:00', 4, 11, 3, 'Morte por motivos desconhecidos.', 1, 0, '2017-12-04 16:48:37', '2017-12-04 16:49:29');

INSERT INTO `produto` (`id`, `nome`, `marca`, `tipo_produto`, `observacoes`, `ativo`, `created_at`, `updated_at`) VALUES
(1, 'GLANVAC 32', 'Zoetis', 'Vacina', 'Vacina para prevenção de Linfadenite Caseosa e Clostridioses, incluindo o Tétano para aves de grande porte.', 1, '2017-12-04 17:20:54', '2017-12-04 17:20:54'),
(2, 'GLANVAC 6', 'Zoetis', 'Vacina', 'Vacina para prevenção de Linfadenite Caseosa e Clostridioses, incluindo o Tétano.', 1, '2017-12-04 17:20:54', '2017-12-04 17:20:54'),
(3, 'ULTRACHOICE 7', 'Zoetis', 'Medicamento', 'Bacterina Toxoide contra carbúnculo sintomático, edema maligno, doença negra, gangrena gasosa, enterotoxemia e enterite dos bovinos e ovinos.', 1, '2017-12-04 17:21:28', '2017-12-04 17:21:28'),
(4, 'ULTRACHOICE 8', 'Zoetis', 'Medicamento', 'Bacterina Toxoide contra carbúnculo sintomático, edema maligno, doença negra, gangrena gasosa, hemoglobinúria bacilar, enterotoxemia e enterite dos bovinos e ovinos.', 1, '2017-12-04 17:21:58', '2017-12-04 17:21:58'),
(5, 'Max Ovinos Creep', 'Creep', 'Ração', 'Ração para ovinos de elite em fase inicial, a partir do 4 dia de vida até o desmame.', 1, '2017-12-04 17:23:22', '2017-12-04 17:23:22'),
(6, 'Max Ovinos Reprodução', 'Creep', 'Ração', 'Ração para ovinos de elite em reprodução.', 1, '2017-12-04 17:24:43', '2017-12-04 17:24:43'),
(7, 'Bandeja BOV30', 'spumapac', 'Embalagem', 'Bandeja para 30 ovos.', 1, '2017-12-04 17:27:10', '2017-12-04 17:27:10'),
(8, 'Bandeja BOV12', 'spumapac', 'Embalagem', 'Bandeja para 12 ovos.', 1, '2017-12-04 17:27:43', '2017-12-04 17:37:22');

INSERT INTO `usuario` (`id`, `nome`, `usuario`, `senha`, `id_funcao`, `ativo`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'root', '63a9f0ea7bb98050796b649e85481845', 1, 1, '2017-12-04 11:06:03', '2017-12-04 11:06:03'),
(2, 'Srta. Sofia Adriana Queirós', 'isaac53', '63a9f0ea7bb98050796b649e85481845', 2, 1, '2017-12-04 11:06:03', '2017-12-04 11:06:03'),
(3, 'Maitê Gusmão Jr.', 'ivana.brito', '63a9f0ea7bb98050796b649e85481845', 2, 1, '2017-12-04 11:06:03', '2017-12-04 11:06:03'),
(4, 'Christian Chaves Quintana', 'odesouza', '63a9f0ea7bb98050796b649e85481845', 1, 1, '2017-12-04 11:06:03', '2017-12-04 11:06:03'),
(5, 'Elizabeth Zaragoça das Dores', 'bpadilha', '63a9f0ea7bb98050796b649e85481845', 2, 1, '2017-12-04 11:06:03', '2017-12-04 11:06:03'),
(6, 'Luara Bonilha Valência', 'campos.kevin', '63a9f0ea7bb98050796b649e85481845', 1, 1, '2017-12-04 11:06:03', '2017-12-04 11:06:03'),
(7, 'Dr. Christopher Hernani Verdara', 'garcia.melissa', '63a9f0ea7bb98050796b649e85481845', 1, 1, '2017-12-04 11:06:03', '2017-12-04 11:06:03'),
(8, 'Dr. Samuel Joaquin D', 'gabriel.desouza', '63a9f0ea7bb98050796b649e85481845', 1, 1, '2017-12-04 11:06:03', '2017-12-04 11:06:03'),
(9, 'Srta. Carla Daniela Matias', 'qflores', '63a9f0ea7bb98050796b649e85481845', 2, 1, '2017-12-04 11:06:03', '2017-12-04 11:06:03'),
(10, 'Isabel Velasques Chaves Neto', 'soares.aaron', '63a9f0ea7bb98050796b649e85481845', 2, 1, '2017-12-04 11:06:03', '2017-12-04 11:06:03'),
(11, 'Srta. Ivana Amélia Godói Filho', 'ivana58', '63a9f0ea7bb98050796b649e85481845', 1, 1, '2017-12-04 11:06:03', '2017-12-04 11:06:03'),
(12, 'Abril Lutero Quintana Neto', 'gustavo58', '63a9f0ea7bb98050796b649e85481845', 1, 1, '2017-12-04 11:06:03', '2017-12-04 11:06:03'),
(13, 'Sra. Natália Santiago Ortega Jr.', 'teles.antonieta', '63a9f0ea7bb98050796b649e85481845', 1, 1, '2017-12-04 11:06:03', '2017-12-04 11:06:03'),
(14, 'Srta. Gabriela Ivana Batista', 'toledo.evandro', '63a9f0ea7bb98050796b649e85481845', 2, 1, '2017-12-04 11:06:03', '2017-12-04 11:06:03'),
(15, 'Srta. Alexa Irene Soto', 'constancia01', '63a9f0ea7bb98050796b649e85481845', 2, 1, '2017-12-04 11:06:03', '2017-12-04 11:06:03'),
(16, 'Dr. Allison Delgado Madeira Jr.', 'tvega', '63a9f0ea7bb98050796b649e85481845', 1, 1, '2017-12-04 11:06:03', '2017-12-04 11:06:03'),
(17, 'Dr. Isadora Uchoa', 'garcia.noel', '63a9f0ea7bb98050796b649e85481845', 2, 1, '2017-12-04 11:06:03', '2017-12-04 11:06:03'),
(18, 'Dr. Ricardo Saraiva Queirós', 'julia07', '63a9f0ea7bb98050796b649e85481845', 1, 1, '2017-12-04 11:06:03', '2017-12-04 11:06:03'),
(19, 'Dr. Abril Espinoza Sobrinho', 'serra.henrique', '63a9f0ea7bb98050796b649e85481845', 1, 1, '2017-12-04 11:06:03', '2017-12-04 11:06:03'),
(20, 'Dr. Luana Sanches Jr.', 'colaco.clara', '63a9f0ea7bb98050796b649e85481845', 2, 1, '2017-12-04 11:06:03', '2017-12-04 11:06:03'),
(21, 'Dr. Maximiano Christian Godói', 'jose20', '63a9f0ea7bb98050796b649e85481845', 1, 1, '2017-12-04 11:06:03', '2017-12-04 11:06:03'),
(22, 'Fabiana Queirós Rezende Sobrinho', 'molina.helena', '63a9f0ea7bb98050796b649e85481845', 1, 1, '2017-12-04 11:06:03', '2017-12-04 11:06:03'),
(23, 'Noelí Sales', 'joaquin.vila', '63a9f0ea7bb98050796b649e85481845', 2, 1, '2017-12-04 11:06:03', '2017-12-04 11:06:03'),
(24, 'Mariana Irene da Cruz', 'manuel84', '63a9f0ea7bb98050796b649e85481845', 1, 1, '2017-12-04 11:06:03', '2017-12-04 11:06:03'),
(25, 'Dr. Sabrina Caldeira Padilha', 'kevin74', '63a9f0ea7bb98050796b649e85481845', 1, 1, '2017-12-04 11:06:03', '2017-12-04 11:06:03'),
(26, 'Ketlin Amélia Estrada Jr.', 'henrique.camacho', '63a9f0ea7bb98050796b649e85481845', 2, 1, '2017-12-04 11:06:03', '2017-12-04 11:06:03'),
(27, 'Leonardo Galvão Jr.', 'luciana36', '63a9f0ea7bb98050796b649e85481845', 1, 1, '2017-12-04 11:06:03', '2017-12-04 11:06:03'),
(28, 'Sr. Leonardo Thiago Rocha Jr.', 'joaquin89', '63a9f0ea7bb98050796b649e85481845', 2, 1, '2017-12-04 11:06:03', '2017-12-04 11:06:03'),
(29, 'Sra. Camila Bianca Chaves', 'luciano02', '63a9f0ea7bb98050796b649e85481845', 1, 1, '2017-12-04 11:06:03', '2017-12-04 11:06:03'),
(30, 'Ashley Delgado', 'fabiana46', '63a9f0ea7bb98050796b649e85481845', 1, 1, '2017-12-04 11:06:03', '2017-12-04 11:06:03');

INSERT INTO `ventilacao` (`id`, `data_abertura`, `hora_abertura`, `data_fechamento`, `hora_fechamento`, `temperatura_maxima`, `temperatura_minima`, `id_usuario`, `observacoes`, `ativo`, `created_at`, `updated_at`) VALUES
(1, '2017-12-04', '09:06:00', '2017-12-04', '09:06:00', '22.00', '21.00', 14, '-', 1, '2017-12-04 12:30:40', '2017-12-04 12:30:48'),
(2, '2017-12-03', '09:30:00', '2017-12-03', '13:30:00', '27.00', '20.00', 16, '-', 0, '2017-12-04 12:31:23', '2017-12-04 12:34:42'),
(3, '2017-12-01', '09:31:00', '2017-12-01', '16:31:00', '28.00', '20.00', 1, '-', 1, '2017-12-04 12:31:54', '2017-12-04 12:31:54'),
(4, '2017-08-10', '09:32:00', '2017-08-10', '10:50:00', '29.00', '28.00', 12, 'Ventos quentes em direção ao aviário durante 2 horas', 1, '2017-12-04 12:32:59', '2017-12-04 12:33:52'),
(5, '2017-11-11', '07:36:00', '2017-11-11', '11:03:00', '27.00', '22.00', 27, '-', 1, '2017-12-04 12:36:22', '2017-12-04 12:36:22');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
