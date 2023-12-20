--Alguns scripts que o Zé me ensinou quando me passou a demanda de envio de e-mails. 

--Criação do Banco de Dados e da Tabela
CREATE DATABASE IF NOT EXISTS `envio_certificados`;
USE `envio_certificados`;

CREATE TABLE IF NOT EXISTS `relatorio_certificados_profissional` (
  `ID_RELATORIO` int NOT NULL AUTO_INCREMENT,
  `N_DO_ARQUIVO` int DEFAULT NULL,
  `CERTIFICADO` int DEFAULT NULL,
  `NOME` varchar(44) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `CPF` text COLLATE utf8mb4_general_ci,
  `NOME_DO_ARQUIVO` varchar(60) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `E_MAIL` varchar(69) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL COMMENT 'EMAIL',
  `ENVIADO` tinyint DEFAULT NULL COMMENT '0 = NAO ENVIADO 1 = ENVIADO',
  PRIMARY KEY (`ID_RELATORIO`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--Inserir dados no Banco
INSERT INTO `relatorio_certificados_profissional` (`ID_RELATORIO`, `N_DO_ARQUIVO`, `CERTIFICADO`, `NOME`, `CPF`, `NOME_DO_ARQUIVO`, `E_MAIL`, `ENVIADO`) VALUES
	(1, 1, 1, 'Nome1', '12180159715', 'arquivo1', 'email1', 0),
	(2, 2, 2, 'Nome2', '98952572372', 'arquivo2', 'email2', 0);

--Requisições Diversas
SELECT COUNT(*) FROM relatorio_apolice_global_certificados_rc_profissional WHERE ENVIADO=0;

SELECT NOME, NOME_DO_ARQUIVO, LOWER(E_MAIL), ID_RELATORIO FROM relatorio_apolice_global_certificados_rc_profissional WHERE (E_MAIL is not NULL) AND (ENVIADO = 0) AND (ID_RELATORIO BETWEEN 1101 AND 1200);

SELECT * FROM relatorio_apolice_global_certificados_rc_profissional WHERE E_MAIL = 'exemploaleatorio@gmail.com'
