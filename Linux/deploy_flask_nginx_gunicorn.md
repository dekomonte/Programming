# Guia de Deploy: Flask + Gunicorn + Nginx no Ubuntu Server (Gemini)

[Nginx](https://nginx.org/en/docs/)

Este guia assume que você tem um servidor Ubuntu limpo e acesso via SSH (Putty ou Remote Visual Studio Code).

Passo a passo de criação de um **serviço** de uma aplicação Python (Flask).

OBS: O tutorial do Gemini faz todo o procedimento admitindo que o diretório da aplicação é ```/var/www/my_flask_app/```(padrão do Apache), eu coloquei as aplicações na pasta de usuário exemplo ```/home/ubuntu/aplicacao```. 

Assume-se que o usuário no Ubuntu é ```ubuntu``` e a pasta da aplicação é ```aplicacao```.

## 1. Preparação do Sistema

Primeiro, atualize os pacotes e instale as dependências necessárias (verificar antes quais são dependências apenas da aplicação para evitar conflitos).

```
sudo apt update 
sudo apt upgrade 
sudo apt install python3-pip python3-venv nginx git -y
```

## 2. Clonagem e Configuração da Aplicação

Vamos criar a estrutura de pastas, clonar o repositório e configurar o ambiente virtual.

```
# Criar diretório da aplicação e ajustar permissões (no diretório da aplicação)
sudo mkdir aplicacao
sudo chown -R $USER:$USER .
```

```
# Clonar o repositório (no diretório da aplicação)
git clone https://github.com/usuario/exemplo_aplicacao.git
```

```
# Criar e ativar ambiente virtual
python3 -m venv venv
source venv/bin/activate
```

```
# Instalar dependências
pip install --upgrade pip
pip install -r requirements.txt
pip install gunicorn
```

**NÃO ESQUECER DE ATUALIZAR .env (produção)!**

#### Criando a pasta de Logs

Para que o Gunicorn e o Nginx possam escrever logs na pasta da aplicação:

```
#No diretório da aplicação

mkdir -p logs
touch logs/gunicorn_access.log
touch logs/gunicorn_error.log
```

OBS: Em produção pode ser uma boa prática alterar o diretório dos logs para o padrão como, por exemplo, os parâmetros que aparecemno arquivo do serviço (abaixo).

## 3. Configuração do Gunicorn (.service)
O Systemd garantirá que sua aplicação inicie com o servidor e reinicie em caso de falhas.

Crie o arquivo de serviço:

```
sudo nano /etc/systemd/system/aplicacao.service
```

**Conteúdo do arquivo:**

```
[Unit]
Description=Gunicorn instance to serve My Flask App
After=network.target

[Service]
User=ubuntu
Group=www-data
WorkingDirectory=/home/ubuntu/aplicacao
Environment="PATH=/home/ubuntu/aplicacao/venv/bin"
# EnvironmentFile=/home/ubuntu/aplicacao/.env

ExecStart=/home/ubuntu/aplicacao/venv/bin/gunicorn \
    --workers 3 \
    --bind unix:/home/ubuntu/aplicacao/app.sock \
    --access-logfile /home/ubuntu/aplicacao/logs/gunicorn_access.log \
    --error-logfile /home/ubuntu/aplicacao/logs/gunicorn_error.log \
    --capture-output \
    --log-level info \
    app:app

[Install]
WantedBy=multi-user.target
```

Nota: No comando app:app, o primeiro 'app' é o nome do arquivo Python (ex: app.py) e o segundo é a variável que contém a instância Flask.

## 4. Configuração do Nginx como Proxy Reverso

Agora, vamos configurar o Nginx para receber tráfego na porta 80 e repassar para o socket do Gunicorn.

Crie o arquivo de configuração:

```
sudo nano /etc/nginx/sites-available/my_flask_app
```

**Conteúdo do arquivo:**

```
server {
    listen 80;
    server_name seu_dominio_ou_ip;

    location / {
        include proxy_params;
        proxy_pass http://unix:/home/ubuntu/aplicacao/app.sock;
    }

    # Logs dentro da pasta da aplicação
    access_log /home/ubuntu/aplicacao/logs/nginx_access.log;
    error_log /home/ubuntu/aplicacao/logs/nginx_error.log;
}
```

## 5. Permissões e Inicialização

Para que o Nginx consiga ler o arquivo de socket criado pelo Gunicorn, o usuário www-data precisa de permissões na pasta.

```
# 1. Permissões de pasta (Importante para rodar na Home)
# Dá permissão de execução na home para o Nginx 'atravessar' as pastas
chmod o+x /home/ubuntu 

# Garante que o grupo www-data tenha acesso aos arquivos da app
sudo chown -R ubuntu:www-data /home/ubuntu/aplicacao
sudo chmod -R 775 /home/ubuntu/aplicacao

# 2. Ativar a configuração do Nginx
sudo ln -s /etc/nginx/sites-available/aplicacao /etc/nginx/sites-enabled/
sudo rm -f /etc/nginx/sites-enabled/default
sudo nginx -t

# 3. Recarregar Systemd e Iniciar Serviços
sudo systemctl daemon-reload
sudo systemctl start aplicacao
sudo systemctl enable aplicacao
sudo systemctl restart nginx
```

## 6. Verificação e Debug

Se algo der errado, use estes comandos para verificar os logs que configuramos:

**Logs do Gunicorn**
```
# Ver logs em tempo real (Erro do Gunicorn)
tail -f /home/ubuntu/aplicacao/logs/gunicorn_error.log
```

**Logs do Nginx**
```
# Ver logs em tempo real (Erro do Nginx)
tail -f /home/ubuntu/aplicacao/logs/nginx_error.log
```

**Status do Serviço**
```
sudo systemctl status aplicacao
```
