# Guia - Git

https://git-scm.com/book/pt-br/v2 <br>
https://www.udemy.com/course/git-completo-do-basico-ao-avancado/

### Comandos

#### Configuração de usuário
```git config --global user.name "Nome de usuário"``` <br>
```git config --global user.email "nomeusuario@email.com"```<br>
```git config --list```<br>
```git config --global init.defaultBranch main``` <br>

#### Manual
```git help <verb>```<br>
```git <verb> help```<br>
```man git-<verb>```<br>

#### Essenciais

##### Obter um repositório Git
```git init``` - Cria um subdiretório .git;<br>
```git clone [url]``` - Git recebe uma cópia completa de praticamente todos os dados que o servidor possui;<br>

##### Verificar status de arquivos
```git status```<br>
```git status -s``` ```git status --short```<br>

##### Verificar diferenças entre arquivos
Diferenças entre arquivo modificado e arquivo commitado:<br>
```git diff``` -  Compara o que está no seu diretório de trabalho com o que está no stage; <br>

Comparação da área de preparação com a versão já commitada:<br>
```git diff --staged``` - Compara as alterações que estão no seu stage com o seu último commit; <br>
```git diff --cached``` - Vê o que você já mandou para o stage até agora;

##### Rastrear arquivos
Adicione este conteúdo ao próximo commit <br>
```git add```<br>
```git add .``` ```git add --all``` ```git add -A```<br>

```git rm --cached```<br>
```git rm --cached -r .```<br>

##### Commits
```git commit -m "Mensagem"```<br>
```git commit -a``` - Faz o Git mandar todos arquivos rastreados para o stage automaticamente, antes de fazer o commit, permitindo que você pule a parte do ```git add```<br>

##### histórico de commits
```git log```<br>
```git log --oneline```<br>
```git log --1```<br>
```git log --oneline -1```<br>

[.gitignore](https://github.com/github/gitignore)

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

##### "Ciclo de vida" de um arquivo
Quando você clona um repositório pela primeira vez, todos os seus arquivos serão rastreados e não modificados já que o Git acabou de obtê-los e você ainda não editou nada. Assim que você edita alguns arquivos, Git os considera modificados, porque você os editou desde o seu último commit. Você prepara os arquivos editados e então faz commit das suas alterações, e o ciclo se repete.

Untracked files → Arquivos que não tinham no commit anterior;
