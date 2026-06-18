# Git Comandos - Parte 2

https://git-scm.com/book/pt-br/v2 <br>
https://www.udemy.com/course/git-completo-do-basico-ao-avancado/

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


## Outros

#### Parar de rastrear um arquivo

Cenário: o arquivo já foi adicionado, *"commitado"*, mas agora não quero mais que ele seja rastreado pelo Git

```git update-index --skip-worktree index.html``` - A partir de agora o Git não fica mais monitoriando (o passado fica registrado, o histórico permanece)

```git update-index --no-skip-worktree index.html``` - Desfaz a configuração do comando anterior

#### Clonar o repositório remoto

```git clone [url]``` - Clona o repositório na máquina local; mantém o histórico dos arquivos<br>

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
