create database clinica;
use clinica;

CREATE TABLE funcionario
( 
 pk_func INT NOT NULL PRIMARY KEY auto_increment, 
 nome_func VARCHAR(30) NOT NULL,
 data_nasc DATE NOT NULL,
 telefone VARCHAR(15) NOT NULL,
 genero VARCHAR(1) NOT NULL,
 cargo_func VARCHAR(20) NOT NULL,
 perfil VARCHAR(10) NOT NULL); 
 
CREATE TABLE produto 
( 
 pk_prod INT NOT NULL PRIMARY KEY AUTO_INCREMENT, 
 nome_prod VARCHAR(20)NOT NULL,
 preco_prod FLOAT NOT NULL, 
 desc_prod VARCHAR(80) NOT NULL,  
 quant_prod INT NOT NULL,  
 fk_forn INT NOT NULL,
 foreign key(fk_forn) references fornecedor(pk_forn)
  ); 

CREATE TABLE fornecedor
( 
 pk_forn INT NOT NULL PRIMARY KEY AUTO_INCREMENT,  
 nome_forn VARCHAR(20) NOT NULL,  
 ender_forn VARCHAR(60) NOT NULL,  
 tele_forn VARCHAR(15) NOT NULL,
 prod_forn VARCHAR(20) NOT NULL); 
  

CREATE TABLE cliente 
( 
 pk_cli INT NOT NULL PRIMARY KEY auto_increment,  
 nome_cli VARCHAR(20) NOT NULL,  
 tele_cli VARCHAR(15) NOT NULL,  
 email_cli VARCHAR(40) NOT NULL,  
 data_nasc DATE NOT NULL,  
 genero VARCHAR(1) NOT NULL,  
 perfil VARCHAR(10) NOT NULL); 

CREATE TABLE login 
( 
 pk_login INT NOT NULL PRIMARY KEY auto_increment,  
 usuario VARCHAR(25) NOT NULL,  
 senha VARCHAR(16) NOT NULL
); 

CREATE TABLE agendamento 
( 
 pk_agen INT NOT NULL PRIMARY KEY auto_increment,  
 fk_proc INT,
 foreign key(fk_proc) references procedimento(pk_proc),
 data_agen DATE NOT NULL,  
 hora_agen INT NOT NULL,  
 fk_cli INT,
 foreign key(fk_cli) references cliente(pk_cli)
); 


CREATE TABLE procedimento 
( 
 pk_proc INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
 nome_proc VARCHAR(25) NOT NULL,
 desc_agen VARCHAR(50) NOT NULL,
 fk_agen INT ); 


 INSERT INTO funcionario (nome_func, data_nasc, telefone, genero, cargo_func, perfil) VALUES
('Ana Lima', '1985-04-12', '(47) 99999-1010', 'F', 'Esteticista', 'admin'),
('Carlos Souza', '1990-07-21', '(47) 98888-2020', 'M', 'Recepcionista', 'user'),
('Mariana Oliveira', '1988-11-30', '(47) 97777-3030', 'F', 'Massagista', 'user'),
('Roberta Cunha', '1992-02-10', '(47) 96666-4040', 'F', 'Esteticista', 'user'),
('Thiago Martins', '1987-08-14', '(47) 95555-5050', 'M', 'Gerente', 'admin'),
('Juliana Freitas', '1993-06-18', '(47) 94444-6060', 'F', 'Esteticista', 'user'),
('Fernando Alves', '1984-09-22', '(47) 93333-7070', 'M', 'Recepcionista', 'user'),
('Patrícia Mendes', '1991-01-05', '(47) 92222-8080', 'F', 'Massagista', 'user'),
('Rodrigo Dias', '1989-12-25', '(47) 91111-9090', 'M', 'Esteticista', 'user'),
('Camila Rocha', '1994-03-09', '(47) 90000-0001', 'F', 'Recepcionista', 'user'),
('Lucas Pereira', '1986-10-13', '(47) 98888-1111', 'M', 'Gerente', 'admin'),
('Isabela Costa', '1990-05-06', '(47) 97777-2222', 'F', 'Massagista', 'user'),
('Paula Nunes', '1988-08-17', '(47) 96666-3333', 'F', 'Esteticista', 'user'),
('Eduardo Braga', '1985-12-28', '(47) 95555-4444', 'M', 'Recepcionista', 'user'),
('Tatiane Souza', '1992-07-19', '(47) 94444-5555', 'F', 'Esteticista', 'user'),
('Bruno Lima', '1987-11-03', '(47) 93333-6666', 'M', 'Massagista', 'user'),
('Letícia Silva', '1991-09-27', '(47) 92222-7777', 'F', 'Gerente', 'admin'),
('Fábio Ribeiro', '1993-04-04', '(47) 91111-8888', 'M', 'Esteticista', 'user'),
('Vanessa Teixeira', '1990-01-11', '(47) 90000-9999', 'F', 'Recepcionista', 'user'),
('Gustavo Melo', '1986-06-08', '(47) 98888-1234', 'M', 'Massagista', 'user');


