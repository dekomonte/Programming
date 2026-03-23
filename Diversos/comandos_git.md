# Guia - Git

https://git-scm.com/book/pt-br/v2 <br>
https://www.udemy.com/course/git-completo-do-basico-ao-avancado/

### Comandos

#### Configuração de usuário
```git config --global user.name "Nome de usuário"``` <br>
```git config --global user.email "nomeusuario@email.com"```<br>
```git config --list```

#### Essenciais
```git init```<br>
```git config --global init.defaultBranch main``` <br>
```git status```<br>
```git add```<br>
```git add .``` ```git add --all``` ```git add -A```<br>
```git rm --cached```<br>
```git rm --cached -r .```<br>

```git commit -m "Mensagem"```<br>

### Conceitos

#### Sistema Distribuído de Controle de Versão
Clientes duplicam localmente o repositório completo;

#### Git
* Trata seus dados como um conjunto de imagens de um sistema;
* Toda vez que você fizer um commit, ou salvar o estado de seu projeto no Git, ele basicamente tira uma foto de todos os seus arquivos e armazena uma referência para esse conjunto de arquivos; 
* O Git trata seus dados mais como um fluxo do estado dos arquivos. 

#### Os 3 Estados

*commited* → Dados armazenados no banco de dados local; <br>
*modified* → Arquivo alterado, mas sem o commit;<br>
*staged* → Marca a versão atual de um arquivo modificado para fazer parte do próximo commit;<br>
