GET de Employees:
http://localhost/culinaria/api/employees/listEmployees
```
[
    {
        "id": 1,
        "name": "bel",
        "email": "belbays@gmail.com",
        "number": "51999142410",
        "functions": "gerente",
        "salary": "999.99",
        "observation": "uma gatinha vei"
    },
    {
        "id": 2,
        "name": "",
        "email": null,
        "number": null,
        "functions": "",
        "salary": "0.00",
        "observation": null
    },
    {
        "id": 3,
        "name": "",
        "email": null,
        "number": null,
        "functions": "",
        "salary": "0.00",
        "observation": null
    },
    {
        "id": 4,
        "name": "",
        "email": null,
        "number": null,
        "functions": "",
        "salary": "0.00",
        "observation": null
    }
]
```

GET de Markets:
http://localhost/culinaria/api/markets/listMarkets
```
[
    {
        "id": 1,
        "name": "Padoca",
        "adress": "asdfgfghjkl",
        "number": "99999999999"
    },
    {
        "id": 2,
        "name": "",
        "adress": "",
        "number": ""
    },
    {
        "id": 3,
        "name": "",
        "adress": "",
        "number": ""
    },
    {
        "id": 4,
        "name": "",
        "adress": "",
        "number": ""
    }
]
```

POST (create) de Markets:
http://localhost/culinaria/api/markets/create

```
{
    "type": "success",
    "message": "Estabelecimento cadastrado com sucesso!"
}
```

POST (create) de Employees:
http://localhost/culinaria/api/employees/create

```
{
    "type": "success",
    "message": "Funcionário cadastrado com sucesso!"
}
```
