php artisan make:model Artwork              --> To create a DB model named Artwork

php artisan make:controller ArtworkController  --> To create a controller named ArtworkController

php artisan migrate                          --> Run database migrations (for SQL databases only)

php artisan config:clear                     --> Clear Laravel cached config

php artisan cache:clear                      --> Clear Laravel application cache

php artisan route:list                       --> List all registered routes

php artisan serve                            --> Start Laravel local dev server (http://localhost:8000)

composer require mongodb/laravel-mongodb     --> Install official MongoDB Laravel package

composer remove jenssegers/mongodb           --> Remove deprecated jenssegers/mongodb package

php artisan vendor:publish --provider="MongoDB\Laravel\MongoDbServiceProvider"   --> Publish MongoDB package config (if needed)

# .env settings
DB_CONNECTION=mongodb
DB_URI=mongodb+srv://<username>:<password>@cluster.mongodb.net/<database>?retryWrites=true&w=majority
DB_DATABASE=<database>

# Sample model extending MongoDB Eloquent model
# Save this in app/Models/Artwork.php
<?php
namespace App\Models;
use MongoDB\Laravel\Eloquent\Model as Eloquent;

class Artwork extends Eloquent
{
    protected $fillable = ['title', 'description', 'artist', 'year', 'price'];
}

# Use Tinker to test DB connection and queries
php artisan tinker
> \App\Models\Artwork::all();                    --> Get all artwork documents

> \App\Models\Artwork::create(['title'=>'Test']);  --> Create a new document in Artwork collection
