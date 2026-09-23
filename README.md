# Tasks for Today Management System

A simple task management web application developed using **CodeIgniter 4** and **MySQL**.

The system displays today's tasks, provides a complete task list, displays a demo user profile, and includes an About page identifying the developer.

## Features

The application contains four pages:

- **Home / Welcome** - Displays only tasks scheduled for today's date
- **Task List** - Displays all tasks ordered by date
- **Profile** - Displays the single demo user's information
- **About** - Displays information about the system and developer

## Routes

| Page | Route |
|---|---|
| Welcome / Today's Tasks | `/` |
| Task List | `/tasks` |
| Profile | `/profile` |
| About | `/about` |

## Database

The application uses a MySQL database named:

```text
tasks_system
```

The database contains two tables:

### Tasks

The `tasks` table contains:

- `id`
- `title`
- `status`
- `task_date`
- `created_at`

The table contains at least 8 sample tasks spanning at least 3 different dates.

### Users

The `users` table contains:

- `id`
- `username`
- `full_name`
- `email`
- `created_at`

The table contains exactly one demo user.

## Database Export

The database export is included in the repository at:

```text
database/tasks_system.sql
```

This file can be imported into MySQL using phpMyAdmin.

## CodeIgniter Models

The application uses two CodeIgniter Models:

```text
app/Models/TaskModel.php
app/Models/UserModel.php
```

### TaskModel

`TaskModel` retrieves records from the `tasks` table.

The Welcome page filters the records so that only tasks scheduled for today's date are displayed.

The Task List page retrieves all tasks and orders them by task date.

### UserModel

`UserModel` retrieves the single demo user from the `users` table for the Profile page.

## Application Flow

The application follows the CodeIgniter MVC structure:

```text
Route
  ↓
Controller
  ↓
Model
  ↓
MySQL Database
  ↓
Controller
  ↓
View
  ↓
Browser
```

## Project Structure

```text
app/
├── Config/
│   └── Routes.php
├── Controllers/
│   ├── Welcome.php
│   ├── Tasks.php
│   ├── Profile.php
│   └── Pages.php
├── Models/
│   ├── TaskModel.php
│   └── UserModel.php
└── Views/
    ├── welcome.php
    ├── tasks.php
    ├── profile.php
    └── about.php

database/
└── tasks_system.sql
```

## Technologies Used

- PHP
- CodeIgniter 4
- MySQL
- phpMyAdmin
- Composer
- HTML
- Git
- GitHub
- InfinityFree

## Local Installation

Clone the repository:

```bash
git clone https://github.com/quincn/tasks-system.git
```

Enter the project directory:

```bash
cd tasks-system
```

Install the Composer dependencies:

```bash
composer install
```

Create a `.env` file from the provided `env` template:

```cmd
copy env .env
```

Create a MySQL database named:

```text
tasks_system
```

Import the database file:

```text
database/tasks_system.sql
```

Configure the database connection in `.env`:

```ini
CI_ENVIRONMENT = development

app.baseURL = 'http://localhost:8080/'

database.default.hostname = localhost
database.default.database = tasks_system
database.default.username = root
database.default.password =
database.default.DBDriver = MySQLi
database.default.DBPrefix =
database.default.port = 3306
```

Start the CodeIgniter development server:

```bash
php spark serve
```

Then open:

```text
http://localhost:8080/
```

## Live Application

The hosted and working version of the application is available at:

http://klyn-tasks.wuaze.com/

## Developer

Developed by **Andrei Klein Serrano**.