# Comment Buddy Demo

This is a minimal Laravel demo project showcasing the features of [Comment Buddy](https://github.com/jkm96/comment-buddy), a plug-and-play Livewire-powered comment system for posts, supporting nested replies and optional toasts.

## Demo Features

- One random post displayed on the home page
- Fully functional comment thread using Comment Buddy
- Auth modal included for login (if unauthenticated)
- Posts seeded with sample data
- Access the [Comment Buddy Demo here](https://commentbuddy.mblog.co.ke)

## Setup Instructions

1. Clone this repo:

   ```bash
   git clone https://github.com/jkm96/comment-buddy-demo.git
   cd comment-buddy-demo
   ```

2. Install dependencies:

   ```bash
   composer install
   cp .env.example .env
   php artisan key:generate
   ```

3. Configure your database in `.env`, then run:

   ```bash
   php artisan migrate --seed
   ```

4. Serve the app:

   ```bash
   php artisan serve
   ```

## Powered by

👉 Visit the main package repository for full documentation and source code:  
[**jkm96/comment-buddy**](https://github.com/jkm96/comment-buddy)

---

MIT License © 2025 [jkm96](https://github.com/jkm96)
