# Laravel TODO API

## Installation

First, install the Laravel dependencies using the following command:

```
composer install
```

After this, you have to execute ```php artisan jwt:secret``` to generate the secret key, this value will be save automatically into ```.env``` file.

## Routes

|Route|Description|Requirements|Method|
|-----|-----------|------------|------|
|/register|Route to create a new user|name, email, password, password_confirmation|POST|
|/login|Route to generate the JWT to acces to the routes|email, password|POST|
|/logout|Rotue to invalidate the current JWT token|Header: current token|POST|
|/refresh|Route to regenerate the JWT|Header: current token|POST|
|/me|Route to show the data of the current logged user|Header: current token|GET|
|/all|Return all the tasks that belongs to the logged user|Header: current token|GET|
|/task/id|Return an specific task that belongs to the logged user|Header: current token, Param: id|GET|
|/create|Create a task|Header: current token, Form params: title, description, start_date(can be null), end_date(can be null)|POST|
|/update/id|Update a task by id|Header: current token, Form params: status_id, title, description, start_date, end_date|PUT|
|/delete/id|Delete a task by id|Header: current token, Param: id|DELETE|
|/restore/id|Restore a task by id|Header: current token, Param: id|GET|
