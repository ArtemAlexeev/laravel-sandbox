## How to run

1 Clone the repository

2 Copy .env.example file to .env file

3 Build docker image - ```docker compose build```

4 Run containers - ```docker compose up -d```

5 Install dependencies - ```docker compose exec app composer install```

6 Generate application key - ```docker compose exec app php artisan key:generate```

7 Run database migrations - ```docker compose exec app php artisan migrate```

8 Go to http://localhost:8081 in your browser to access the application.
