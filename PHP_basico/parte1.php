<?php

/*---------------PHP: PARTE 1---------------*/

//Como fazer comentários:
//Comentário
#Comentário
/*Comentário*/

/*---------------Primeiro programa clássico---------------*/
echo "Hello World!"."<br>"; //Imprimir coisas na tela
#<br> é a quebra de linha do navegador
echo "\n";

/*---------------Separar Arquivos---------------*/
#include <nome do arquivo> - usa elementos de outros arquivos, indica erro caso não ache o arquivo mas continua executando
#require <nome do arquivo> - informa que tem um erro e não executa a partir daí
#require_once <nome do arquivo> - inclui caso o arquivo não tenha sido incluido antes
#include_once <nome do arquivo> 

/*---------------Variáveis---------------*/
#Representação de um valor

//Declaração
#Não é preciso declarar o tipo
$nome = 'Andressa';
$idade = 25;
echo get_debug_type($idade)."<br>";

//Tipo Inteiro
$dias=34;
$meses=12;

//Tipo Ponto Flutuante
$altura=1.58;
$distancia=67.4;

//Tipo Booleano
#true,false
$resposta=TRUE;
$gabarito=FALSE;

//Tipo String
#Aspas simples -> Mostra o texto como foi escrito na instrução
#Aspas duplas -> Permite a manipulação da saída
$sobrenome='Sena';
echo "Meu nome é $nome $sobrenome"."<br>";
echo "\n";

//Tipo Array
#Pode colocar vários tipos de valores
#Entre colchetes 
#Array em PHP é um como um mapa

//Tipo Objeto
#Programação Orientada a Objetos

//Tipo Nulo
#Ausência de valor
#null

//Como descobrir o tipo de uma variável
#gettype()
#O ponto entre as strings é um operador de concatenação
echo "$altura é ".gettype($altura)."<br>";
echo "\n";

//Como converter tipos no PHP
#Forma 1
$var1='90';
$var2=(int)$var1;
echo "Tipo da Variável 1:";
echo gettype($var1);
echo "Tipo da Variável 2:";
echo gettype($var2);

#Forma 2
$var3=3.7;
echo "Tipo da Variável 3:";
echo gettype($var3);
settype($var3,"integer");
echo "Tipo da Variável 4:";
echo gettype($var3);
echo "<br>";
echo "\n";

//Testar se a variável é de um determinado tipo
#Função is_TIPO($variável)
if (is_string($nome)) {
    echo "É uma string"."<br>";
    echo "\n";
}
else{
    echo "Não é uma string"."<br>";
    echo "\n";
}

/*---------------Constantes---------------*/
#Não pode mudar o valor
define('NAME', 'Alexandre');
echo NAME;
echo "\n";

if(defined('NAME')){
    echo "Foi definido.\n";
}
else{
    echo "NÃO foi definido.\n";
}

#Constantes "Mágicas"
function teste(){
    echo __FUNCTION__;
    echo __METHOD__;
}
teste();
echo "\n";

#Como saber todas as constantes separadas pelo PHP
/*$cons = get_defined_constants(true);
var_dump($cons);*/

/*---------------Operadores---------------*/
//Lógicos
#AND &&
#OR ||
#!

//Incremento/Decremento
#Pré/Pós incremento/decremento
$number=10;
echo ++$number;
echo "\n";

//Comparação
# // < > =
# != Verifica se o valor é diferente
# !== Verifica ser o valor é diferente OU o tipo é diferente
# == Verifica se o valor é igual
# === Verifica se o valor é igual E o tipo é igual 

/*---------------Estruturas de Repetição---------------*/
#WHILE
$cont=1;
while ($cont<=10){
    echo "$cont";
    $cont++;
}
echo "<br>";
echo "\n";

#DO-WHILE
$cont=1;
do{
    echo "$cont";
    $cont++;
}while ($cont<=10);
echo "<br>";
echo "\n";

#FOR
for($cont=1;$cont<=10;$cont++){
    echo "$cont";
}

/*---------------Padrões de Nome---------------*/
#camelCase
#snake_case
#PHP é sensível a letras maiúsculas e minúsculas
#& - passar como referência
?>