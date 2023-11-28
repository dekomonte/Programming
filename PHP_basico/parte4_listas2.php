<?php
/*---------------PHP: PARTE 4---------------*/

/*---------------Listas de Dados - Parte 2---------------*/
/*---------------Declaração de Funções---------------*/

function exibeMensagem($mensagem){
    echo $mensagem.PHP_EOL;
}

//Adicionar elementos na lista
$contasCorrentes = [
    123456 => [
        'dono_rg'=>'Maria',
        'saldo'=>200
    ],
    123457 => [
        'dono_rg'=>'Elitom',
        'saldo'=>24500
    ],
    123458 => [
        'dono_rg'=>'Luis',
        'saldo'=>567890
    ]
];

#Adicionando um elemento
$contasCorrentes[123459] = [
    'dono_rg'=>'Claudia',
    'saldo'=>4
];

foreach ($contasCorrentes as $rg=>$conta){
    echo "$rg"." ".$conta['dono_rg']." ".$conta['saldo'];
    echo "<br>";
}
#O PHP só trabalha com valores de chave do tipo numérico inteiro ou strings
#Os arrays são armazenados como HashTables

//Mudando valores na lista
$contasCorrentes[123457]['saldo']-=500;
echo "<br>";
foreach ($contasCorrentes as $rg=>$conta){
    exibeMensagem("$rg"." ".$conta['dono_rg']." ".$conta['saldo']);
    echo "<br>";
}

$contasCorrentes[123456]['saldo']+=4500;
$contasCorrentes[123457]['saldo']-=2000;
$contasCorrentes[123458]['saldo']+=7;
$contasCorrentes[123459]['saldo']+=12000;
echo "<br>";
foreach ($contasCorrentes as $rg=>$conta){
    exibeMensagem("$rg"." ".$conta['dono_rg']." ".$conta['saldo']);
    echo "<br>";
}

?>