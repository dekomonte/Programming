<?php

/*---------------PHP: PARTE 2---------------*/

/*---------------Tipos de Variáveis---------------*/
#Revisão - tipos primitivos: int, double, string, boolean
#Não precisa definir o tipo

//Tipo String
$nome="Andressa";
$sobrenome="Monteiro";
$idade=26;
$curso="Mecatrônica";

//Concatenação
#Concatenação - Forma 1:
echo "Meu nome é $nome $sobrenome, tenho $idade anos, faço $curso.<br>";
#Concatenação - Forma 2:
echo 'Meu nome é '.$nome.' '.$sobrenome.' ,tenho '.$idade.' anos, faço '.$curso.'.'.'<br>';

//Caracteres Especiais
#\n
#\t
#Outra forma de quebrar linha:
echo "Olá mundo!".PHP_EOL;

/*---------------Operações Matemáticas---------------*/
#+,-,*,**,/,%

#PHP aceita:
$contador=0;
$contador = $contador + 1;
$contador += 1;
$contador++;
echo "$contador";


/*---------------Estruturas de Seleção---------------*/
#IF-ELSEIF-ELSE

#Operador ternário
$idade = 22;
$mensagem = $idade < 18 ? 'Você é menor de idade' : 'Você é maior de idade';
echo $mensagem;

#CONTINUE-BREAK

?>