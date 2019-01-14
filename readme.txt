     
SISTEMA WEB DESENVOLVIDO NO LINUX 18.04

******SIGA OS PASSOS*********

01.primeiro instale algum servidor SQL de sua preferência, MYSQL, XAMPP, WAMP, MAMP, ou outro que tenha suporte SQL.
 
01.2 após instalar e configurar o servidor, abra o arquivo: "conexao.php" e altere para as suas configurações do banco de dados, como usuario e senha, no meu está com usuário e senha root, mas caso você tenha colocado outro nome ou senha, altere o arquivo.
  

2. Código para criar o banco de dados, altere o nome do banco no arquivo: "conexao.php" também para evitar futuros erros,
 caso tenha colocado outro nome no banco de dados.

CREATE DATABASE login;


3. Código para criar a tabela dos clientes.


CREATE TABLE clientes ( 
id INT NOT NULL AUTO_INCREMENT ,
nome VARCHAR(220) NOT NULL , 
email VARCHAR(220) NOT NULL , 
telefone BIGINT(20) NOT NULL ,
cpf BIGINT(11) NOT NULL , 
estado VARCHAR(30) NOT NULL , 
bairro VARCHAR(220) NOT NULL , 
cep BIGINT(8) NOT NULL , 
created DATETIME NOT NULL , 
modified DATETIME NULL , 
PRIMARY KEY (id));



4. Os três comandos abaixo servem para deixar as chaves únicas, que não permitem repetição, sendo elas: email, CPF e CEP.

alter table clientes
add CONSTRAINT UNIQUE (email);

alter table clientes 
add CONSTRAINT UNIQUE (cpf);

alter table clientes 
add CONSTRAINT UNIQUE (cep);




5. Código para criar a tabela dos usuários do sistema.


CREATE TABLE usuarios (
id int(11) NOT NULL AUTO_INCREMENT,
nome varchar(220) NOT NULL,
login varchar(220) NOT NULL,  
senha varchar(220) NOT NULL,
created datetime NOT NULL,
modified datetime DEFAULT NULL,
nivel int(1) NOT NULL,
PRIMARY KEY (id)
);



6. O comando abaixo serve para deixar a chave login única, que não permite repetição.

 alter table usuarios 
add CONSTRAINT UNIQUE (login);




7. Para acessar o sistema web, precisará criar um primeiro usuário do sistema, para logar pela primeira vez, podendo ser qualquer usuário, que será apagado posteriormente. 




// a query abaixo cria o usuário admin com senha 123, para posteriores modificações e inserções de outros usuarios do sistema.

INSERT INTO usuarios (id, nome, login, senha, created, modified, nivel) VALUES
(1, 'Admin', 'admin', '202cb962ac59075b964b07152d234b70', '2019-01-01 10:35:47', NULL,1);



AGORA É SÓ IR NO INDEX.PHP E TESTAR.




