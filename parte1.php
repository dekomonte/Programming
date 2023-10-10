<?php

/*---------------PHP: PARTE 1---------------*/

//Como fazer comentários:
//Comentário
#Comentário
/*Comentário*/

/*---------------Primeiro programa clássico---------------*/
echo "Hello World!"."<br>"; //Deveria escrever isso na tela

/*---------------Variáveis---------------*/
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
$resposta=TRUE;
$gabarito=FALSE;

//Tipo String
#Aspas simples -> Mostra o texto como foi escrito na instrução
#Aspas duplas -> Permite a manipulação da saída
$sobrenome='Sena';
echo "Meu nome é $nome $sobrenome"."<br>";

//Como descobrir o tipo de uma variável
#//O ponto entre as strings é um operador de concatenação
echo "$altura é".gettype($altura)."<br>";

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


//Testar se a variável é de um determinado tipo
#Função is_TIPO($variável)
IF (is_string($nome)) {
    echo "É uma string"."<br>";
}
ELSE{
    echo "Não é uma string"."<br>";
}

#Array em PHP é um como uma mapa

/*---------------Operadores---------------*/
//Lógicos
#AND &&
#OR ||
#!

/*---------------Estruturas de Repetição---------------*/
#WHILE
$cont=1;
while ($cont<=10){
    echo "$cont";
    $cont++;
}
echo "<br>";

#DO-WHILE
$cont=1;
do{
    echo "$cont";
    $cont++;
}while ($cont<=10);
echo "<br>";

#FOR
for($cont=1;$cont<=10;$cont++){
    echo "$cont";
}
?>