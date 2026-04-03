FROM php:8.2-cli

# Install system dependencies
RUN apt-get update && apt-get install -y \
    unzip curl git libpq-dev

# Install PostgreSQL extension
RUN docker-php-ext-install pdo pdo_pgsql

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /app

# Copy project files
COPY . .

# Install dependencies
RUN composer install --no-dev --optimize-autoloader

# Run migrations (ignore failure if DB not ready)
RUN php artisan migrate --force || true

# Start Laravel server
CMD php -S 0.0.0.0:10000 -t public