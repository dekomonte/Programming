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

//Aspas simples X Aspas duplas
#Quando você coloca entre "", ele considera uma variável dentro da string
#Pode colocar a variável entre {} ou não
$idade=43;

echo 'A idade é $idade \n';
echo "A idade é $idade \n";
echo "A idade é {$idade} \n";
#Com '', ele nem considera o \n


//Concatenação
#Concatenação - Forma 1:
echo "Meu nome é $nome $sobrenome, tenho $idade anos, faço $curso.<br>";
echo "(Brega)\n";
#Concatenação - Forma 2:
echo 'Meu nome é '.$nome.' '.$sobrenome.' ,tenho '.$idade.' anos, faço '.$curso.'.'.'<br>';
echo "(Brega)\n";

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
echo "\n";


/*---------------Estruturas de Seleção---------------*/
#IF-ELSEIF-ELSE
$isAdmin = true;
$numero1 = 70;
$numero2 = 50;

$resultado = $numero1 > $numero2  && $isAdmin;

if($isAdmin){
    echo "isAdmin";
    echo "\n";
}

if($resultado){
    echo "Verdadeiro!\n";
}
else{
    echo "Falso!\n";
}

#Operador ternário
$idade = 22;
$mensagem = $idade < 18 ? 'Você é menor de idade' : 'Você é maior de idade';
echo $mensagem;
echo "\n";

echo ($resultado) ? 'Verdadeiro!' : 'Falso!';
echo "\n";

#Switch
$nome = "Andressa";

switch($nome){
    case "Sandra";
        echo "É Sandra!\n";
        break;
    case "Sena";
        echo "É Sena!\n";
        break;
    case "Andressa";
        echo "É Andressa!\n";
        break;
    default:
        echo "Não é nenhum! :( \n";
        break;

}

#CONTINUE-BREAK

?>