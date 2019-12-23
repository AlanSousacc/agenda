//INSERT CADASTRO DE EMPRESA PADRÃO
INSERT INTO `empresas` (`id`,`created_at`,`updated_at`,`razaosocial`,`nomefantasia`,`apelido`,`cnpj`,`ie`,`im`,`telefone`,`email`,`cidade`,`endereco`,`numero`,`cep`,`bairro`,`logo`,`status`,`tipo`) VALUES (1,'2019-12-15 11:55:51','2019-12-15 11:58:40','Alan Wilian de Sousa','Alan Wilian de Sousa','Alan Wilian de Sousa','11.111.111/1111-11','111.111.111','111.111.111','16991793351','alansousa.cc@gmail.com','Sales Oliveira','Capitão Leopoldo dos Santos','351','14660-000','Centro','default.png',1,'estetica');

//INSERT CADASTRO DE USUÁRIO PADRÃO
INSERT INTO `users` (`id`,`name`,`email`,`email_verified_at`,`password`,`remember_token`,`created_at`,`updated_at`,`profile`,`isAdmin`,`empresa_id`) VALUES (1,'Alan Wilian de Sousa','alansousa.cc@gmail.com',NULL,'$2y$10$pkJM/d3zg8aUJH6GUvxo3uIPTHhNtBHoAlD6FuUStXtxy7OE6FMoS',NULL,'2019-12-15 11:56:12','2019-12-15 11:56:12','Administrador',1,1);

//INSERT CADASTRO DE CONDIÇÃO DE PAGAMENTO PADRÃO
INSERT INTO `condicao_pagamento` (`id`,`nome`,`qtde_parcela`,`created_at`,`updated_at`) VALUES (1,'Dinheiro',1,NULL,NULL);
INSERT INTO `condicao_pagamento` (`id`,`nome`,`qtde_parcela`,`created_at`,`updated_at`) VALUES (2,'Cartão Débito',1,NULL,NULL);
INSERT INTO `condicao_pagamento` (`id`,`nome`,`qtde_parcela`,`created_at`,`updated_at`) VALUES (3,'Cartão Crédito 1x',1,NULL,NULL);
INSERT INTO `condicao_pagamento` (`id`,`nome`,`qtde_parcela`,`created_at`,`updated_at`) VALUES (4,'Cartão Crédito 2x',2,NULL,NULL);
INSERT INTO `condicao_pagamento` (`id`,`nome`,`qtde_parcela`,`created_at`,`updated_at`) VALUES (5,'Cartão Crédito 3x',3,NULL,NULL);
INSERT INTO `condicao_pagamento` (`id`,`nome`,`qtde_parcela`,`created_at`,`updated_at`) VALUES (6,'Conta Cliente',0,NULL,NULL);
