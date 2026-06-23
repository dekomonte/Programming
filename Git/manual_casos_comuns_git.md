# Manual de Casos Comuns - Git

Como forma de documentação, esse arquivo lista problemas comuns envolvendo controle de versão e alternativas de solução. 

[Google Gemini](https://gemini.google.com/)

# Sumário
* [N Branches](#n-branches)
* [Fiz besteira no último commit local, mas ainda não dei push](#fiz-besteira-no-último-commit-local-mas-ainda-não-dei-push)
* [Entrei em um mar de conflitos de merge após um pull](#entrei-em-um-mar-de-conflitos-de-merge-após-um-pull)
* [Commitaram uma senha/chave de API pública por engano e foi para o GitHub](#commitaram-uma-senhachave-de-api-pública-por-engano-e-foi-para-o-github)
* [Arquivos sensíveis por engano no GitHub](#arquivos-sensíveis-por-engano-no-github)

## N Branches

Você acabou de chegar no projeto, o ambiente(máquina) local está funcionando, mas a branch atual não é a main e ninguém sabe o que as outras N branches fazem.

#### Proposta de Solução

1. Investigar: entender o estado atual da máquina

```
# Verifica em qual branch você está atualmente e o status dos arquivos
git status

# Mostra o último commit da branch atual para entender o quão antiga ela é
git log -1
```

2. Listar e ordenar branchs: ordenar por histórico de commits

```
# Lista todas as branches (locais e remotas) ordenadas pela data do último commit (as mais recentes por último)
git branch -a --sort=committerdate
```

3. Avaliar a diferença entre a branch que funciona e a main para saber o que foi feito 

```
# Compara a branch atual com a main mostrando apenas o resumo dos arquivos modificados
git diff main --stat
```

4. Rastrear as modificações no projeto

```
# Mostra de forma gráfica e compacta o histórico de commits de todas as branches
git log --oneline --graph --all
```

## Fiz besteira no último commit local, mas ainda não dei push

Você commitou algo com a mensagem errada, ou esqueceu de adicionar um arquivo, ou simplesmente se arrependeu do que escreveu.

#### Propostas de Solução

a) Apenas corrigir a mensagem ou adicionar arquivos esquecidos
```
# Adicione o arquivo esquecido (se houver)
git add arquivo-esquecido.txt
# Altera o último commit sem criar um novo
git commit --amend --no-edit
```

a) Desfazer o commit, mas manter as alterações no código
```
# Desfaz o último commit, os arquivos voltam para a área de "Staging"
git reset --soft HEAD~1
```

## Entrei em um mar de conflitos de merge após um pull

Você tentou atualizar sua branch com git pull (ou fazer um merge), e o terminal foi inundado com mensagens de conflito.

#### Proposta de Solução

```
# Se a bagunça for grande e você quiser voltar ao estado anterior para respirar:
git merge --abort

# Se quiser resolver: abra o VS Code ou sua IDE. 
# O Git marcará os conflitos. Escolha entre "Aceitar alteração atual" ou "Aceitar alteração que vem de fora".
# Após resolver nos arquivos:
git add .
git commit -m "Fix: resolvendo conflitos de merge"
```

## Commitaram uma senha/chave de API pública por engano e foi para o GitHub

A regra de ouro é: troque a senha/credencial imediatamente, pois robôs varrem o GitHub em segundos. Mas para limpar o histórico do Git:

#### Proposta de Solução

```
# Remove o arquivo do commit atual e de todo o histórico passado
git filter-branch --force --index-filter \
"git rm --cached --ignore-unmatch caminho/do/arquivo/com/senha.env" \
--prune-empty --tag-name-filter cat -- --all

# Força o push para o repositório remoto (Cuidado: isso afeta os colegas)
git push origin --force --all
```

## Arquivos sensíveis por engano no GitHub

O desenvolvedor esqueceu de colocar o .env no .gitignore, commitou o arquivo e, agora, se deletar do jeito normal (git rm), o arquivo some também da máquina local, quebrando a aplicação que estava rodando.

Aqui está o comando cirúrgico para resolver isso: você remove o arquivo do controle de versão (e consequentemente do GitHub no próximo push), mas mantém ele intacto na sua pasta local.

Importante: Inserir o arquivo no .gitignore para não ser enviado de novo.

#### Proposta de Solução

```
# Remova o arquivo .env do índice do Git (rastreamento), mas mantenha-o no disco
git rm --cached .env

# (Opcional) Se foi uma pasta inteira de configurações ou chaves:
git rm -r --cached nome-da-pasta/
git rm -r --cached "pasta exemplo/"
```
