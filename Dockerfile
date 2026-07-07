# Laravel on Vercel using PHP built-in server
FROM php:8.2-cli

# Install system dependencies and PHP extensions required by Laravel and the project
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libzip-dev \
    zip \
    libonig-dev \
    libpng-dev \
    && docker-php-ext-install pdo_mysql zip exif pcntl bcmath gd

# Install Composer from the official image
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Set the working directory inside the container
WORKDIR /app

# Copy the project source code into the container
COPY . /app

# Install PHP dependencies (production mode, optimized autoloader)
RUN composer install --no-dev --optimize-autoloader --working-dir=KINGS/core

# Ensure Laravel storage and cache directories are writable by the web user
RUN chown -R www-data:www-data KINGS/core/storage KINGS/core/bootstrap/cache || true

# Vercel expects the app to listen on port 8080
EXPOSE 8080
ENV PORT 8080

# Start the PHP built‑in server with a router script that forwards all requests to Laravel
CMD ["php", "-S", "0.0.0.0:8080", "-t", "KINGS", "KINGS/router.php"]
