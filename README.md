# Laravel Portfolio System

A fully dynamic personal portfolio website built with Laravel, featuring a modern **dark glassmorphic design**, comprehensive Admin Panel with sidebar navigation, and dynamic CV PDF generation.

![Laravel](https://img.shields.io/badge/Laravel-12-FF2D20?style=flat-square&logo=laravel)
![TailwindCSS](https://img.shields.io/badge/TailwindCSS-3.x-38B2AC?style=flat-square&logo=tailwind-css)
![PHP](https://img.shields.io/badge/PHP-8.2+-777BB4?style=flat-square&logo=php)

## ✨ Features

### 🎨 Modern Dark Theme Design
- **Glassmorphic UI** - Translucent cards with blur effects
- **Animated Background** - Subtle floating gradient elements
- **Gradient Text** - Eye-catching headings with color gradients
- **Premium Typography** - Space Grotesk & Inter fonts from Google Fonts
- **Smooth Animations** - Hover effects and micro-interactions

### 📊 Admin Panel
- **Sidebar Navigation** - Fixed sidebar with all content sections
- **Dashboard** - Quick statistics overview
- **Full CRUD** - Create, Read, Update, Delete for all sections
- **Dark Theme** - Consistent styling with the main portfolio
- **Responsive** - Works on all screen sizes

### 📝 Portfolio Sections
| Section | Description |
|---------|-------------|
| **Personal Info** | Name, contact, bio, photo, social links |
| **Skills** | Technical skills organized by categories |
| **Projects** | Portfolio projects with images, technologies, links |
| **Education** | Academic qualifications with CGPA |
| **Experience** | Work experience, leadership roles, volunteering |
| **Achievements** | Awards, competitions, recognitions |
| **Research** | Publications, papers, ongoing research |
| **Certifications** | Training programs, courses, certificates |
| **Languages** | Spoken languages with proficiency levels |

### 📄 CV/Resume
- **Dynamic PDF Generation** - Always up-to-date with your data
- **ATS-Friendly Format** - Clean, professional layout
- **One-Click Download** - Generate PDF instantly

## 🛠 Tech Stack

- **Backend:** Laravel 12
- **Frontend:** Blade Templates, TailwindCSS
- **Database:** MySQL
- **Authentication:** Laravel Breeze
- **PDF Generation:** barryvdh/laravel-dompdf
- **Fonts:** Google Fonts (Space Grotesk, Inter)
- **PHP Version:** 8.2+

## 🚀 Installation & Setup

### 1. Clone the Repository

```bash
git clone <repository-url>
cd laravel_portfolio
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

```bash
# Copy environment file
cp .env.example .env

# Generate application key
php artisan key:generate
```

Update `.env` with your database credentials:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel_portfolio
DB_USERNAME=root
DB_PASSWORD=your_password
```

### 4. Database Setup

```bash
# Run migrations with sample data
php artisan migrate:fresh --seed

# Create storage symlink
php artisan storage:link
```

### 5. Run the Application

```bash
php artisan serve
```

Visit: **http://localhost:8000**

## 🔐 Default Credentials

```
Email: admin@portfolio.com
Password: password
```

> ⚠️ **Important:** Change these credentials after first login!

## 📖 Usage Guide

### Frontend Pages

| Route | Page | Description |
|-------|------|-------------|
| `/` | Home | Landing page with hero, skills overview |
| `/skills` | Skills | Technical skills by category |
| `/projects` | Projects | Project portfolio with details |
| `/education` | Education | Academic history |
| `/experience` | Experience | Work & leadership experience |
| `/achievements` | Achievements | Awards and recognitions |
| `/research` | Research | Publications and papers |
| `/certifications` | Certifications | Training and courses |
| `/languages` | Languages | Spoken languages |
| `/resume` | Resume | Full resume with PDF download |

### Admin Panel

Access: **http://localhost:8000/admin**

**Sidebar Sections:**
- Dashboard - Overview statistics
- Personal Info - Profile details
- Skills - Technical skills
- Projects - Portfolio projects
- Education - Academic records
- Certifications - Training/courses
- Experience - Work history
- Achievements - Awards
- Research - Publications
- Spoken Languages - Language proficiencies

## 📁 Project Structure

```
laravel_portfolio/
├── app/
│   ├── Http/Controllers/
│   │   ├── Admin/              # Admin CRUD controllers
│   │   ├── HomeController.php
│   │   ├── PortfolioController.php
│   │   └── CVController.php
│   └── Models/                 # 14 Eloquent models
├── database/
│   ├── migrations/             # Database schema
│   └── seeders/               # Sample data
├── resources/
│   ├── css/app.css            # Custom CSS with dark theme
│   └── views/
│       ├── admin/             # Admin panel views (sidebar layout)
│       ├── cv/                # PDF template
│       ├── layouts/           # Frontend & guest layouts
│       └── [pages]            # Portfolio pages
├── routes/web.php             # Application routes
└── tailwind.config.js         # Tailwind with custom fonts/colors
```

## 🎨 Design System

### Colors
- **Primary:** Indigo/Purple gradients
- **Background:** Deep navy (#0f172a)
- **Cards:** White/5% with blur backdrop

### CSS Classes
```css
.glass-card      /* Glassmorphic card effect */
.gradient-text   /* Gradient text headings */
.btn-gradient    /* Gradient button */
.hover-lift      /* Lift on hover */
.animated-bg     /* Animated background */
.section-title   /* Section heading style */
```

## 🔧 Common Commands

```bash
# Development
php artisan serve              # Start server
npm run dev                    # Watch assets
npm run build                  # Build for production

# Database
php artisan migrate:fresh --seed   # Reset with sample data
php artisan migrate               # Run migrations

# Cache
php artisan view:clear            # Clear compiled views
php artisan cache:clear           # Clear application cache
php artisan config:clear          # Clear config cache
```

## 🚢 Deployment

### Production Checklist

1. Update `.env`:
```env
APP_ENV=production
APP_DEBUG=false
APP_URL=https://yourdomain.com
```

2. Install & build:
```bash
composer install --optimize-autoloader --no-dev
npm install && npm run build
```

3. Optimize:
```bash
php artisan config:cache
php artisan route:cache
php artisan view:cache
php artisan storage:link
```

## 🐛 Troubleshooting

| Problem | Solution |
|---------|----------|
| Images not showing | `php artisan storage:link` |
| Routes not found | `php artisan route:clear` |
| Styles not updating | `npm run build` then hard refresh |
| PDF not generating | `composer require barryvdh/laravel-dompdf` |

## 📄 License

This is a personal portfolio project. Modify and use as needed.

---

**Built with ❤️ using Laravel & TailwindCSS**
