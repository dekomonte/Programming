# Guia - Git

https://git-scm.com/book/pt-br/v2 <br>
https://www.udemy.com/course/git-completo-do-basico-ao-avancado/

### Comandos Básicos

#### Configuração de usuário
```git config --global user.name "Nome de usuário"``` <br>
```git config --global user.email "nomeusuario@email.com"```<br>
```git config --list```<br>
```git config --global init.defaultBranch main``` <br>

#### Manuais
```git help <verb>```<br>
```git <verb> help```<br>
```man git-<verb>```<br>

#### Obter um repositório Git
*Usar um comando ou outro, não precisa dos dois.*<br>
```git init``` - Cria um subdiretório .git (usado quando for para começar um projeto do zero na máquina pessoal);<br>
```git clone [url]``` - Git recebe uma cópia completa de praticamente todos os dados que o servidor possui;<br>

#### Verificar status de arquivos
```git status```<br>
```git status -s```<br>
```git status --short```<br>

#### Verificar diferenças entre arquivos
Diferenças entre arquivo modificado e arquivo commitado:<br>
```git diff``` -  Compara o que está no seu diretório de trabalho com o que está no stage; <br>

Comparação da área de preparação com a versão já commitada:<br>
```git diff --staged``` - Compara as alterações que estão no seu stage com o seu último commit; <br>
```git diff --cached``` - Vê o que você já mandou para o stage até agora;

#### Rastrear arquivos
"Adicione este conteúdo ao próximo commit"<br>
```git add```<br>
```git add .``` ```git add --all``` ```git add -A```<br>

#### Remover arquivos
```git rm```<br>
```git rm --cached``` - Remove de STAGE, mas mantém o arquivo fisico intacto no diretório de trabalho;<br>
```git rm --cached -r .```<br>

#### "Movendo" arquivos
Função de conveniência<br>
```git mv nome_arquivo_original nome_arquivo_novo``` - Renomeia um arquivo;<br>

#### Commits
O commit "tira uma foto" do que foi deixado na área de stage (snapshot do projeto)<br>
```git commit``` - Forma mais simples de fazer um commit<br>
```git commit -m "Mensagem"``` Adiciona uma mensagem ao commit<br>
```git commit -a``` - Faz o Git mandar todos os arquivos rastreados modificados para o stage automaticamente antes de comitar, pulando a parte do `git add` (Atenção: não adiciona arquivos novos/untracked)<br>
```git commit --amend -m "Alteração de arquivo"```

#### Histórico de commits
O commit mais recente aparece primeiro<br>
```git log```<br>
```git log -p```<br>
```git log --stat```<br>
```git log --oneline```<br>
```git log --1```<br>
```git log --oneline -1```<br>
```git log --pretty=format```<br> 

