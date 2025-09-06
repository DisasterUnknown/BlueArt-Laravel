#!/bin/bash
set -e

# Run migrations + seeds
php artisan migrate --seed --force

# Start Apache
apache2-foreground