INSERT INTO produto (nome_prod, preco_prod, desc_prod, quant_prod, fk_forn) VALUES
('Creme Facial Revitalizante', 89.90, 'Creme para revitalização da pele facial', 50, 1),
('Serum Hidratante Intensivo', 120.00, 'Sérum para hidratação profunda da pele', 40, 2),
('Máscara Facial Iluminadora', 75.50, 'Máscara para iluminar a pele do rosto', 30, 3),
('Esfoliante Facial Suave', 45.00, 'Esfoliante para limpeza suave da pele', 60, 4),
('Tônico Facial Refrescante', 55.00, 'Tônico para refrescar e equilibrar a pele', 70, 5),
('Hidratante Corporal Nutritivo', 65.00, 'Hidratante para nutrição da pele do corpo', 80, 6),
('Óleo Essencial Relaxante', 95.00, 'Óleo para relaxamento e bem-estar', 25, 7),
('Creme Anti-Idade Avançado', 150.00, 'Creme para prevenção de sinais de envelhecimento', 20, 8),
('Gel Facial Refrescante', 50.00, 'Gel para refrescar e acalmar a pele do rosto', 90, 9),
('Sabonete Líquido Hidratante', 35.00, 'Sabonete líquido para limpeza e hidratação', 100, 10),
('Creme para Mãos Reparador', 40.00, 'Creme para hidratar e reparar as mãos', 110, 11),
('Loção Corporal Suavizante', 60.00, 'Loção para suavizar e hidratar a pele do corpo', 120, 12),
('Shampoo Hidratante Profundo', 70.00, 'Shampoo para hidratação intensa dos cabelos', 130, 13),
('Condicionador Nutritivo', 80.00, 'Condicionador para nutrição dos cabelos', 140, 14),
('Creme para Pés Revitalizante', 45.00, 'Creme para revitalizar e hidratar os pés', 150, 15),
('Esfoliante Corporal Energizante', 55.00, 'Esfoliante para energizar a pele do corpo', 160, 16),
('Máscara Capilar Reparadora', 65.00, 'Máscara para reparar os danos dos cabelos', 170, 17),
('Tônico Capilar Fortalecedor', 75.00, 'Tônico para fortalecer os fios capilares', 180, 18),
('Creme para Rosto Calmante', 85.00, 'Creme para acalmar e hidratar a pele do rosto', 190, 19),
('Óleo Corporal Revitalizante', 95.00, 'Óleo para revitalizar e hidratar a pele do corpo', 200, 20);


