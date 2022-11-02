# Arch Myst

### Setup modules
#### How to build containers
``
docker-compose up --build
``

```
php-arch
 ├─ docker-compose.yml
 ├─ ...
.gitignore
LICENSE
README.md
```

Inside `php-arch` module has a *docker-compose* file, so, UP the containers and access your
local host in `8080` port (*GET* `localhost:8080/health-check`).
