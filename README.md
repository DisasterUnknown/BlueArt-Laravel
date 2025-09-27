# BlueArt - Art & Collectibles Marketplace

<p align="center">
  <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo">
</p>

<p align="center">
  <strong>A Laravel-based e-commerce platform for buying and selling art and collectibles</strong>
</p>

## 📋 Table of Contents

- [About](#about)
- [Features](#features)
- [Tech Stack](#tech-stack)
- [Prerequisites](#prerequisites)
- [Installation](#installation)
- [Configuration](#configuration)
- [Database Setup](#database-setup)
- [Running the Application](#running-the-application)
- [API Documentation](#api-documentation)
- [Project Structure](#project-structure)
- [User Roles](#user-roles)
- [Contributing](#contributing)
- [License](#license)
- [Version](#version)

## 🎨 About

BlueArt is a comprehensive e-commerce platform built with Laravel 12, designed specifically for artists and collectors to buy and sell art pieces and collectibles. The platform features a robust role-based system supporting three user types: customers, sellers, and administrators, each with tailored functionality and access controls.

### Key Highlights

- **Multi-role System**: Separate dashboards and features for customers, sellers, and admins
- **Art & Collectibles Marketplace**: Specialized categories for different types of items
- **Image Management**: Support for multiple product images with main image designation
- **Shopping Cart System**: Full cart functionality with add/remove/clear operations
- **Admin Controls**: Product moderation, user management, and unban request handling
- **API Integration**: RESTful API for mobile app integration
- **Modern UI**: Built with Tailwind CSS and Alpine.js for responsive design

## ✨ Features

### For Customers
- Browse art and collectibles by category
- Add products to shopping cart
- View product details with multiple images
- Complete checkout process
- View transaction history
- Request account unban if needed

### For Sellers
- Add and manage product listings
- Upload multiple product images
- View sales analytics
- Manage product status
- Request product unban if needed

### For Administrators
- View and manage all users
- Moderate products (ban/unban)
- Handle user unban requests
- Handle product unban requests
- View kick users and banned products
- Access to comprehensive admin dashboard

## 🛠 Tech Stack

- **Backend**: Laravel 12.x (PHP 8.2+)
- **Frontend**: 
  - Tailwind CSS 3.4
  - Alpine.js 3.14
  - Livewire 3.6
- **Authentication**: Laravel Jetstream with Sanctum
- **Database**: 
  - MySQL (Primary)
  - MongoDB (Secondary - via Laravel MongoDB package)
  - SQLite (Development)
- **Build Tools**: Vite 7.0
- **Additional Packages**:
  - Laravel Fortify (Authentication)
  - Laravel Pail (Logging)
  - PHPUnit (Testing)

## 📋 Prerequisites

Before you begin, ensure you have the following installed:

- **PHP**: 8.2 or higher
- **Composer**: Latest version
- **Node.js**: 16.x or higher
- **NPM**: Latest version
- **MySQL**: 8.0 or higher
- **MongoDB**: 4.4 or higher (for MongoDB functionality)
- **XAMPP/WAMP/MAMP**: For local development environment
- **Git**: For version control

### Required PHP Extensions

```bash
# Core extensions
php-mbstring
php-xml
php-curl
php-zip
php-bcmath
php-gd
php-intl
php-pdo
php-pdo_mysql

# MongoDB extension (required)
php-mongodb
```

## 🚀 Installation

### 1. Clone the Repository

```bash
git clone <repository-url>
cd BlueArtSSP
```

### 2. Install PHP Dependencies

```bash
composer install
```

### 3. Install Node.js Dependencies

```bash
npm install
```

### 4. Environment Configuration

Create a `.env` file from the example:

```bash
cp .env.example .env
```

**Important**: If `.env.example` doesn't exist, create a `.env` file with the following basic configuration:

```env
APP_NAME="BlueArt"
APP_ENV=local
APP_KEY=
APP_DEBUG=true
APP_URL=http://localhost:8000

LOG_CHANNEL=stack
LOG_DEPRECATIONS_CHANNEL=null
LOG_LEVEL=debug

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=blueart_db
DB_USERNAME=root
DB_PASSWORD=

# MongoDB Configuration
MONGO_DB_URI=mongodb://localhost:27017
MONGO_DB_DATABASE=blueart_mongodb
MONGO_DB_AUTH_DATABASE=admin

BROADCAST_DRIVER=log
CACHE_DRIVER=file
FILESYSTEM_DISK=local
QUEUE_CONNECTION=sync
SESSION_DRIVER=file
SESSION_LIFETIME=120

MEMCACHED_HOST=127.0.0.1

REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379

MAIL_MAILER=smtp
MAIL_HOST=mailpit
MAIL_PORT=1025
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS="hello@example.com"
MAIL_FROM_NAME="${APP_NAME}"

AWS_ACCESS_KEY_ID=
AWS_SECRET_ACCESS_KEY=
AWS_DEFAULT_REGION=us-east-1
AWS_BUCKET=
AWS_USE_PATH_STYLE_ENDPOINT=false

PUSHER_APP_ID=
PUSHER_APP_KEY=
PUSHER_APP_SECRET=
PUSHER_HOST=
PUSHER_PORT=443
PUSHER_SCHEME=https
PUSHER_APP_CLUSTER=mt1

VITE_PUSHER_APP_KEY="${PUSHER_APP_KEY}"
VITE_PUSHER_HOST="${PUSHER_HOST}"
VITE_PUSHER_PORT="${PUSHER_PORT}"
VITE_PUSHER_SCHEME="${PUSHER_SCHEME}"
VITE_PUSHER_APP_CLUSTER="${PUSHER_APP_CLUSTER}"
```

### 5. Generate Application Key

```bash
php artisan key:generate
```

## ⚙️ Configuration

### XAMPP Setup

1. **Start XAMPP Services**:
   - Start Apache
   - Start MySQL

2. **Create Database**:
   ```sql
   CREATE DATABASE blueart_db CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
   ```

### MongoDB Setup

1. **Install MongoDB Extension**:
   ```bash
   # For Ubuntu/Debian
   sudo apt-get install php-mongodb
   
   # For CentOS/RHEL
   sudo yum install php-mongodb
   
   # For macOS with Homebrew
   brew install php-mongodb
   
   # For Windows (XAMPP)
   # Download php_mongodb.dll and place in XAMPP/php/ext/
   # Add extension=mongodb to php.ini
   ```

2. **Start MongoDB Service**:
   ```bash
   # Start MongoDB
   sudo systemctl start mongod
   
   # Or for XAMPP users, ensure MongoDB service is running
   ```

3. **Verify MongoDB Extension**:
   ```bash
   php -m | grep mongodb
   ```

## 🗄️ Database Setup

### 1. Run Migrations

```bash
php artisan migrate
```

This will create the following tables:
- `users` - User accounts and authentication
- `admins` - Administrator profiles
- `customers` - Customer profiles  
- `sellers` - Seller profiles
- `products` - Product listings
- `sales` - Transaction records
- `images` - Product images
- `cache` - Application cache
- `jobs` - Queue jobs
- `personal_access_tokens` - API tokens
- `unban_requests` - User unban requests
- `unban_product_requests` - Product unban requests

### 2. Seed Database (Optional)

```bash
php artisan db:seed
```

### 3. Create Storage Link

```bash
php artisan storage:link
```

## 🏃‍♂️ Running the Application

### Development Mode

1. **Start Laravel Development Server**:
   ```bash
   php artisan serve
   ```

2. **Start Vite for Asset Compilation** (in a new terminal):
   ```bash
   npm run dev
   ```

3. **Access the Application**:
   - Open your browser and navigate to `http://localhost:8000`

### Production Mode

1. **Build Assets**:
   ```bash
   npm run build
   ```

2. **Optimize Application**:
   ```bash
   php artisan config:cache
   php artisan route:cache
   php artisan view:cache
   ```

### Using Composer Scripts

The project includes convenient composer scripts:

```bash
# Start development environment (all services)
composer run dev

# Run tests
composer run test
```

## 📚 API Documentation

The application provides a RESTful API for mobile app integration. Here are the main endpoints:

### Authentication
- `POST /api/login` - User login
- `POST /api/register` - User registration
- `POST /api/logout` - User logout (requires authentication)

### Products
- `GET /api/products` - Get all active products
- `GET /api/products/{id}` - Get specific product
- `GET /api/products/category/{category}` - Get products by category

### Sales
- `GET /api/sales` - Get all sales
- `GET /api/sales/{id}` - Get specific sale

### Cart Management
- `GET /api/cart` - Get user cart
- `POST /api/cart/add` - Add product to cart
- `DELETE /api/cart/remove/{productId}` - Remove product from cart
- `DELETE /api/cart/clear` - Clear entire cart

### User
- `GET /api/user` - Get logged-in user data

**Note**: All endpoints except login and register require Bearer token authentication.

## 📁 Project Structure

```
BlueArtSSP/
├── app/
│   ├── Actions/           # Fortify & Jetstream actions
│   ├── Http/
│   │   ├── Controllers/   # Application controllers
│   │   └── Middleware/    # Custom middleware
│   ├── Livewire/          # Livewire components
│   ├── Models/            # Eloquent models
│   └── Providers/         # Service providers
├── config/                # Configuration files
├── database/
│   ├── migrations/        # Database migrations
│   └── seeders/           # Database seeders
├── public/                # Public assets
├── resources/
│   ├── css/               # Stylesheets
│   ├── js/                # JavaScript files
│   └── views/             # Blade templates
├── routes/
│   ├── api.php           # API routes
│   └── web.php           # Web routes
├── storage/              # File storage
├── tests/                # Test files
└── vendor/               # Composer dependencies
```

## 👥 User Roles

### Customer
- Browse and purchase products
- Manage shopping cart
- View transaction history
- Access customer-specific features

### Seller
- Add and manage product listings
- View sales analytics
- Manage product status
- Access seller dashboard

### Admin
- Full system access
- User management
- Product moderation
- Handle unban requests
- Access admin dashboard

## 🤝 Contributing

1. Fork the repository
2. Create a feature branch (`git checkout -b feature/amazing-feature`)
3. Commit your changes (`git commit -m 'Add some amazing feature'`)
4. Push to the branch (`git push origin feature/amazing-feature`)
5. Open a Pull Request

## 📄 License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

## 📌 Version

**Current Version**: 1.0.0

**Release Date**: January 2025

### Version History
- **v1.0.0** - Initial release with core marketplace functionality
  - User authentication and role management
  - Product listing and management
  - Shopping cart system
  - Admin moderation tools
  - API endpoints for mobile integration

---

## 🆘 Troubleshooting

### Common Issues

1. **MongoDB Extension Not Found**:
   ```bash
   # Install MongoDB extension for PHP
   sudo apt-get install php-mongodb
   # Restart your web server
   ```

2. **Database Connection Issues**:
   - Ensure MySQL is running
   - Check database credentials in `.env`
   - Verify database exists

3. **Permission Issues**:
   ```bash
   # Fix storage permissions
   sudo chmod -R 775 storage bootstrap/cache
   ```

4. **Composer Memory Issues**:
   ```bash
   # Increase memory limit
   php -d memory_limit=-1 /usr/local/bin/composer install
   ```

For additional support, please create an issue in the repository.

---

<p align="center">
  <strong>Built with ❤️ using Laravel</strong>
</p>
