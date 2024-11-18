# Web Scraping - Teste Leadtax

### Passo a passo Instalação

Clone Repositório

```sh
git clone https://github.com/ionansantos/teste-leadtax
```

```sh
cd app-laravel
```

Crie o Arquivo .env

```sh
cp .env.example .env
```

Suba os containers do projeto

```sh
docker-compose up -d
```

Acesse o container app

```sh
docker-compose exec app bash
```

Instale as dependências do projeto

```sh
composer install
```

Gere a key do projeto Laravel

```sh
php artisan key:generate
```

Rode as migrations

```sh
php artisan migrate
```

Rode o command para gerar os dados dos produtos

```sh
php artisan scrape:products
```

no navegador acesse:
(http://localhost:8989/products)
