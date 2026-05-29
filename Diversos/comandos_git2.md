# Git Comandos - Parte 2

## GitHub
```git remote -v``` - Listagem do servidor remoto <br>

```origin``` - Apontamento de repositório (URL) <br>

```git push``` - Envio dos commits locais para o servidor remoto<br>
```git pull``` - Traz os dados do servidor local<br>

## Outros

#### Parar de rastrear um arquivo

Hipótese: o arquivo já foi adicionado, *"commitado"*, mas agora não quero mais que ele seja rastreado pelo Git

```git update-index --skip-worktree index.html``` - A partir de agora o Git não fica mais monitoriando (o passado fica registrado, o histórico permanece)

```git update-index --no-skip-worktree index.html``` - Desfaz a configuração do comando anterior

#### Clonar o repositório remoto

```git clone [url]```<br>
