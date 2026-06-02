# Git Comandos - Parte 2

## GitHub
```git remote -v``` - Listagem do servidor remoto <br>

```origin``` - Apontamento de repositório (URL) <br>

```git push``` - Envio dos commits locais para o servidor remoto<br>
```git pull``` - Traz os dados do servidor local<br>

## Branches

Ramificação significa que você diverge da linha principal de desenvolvimento e continua a trabalhar sem alterar essa linha principal.

```git switch```<br>
```git checkout```<br>

```git branch -d [nome da branch]``` - Deletar branch local(e o histórico)<br>
```git push --delete origin [nome da branch]``` - Deletar branch no servidor(e o histórico)<br>

```git branch -m [nome novo da branch]``` - Renomear branch localmente; muda o nome da branch atual<br>
```git branch -m [nome antigo][nome novo]``` - Renomear branch localmente; muda o nome estando em outra branch<br>
Renomear branch no servidor: **NÃO** dá para fazer<br>

## Outros

#### Parar de rastrear um arquivo

Cenário: o arquivo já foi adicionado, *"commitado"*, mas agora não quero mais que ele seja rastreado pelo Git

```git update-index --skip-worktree index.html``` - A partir de agora o Git não fica mais monitoriando (o passado fica registrado, o histórico permanece)

```git update-index --no-skip-worktree index.html``` - Desfaz a configuração do comando anterior

#### Clonar o repositório remoto

```git clone [url]``` - Clona o repositório na máquina local; mantém o histórico dos arquivos<br>
