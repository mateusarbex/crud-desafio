# CRUD



Um CRUD básico para um sistema de vendas de produtos junto com cadastramento de usuário.

Link para o deploy do CRUD no Heroku: http://crud-desafio.herokuapp.com

## Tecnologias utilizadas

- Laravel - 6.2
- Node - 12.3
- Postgresql - Database no Heroku
- SQLite - Database local




## Comandos 
Para montar o servidor local

    php artisan server

   Para modificar ou alterar dados da database diretamente
   

    php artisan tinker
    >>> Produto::all() #Retorna todos os produtos
    >>> Produto::create(['foo'=>'bar'...]) #Criar nova tupla

   

    

