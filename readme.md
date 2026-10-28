# Procházka Design

Personal portfolio website of Ing. Pavel Procházka, full-stack developer.

## Tech Stack

- PHP 8.5
- Nette Framework
- Tailwind CSS
- Docker

## Installation

```bash
docker-compose build
docker-compose up -d
docker-compose exec web composer install
cp config/local.neon.example config/local.neon   # debug mode for local development
```

The site runs at `http://localhost:8080`

## Development

```bash
# Start
docker-compose up -d

# Stop
docker-compose down

# Clear cache
docker-compose exec web rm -rf temp/cache/*
```

## Deploy

GitHub Actions ([.github/workflows/deploy.yml](.github/workflows/deploy.yml)) uploads the site to WEDOS over FTPS.
Every push to `main` goes straight to production; there is no test environment.
A manual run (Actions → Deploy → Run workflow) redeploys the current `main`.

The server has its own `config/local.neon` (not in git, never touched by the deploy).
Paths and FTP credentials are set in GitHub → Settings → Environments → `production` (`APP_DIR`, `DOCROOT_DIR`, `FTP_*`).
