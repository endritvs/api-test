# Documentation

## Setup 

### PHP Version: 8.1.3

Commands needed to run
1. composer install
2. Setup .env file with DB connection
3. php artisan migrate
4. php artisan test
5. php artisan serve
6. php artisan db:seed
7. Testing the collection from POSTMAN
8. https://we.tl/t-ZWn0by0WsD - API COLLECTION TO IMPORT IN POSTMAN


## POST METHOD: http://127.0.0.1:8000/api/users

```json
{
    "first_name": "Dorothea",
    "last_name": "Kemmer",
    "email": "rgraham@example.net",
    "password": "password",
    "address": "6553 Krajcik Village\nSouth Lupe, ME 06396-8624"
}
```

## GET METHOD: http://127.0.0.1:8000/api/users

Should return all users on DB  

## PUT METHOD: http://127.0.0.1:8000/api/users/1

```json
{
    "first_name": "Dorothea",
    "last_name": "Kemmer",
    "email": "rgraham@example.net",
    "password": "password",
    "address": ""
}
```

## DELETE METHOD: http://127.0.0.1:8000/api/users/1

Should return success:true if it founds the user