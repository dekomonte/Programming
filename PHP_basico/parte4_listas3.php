<?php
/*---------------PHP: PARTE 4---------------*/

/*---------------Array---------------*/

//Formas de declarar
$nomes = array('Alexandre', 'Maria', 'João');
$nomes2 = ['Adauto', 'Luis', 'Luiz'];
$data = ['Adauto', 'Luis', 'Luiz', 34, true]; #Índices 0,1,2,3,4

//Formas de mostrar
print_r($data);
var_dump($data);

//Índices
var_dump($data[1]);
var_dump($data[4]);

//Adicionar elementos
#Forma 1
$data[5] = 'last';
var_dump($data);

#Forma 2 - Adicionando no fim
$lenght = count($data); 
$data[$lenght] = 'Ultimo';
var_dump($data);

#Forma 3 - Adicionando no fim
array_push($data,'teste');
var_dump($data);

#Forma 4 - Adicionando no começo
array_unshift($data, 'first');
var_dump($data);

//Criar Array com índices específicos
$person = ['name' => 'Alexandre', 'age' => 27];
var_dump($person['name']);

//Arrays dentro de Arrays
$person = ['name' => 'Alexandre', 'age' => 27, 'documents' => ['cpf' => '12345678910', 'rg' => '9087140']];
var_dump($person['documents']);
var_dump($person['documents']['rg']);

$person = ['name' => 'Alexandre', 'age' => 27, 'documents' => ['cpf' => '12345678910', 'rg' => '9087140', 'automovel'=> ['2rodas' => 'moto', '4rodas' => 'carro']]];
var_dump($person['documents']['automovel']['4rodas']);

$person = [
    'name' => 'Alexandre', 'age' => 27, 
    'documents' => [
        'cpf' => '12345678910', 'rg' => '9087140', 
        'automovel'=> ['2rodas' => 'moto', '4rodas' => 'carro']
    ]
];

?>