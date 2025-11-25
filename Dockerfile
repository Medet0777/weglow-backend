FROM php:8.2-fpm

WORKDIR /var/www

# Устанавливаем зависимости и расширения
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    libpq-dev \
 && docker-php-ext-install pdo pdo_pgsql

# Устанавливаем Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Копируем проект
COPY . /var/www

# Права
RUN chown -R www-data:www-data /var/www \
 && chmod -R 755 /var/www

# Экспонируем порт 9000 для php-fpm (nginx будет к нему обращаться)
EXPOSE 9000

# Запуск php-fpm
CMD ["php-fpm"]
