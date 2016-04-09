# Docker for PHP Developers
Esse exemplo foi criado para exemplificar os conceitos apresentados durante a palestra "Docker for PHP Developers".

## Slides
* link em breve...

## Instalando o Docker
> WIP

## Hello World

Uma vez instalado o docker, execute o seguinte comando:
```
docker run hello-world
```

Você receberá o seguinte output:

```
Hello from Docker.
This message shows that your installation appears to be working correctly.

To generate this message, Docker took the following steps:
 1. The Docker client contacted the Docker daemon.
 2. The Docker daemon pulled the "hello-world" image from the Docker Hub.
 3. The Docker daemon created a new container from that image which runs the
    executable that produces the output you are currently reading.
 4. The Docker daemon streamed that output to the Docker client, which sent it
    to your terminal.

To try something more ambitious, you can run an Ubuntu container with:
 $ docker run -it ubuntu bash

Share images, automate workflows, and more with a free Docker Hub account:
 https://hub.docker.com

For more examples and ideas, visit:
 https://docs.docker.com/userguide/
```

## Usando o PHP 7 sem Dockerfile

```
# CLI
docker run -d php:7 php -v
# interactive shell
docker run -d -it php:7
# webserver
docker run -d -p 9000:9000 -v $PWD:/usr/src/myapp php:7 php -S 0.0.0.0:9000 -t /usr/src/myapp
```

## Usando o PHP 7 com Dockerfile

Dockerfile
```
FROM php:7.0.5-apache
COPY . /var/www/html
```

```
docker build -t yourimage .
docker run yourimage
```

## Rodando o MySQL

```
docker run --name db -e MYSQL_ROOT_PASSWORD=123456 -p 3306:3306 -d mysql
```

## Docker Compose

docker-compose.yml
```
web:
  build: .
  ports:
    - "80:80"
  volumes:
    - ./:/usr/src/myapp
  links:
    - db
db:
  image: mysql
  environment:
    - MYSQL_ROOT_PASSWORD=123456
```

```
# levantar serviços
docker-compose up -d
# visualizar os logs
docker-compose logs
# matar processos
docker-compose kill
```

