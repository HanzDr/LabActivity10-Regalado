# Barangay Bulletin – Purok Regalado

Lab Activity 10: Eloquent, Migrations, and Seeding

Derren Hanz Regalado

A Laravel 12 bulletin board for Barangay Matina Crossing in Davao City. Residents can browse published announcements, search by title, filter by category, and open individual posts.

## Personalized details

- **Posts per page:** 8, because Regalado has eight letters.
- **Categories:** Announcement, Health, Peace & Order, Ayuda, and Community Events.
- **Custom category:** Community Events.
- **Personalized author:** Kagawad Derren Hanz Regalado (`kagawad.regalado@bulletin.test`), created with `Author::create()`.
- **Pinned post:** Purok Regalado Clean-up Drive, created with `Post::create()` and assigned to the personalized Kagawad.
- **Birthday post date:** December 3, 2026, at 15:00 (`2026-12-03 15:00:00`). The lab uses my birthday's month and day with the year set to 2026.

## Features

- SQLite database with authors and posts tables, plus a separate reversible migration for the post view counter.
- Eloquent models with explicit fillable fields and casts for publication flags and dates.
- Faker factories, including a `draft()` state for unpublished posts.
- Published posts listed with pinned posts first, followed by the latest publication dates.
- Optional title search (`?q=`) and category filter (`?category=`).
- Eight posts per page, with search and category values preserved in pagination links.
- Individual post pages that save an increased view count. Draft and missing posts return 404.
- Responsive Blade views styled with Tailwind CSS v4 through `@tailwindcss/vite`.

## Requirements

- PHP 8.2 or newer with PDO SQLite enabled
- Composer
- Node.js and npm compatible with Vite 7

## Run locally

Open a terminal in `LabActivity10-Regalado`. For a fresh checkout, install the PHP dependencies and create the environment file:

```powershell
composer install
cp .env.example .env
php artisan key:generate
```

On Windows PowerShell, `cp` is an alias for `Copy-Item`. Skip copying `.env` if you already have a configured local environment.

Keep `DB_CONNECTION=sqlite` in `.env` and leave `DB_DATABASE` commented out. Create the SQLite file if it does not exist:

```powershell
if (-not (Test-Path database/database.sqlite)) {
    New-Item database/database.sqlite -ItemType File | Out-Null
}
```

Build the database and install the frontend dependencies:

```powershell
php artisan migrate:fresh --seed
npm install
npm run dev
```

`migrate:fresh --seed` deletes existing tables and recreates the sample data. Leave the Vite terminal running. In a second terminal, open the same project folder and start Laravel:

```powershell
php artisan serve
```

Visit **http://127.0.0.1:8000/posts**. The home route redirects to this page.

## Verify the sample data

A fresh seed creates **5 authors** and **51 posts**: 40 generated published posts, 10 drafts, and 1 personalized published pinned post. That gives 41 published posts in total.

```powershell
php artisan tinker
```

Run these commands inside Tinker:

```php
App\Models\Author::count(); // 5
App\Models\Post::count(); // 51
App\Models\Post::where('is_published', false)->count(); // 10
App\Models\Post::where('is_pinned', true)->first()->published_at->format('Y-m-d'); // 2026-12-03
```

The ActiveRecord screenshot showing `find()`, a title change, and `save()` is in [docs/tinker.png](docs/tinker.png).

## Submission

The repository name is `LabActivity10-Regalado`. Include the source files, dependency lockfiles, and Tinker screenshot. The Git ignore files exclude `.env`, `vendor/`, `node_modules/`, generated assets, and SQLite database files.
