## Installation

1. Clone the repo and `cd` into it
1. `composer install`
1. `npm install`
1. `npm run dev`
1. Rename or copy `.env.example` file to `.env`.
1. Configure your `.env` file, with your Database name.
1. Import `reviewcorner_db.sql` in your Database.
1. Set your `TMDB_TOKEN` in your `.env` file. You can get an API key [here](https://www.themoviedb.org/documentation/api). Make sure to use the "API Read Access Token (v4 auth)" from the TMDb dashboard.
1. Set your `IGDB_CLIENT_ID` and your `IGDB_ACCESS_TOKEN` in your `.env` file. You can find instructions on how to do that [here](https://api-docs.igdb.com/#account-creation).
1. Set your `OMDB_TOKEN` in your `.env` file. You can find instructions on how to do that [here](https://www.omdbapi.com/apikey.aspx).
1. Run `php artisan key:generate`
1. Run `php artisan serve` or use XAMPP.
1. Visit `127.0.0.1:8000` or `localhost/project_name/public` (XAMPP) in your browser.


## Super Admin: 
- Gmail: super@admin.com 
- Password: 12345678

## Admin:
- Gmail: admin@gmail.com 
- Password: 12345678