# Desafio Investidor10

Este projeto Laravel foi criado para o teste do processo seletivo para Desenvolvedor PHP Sr na empresa Investidor10.

## Requisitos

Certifique-se de ter o Docker e o Docker Compose instalados em sua máquina.

- Docker: [Instalação do Docker](https://docs.docker.com/get-docker/)
- Docker Compose: [Instalação do Docker Compose](https://docs.docker.com/compose/install/)

## Instruções

### 1. Clonar o Repositório

Clone o repositório do GitHub para o seu ambiente local:

```bash
git clone https://github.com/gabrieltva/desafio-investidor10.git
cd desafio-investidor10
```

### 2. Configuração do Ambiente

Renomeie o arquivo `.env.example` para `.env` e configure as variáveis de ambiente conforme necessário para o seu projeto Laravel.

### 3. Buildar o Ambiente Docker

Para construir os contêineres Docker e iniciar o ambiente de desenvolvimento:

```bash
docker-compose up --build
```

Este comando irá construir e iniciar os contêineres especificados no `docker-compose.yml`.

### 4. Instalar as Dependências do Composer

Para instalar as dependências PHP do Laravel utilizando o Composer:

```bash
docker-compose run --rm app composer install
```

### 5. Buildar o Vite

Execute o comando para buildar o front-end:

```bash
docker-compose run --rm app npm run build
```

### 6. Executar Testes

Para executar os testes do Laravel:

```bash
docker-compose run --rm app php artisan test
```

### 7. Migrar e Popular o Banco de Dados

Após executar os testes, migre e popule o banco de dados conforme necessário:

```bash
docker-compose run --rm app php artisan migrate
docker-compose run --rm app php artisan db:seed
```

Estes comandos executam as migrações pendentes e alimentam o banco de dados com dados iniciais.

### 8. Acessar a Aplicação

Depois de seguir os passos acima, acesse a aplicação em seu navegador utilizando o endereço local configurado no seu ambiente Docker (http://localhost:8989).