# LMS - Learning Management System
A minimal Laravel + React Learning Management System for courses and users.
🚀 Setup (Local)
# Clone repo
git clone https://github.com/haseebraza715/LMS.git

# Install backend
composer install
cp .env.example .env
php artisan key:generate

# Migrate & seed
php artisan migrate:fresh --seed

# Start server
php artisan serve

Frontend (React):
cd frontend
npm install
npm run dev

 Deployment

Dockerized Laravel backend.
SQLite auto-created.

About
A minimal LMS built with Laravel and React.
