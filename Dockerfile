FROM php:8.2-fpm

# Устанавливаем необходимые пакеты
RUN apt-get update && apt-get install -y \
        git \
        curl \
        libpng-dev \
        libonig-dev \
        libxml2-dev \
        zip \
        unzip \
        libpq-dev \
        nginx \
    && docker-php-ext-install pdo pdo_pgsql

# Устанавливаем Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

# Копируем проект
COPY . /var/www

# Права на файлы
RUN chown -R www-data:www-data /var/www \
    && chmod -R 755 /var/www

# Копируем конфиг Nginx
COPY docker/nginx/default.conf /etc/nginx/conf.d/default.conf

# Экспонируем порт 80 (HTTP)
EXPOSE 80

# Запускаем одновременно php-fpm и nginx
CMD ["sh", "-c", "php-fpm -D && nginx -g 'daemon off;'"]