INSERT INTO fornecedor (nome_forn, ender_forn, tele_forn, prod_forn) VALUES
('Beleza Natural', 'Rua das Flores, 123, Joinville, SC', '(47) 99999-0001', 'creme facial'),
('Estética Pura', 'Avenida Central, 456, Joinville, SC', '(47) 99999-0002', 'serum hidratante'),
('Cosméticos Silva', 'Rua do Comércio, 789, Joinville, SC', '(47) 99999-0003', 'máscara facial'),
('Dermacare', 'Avenida Brasil, 101, Joinville, SC', '(47) 99999-0004', 'esfoliante'),
('Luz da Pele', 'Rua das Palmeiras, 202, Joinville, SC', '(47) 99999-0005', 'tônico facial'),
('Beleza e Saúde', 'Rua das Acácias, 303, Joinville, SC', '(47) 99999-0006', 'hidratante corporal'),
('Estilo e Beleza', 'Avenida das Nações, 404, Joinville, SC', '(47) 99999-0007', 'óleo essencial'),
('Cosméticos & Cia', 'Rua do Sol, 505, Joinville, SC', '(47) 99999-0008', 'creme anti-idade'),
('Dermocosméticos Ltda', 'Avenida Atlântica, 606, Joinville, SC', '(47) 99999-0009', 'gel facial'),
('Pele Perfeita', 'Rua do Mar, 707, Joinville, SC', '(47) 99999-0010', 'sabonete líquido'),
('Beleza em Casa', 'Rua das Orquídeas, 808, Joinville, SC', '(47) 99999-0011', 'creme para mãos'),
('Estética & Bem-estar', 'Avenida das Flores, 909, Joinville, SC', '(47) 99999-0012', 'loção corporal'),
('Cosméticos Naturais', 'Rua do Vento, 1010, Joinville, SC', '(47) 99999-0013', 'shampoo hidratante'),
('Dermaclin', 'Avenida do Sol, 1111, Joinville, SC', '(47) 99999-0014', 'condicionador'),
('Pele Radiante', 'Rua das Estrelas, 1212, Joinville, SC', '(47) 99999-0015', 'creme para pés'),
('Beleza em Foco', 'Rua do Horizonte, 1313, Joinville, SC', '(47) 99999-0016', 'esfoliante corporal'),
('Estética Viva', 'Avenida dos Lírios, 1414, Joinville, SC', '(47) 99999-0017', 'máscara capilar'),
('Cosméticos Premium', 'Rua do Sol Poente, 1515, Joinville, SC', '(47) 99999-0018', 'tônico capilar'),
('Dermacare Plus', 'Avenida da Paz, 1616, Joinville, SC', '(47) 99999-0019', 'creme para rosto'),
('Pele e Estilo', 'Rua das Magnólias, 1717, Joinville, SC', '(47) 99999-0020', 'óleo corporal');


INSERT INTO cliente (nome_cli, tele_cli, email_cli, data_nasc, genero, perfil) VALUES
('Joana Lima', '(47) 99991-0001', 'joana.lima@email.com', '1990-02-15', 'F', 'vip'),
('Paulo Souza', '(47) 99991-0002', 'paulo.souza@email.com', '1985-06-22', 'M', 'comum'),
('Carla Oliveira', '(47) 99991-0003', 'carla.oliveira@email.com', '1992-08-10', 'F', 'vip'),
('Renato Cunha', '(47) 99991-0004', 'renato.cunha@email.com', '1988-01-09', 'M', 'comum'),
('Tatiane Silva', '(47) 99991-0005', 'tatiane.silva@email.com', '1994-11-23', 'F', 'vip'),
('Jorge Melo', '(47) 99991-0006', 'jorge.melo@email.com', '1987-04-12', 'M', 'comum'),
('Priscila Dias', '(47) 99991-0007', 'priscila.dias@email.com', '1993-12-03', 'F', 'vip'),
('Lucas Mendes', '(47) 99991-0008', 'lucas.mendes@email.com', '1990-09-14', 'M', 'comum'),
('Fernanda Costa', '(47) 99991-0009', 'fernanda.costa@email.com', '1989-07-21', 'F', 'vip'),
('Rafael Almeida', '(47) 99991-0010', 'rafael.almeida@email.com', '1986-03-08', 'M', 'comum'),
('Marcela Rocha', '(47) 99991-0011', 'marcela.rocha@email.com', '1995-05-16', 'F', 'vip'),
('Bruno Ribeiro', '(47) 99991-0012', 'bruno.ribeiro@email.com', '1991-10-05', 'M', 'comum'),
('Aline Nunes', '(47) 99991-0013', 'aline.nunes@email.com', '1993-06-25', 'F', 'vip'),
('Diego Pires', '(47) 99991-0014', 'diego.pires@email.com', '1988-02-28', 'M', 'comum'),
('Camila Lopes', '(47) 99991-0015', 'camila.lopes@email.com', '1990-08-19', 'F', 'vip'),
('Eduardo Teixeira', '(47) 99991-0016', 'eduardo.teixeira@email.com', '1985-12-11', 'M', 'comum'),
('Patrícia Martins', '(47) 99991-0017', 'patricia.martins@email.com', '1991-04-03', 'F', 'vip'),
('Rodrigo Silva', '(47) 99991-0018', 'rodrigo.silva@email.com', '1987-10-29', 'M', 'comum'),
('Isabela Fernandes', '(47) 99991-0019', 'isabela.fernandes@email.com', '1992-09-07', 'F', 'vip'),
('Marcos Lima', '(47) 99991-0020', 'marcos.lima@email.com', '1986-05-01', 'M', 'comum');


