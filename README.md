# Sistema de Gestão de Custos de Venda
### Projeto Laravel com Docker

Este projeto é uma aplicação Laravel configurada para rodar em contêineres Docker. O ambiente é composto por quatro contêineres: `app` (PHP), `web` (Nginx), `db` (MySQL) e `redis` (Redis).

## Instalação e Acesso
Executar o comando na raiz do projeto, criará os 4 containeres necessários, após estará disponível acesso na porta 30080.
```sh
docker compose up -d
```
- Os containeres não possuem portas expostas, o único acesso externo é através de http.
- Ao iniciar o container app será forcado a criação/reativação de um usuário admin.
```
user: admin@admin.com
password: admin
```

## Requisitos

- Docker
- Docker Compose

## Estrutura dos Contêineres

### `app`

- **Imagem Base:** PHP 8.2 FPM
- **Função:** Este contêiner executa a aplicação Laravel.
- **Características:**
  - Instala dependências PHP.
  - Configura o PHP com extensões necessárias.
  - Executa o Composer para instalar as dependências do Laravel.
  - Executa as migrações e cria um usuário admin no banco de dados.

### `web`

- **Imagem Base:** Nginx
- **Função:** Servidor web para servir a aplicação Laravel.
- **Características:**
  - Usa configuração personalizada do Nginx para servir a aplicação PHP.
  - Depende do contêiner `app` para processar as requisições PHP.

### `db`

- **Imagem Base:** MySQL 8.0
- **Função:** Banco de dados MySQL para armazenar os dados da aplicação.
- **Características:**
  - Configurado com um banco de dados `laravel` e um usuário `laravel` com senha `laravel`.
  - Monta volume persistente para os dados do MySQL.

### `redis`

- **Imagem Base:** Redis
- **Função:** Servidor Redis para cache e suporte a sessões.
- **Características:**
  - Usado para melhorar o desempenho da aplicação Laravel.