#### How to build containers
``
docker-compose up --build
``

### Create your own routes

`src/api/route/routes.php`

```php
$router->registry('/health-check', \Mathleite\PhpArch\api\healthcheck\controller\HealthCheckController::class, 'index');
```

*Where:*
- `/health-check` is the **route** that you want to *register*;
- `HealthCheckController::class` is the *Controller* **namespace**;
- `index` is a controller *function* *(action to do something)*.

*GET* `localhost:8080/health-check`