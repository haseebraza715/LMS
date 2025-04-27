# Use official PHP image
FROM php:8.2-fpm

# Install system dependencies
RUN apt-get update && apt-get install -y \
    libzip-dev \
    unzip \
    git \
    curl \
    sqlite3 \
    libsqlite3-dev \
    nodejs \
    npm

# Install PHP extensions
RUN docker-php-ext-install pdo pdo_mysql zip pdo_sqlite

# Install Composer globally
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www

# Copy project files
COPY . .

# Install PHP dependencies
RUN composer install --optimize-autoloader --no-dev

# 👉 Automatically create SQLite file if not exists
RUN mkdir -p database && touch database/database.sqlite

# 👉 Build React if needed
# (Uncomment these 3 lines if you want automatic frontend build too)
# WORKDIR /var/www/frontend
# RUN npm install
# RUN npm run build

# Set correct permissions
RUN chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache

# Go back to Laravel project root
WORKDIR /var/www

# Expose port
EXPOSE 8000

# Start Laravel
CMD php artisan migrate:fresh --seed --force && php artisan serve --host=0.0.0.0 --port=8000
