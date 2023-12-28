<?php

/*---------------PHP: PARTE 7---------------*/

/*---------------Closures---------------*/
#Funções anônimas
#Objeto do tipo closure
#Precisa colocar ; ao final da função 
$person = function(){
    return 'teste';
    echo "\n";
};

#Colocar () pra trabalhar com o método invoke
var_dump($person());
echo "\n";

/*---------------Callbacks---------------*/
#Funções passadas como parâmetro para outras funções
function teste(){
    echo "\n";
    return 'teste';
}

function teste2($callback){
    return $callback();
}
#Passar a função como string
echo teste2('teste');

function f1($nome){
    echo "\n";
    return 'Olá meu nome é ' . $nome; 
}

echo call_user_func('f1','Andressa');

/*---------------Verificar se uma Variável existe---------------*/
echo "\n";
$nome = 'Alexandre';
echo isset($nome);
echo "\n";

if(isset($nome)){
    echo "Existe!\n";
}
else{
    echo "Não Existe!\n";
}

$person = ['name'=>'Alexandre', 'age'=>39];
echo isset($person['address']);

/*---------------Escopos Local e Global---------------*/
$nome_exemplo = 'Andressa';

function pessoa(){
    global $nome_exemplo;
    echo $nome_exemplo;
    echo "\n";
}

pessoa();

?>