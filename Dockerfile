FROM php:8.2-fpm

# Install system dependencies including Node.js 20.x
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    libpq-dev \
    zip \
    unzip

# Install Node.js 20.x (more stable than v22)
RUN curl -fsSL https://deb.nodesource.com/setup_20.x | bash - && \
    apt-get install -y nodejs

# Verify Node and npm versions
RUN node --version && npm --version

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install PHP extensions
RUN docker-php-ext-install pdo_pgsql pgsql mbstring exif pcntl bcmath gd

# Get latest Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www

# Copy package files first
COPY package*.json ./

# Install npm dependencies
RUN npm install

# Copy application code
COPY . .

# Build Vite assets
RUN npm run build

# Verify build succeeded
RUN if [ ! -f /var/www/public/build/manifest.json ]; then \
        echo "ERROR: Vite build failed - manifest.json not found"; \
        exit 1; \
    fi

# List build output for debugging
RUN ls -la /var/www/public/build/

# Install Composer dependencies
RUN composer install --no-dev --optimize-autoloader --no-interaction

# Set permissions
RUN chown -R www-data:www-data /var/www && \
    chmod -R 755 /var/www/storage && \
    chmod -R 755 /var/www/bootstrap/cache

# Expose port
EXPOSE 8000

# Start server
CMD php artisan config:cache && \
    php artisan route:cache && \
    php artisan view:cache && \
    php artisan migrate --force && \
    php artisan serve --host=0.0.0.0 --port=8000