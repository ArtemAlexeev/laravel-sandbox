# -----------------------------
# 1) Build Stage (Composer deps)
# -----------------------------
FROM composer:2 AS build

# -----------------------------
# 2) Runtime Stage (PHP + NGINX)
# -----------------------------
FROM php:8.2-fpm

COPY --from=build /usr/bin/composer /usr/bin/composer

# Install system dependencies
RUN apt-get update && apt-get install -y \
    nginx \
    supervisor \
    git \
    unzip \
    libzip-dev \
    libonig-dev \
    libpq-dev \
    && docker-php-ext-install pdo pdo_mysql zip

# Copy nginx and supervisor configs
COPY ./docker/nginx.conf /etc/nginx/nginx.conf
COPY ./docker/supervisor.conf /etc/supervisor/conf.d/supervisor.conf

EXPOSE 80

COPY . /app
WORKDIR /app

COPY ./docker/config/php/app.ini /usr/local/etc/php/conf.d/app.ini

CMD ["/usr/bin/supervisord", "-n"]
