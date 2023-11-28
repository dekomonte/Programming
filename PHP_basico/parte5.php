<?php
/*---------------PHP: PARTE 5---------------*/

/*---------------Declaração de Funções---------------*/
/*---------------Strings Complexas---------------*/

//Exemplo: Banco (Aula ALURA)

#Printa na tela todos os usuários do banco
function ExibeContas($contasCorrentes){
    foreach($contasCorrentes as $pessoa=>$conta){
        echo "$pessoa"." ".$conta['dono_rg']." ".$conta['saldo'];
        echo "<br>";
    }
}

#Função que verifica se a operação solicitada é permitida
#Não está muito otimizada mas funciona
#Tem como mandar o array como parâmetro para a função (especificar o tipo)
function Verifica($op,$valor,$id){
    if($op == '+'){
        echo "Permitido <br>";
        return 1;
    }
    elseif($op == "-"){
        if($id<$valor){
            echo "Não é possível fazer o saque <br>";
            return -1;
        }
        else{
            echo "Permitido <br>";
            return 2;
        }
    }
    else{
        echo "Operação inválida <br>";
        return -1;
    }
}

#Tem como passar parâmetros como referência para as funções
#Exemplo:
/*function minhaFuncao(&$meuParametro){
}
minhaFuncao($variavel);*/

function QuebraLinha(): void {
    echo "<br>";
}

#Banco de dados - Lista
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
    ],
    123459 => [
        'dono_rg'=>'Letiene',
        'saldo'=>700
    ]
];

ExibeContas($contasCorrentes);
QuebraLinha();

$operador="+";
$valor="25000";
$rg=123457;
$id=$contasCorrentes[$rg]['saldo'];
$retorno = Verifica($operador,$valor,$id);

if ($retorno == 1){
    $contasCorrentes[$rg]['saldo']+=$valor;
} 
elseif($retorno == 2){
    $contasCorrentes[$rg]['saldo']-=$valor;
}


ExibeContas($contasCorrentes);
QuebraLinha();

#Strings Complexas
foreach($contasCorrentes as $pessoa=>$conta){
    echo "$pessoa {$conta['dono_rg']} {$conta['saldo']}";
    QuebraLinha();
}

/*---------------Separar Arquivos---------------*/
#Usar include <nome do arquivo> para usar elementos de outros arquivos
#require <nome do arquivo> informa que tem um erro e não executa a partir daí
#Tipos de problema
#require_once <nome do arquivo> inclui caso o arquivo não tenha sido incluido antes

?>