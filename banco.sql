INSERT INTO `funcao` (`id`, `funcao`, `observacoes`, `ativo`, `created_at`, `updated_at`) VALUES
(1, 'administrador', 'Usuário com acesso total ao sistema.', 1, '2017-11-08 03:00:00', '2017-11-08 03:00:00'),
(2, 'convidado', 'Usuário com acesso restrito à visualização de registros.', 1, '2017-11-08 03:00:00', '2017-11-08 03:00:00');

INSERT INTO usuario (id, nome, usuario, senha, id_funcao, data_login, tentativas, ativo, created_at, updated_at) VALUES
(1, 'root', 'root', '63a9f0ea7bb98050796b649e85481845', 1, '2011-09-12 02:23:23', 0, 1, '2017-11-08 15:13:01', '2017-11-08 15:13:01'),
(2, 'Claudete Rosa de Oliveira', 'claudete', '63a9f0ea7bb98050796b649e85481845', 2, '2011-09-12 02:23:23', 0, 1, '2017-11-08 15:13:29', '2017-11-08 15:13:29'),
(3, 'Nilson Fernandes Queiroz', 'nilson', '63a9f0ea7bb98050796b649e85481845', 2, '2011-09-12 02:23:23', 0, 1, '2017-11-08 15:13:29', '2017-11-08 15:13:29'),
(4, 'Lucas de Oliveira Queiroz', 'lucas', '63a9f0ea7bb98050796b649e85481845', 2, '2011-09-12 02:23:23', 0, 1, '2017-11-08 15:55:03', '2017-11-08 15:55:03');