INSERT INTO login (usuario, senha) VALUES
('admin', 'admin123'),
('user1', 'senha123'),
('user2', 'senha123'),
('user3', 'senha123'),
('user4', 'senha123'),
('user5', 'senha123'),
('user6', 'senha123'),
('user7', 'senha123'),
('user8', 'senha123'),
('user9', 'senha123'),
('user10', 'senha123'),
('user11', 'senha123'),
('user12', 'senha123'),
('user13', 'senha123'),
('user14', 'senha123'),
('user15', 'senha123'),
('user16', 'senha123'),
('user17', 'senha123'),
('user18', 'senha123'),
('user19', 'senha123');


INSERT INTO procedimento (nome_proc, desc_agen, fk_agen) VALUES
('Limpeza de Pele', 'Limpeza profunda e hidratação da pele do rosto', NULL),
('Botox', 'Aplicação de botox para rejuvenescimento facial', NULL),
('Massagem Relaxante', 'Massagem corporal para relaxamento muscular', NULL),
('Peeling', 'Esfoliação química para rejuvenescimento da pele', NULL),
('Depilação', 'Remoção de pelos com cera quente', NULL),
('Hidratação Facial', 'Hidratação profunda para pele ressecada', NULL),
('Tratamento Anti-Idade', 'Tratamento com cremes e aparelhos para redução de rugas', NULL),
('Luz Pulsada', 'Tratamento com luz intensa para clareamento de manchas', NULL),
('Rugas de Expressão', 'Preenchimento facial para suavização de rugas', NULL),
('Desintoxicação Corporal', 'Tratamento para desintoxicação da pele e corpo', NULL),
('Acne', 'Tratamento de controle da acne com produtos específicos', NULL),
('Microagulhamento', 'Uso de microagulhas para estimulação da produção de colágeno', NULL),
('Toxina Botulínica', 'Aplicação de botox para paralisia muscular temporária', NULL),
('Laser de CO2', 'Tratamento de rejuvenescimento com laser de CO2', NULL),
('Hidratação Corporal', 'Hidratação intensa de todo o corpo', NULL),
('Massagem Modeladora', 'Massagem corporal para redução de medidas', NULL),
('Peeling de Cristais', 'Peeling com micro cristais para rejuvenescimento da pele', NULL),
('Técnica de Relaxamento', 'Técnica de relaxamento para redução do estresse e tensão', NULL),
('Tratamento para Celulite', 'Tratamento estético para redução de celulite', NULL),
('Revitalização Capilar', 'Tratamento de revitalização e fortalecimento dos fios capilares', NULL);


INSERT INTO agendamento (fk_proc, data_agen, hora_agen, fk_cli) VALUES
(1, '2025-05-10', 9, 1),
(2, '2025-05-11', 10, 2),
(3, '2025-05-12', 11, 3),
(4, '2025-05-13', 14, 4),
(5, '2025-05-14', 15, 5),
(6, '2025-05-15', 16, 6),
(7, '2025-05-16', 17, 7),
(8, '2025-05-17', 9, 8),
(9, '2025-05-18', 10, 9),
(10, '2025-05-19', 11, 10),
(11, '2025-05-20', 14, 11),
(12, '2025-05-21', 15, 12),
(13, '2025-05-22', 16, 13),
(14, '2025-05-23', 17, 14),
(15, '2025-05-24', 9, 15),
(16, '2025-05-25', 10, 16),
(17, '2025-05-26', 11, 17),
(18, '2025-05-27', 14, 18),
(19, '2025-05-28', 15, 19),
(20, '2025-05-29', 16, 20);

