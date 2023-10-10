<?php
/*---------------PHP: PARTE 4---------------*/

/*---------------Listas de Dados---------------*/

//Declaração
#Método 1
$idadeLista = array(2,4,34,67,89);

#Método 2
$listaIdade = [2,4,34,67,89];

//Acesso ao primeiro elemento
$primeiraIdade=$listaIdade[0];
echo $primeiraIdade.PHP_EOL;
echo '<br>';

//Loop
for($i=0;$i<sizeof($listaIdade);$i++){
    echo $listaIdade[$i].PHP_EOL;
}

//Array Associativo
#Array no PHP é um mapa ordenado (valor e chave)
$conta1 = [
    'titular'=>'Andressa',
    'saldo'=>20
];
$conta2 = [
    'titular'=>'Fu',
    'saldo'=>14900
];
$conta3 = [
    'titular'=>'Ayo',
    'saldo'=>5600
];

$listaContas = [$conta1,$conta2,$conta3];
echo '<br>';

#Loop - Método 1 (for)
for($i=0;$i<sizeof($listaContas);$i++){
    echo $listaContas[$i]['titular'].PHP_EOL;
    echo $listaContas[$i]['saldo'].PHP_EOL;
    echo '<br>';
}

echo '<br>';

#Loop - Método 2 (foreach)
/*Sintaxe
foreach (iterable_expression as $valor)
    statement
foreach (iterable_expression as $chave => $valor)
    statement*/

foreach ($listaContas as $conta){
    echo $conta['titular'].PHP_EOL;
}

#Exemplo: Construção de um 'Array de Array'.
$contasCorrente=[
    9876543210=>$conta1,
    9876543211=>$conta2,
    9876543212=>$conta3
];

foreach($contasCorrente as $cpf=>$conta){
    echo $cpf.PHP_EOL;
}

?>