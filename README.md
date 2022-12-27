# Docker Compose를 이용한 라라벨 설치

LEMP stack that includes: Nginx, MySQL, PHP, and phpMyAdmin을 한 번에 설치합니다.

## 프로젝트 설치방법

1. `git clone https://github.com/kimjunyeob95/Docker-Laravel-Build.git`
2. `cd src`
3. `composer install`
4. `npm install && npm run dev`
5. Copy `.env.example` to `.env`
6. `docker-compose build`
7. `docker-compose up -d`
8. `php artisan serve`
9. `127.0.0.1:${PORT}`로 접속

## MYSQL 설정방법

1. Uncomment the MySQL configuration inside the `docker-compose.yml` including: `db` and `phpMyAdmin`
2. Copy `.env.example` to `.env`
3. Change `DB_CONNECTION` to `mysql`
4. Change `DB_PORT` to `3306`
5. Open the `phpMyAdmin` on `127.0.0.1:3400`

## PostgreSQL 설정방법

1. Uncomment the PostgreSQL configuration inside the `docker-compose.yml` including: `db` and `pgamdin`
2. Copy `.env.example` to `.env`
3. Change `DB_CONNECTION` to `pgsql`
4. Change `DB_PORT` to `5432`
5. Open the `pgAdmin` on `127.0.0.1:5050`

## Docker Compose에서 Laravel Commands 사용법

1. `cd src`
2. `docker-compose exec app php artisan {your command}`
