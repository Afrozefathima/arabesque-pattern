#!/usr/bin/env bash

# Exit on error
set -o errexit

# Install PHP dependencies
composer install --no-dev --optimize-autoloader

# Install Node dependencies and build assets
npm ci
npm run build

# Generate app key if not set
php artisan key:generate --force

# Run migrations (optional, depending on your setup)
php artisan migrate --force

# Cache config and routes
php artisan config:cache
php artisan route:cache
php artisan view:cache