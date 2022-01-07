# Docker development environment

Source: https://getkirby.com/docs/cookbook/setup/kirby-meets-docker

Use the `Dockerfile` and `docker-compose` file in this folder to spin up a local development environment.

## Prerequisites

Change the id of your local user in the `id.env` file. Find your correct id using `id -u`.

To use the correct domain names add the following line to `/etc/hosts`:

```console
127.0.0.1 dev.js-buchsi.ch
```

## Docker

```bash
docker build -t docker-starterkit:dev .
docker run -d --name mycontainer -p 80:80 \
  --mount type=bind,source=$(pwd)/../,destination=/var/www/html \
  --env-file id.env docker-starterkit
  docker-starterkit:dev
```

You can visit the page at `https://dev.js-buchsi.ch`

### Docker-compose

```bash
docker-compose up -d
```

#### Mail configuration

The docker-compose file contains a local mail service too. If you add the following config to kirby's config.php file, you will be able to see mails kirby would sends at `http://localhost:8025`:

```php
'email' => [
  'transport' => [
    'type' => 'smtp',
    // use the hostname defined in the docker compose file
    'host' => 'mailhog',
    // the ports needs to be the port inside the container,
    // i.e. 1025 no matter what you use locally
    'port' => 1025,
    'security' => false,
  ]
],
```

## Debugging

### Invalid CSRF Token

See https://forum.getkirby.com/t/can-not-log-in-to-panel-invalid-csrf-token/13526/4
