# Git Comandos - Parte 3

https://git-scm.com/book/pt-br/v2 <br>
https://www.udemy.com/course/git-completo-do-basico-ao-avancado/

### Tag
Tag é imutável, fica fixo em um commit específico para sempre;
Funcionalidade principal: quando o seu **sistema chega a um ponto estável e pronto para ir para produção**, você joga uma tag nele com o número da versão; facilita o retorno para outra versão; gerencia e organiza a linha temporal do projeto<br>
```git tag --list```<br>
```git tag -n```
```git diff V0 V1```

#### Tags em commits antigos
 ```git tag [nome da tag] [codigo do commit]```<br>
 ```git tag -a -m "mensagem" [nome da tag] [codigo do commit]```

#### Enviar tag para repositório
```git push origin V0```<br>
```git push --tags``` - Envia todas para o servidor (não recomendado)

#### Remover tag
```git tag -d V0``` - Remover localmente a tag<br>
```git push --delete origin V0``` - Remover no servidor

## Exercícios

#### Exercício 1

Qual a diferença entre uma tag lightweight (leve) e annotated (anotada)?

Quantidade de informação que elas carregam e no propósito de cada uma.

```
#Tag leve
#Armazena o hash do commit
git tag v1.0.0-beta
```
```
#Tag anotada
#Armazena o nome de quem criou, e-mail, data, uma mensagem de tag
git tag -a v1.0.0 -m "Release oficial da versão 1.0.0 com correções de segurança"
```

#### Exercício 2

Qual a função do comando git merge --abort?

Ele é usado exclusivamente quando você tenta juntar duas branches (fazer um merge), o Git encontra conflitos que você não sabe ou não quer resolver naquele momento, e sua única intenção é desistir da operação.
