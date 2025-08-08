# Stage 1: Install PHP dependencies with Composer
FROM composer:2 AS vendor

WORKDIR /app
COPY database/ database/
COPY composer.json composer.json
COPY composer.lock composer.lock
RUN composer install --no-interaction --no-dev --optimize-autoloader --ignore-platform-reqs

# Stage 2: Build frontend assets with Node.js
FROM node:18 AS frontend

WORKDIR /app
COPY --from=vendor /app/vendor/ /app/vendor/
COPY package.json package.json
COPY package-lock.json package-lock.json
RUN npm install
COPY . .
RUN npm run build

# Stage 3: Final production image with Nginx and PHP-FPM
FROM richarvey/nginx-php-fpm:2.2.3

# Copy application code and compiled assets
COPY --from=frontend /app /var/www/html

# Set permissions
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache && \
    chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

# Expose port 80
EXPOSE 80

# Run start-up script
CMD ["/start.sh"]
