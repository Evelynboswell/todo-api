<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Laravel 10 Todo API with Multi-User Management

This is a simple Todo REST API built with Laravel 10, featuring multi-user management. Users can register, log in, and manage their own tasks (create, read, update, and delete tasks). API authentication is handled via Laravel Sanctum, and the API documentation is available using OpenAPI/Swagger.

## Features

- User registration and login
- Token-based authentication using Laravel Sanctum
- Multi-user management (each user can only access their own tasks)
- Full CRUD operations for tasks (create, read, update, delete)
- Swagger documentation for easy integration and testing

## Requirements
- PHP 8.1 or higher
- Composer
- MySQL or any database supported by Laravel
- Node.js and npm (optional, for frontend scaffolding)
- Laravel 10



## Installation
Follow the steps below to set up the project locally.
#### 1. Clone the Repository

```bash
git clone https://github.com/your-username/laravel-todo-api.git
cd laravel-todo-api
```
### 2. Install Dependencies
Run the following command to install PHP and Composer dependencies:
```
composer install
```    
### 3. Set Up the Environment
Copy the .env.example file to .env:
```
cp .env.example .env
```
Generate an application key:
```
php artisan key:generate
```
### 4. Configure the Database
In the .env file, update the database connection details:
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database
DB_USERNAME=your_username
DB_PASSWORD=your_password
```
### 5. Run Migrations
Run the following command to migrate the database:
```
php artisan migrate
```
### 6. Serve the Application
Start the Laravel development server:
```
php artisan serve
```
The application will be available at http://127.0.0.1:8000.

## API Endpoints
### Authentication
- Register: POST /api/register
- Login: POST /api/login
- Logout: POST /api/logout (requires Bearer token)
### Task Management
- Get All Tasks: GET /api/tasks (requires Bearer token)
- Create a Task: POST /api/tasks (requires Bearer token)
- Get a Task by ID: GET /api/tasks/{id} (requires Bearer token)
- Update a Task: PUT /api/tasks/{id} (requires Bearer token)
- Delete a Task: DELETE /api/tasks/{id} (requires Bearer token)


## Authentication

This API uses token-based authentication. After logging in, a token will be returned in the response. You need to include this token as a Bearer token in the Authorization header for subsequent requests.

### Example: Bearer Token Authentication in Postman
- Log in using POST /api/login.
- Copy the token from the response.
- In Postman (or any API client), add the token to the Authorization header as follows:
```
Authorization: Bearer <your-token>
```
## API Documentation

The API documentation is available in the docs folder of this project and can be viewed through Swagger UI.
- Swagger Documentation: `openapi.yaml`
To view the API documentation interactively, you can load the `openapi.yaml` file into Swagger Editor.

## Testing the API with Postman
#### 1. Register a new user
- Endpoint: POST /api/register
- Body (JSON):
```
{
  "name": "John Doe",
  "email": "john@example.com",
  "password": "password"
}
```
#### 2. Login
- Endpoint: POST /api/login
- Body (JSON):
```
{
  "email": "john@example.com",
  "password": "password"
}
```
#### 3. Create a new task
- Endpoint: POST /api/tasks
- Authorization: Bearer token (obtained from login)
- Body (JSON):
```
{
  "title": "Buy groceries",
  "description": "Milk, Eggs, Bread"
}
```
#### 4. Get all tasks
- Endpoint: GET /api/tasks
- Authorization: Bearer token
#### 5. Update a task
- Endpoint: PUT /api/tasks/{id}
- Authorization: Bearer token
- Body (JSON):
```
{
  "title": "Buy more groceries",
  "description": "Milk, Eggs, Bread, and Butter",
  "is_completed": true
}
```
#### 6. Delete a task
- Endpoint: DELETE /api/tasks/{id}
- Authorization: Bearer token

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
