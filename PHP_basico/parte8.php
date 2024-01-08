<?php

/*---------------PHP: PARTE 8---------------*/

/*---------------Introdução Variáveis Super Globais---------------*/
#Colocar $_ pra ver

//$_COOKIE
#Valor guardado no navedagor, posso resgatar depois
#Data de validade
#Posso guardar vários tipos de dados
#Posso excluir ele manualmente
setcookie('name','Alexandre', time() + 2*24*60*60);

//$_SESSION
#Guardado no navegador mas não o seu valor
$_SESSION['name']='Alexandre';

//$_ENV

//$_FILES
#Pegar um arquivo enviado de um formulário

//$_GET
#Pegar o id, o nome de requisições

//$_POST
#Pegar os valores enviados por meio do header

//$_REQUEST

//$_SERVER

?>