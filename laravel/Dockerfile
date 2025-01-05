# Usa una imagen base de PHP con FPM
FROM php:8.2-fpm

# Instala dependencias necesarias
RUN apt-get update && apt-get install -y libpng-dev libjpeg-dev libfreetype6-dev zip git curl

# Instala las extensiones de PHP necesarias
RUN docker-php-ext-configure gd --with-freetype --with-jpeg
RUN docker-php-ext-install gd pdo pdo_mysql

# Instala Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Establece el directorio de trabajo dentro del contenedor
WORKDIR /var/www

# Copia el archivo composer.json y composer.lock
COPY ./laravel-app/composer.json ./composer.json
COPY ./laravel-app/composer.lock ./composer.lock

# Copia el resto de los archivos del proyecto
COPY ./laravel-app /var/www

# Cambia los permisos de los archivos para que www-data pueda acceder a ellos
RUN chown -R www-data:www-data /var/www

# Cambia al usuario www-data para ejecutar Composer y Laravel
USER www-data

# Instala las dependencias de Composer
RUN composer install --no-interaction --prefer-dist --optimize-autoloader

# Exponer el puerto para el servidor Laravel
EXPOSE 8000

# Ejecuta el servidor de Laravel
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]
