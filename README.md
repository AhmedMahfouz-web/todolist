# TodoList API

<p align="center">
    <a href="https://laravel.com" target="_blank">
        <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo">
    </a>
</p>

## About

TodoList API is a simple and elegant API built with Laravel 10 for managing tasks and tags. It provides user authentication using JWT and allows users to create, read, update, and delete tasks and tags.

## Features

-   User registration and authentication using JWT.
-   CRUD operations for tasks.
-   CRUD operations for tags.
-   Task prioritization and status management.

## Requirements

-   PHP >= 8.0
-   Composer
-   MySQL or SQLite
-   Laravel 10

## Installation

1. **Clone the repository:**

    ```bash
    git clone https://github.com/yourusername/todolist-api.git
    cd todolist-api
    ```

2. **Install dependencies:**

    ```bash
    composer install
    ```

3. **Create a copy of the `.env` file:**

    ```bash
    cp .env.example .env
    ```

4. **Set up your database:**

    - Create a new database in MySQL (e.g., `todolist`).
    - Update the `.env` file with your database credentials:
        ```env
        DB_CONNECTION=mysql
        DB_HOST=127.0.0.1
        DB_PORT=3306
        DB_DATABASE=todolist
        DB_USERNAME=your_username
        DB_PASSWORD=your_password
        ```

5. **Generate the application key:**

    ```bash
    php artisan key:generate
    ```

6. **Generate the JWT secret:**

    ```bash
    php artisan jwt:secret
    ```

7. **Run migrations:**
    ```bash
    php artisan migrate
    ```

## Usage

### API Endpoints

-   **User Registration**

    -   `POST /register`
    -   Request Body:
        ```json
        {
            "name": "John Doe",
            "email": "john@example.com",
            "password": "password123"
        }
        ```

-   **User Login**

    -   `POST /login`
    -   Request Body:
        ```json
        {
            "email": "john@example.com",
            "password": "password123"
        }
        ```

-   **Task Management**

    -   `GET /tasks`: List all tasks.
    -   `POST /tasks`: Create a new task.
    -   `GET /tasks/{id}`: Get a single task.
    -   `PUT /tasks/{id}`: Update a task.
    -   `DELETE /tasks/{id}`: Delete a task.

-   **Tag Management**
    -   `GET /tags`: List all tags.
    -   `POST /tags`: Create a new tag.

### Testing

To run the tests, use the following command:

```bash
php artisan test
```

## Contributing

If you would like to contribute to this project, please fork the repository and submit a pull request.

## License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

## Acknowledgments

-   [Laravel](https://laravel.com) - The PHP framework used.
-   [JWT-Auth](https://github.com/tymondesigns/jwt-auth) - For JWT authentication.
