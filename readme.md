# Simple PHP Project Setup

## Table of Contents

- [About](#about)
- [Getting Started](#getting_started)
    - [Prerequisites](#prerequisites)
    - [Installing](#installing)
- [Usage](#usage)
- [Database Connection (PDO)](#database-connection-pdo)
    - [configure your config.php](#1-configure-your-configphp)
    - [Fetch data with PDO](#2-fetch-data-with-pdo)
    - [Insert Data with PDO](#3-insert-data-with-pdo)
- [Conclusion](#conclusion)

## About <a name = "about"></a>

This project provides a minimal PHP starter for inline scripting, allowing developers to quickly write and execute PHP code within HTML. It supports PDO (PHP Data Objects) for secure database interactions.

With this inline PHP starter, developers can easily mix PHP logic with HTML without the need for complex setups or frameworks. It’s ideal for beginners learning PHP basics, quick prototyping, or handling simple dynamic content in a web page.

## Getting Started <a name = "getting_started"></a>

These instructions will get you a copy of the project up and running on your local machine for development and testing purposes. See [deployment](#deployment) for notes on how to deploy the project on a live system.

### Prerequisites <a name = "prerequisites"></a>

Before you begin, make sure you have the following installed on your system:
- PHP (Version 7.4 or later recommended) – Download PHP
- A Web Server (Optional: Apache, Nginx, or use PHP’s built-in server)
- A Code Editor (Recommended: VS Code, Sublime Text, or PHPStorm)
- A Web Browser (e.g., Chrome, Firefox) to test your application
- A Database (Optional) – MySQL, MariaDB, or SQLite if you plan to use a database

**Example**: Check if PHP is installed by running the following command in your terminal:
```
php -v
```

If PHP is installed, you should see output similar to:
```
PHP 8.1.2 (cli) (built: Jan 23 2022 10:00:00) ( NTS )  
Copyright (c) The PHP Group  
Zend Engine v4.1.2, Copyright (c) Zend Technologies  
```

Check if PDO is enabled by running:
```
php -m | grep pdo
```

If PDO is enabled, you should see output like:
```
pdo_mysql
pdo_sqlite
```

### Installing <a name = "installing"></a>

1. Clone the Repository (if using Git):

```
git clone https://github.com/Arifrebe/simple-php-project-setup.git
```

Then, navigate to the project directory:

```
cd simple-php-project-setup
```

2. Run the Project Using PHP’s Built-in Server

If you don’t have a web server, you can use PHP’s built-in server by running:

```
php -S localhost:8000
```

Now, open your browser and visit:
```
http://localhost:8000
```
If everything is set up correctly, you should see the default page of your PHP project.
## Usage <a name = "usage"></a>

To use this PHP starter project, simply open the `home.view.php` in views folder and start adding your PHP logic inside the `<body>`section.  

Example of embedding PHP in HTML:

```
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>PHP Starter</title>
    </head>
    <body>
        <h1>Welcome to My Simple PHP Project</h1>
        <p>Current Date and Time: <?php echo date("Y-m-d H:i:s"); ?></p>
    </body>
    </html>
```
### Example Output
If you visit `http://localhost:8000`, you will see:
```
Welcome to My Simple PHP Project
Current Date and Time: 2025-02-17 10:45:23
```
You can modify the `home.view.php` file to add more dynamic PHP functionality.

## Database Connection (PDO)  <a name="pdo_connection"></a>
This project supports PDO (PHP Data Objects) for secure and efficient database connections. Below is an example of how to connect to a MySQL database using PDO.

### 1. configure your `config.php` <a name="configure"></a>

Ensure you have your config.php file with the following content. This file holds your database credentials:

```
<?php

// Define your database credentials
define('DBNAME', 'pictoria');    // Name of the database
define('DBHOST', 'localhost');   // Database host (usually localhost)
define('DBUSER', 'root');        // Database username
define('DBPASS', '');            // Database password (empty for local development)
define('DBDRIVER', 'mysql');     // Database type (mysql in this case)
?>
```
**Note**: The `config.php` file is already configured. If needed, uncomment the code to connect to database.

This `config.php` file contains essential constants used to configure the PDO connection. Make sure to modify these values according to your environment.

### 2. Fetch data with PDO
To fetch data from the database, you can prepare and execute SQL queries. Below is an example of fetching users from a `users` table:
```
<?php
// Include the database connection
require 'database.php';

// Prepare and execute the SQL query
$sql = "SELECT * FROM users";
$stmt = $pdo->prepare($sql);
$stmt->execute();

// Fetch all users and display their names
$users = $stmt->fetchAll();
foreach ($users as $user) {
    echo "User: " . $user['name'] . "<br>";
}
?>
```
### 3. Insert Data with PDO
You can also insert data into the database using prepared statements. Here’s an example of inserting a new user into the `users` table:
```
<?php
// Include the database connection
require 'database.php';

// Prepare the SQL insert query
$sql = "INSERT INTO users (name, email) VALUES (:name, :email)";
$stmt = $pdo->prepare($sql);

// Execute the query with user data
$stmt->execute([
    'name' => 'John Doe',
    'email' => 'john@example.com'
]);

echo "User added successfully!";
?>
```
## Conclusion <a name = "conclusion"></a>
With this setup, you can now securely and efficiently interact with your MySQL database using PDO in your PHP project. Modify the config.php file for different environments (e.g., development, production), and feel free to extend the functionality to support CRUD operations.