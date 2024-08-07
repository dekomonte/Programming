--O Curso Completo de Banco de Dados e SQL, sem mistérios!          \\Curso da Udemy

-- Criar Banco de Dados
CREATE DATABASE PROJETO;

-- Usar Banco de Dados
USE PROJETO;

-- Criar Tabelas
CREATE TABLE CLIENTE(
	NOME VARCHAR(30),
	SEXO CHAR(1),
	EMAIL VARCHAR(30),
	CPF INT(11),
	TELEFONE VARCHAR(30),
	ENDERECO VARCHAR(100)
);

-- Mostrar Bancos
SHOW DATABASES;

-- Mostrar Tabelas
SHOW TABLES;

-- Descobrir Como é a Estrutura de Uma Tabela
DESC CLIENTE;

-- Inserir Dados na Tabela
INSERT INTO CLIENTE VALUES('JOAO','M','JOAO@GMAIL.COM',988638273,'22923110','MAIA LACERDA - ESTACIO - RIO DE JANEIRO - RJ'); --Sem especificar os campos
INSERT INTO CLIENTE(NOME,SEXO,ENDERECO,TELEFONE,CPF) VALUES('CLARA','F','SENADOR SOARES - TIJUCA - RIO DE JANEIRO - RJ','883665843',99999999999); --Especificando os campos

-- Insert Sintaxe
INSERT INTO table_name (column1, column2, column3, ...)
VALUES (value1, value2, value3, ...);

-- Comando SELECT
SELECT NOME AS CLIENTE, SEXO, EMAIL FROM CLIENTE; -- Com ALIAS
SELECT NOME, SEXO, EMAIL, ENDERECO FROM CLIENTE;
SELECT NOME, SEXO FROM CLIENTE WHERE SEXO = 'M';
SELECT NOME, SEXO, ENDERECO FROM CLIENTE WHERE ENDERECO LIKE '%CENTRO%';

-- Operadores Lógicos
SELECT NOME, SEXO, ENDERECO FROM CLIENTE WHERE SEXO = 'M' OR ENDERECO LIKE '%RJ';
SELECT NOME, SEXO, ENDERECO  FROM CLIENTE WHERE SEXO = 'M' AND ENDERECO LIKE '%RJ';

-- Count
SELECT COUNT(*) AS "Quantidade de Registros da Tab. Cliente" FROM CLIENTE;

-- Group by
SELECT SEXO, COUNT(*) FROM CLIENTE GROUP BY SEXO;

-- Exemplo - Relatório Completo (DML)
SELECT C.IDCLIENTE, C.NOME, C.SEXO, C.EMAIL,C.CPF,
	   E.RUA, E.BAIRRO, E.CIDADE, E.ESTADO,
	   T.TIPO, T.NUMERO
FROM CLIENTE C
INNER JOIN ENDERECO E
ON C.IDCLIENTE = E.ID_CLIENTE
INNER JOIN TELEFONE T
ON T.IDCLIENTE = T.ID_CLIENTE; --Geral

SELECT C.IDCLIENTE, C.NOME, C.SEXO, C.EMAIL,C.CPF,
	   E.RUA, E.BAIRRO, E.CIDADE, E.ESTADO,
	   T.TIPO, T.NUMERO
FROM CLIENTE C
INNER JOIN ENDERECO E
ON C.IDCLIENTE = E.ID_CLIENTE
INNER JOIN TELEFONE T
ON T.IDCLIENTE = T.ID_CLIENTE
WHERE SEXO = 'M'; --Homens


----------#----------#----------#----------#----------
--RESUMO - INNER JOIN

--Combina dados de várias tabelas
--Permite a junção entre duas ou mais tabelas, desde que haja entrelaçamento entre todas
--Pensando na teoria de conjuntos, é a interseção entre dois conjuntos

--Exemplo:
SELECT
    P.nome,
    P.preco,
    C.nome as Categoria
FROM
    produto P
INNER JOIN
    categoria_produto C
ON P.id_categoria = C.id;

--Exemplo - Várias tabelas: 
SELECT
    P.nome,
    P.preco,
    C.nome as Categoria,
    COUNT(V.id_produto) TOTAL_VENDIDOS
FROM
    produto P
INNER JOIN
  categoria_produto C
ON P.id_categoria = C.id
INNER JOIN
  venda_produto V
ON V.id_produto = P.id
GROUP BY P.id;
