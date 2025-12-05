# Laravel Portfolio System

A fully dynamic personal portfolio website built with Laravel, featuring a comprehensive Admin Panel for content management and dynamic CV PDF generation.

## Features

- ✅ **Dynamic Admin Panel** - Manage all portfolio content through a user-friendly interface
- ✅ **Content Management** - Skills, Projects, Education, Experience, Competitive Programming
- ✅ **CV PDF Generator** - Download professional CV as PDF, always up-to-date with your data
- ✅ **Responsive Design** - Beautiful UI with TailwindCSS
- ✅ **Authentication** - Secure admin access with Laravel Breeze
- ✅ **Image Upload** - Profile photo and project images
- ✅ **SEO Ready** - Proper meta tags and semantic HTML

## Tech Stack

- **Backend:** Laravel 12
- **Frontend:** Blade Templates, TailwindCSS, Alpine.js
- **Database:** MySQL
- **Authentication:** Laravel Breeze
- **PDF Generation:** barryvdh/laravel-dompdf
- **PHP Version:** 8.2+

## Installation & Setup

### 1. Clone or Navigate to Project

```bash
cd c:\Users\salman\Desktop\laravel_portfolio
```

### 2. Install Dependencies

```bash
# Install PHP dependencies
composer install

# Install Node dependencies
npm install

# Build frontend assets
npm run build
```

### 3. Environment Configuration

Copy `.env.example` to `.env` (if not already done):

```bash
copy .env.example .env
```

Update `.env` file with your database credentials:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel_portfolio
DB_USERNAME=root
DB_PASSWORD=your_password
```

Generate application key:

```bash
php artisan key:generate
```

### 4. Database Setup

Create the database (if not exists), then run:

```bash
# Fresh migration with sample data
php artisan migrate:fresh --seed
```

This will:
- Create all 9 database tables
- Seed sample portfolio data
- Create admin user (admin@portfolio.com / password)

### 5. Storage Link

Create symbolic link for file uploads:

```bash
php artisan storage:link
```

### 6. Run the Application

Start the development server:

```bash
php artisan serve
```

Visit: **http://localhost:8000**

## Default Login Credentials

```
Email: admin@portfolio.com
Password: password
```

**⚠️ IMPORTANT:** Change these credentials after first login!

## Usage Guide

### Admin Panel

Access admin panel: **http://localhost:8000/admin/dashboard**

**Available Sections:**
- **Personal Info** - Update your name, contact, bio, photo, social links
- **Skills** - Add technical skills organized by categories
- **Programming Languages** - List programming languages with proficiency
- **Projects** - Showcase your projects with images, technologies, links
- **Team Competitions** - Team competitive programming achievements
- **Individual Competitions** - Individual CP stats and rankings
- **Online Judges** - Your profiles on coding platforms
- **Education** - Academic qualifications
- **Experiences** - Work experience, leadership roles, volunteer activities

### Frontend Pages

- **Home** - `/` - Landing page with overview
- **Skills** - `/skills` - All skills and programming languages
- **Projects** - `/projects` - Project portfolio with images
- **Competitive Programming** - `/competitive` - CP achievements
- **Online Judges** - `/judges` - Coding platform profiles
- **Education** - `/education` - Academic history
- **Experience** - `/experience` - Work and leadership experience
- **Resume** - `/resume` - Full resume with PDF download

### CV PDF Download

Visit `/resume` and click "Download PDF" button to get an updated CV PDF with all your current data.

## Project Structure

```
laravel_portfolio/
├── app/
│   ├── Http/Controllers/
│   │   ├── Admin/          # Admin panel controllers (10 files)
│   │   ├── HomeController.php
│   │   ├── PortfolioController.php
│   │   └── CVController.php
│   └── Models/             # Eloquent models (9 files)
├── database/
│   ├── migrations/         # Database schema (9 files)
│   └── seeders/           # Sample data seeder
├── resources/views/
│   ├── admin/             # Admin panel views (30+ files)
│   ├── cv/                # CV PDF template
│   ├── layouts/           # Frontend layout
│   └── [frontend pages]   # Skills, Projects, etc.
├── routes/web.php         # All application routes
└── public/storage/        # Uploaded images (symlinked)
```

## Common Commands

### Database

```bash
# Fresh migration with seed data
php artisan migrate:fresh --seed

# Run migrations only
php artisan migrate

# Rollback last migration
php artisan migrate:rollback

# Reset database
php artisan db:wipe
```

### Cache

```bash
# Clear all caches
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear

# Optimize for production
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

### Development

```bash
# Start development server
php artisan serve

# Watch and compile assets
npm run dev

# Build for production
npm run build

# Run Tinker (Laravel REPL)
php artisan tinker
```

## Customization

### Change Admin Password

```bash
php artisan tinker
```

Then in Tinker:

```php
$user = User::first();
$user->email = 'your@email.com';
$user->password = bcrypt('your-new-password');
$user->save();
exit
```

### Update Personal Information

1. Login to admin panel
2. Navigate to "Personal Info"
3. Update all fields with your actual data
4. Upload your profile photo
5. Save changes

### Replace Sample Data

Delete sample data and add your own:
1. Go to each admin section (Skills, Projects, etc.)
2. Delete seeded entries
3. Add your actual data

## Deployment

### Production Checklist

1. Set environment to production:
```env
APP_ENV=production
APP_DEBUG=false
APP_URL=https://yourdomain.com
```

2. Install dependencies:
```bash
composer install --optimize-autoloader --no-dev
npm install && npm run build
```

3. Optimize application:
```bash
php artisan config:cache
php artisan route:cache
php artisan view:cache
php artisan storage:link
```

4. Set proper permissions:
```bash
chmod -R 775 storage bootstrap/cache
```

5. Configure web server to point to `public/` directory

### Recommended Hosting

- **Laravel Forge** - Easiest deployment
- **DigitalOcean** - VPS with good documentation
- **AWS, Google Cloud** - Enterprise solutions
- **Shared Hosting** - cPanel with PHP 8.2+

## Troubleshooting

**Problem:** Images not displaying
```bash
php artisan storage:link
```

**Problem:** Routes not found
```bash
php artisan route:clear
php artisan cache:clear
```

**Problem:** PDF not generating
```bash
composer require barryvdh/laravel-dompdf
php artisan config:clear
```

**Problem:** Permission denied errors
```bash
chmod -R 775 storage bootstrap/cache
```

**Problem:** Database connection error
- Check `.env` database credentials
- Ensure MySQL is running
- Verify database exists

## Support

For Laravel documentation: https://laravel.com/docs
For issues: Check Laravel logs in `storage/logs/laravel.log`

## License

This is a personal portfolio project. Modify and use as needed.

---

**Built with ❤️ using Laravel**
