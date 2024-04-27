Documentation for API

POST METHOD: http://127.0.0.1:8000/api/users
{
"name": "Endrit Saiti",
"email": "endritsaiti8@gmail.com",
"password": "password",
"address": "RR Gjilanit 2"
}  

GET METHOD: http://127.0.0.1:8000/api/users
Should return all users on DB  

PUT METHOD: http://127.0.0.1:8000/api/users/1
{
"name": "Endrit Saiti",
"email": "endritsaiti8@gmail.com",
"password": "password",
"address": ""
}  

DELETE METHOD: http://127.0.0.1:8000/api/users/1
Should return success:true if it founds the user


