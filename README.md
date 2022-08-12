# All-blacks


Bem vindo ao projeto feito para a All Blacks

O projeto consiste em pegar um arquivo XML, trabalhar os dados e Exportar para Excel

A estrutura utilizada foi a MVC, temos códigos em PHP, HTML e CSS, lembrando que utilizamos o Bootstrap e o PHP spreadsheet para gerar o relatório em Excel.

Desde já peço desculpas, a parte do e-mail era necessária, fui fazer como mala direta e enviar para todos o gmail pegou como span, e não consegui corrigir.

Estava trabalhando na listagem, porém não deu tempo de implementar o JS para fazer da melhor maneira.
 
# Dando inicio a execução

Antes de clonar o projeto verifique se você possui o composer instalado, caso não tenha o mesmo se encontra em https://getcomposer.org/download/

Após baixar, execute o comando no terminal para rodar o composer, 

composer install 

Nosso projeto possui um arquivo .env com as configurações de banco e outras variáveis, na pasta Configs, crie uma cópia do .env.example.php e o renomeie para .env.php

Os dados de banco estão logo abaixo;

Muito obrigado pela atenção

# Dados para criação do banco

CREATE SCHEMA `allblacks` ;

CREATE TABLE `torcedores` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `DOCUMENTO` varchar(15) DEFAULT NULL,
  `NOME` varchar(60) DEFAULT NULL,
  `DATAHORAINSERT` datetime DEFAULT NULL,
  `TELEFONE` varchar(20) DEFAULT NULL,
  `EMAIL` varchar(50) DEFAULT NULL,
  `CEP` varchar(20) DEFAULT NULL,
  `ENDERECO` varchar(50) DEFAULT NULL,
  `BAIRRO` varchar(30) DEFAULT NULL,
  `CIDADE` varchar(50) DEFAULT NULL,
  `UF` varchar(2) DEFAULT NULL,
  `ATIVO` int(1) DEFAULT NULL,
  PRIMARY KEY (`ID`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=latin1;

