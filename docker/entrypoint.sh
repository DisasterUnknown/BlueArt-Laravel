#!/bin/bash
set -e

# Wait for DB and run migrations safely
until php artisan migrate --force; do
    echo "Migration failed, retrying in 5s..."
    sleep 5
done

# Seed database only if environment is not production
if [ "$APP_ENV" != "production" ]; then
    php artisan db:seed --force || echo "Seeding failed, skipping..."
fi

# Start Apache
apache2-foreground