[.gitignore](https://github.com/github/gitignore)

#### Usando commits anteriores
Útil quando a gente quer ver uma versão antiga do código<br>
```git log --oneline``` - Lista de commits<br>
```git checkout [código da branch]``` - Listado com log<br>

#### Desfazendo mudanças
```git checkout arquivo``` - Vai desfazer tudo desde o último commit conhecido; todas as alterações são perdidas<br>

```git clean -f``` - Remove os arquivos não rastreados<br>

```git rm --cached [arquivo]``` - Remove do stage

### Trabalhando de Forma Remota

#### Exibindo repositórios remotos

```git remote```- Lista os nomes de cada repositório remono manejado<br> 
```git remote -v```<br>

#### Adicionando repositórios remotos

```git remote add <shortname> <url>```

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

![O ciclo de vida dos status de seus arquivos.](/Git/lifecycle.png)

## GitHub
```git remote -v``` - Listagem do servidor remoto <br>

```origin``` - Apontamento de repositório (URL) <br>

```git push``` - Envio dos commits locais para o servidor remoto<br>
```git pull``` - Traz os dados do servidor local e faz o merge automático no código local<br>

## Branches

Ramificação significa que você diverge da linha principal de desenvolvimento e continua a trabalhar sem alterar essa linha principal.

HEAD é um ponteiro especial que aponta para a branch local que você está. 


#### Criar e mudar de branch

```git branch testing``` - Criar nova branch<br>
```git checkout testing``` - Mudar de branch<br>
```git checkout -b testing``` - Criar e Mudar para a branch criada<br>

```git switch```<br>
```git checkout```<br>

#### Listagem de branch

```git branch```

#### Deletar branch

```git branch -d [nome da branch]``` - Deletar branch local(e o histórico)<br>
```git branch -D [nome da branch]``` - Força Deletar branch local(e o histórico)<br>
```git push --delete origin [nome da branch]``` - Deletar branch no servidor(e o histórico)<br>

#### Renomear branch

```git branch -m [nome novo da branch]``` - Renomear branch localmente; muda o nome da branch atual<br>
```git branch -m [nome antigo][nome novo]``` - Renomear branch localmente; muda o nome estando em outra branch<br>
Renomear branch no servidor: **NÃO** dá para fazer<br>

#### Mesclar

```
git switch main
git merge develop
```

```git branch --no-merged``` - Listar as branchs não *mergeadas*<br>
```git branch --merged``` - Listar as branchs *mergeadas*<br>
```git merge --abort``` - Cancela a operação<br>

##### Conflitos

O Git adiciona símbolos padrão de resolução de conflitos nos arquivos que têm conflitos, para que você possa abrí-los manualmente e solucionar os conflitos.

```
Exemplo - Simbologia

<<<<<<< HEAD:index.html
<div id="footer">contact : email.support@github.com</div>
=======
<div id="footer">
 please contact us at support@github.com
</div>
>>>>>>> iss53:index.html
```

Escolher qual versão fica: você pode manter o texto da HEAD, manter o texto da iss53, ou reescrever a linha para combinar o melhor dos dois mundos. Apagar todos os marcadores (```<<<<<<< ``` ```=======``` ```>>>>>>>```). O arquivo final não pode conter essas linhas. Após resolver conflitos salvar e fazer o commit. 


#### git log

```git log develop --oneline``` - É possível colocar o nome da branch 

```git log --oneline --decorate --graph --all``` - Histórico de commits com ponteiros de branch e histórico de divergências

### Tag
Tag é imutável, fica fixo em um commit específico para sempre;
Funcionalidade principal: quando o **sistema chega a um estado estável e pronto para produção**, cria-se uma tag com o número da versão. Isso facilita o retorno a versões anteriores e ajuda a gerenciar e organizar a linha temporal do projeto.

```git tag --list```<br>
```git tag -n```<br>
```git diff V0 V1```

#### Tags em commits antigos
 ```git tag [nome da tag] [codigo do commit]```<br>
 ```git tag -a -m "mensagem" [nome da tag] [codigo do commit]```

#### Enviar tag para repositório
```git push origin V0```<br>
```git push --tags``` - Envia todas as tags locais para o servidor. Use com cuidado em repositórios públicos ou compartilhados para não subir tags de testes de outros desenvolvedores

#### Remover tag
```git tag -d V0``` - Remover a tag localmente<br>
```git push --delete origin V0``` - Remover a tag no servidor

## Outros

#### Parar de rastrear um arquivo

Cenário: o arquivo já foi adicionado, *"commitado"*, mas agora não quero mais que ele seja rastreado pelo Git

```git update-index --skip-worktree index.html``` - A partir de agora o Git não fica mais monitoriando (o passado fica registrado, o histórico permanece)

```git update-index --no-skip-worktree index.html``` - Desfaz a configuração do comando anterior

#### Clonar o repositório remoto

```git clone [url]``` - Clona o repositório na máquina local; mantém o histórico dos arquivos<br>

```git stash list```

#### Alias
```git config --global alias.s status``` - `git s` vai fazer a mesma coisa que o `git status`<br>
```git config --global alias.l log``` - `git l` vai fazer a mesma coisa que o `git log`<br>
```git config --global alias.line 'log --oneline'``` - `git line` vai fazer a mesma coisa que o `git log --oneline`<br>

Descarte:<br>
```git config --global --unset alias.s```<br>
```git config --global --unset alias.l```<br>
```git config --global --unset alias.line```<br>

## Exercícios

#### Exercício 1

O que essa sequência de comandos faz? 

```
git checkout -b develop
git checkout main
git branch -m develop dev
```
Cria uma nova branch chamada develop e muda pra ela; muda para a branch main; renomeia a branch develop para dev

#### Exercício 2

Qual a diferença entre ```git checkout``` e ```git switch```?

O git switch serve exclusivamente para mudar de branch. O git checkout serve para mudar de branch e para restaurar ou descartar modificações em arquivos.

#### Exercício 3

Cenário: fiz alterações na branch develop (já commitadas), quero que essas alterações sejam incorporadas à main/master, quais devem ser os comandos utilizados? 

```
git switch main
git merge develop
```

OBS: Eu sempre trago as mudanças para a branch que eu estou, nunca envio para outra branch. No merge, eu informo de qual branch eu quero trazer as informações

#### Exercício 4

Qual a diferença entre uma tag lightweight (leve) e annotated (anotada)?

Quantidade de informação que elas carregam e no propósito de cada uma.

```bash
#Tag leve
#Armazena o hash do commit
git tag v1.0.0-beta
```

```bash
#Tag anotada
#Armazena o nome de quem criou, e-mail, data, uma mensagem de tag
git tag -a v1.0.0 -m "Release oficial da versão 1.0.0 com correções de segurança"
```

#### Exercício 5

Qual a função do comando ```git merge --abort```?

Ele é usado exclusivamente quando você tenta juntar duas branches (fazer um merge), o Git encontra conflitos que você não sabe ou não quer resolver naquele momento, e sua única intenção é desistir da operação.

# EXTRAS

### "Padrão de Commit"

* **feat** - adição de novo recurso <br>
* **fix** - solução de um problema (bug) <br>
* **docs** - mudanças na documentação <br>
* **test** - alteração em testes <br>
* **build** - modificações em arquivos de build e dependência <br>
* **perf** - alterações relacionadas a performance <br>
* **style** - formatações de código <br>
* **refactor** - refatorações que não alterem sua funcionalidade <br>
* **chore** - atualizações de tarefas de build, configurações de ADMIN, pacotes <br>
* **ci** - CI, integração contínua <br>
* **raw** - mudanças relacionadas a arquivos de configurações, dados, features, parâmetros <br>
* **cleanup** - remover código comentado, trechos desnecessários <br>
* **remove** - exclusão (arquivos, diretórios, funcionalidades) 

### "Git Flow"
![O ciclo de vida dos status de seus arquivos.](https://cdn-wcsm.alura.com.br/2025/04/imagem3-50.png)
