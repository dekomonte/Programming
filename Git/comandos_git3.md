# Git Comandos - Parte 3

https://git-scm.com/book/pt-br/v2 <br>
https://www.udemy.com/course/git-completo-do-basico-ao-avancado/

### Tag
Tag é imutável, fica fixo em um commit específico para sempre;
Funcionalidade principal: quando o seu **sistema chega a um ponto estável e pronto para ir para produção**, você joga uma tag nele com o número da versão; facilita o retorno para outra versão; gerencia e organiza a linha temporal do projeto<br>
```git tag --list```<br>
```git tag -n```

#### Tags em commits antigos
 ```git tag [nome da tag] [codigo do commit]```<br>
 ```git tag -a -m "mensagem" [nome da tag] [codigo do commit]```

#### Enviar tag para repositório
```git push origin V0```<br>
```git push --tags``` - Envia todas para o servidor (não recomendado)
