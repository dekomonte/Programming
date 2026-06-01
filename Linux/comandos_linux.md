# 🐧 Guia de Comandos Linux
Google Gemini <br>
https://www.udemy.com/course/terminal-linux-com-ubuntu

### 📂 Navegação e Essenciais
`pwd` - Informa o caminho do diretório atual. <br>
`cd` - Navegação entre diretórios.<br>
`cd /` - Vai para o diretório raiz do sistema.<br>
`cd -` - Volta para o diretório onde você estava anteriormente.<br>
`cd ~` - Volta para o diretório "home" do seu usuário.<br>
`ls` - Lista arquivos e pastas do diretório atual. *Ex:* `ls -a` (Lista inclusive arquivos ocultos)<br>
`ls -l` - Lista arquivos com detalhes (permissões, dono, tamanho e data).<br>
`clear` - Limpa a tela do terminal.<br>
`Tab` - Autocompleta o nome de comandos ou arquivos enquanto você digita.<br>

### 🛡️ Administração e Usuários
* `sudo` - Executa comandos com privilégios de superusuário (root).
    * *Ex:* `sudo apt update`
    * *Ex:* `sudo apt upgrade`
* `whoami` - Mostra o nome do usuário logado no momento.
* `sudo adduser` - Cria um novo usuário no sistema.
    * *Ex:* `sudo adduser pedro`
* `sudo deluser --remove-home` - Remove um usuário e sua pasta pessoal.
    * *Ex:* `sudo deluser --remove-home thiago`
* `passwd` - Altera a senha de um usuário.
    * *Ex:* `passwd` (muda a sua) ou `sudo passwd joao` (muda a do joao).

### 📄 Manipulação de Arquivos e Pastas
* `cp` - Copia um arquivo ou diretório.
    * *Ex:* `cp arquivo.txt backup.txt`
* `mv` - Move ou renomeia um arquivo/pasta.
    * *Ex:* `mv antigo.txt novo.txt` (Renomear) ou `mv foto.jpg Imagens/` (Mover)
* `mkdir` - Cria uma nova pasta.
    * *Ex:* `mkdir Projetos`
* `rm` - Remove um arquivo.
    * *Ex:* `rm nota.txt`
* `rm -r` - Remove um diretório e todo o seu conteúdo (recursivo).
    * *Ex:* `rm -r pasta_antiga/`

### 🔍 Visualização e Busca de Texto
* `echo "mensagem"` - Exibe um texto no terminal.
* `echo "texto" > arquivo.txt` - Cria (ou sobrescreve) um arquivo com o texto.
* `echo "texto" >> arquivo.txt` - Adiciona o texto ao final do arquivo sem apagar o conteúdo atual.
* `cat arquivo.txt` - Exibe todo o conteúdo do arquivo no terminal.
* `head arquivo.txt` - Mostra as primeiras 10 linhas (ou use `-n 5` para cinco).
* `tail arquivo.txt` - Mostra as últimas 10 linhas (ideal para monitorar logs).
* `grep` - Busca por um padrão de texto dentro de arquivos ou saídas.
    * *Ex:* `cat lista.txt | grep "Maria"` (Filtra apenas linhas que contenham "Maria")

### 🛠️ Ajuda e Utilidades
* `man` - Abre o manual completo de um comando.
    * *Ex:* `man ls`
* `--help` ou `-h` - Uma versão resumida de ajuda direto no terminal.
    * *Ex:* `mkdir --help`
* `ping` - Testa a conexão com um host (servidor ou IP).
    * *Ex:* `ping google.com`
* `zip` - Comprime arquivos no formato .zip.
    * *Ex:* `zip arquivo.zip foto.jpg`
* `tar` - Agrupa arquivos. Comumente usado com `-cvf` para criar e `-xvf` para extrair.
    * *Ex:* `tar -cvf backup.tar pasta/`

---

# 🔐 Tabela de Permissões

No Linux, as permissões são divididas em três categorias de usuários: **Dono** (User), **Grupo** (Group) e **Outros** (Others). 

Cada permissão possui um valor numérico fixo. Para definir a permissão final, basta somar os valores desejados para cada categoria:
* **4 (r - read):** Leitura
* **2 (w - write):** Escrita/Gravação
* **1 (x - execute):** Execução



| Valor | Letras | Descrição | Soma Matemática |
| :--- | :--- | :--- | :--- |
| **7** | `rwx` | Leitura, Gravação e Execução | 4 + 2 + 1 |
| **6** | `rw-` | Leitura e Gravação | 4 + 2 |
| **5** | `r-x` | Leitura e Execução | 4 + 1 |
| **4** | `r--` | Apenas Leitura | 4 |
| **3** | `-wx` | Gravação e Execução | 2 + 1 |
| **2** | `-w-` | Apenas Gravação | 2 |
| **1** | `--x` | Apenas Execução | 1 |
| **0** | `---` | Nenhuma Permissão | 0 |

**Exemplo Prático:** Se você usar `chmod 755 arquivo.sh`, o dono terá permissão **7** (total), o grupo **5** (ler e executar) e outros **5** (ler e executar).

---

# 📂 Estrutura de Diretórios (Hierarquia)

* `/` - **Raiz (Root):** O diretório pai de todo o sistema. Nada existe fora dele.
* `/etc` - **Configurações:** Arquivos de configuração globais do sistema e serviços.
* `/bin` - **Executáveis:** Comandos essenciais que todos os usuários utilizam.
* `/var` - **Variáveis:** Arquivos que mudam de tamanho (logs de sistema, filas de e-mail, bancos de dados).
* `/home` - **Usuários:** Onde ficam as pastas pessoais de cada usuário (documentos, fotos, etc).
* `/lib` - **Bibliotecas:** Arquivos compartilhados essenciais para que os comandos do sistema funcionem.

# 📂 Gerenciamento de Processos

O sistema operacional utiliza processos para executar tarefas. Abaixo estão os comandos para monitorar e controlar o que está rodando na sua máquina.

* `ps -e` - Lista todos os processos em execução no sistema de forma simplificada.
    * *Ex:* `ps -e` (Útil para uma espiada rápida no que está ativo).
* `ps -ef` - Lista todos os processos com informações detalhadas (UID, PID, PPID, tempo de CPU).
    * *Ex:* `ps -ef | grep "firefox"` (Localiza especificamente o processo do navegador Firefox para ver seu ID).
* `kill <PID>` - Encerra (mata) um processo específico através do seu ID de Processo (PID).
    * *Ex:* `kill 1234` (Tenta encerrar o processo educadamente).
    * *Dica:* Use `kill -9 <PID>` para forçar o encerramento imediato se o processo estiver travado.
* `top` - Exibe uma tabela dinâmica e em tempo real dos processos que mais consomem recursos (CPU/RAM).
    * *Ex:* Digite `top` no terminal. Pressione `q` para sair ou `M` para ordenar por uso de memória.

---

### 💡 Dica de Ouro: O que é o PID?
O **PID** (*Process Identifier*) é um número único que o Linux atribui a cada tarefa. Para encerrar um programa que travou:
1. Use `ps -ef | grep nome_do_programa` para achar o número.
2. Use `kill` seguido desse número.
