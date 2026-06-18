# Git Comandos - Parte 3

https://git-scm.com/book/pt-br/v2 <br>
https://www.udemy.com/course/git-completo-do-basico-ao-avancado/

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

### Outros

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

#### Exercício 2

Qual a função do comando ```git merge --abort```?

Ele é usado exclusivamente quando você tenta juntar duas branches (fazer um merge), o Git encontra conflitos que você não sabe ou não quer resolver naquele momento, e sua única intenção é desistir da operação.
