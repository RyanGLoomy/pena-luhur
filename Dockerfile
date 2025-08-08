# Stage 1: Install PHP dependencies with Composer
# This stage remains the same
FROM composer:2 AS vendor

WORKDIR /app
COPY database/ database/
COPY composer.json composer.json
COPY composer.lock composer.lock
RUN composer install --no-interaction --no-dev --optimize-autoloader

# Stage 2: Build frontend assets with Node.js
# This stage remains the same
FROM node:18 AS frontend

WORKDIR /app
COPY --from=vendor /app/vendor/ /app/vendor/
COPY package.json package.json
COPY package-lock.json package-lock.json
RUN npm install
COPY . .
RUN npm run build

# Stage 3: Final production image with a STABLE Nginx and PHP-FPM
# We are replacing the old, unreliable image with a popular and well-maintained one.
FROM webdevops/php-nginx:8.2

# Set working directory
WORKDIR /app

# Copy application code and compiled assets from previous stage
COPY --from=frontend /app .

# This image automatically handles permissions and startup, so it's simpler.
