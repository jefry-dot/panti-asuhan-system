#!/bin/bash

# Script deploy otomatis untuk Laravel
# File ini akan dijalankan di VPS saat GitHub Actions trigger deploy

set -e  # Stop jika ada error

echo "🚀 Starting deployment..."

# Pull latest code dari GitHub
echo "📥 Pulling latest code from GitHub..."
git pull origin main

# Install/Update Composer dependencies
echo "📦 Installing Composer dependencies..."
composer install --no-dev --no-interaction --prefer-dist --optimize-autoloader

# Install/Update NPM dependencies and build assets
echo "📦 Installing NPM dependencies..."
npm install

echo "🏗️  Building frontend assets..."
npm run build

# Run Laravel optimizations
echo "⚙️  Running Laravel optimizations..."

# Clear dan cache config
php artisan config:clear
php artisan config:cache

# Clear dan cache routes
php artisan route:clear
php artisan route:cache

# Clear dan cache views
php artisan view:clear
php artisan view:cache

# Run migrations
echo "🗄️  Running database migrations..."
php artisan migrate --force

# Clear application cache
php artisan cache:clear

# Optimize autoloader
php artisan optimize

# Set proper permissions
echo "🔐 Setting permissions..."
chmod -R 775 storage bootstrap/cache
chown -R www-data:www-data storage bootstrap/cache

# Restart PHP-FPM (optional, tergantung setup VPS)
echo "🔄 Restarting PHP-FPM..."
sudo systemctl restart php8.2-fpm

# Restart Queue workers (jika pakai queue)
echo "🔄 Restarting queue workers..."
php artisan queue:restart

echo "✅ Deployment completed successfully!"
echo "🌐 Site: https://alzaelrohmah.my.id"
