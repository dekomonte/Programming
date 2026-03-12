# Guia de Deploy: Flask + Gunicorn + Nginx no Ubuntu Server (Gemini)

Este guia assume que você tem um servidor Ubuntu limpo e acesso via SSH (Putty ou Remote Visual Studio Code).

Passo a passo de criação de um **serviço** de uma aplicação Python (Flask).

## 1. Preparação do Sistema

Primeiro, atualize os pacotes e instale as dependências necessárias.

```
sudo apt update && sudo apt upgrade -y
sudo apt install python3-pip python3-venv nginx git -y
```

## 2. Clonagem e Configuração da Aplicação

Vamos criar a estrutura de pastas, clonar o repositório e configurar o ambiente virtual.

```
# Criar diretório da aplicação e ajustar permissões
sudo mkdir -p /var/www/my_flask_app
sudo chown $USER:$USER /var/www/my_flask_app
cd /var/www/my_flask_app

# Clonar o repositório (substitua pela sua URL)
git clone https://github.com/usuario/seu-repo-flask.git .

# Criar e ativar ambiente virtual
python3 -m venv venv
source venv/bin/activate

# Instalar dependências
pip install --upgrade pip
pip install -r requirements.txt
pip install gunicorn
```

Não esquecer de atualizar o .env (produção). 

#### Criando a pasta de Logs

Para que o Gunicorn e o Nginx possam escrever logs na pasta da aplicação:

```
mkdir -p /var/www/my_flask_app/logs
touch /var/www/my_flask_app/logs/gunicorn_access.log
touch /var/www/my_flask_app/logs/gunicorn_error.log
```

## 3. Configuração do Gunicorn (.service)
O Systemd garantirá que sua aplicação inicie com o servidor e reinicie em caso de falhas.

Crie o arquivo de serviço:

```
sudo nano /etc/systemd/system/my_flask_app.service
```

**Conteúdo do arquivo:**

```
[Unit]
Description=Gunicorn instance to serve My Flask App
After=network.target

[Service]
User=www-data
Group=www-data
WorkingDirectory=/var/www/my_flask_app
Environment="PATH=/var/www/my_flask_app/venv/bin"
# Carregue variáveis de ambiente se necessário:
# EnvironmentFile=/var/www/my_flask_app/.env

ExecStart=/var/www/my_flask_app/venv/bin/gunicorn \
    --workers 3 \
    --bind unix:app.sock \
    --access-logfile /var/www/my_flask_app/logs/gunicorn_access.log \
    --error-logfile /var/www/my_flask_app/logs/gunicorn_error.log \
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
        proxy_pass http://unix:/var/www/my_flask_app/app.sock;
    }

    # Configuração de Logs customizada para a aplicação
    access_log /var/www/my_flask_app/logs/nginx_access.log;
    error_log /var/www/my_flask_app/logs/nginx_error.log;
}
```

## 5. Permissões e Inicialização

Para que o Nginx consiga ler o arquivo de socket criado pelo Gunicorn, o usuário www-data precisa de permissões na pasta.

```
# Ajustar dono da pasta para o usuário do servidor web
sudo chown -R www-data:www-data /var/www/my_flask_app
sudo chmod -R 755 /var/www/my_flask_app

# Ativar a configuração do Nginx
sudo ln -s /etc/nginx/sites-available/my_flask_app /etc/nginx/sites-enabled
sudo rm /etc/nginx/sites-enabled/default # Remove o default para evitar conflitos
sudo nginx -t # Testa a sintaxe

# Iniciar e habilitar serviços
sudo systemctl start my_flask_app
sudo systemctl enable my_flask_app
sudo systemctl restart nginx
```

## 6. Verificação e Debug

Se algo der errado, use estes comandos para verificar os logs que configuramos:

**Logs do Gunicorn**
```
tail -f /var/www/my_flask_app/logs/gunicorn_error.log
```

**Logs do Nginx**
```
tail -f /var/www/my_flask_app/logs/nginx_error.log
```

**Status do Serviço**
```
sudo systemctl status my_flask_app
```
