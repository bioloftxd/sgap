INSERT INTO `alimentacao_aves` (`id`, `data`, `hora`, `quantidade_alimento`, `id_tipo_racao`, `id_gaiola`, `id_usuario`, `observacoes`, `ativo`, `created_at`, `updated_at`) VALUES
(1, '2017-11-02', '09:27:00', '1.00', 1, 0, 1, 'Sem Observações!', 1, '2017-11-02 16:31:08', '2017-11-02 16:31:08'),
(2, '2017-11-02', '09:27:00', '1.00', 1, 0, 1, 'Sem Observações!', 1, '2017-11-02 16:31:59', '2017-11-02 16:31:59'),
(4, '2017-11-02', '10:03:00', '1.00', 1, 0, 1, 'Sem Observações!', 1, '2017-11-02 16:45:17', '2017-11-02 16:45:17');

INSERT INTO `manutencao_aviario` (`id`, `data_verifica`, `hora_verifica`, `data_resolve`, `hora_resolve`, `numero_relatorio`, `id_usuario_verifica`, `id_usuario_resolve`, `ocorrencia`, `resolucao`, `resolvido`, `ativo`, `created_at`, `updated_at`) VALUES
(1, '2017-10-28', '13:21:00', '2017-10-28', '13:24:00', 0, 1, 1, 'Sem Observações!', 'Sem Observações!', 1, 0, '2017-10-28 19:51:22', '2017-10-28 20:44:47'),
(2, '2017-10-28', '13:24:00', '2001-09-11', '00:00:00', 0, 1, 0, 'Nada não! =D', '', 0, 1, '2017-10-28 19:54:24', '2017-10-28 19:54:24');

INSERT INTO `tipo_racao` (`id`, `tipo`, `id_produto`, `ativo`, `created_at`, `updated_at`) VALUES
(1, 'Orgânica', 1, 1, '2017-11-02 16:31:08', '2017-11-02 16:31:08');

INSERT INTO `usuario` (`id`, `nome`, `usuario`, `senha`, `id_funcao`, `data_login`, `tentativas`, `ativo`, `created_at`, `updated_at`) VALUES
(1, 'Lucas de Oliveira Queiroz', 'root', '63a9f0ea7bb98050796b649e85481845', 2, '2011-09-12 02:53:23', 0, 1, '2017-10-27 18:53:47', '2017-10-27 18:53:47');

INSERT INTO `ventilacao` (`id`, `data_abertura`, `hora_abertura`, `data_fechamento`, `hora_fechamento`, `temperatura_maxima`, `temperatura_minima`, `id_usuario`, `observacoes`, `ativo`, `created_at`, `updated_at`) VALUES
(1, '2017-10-27', '15:26:00', '2017-10-27', '15:26:00', '44.00', '24.00', 1, 'Sem Oservações!', 0, '2017-10-27 18:56:56', '2017-10-28 20:44:27'),
(2, '2017-10-28', '16:32:00', '2017-10-28', '16:32:00', '30.40', '12.30', 1, 'Sem Oservações!', 0, '2017-10-28 20:02:32', '2017-10-28 20:18:19'),
(3, '2017-11-11', '11:00:00', '2017-12-12', '12:00:00', '32.50', '23.90', 1, 'Sem Oservações!', 1, '2017-10-28 20:28:20', '2017-10-28 20:33:54');

INSERT INTO `coleta_excremento` (`id`, `data`, `hora`, `litros`, `id_usuario`, `observacoes`, `ativo`, `created_at`, `updated_at`) VALUES
(1, '2017-10-28', '13:21:00', '1.00', 1, 'Sem observações!', 1, '2017-10-28 19:51:07', '2017-10-28 19:51:07'),
(2, '2017-11-01', '12:39:00', '1.00', 1, 'Sem observações!', 1, '2017-11-01 19:09:17', '2017-11-01 19:09:17'),
(3, '2017-11-01', '12:41:00', '1.00', 1, 'Sem observações!', 1, '2017-11-01 19:12:07', '2017-11-01 19:12:07');