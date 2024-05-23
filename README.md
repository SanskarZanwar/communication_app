# Communication Application

A web-based communication application allowing users to manage group chats, user accounts, and document uploads. This application is built using PHP and MySQL.

## Table of Contents

- [Features](#features)
- [Prerequisites](#prerequisites)
- [Installation](#installation)
- [Configuration](#configuration)
- [Usage](#usage)

## Features

- User registration and login
- User management (view, edit, delete users)
- Group chat functionality
- Document management (upload, view, edit, delete documents)

## Prerequisites

- PHP >= 7.4
- MySQL
- Composer (for dependency management)
- Web server (e.g., Apache, Nginx)

## Installation

1. Clone the repository:
    ```sh
    git clone https://github.com/SanskarZanwar/communication_app.git
    cd communication_app
    ```

2. Install dependencies:
    ```sh
    composer install
    ```

3. Create a database and import the SQL schema:
    ```sql
    CREATE DATABASE communication_app;

    USE communication_app;

    CREATE TABLE users (
        id INT AUTO_INCREMENT PRIMARY KEY,
        fullname VARCHAR(255) NOT NULL,
        email VARCHAR(255) NOT NULL UNIQUE,
        password VARCHAR(255) NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    );

    CREATE TABLE chats (
        id INT AUTO_INCREMENT PRIMARY KEY,
        user_id INT NOT NULL,
        message TEXT NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        FOREIGN KEY (user_id) REFERENCES users(id)
    );

    CREATE TABLE uploads (
        id INT AUTO_INCREMENT PRIMARY KEY,
        user_id INT NOT NULL,
        file_name VARCHAR(255) NOT NULL,
        file_path VARCHAR(255) NOT NULL,
        uploaded_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        FOREIGN KEY (user_id) REFERENCES users(id)
    );
    ```

## Configuration

1. Copy the configuration file and update it with your database credentials:
    ```sh
    cp config/config.php.example config/config.php
    ```

2. Open `config/config.php` and update the database settings:
    ```php
    <?php
    $host = 'localhost';
    $db   = 'communication_app';
    $user = 'root';
    $pass = 'your_password';
    $port = '3307'; // Update this if your MySQL runs on a different port

    $dsn = "mysql:host=$host;dbname=$db;charset=utf8mb4;port=$port";
    $options = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];

    try {
        $pdo = new PDO($dsn, $user, $pass, $options);
    } catch (PDOException $e) {
        throw new PDOException($e->getMessage(), (int)$e->getCode());
    }
    ```

## Usage

1. Start your web server and navigate to the project's public directory:
    ```sh
    php -S localhost:8000 -t public
    ```

2. Open your browser and go to `http://localhost:8000`.

3. Register a new user or log in with existing credentials.

4. Once logged in, you can manage users, join group chats, and manage document uploads.



