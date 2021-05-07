
# Sistema de Papelaria

API Restfull para gerir sistema com os módulos Cliente, Produtos e Pedido
## Tecnologias

- PHP 8
- Laravel 8
- Laravel sail 1.0
- Banco de dados MySql 8

## Recursos

- Tipos de produtos definidos no sistema com a opção de adicionar novos
- Validação dos campos dos clientes para criação e edição
- Validação dos campos dos produtos para criação e edição
- Tratamento para armazenamento de imagens
- Validação para os campos do pedido
- Soft delete em todas as tabelas
- Uso de resource para formatar retornos da API
- Aplicação Dockerizada

## Instalação

Baixando o projeto

```bash 
  $ git clone https://github.com/jos3duardo/papelaria-api-rest.git papelaria
  $ cd papelaria
```

pasos para rodar o projeto em ambiente local usando [Laravel Sail](https://laravel.com/docs/8.x/sail) (docker)
```bash 
  $ composer install
  $ cp .env.example .env
  $ ./vendor/bin/sail artisan key:generate 
  $ ./vendor/bin/sail artisan storage:link   
  $ ./vendor/bin/sail up
  $ ./vendor/bin/sail artisan migrate --seed
```

link de acesso para API usando docker [http://localhost/api/v1](http://localhost/api/v1)

passos para rodar projeto sem uso do docker
- criar no banco local uma base de daos para o sistema
- configurar o arquivo *.env* com os dados de acesso ao banco de dados
- rodar comandos abaixo
```bash 
  $ composer install
  $ cp .env.example .env
  $ php artisan key:generate 
  $ php artisan storage:link   
  $ php artisan serve
  $ php artisan migrate --seed
```

link de acesso para API usando server do laravel [http://localhost:8000/api/v1](http://localhost:8000/api/v1)


## Rotas 
```bash
POST           api/v1/clients ............................................ clients.store
GET|HEAD       api/v1/clients ............................................ clients.index
PUT|PATCH      api/v1/clients/{client} .................................. clients.update
DELETE         api/v1/clients/{client} ................................. clients.destroy
GET|HEAD       api/v1/clients/{client} .................................... clients.show
GET|HEAD       api/v1/orders .............................................. orders.index
POST           api/v1/orders .............................................. orders.store
DELETE         api/v1/orders/{order} .................................... orders.destroy
PUT|PATCH      api/v1/orders/{order} ..................................... orders.update
GET|HEAD       api/v1/orders/{order} ....................................... orders.show
GET|HEAD       api/v1/products .......................................... products.index
POST           api/v1/products .......................................... products.store
POST           api/v1/products-types .............................. products-types.store
GET|HEAD       api/v1/products-types .............................. products-types.index
DELETE         api/v1/products-types/{products_type} ............ products-types.destroy
PUT|PATCH      api/v1/products-types/{products_type} ............. products-types.update
GET|HEAD       api/v1/products-types/{products_type} ............... products-types.show
DELETE         api/v1/products/{product} .............................. products.destroy
PUT|PATCH      api/v1/products/{product} ............................... products.update
GET|HEAD       api/v1/products/{product} ................................. products.show
```

## Documentação de Rotas
[link de rotas no postman](https://documenter.getpostman.com/view/10174080/TzRRBTUZ)  
[link para importar rotas no postman](https://www.getpostman.com/collections/59aa50112561981f4856)
