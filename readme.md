# Procházka Design

Osobní portfolio web - Ing. Pavel Procházka, full-stack vývojář.

## Tech Stack

- PHP 8.5
- Nette Framework
- Tailwind CSS
- Docker

## Instalace

```bash
docker-compose build
docker-compose up -d
docker-compose exec web composer install
```

Web běží na `http://localhost:8080`

## Vývoj

```bash
# Spuštění
docker-compose up -d

# Zastavení
docker-compose down

# Smazání cache
docker-compose exec web rm -rf temp/cache/*
```
