A modern, lightweight Kanban board application built from scratch using custom PHP 8+ MVC architecture, featuring a responsive UI powered by Bootstrap 5 and AdminLTE 4.

## 🚀 Features

- **User Authentication:** Secure registration and login with hashed passwords (`password_hash`/`password_verify`), server-side session management, and protection against session fixation attacks.
- **Full CRUD for Lists & Cards:** Create, rename, edit, and delete both lists and cards, with cascading deletes handled at the database level.
- **AJAX Drag & Drop:** Card positions persist to the database via a `fetch()`-based endpoint, powered by SortableJS on the frontend.
- **Security-Conscious Design:** Input sanitization with `htmlspecialchars()`, prepared statements throughout to prevent SQL injection, generic authentication error messages to prevent user enumeration, and server-side validation alongside client-side checks.
## 🛠️ Tech Stack

* **Backend:** PHP 8+, PDO (PHP Data Objects)
* **Frontend:** HTML5, CSS3, JavaScript, Bootstrap 5, AdminLTE 4, SortableJS
* **Version Control:** Git & GitHub

## 📁 Project Structure

```text
├── Core/               # Framework core (Container, Database, Router, App)
├── controllers/        # Application controllers
├── database/           # Database schema (SQL dump, no data)
├── postman/            # Postman collection + docs for API/middleware testing
├── public/             # Web root (index.php entry point and assets)
├── views/              # View templates and partials
├── bootstrap.php       # Application container and dependency injection setup
├── config.php          # Database and application configuration
├── routes.php          # Application routing definitions
└── .gitattributes

```

## ⚙️ Setup & Installation

Clone the repository:
git clone https://github.com/wdmaledict/task-flow.git

Import the database schema:
mysql -u root task-flow < database/schema.sql
(or import database/schema.sql via Sequel Ace / your preferred MySQL client)

Configure your database settings in config.php.

Choose your preferred local server environment:

Option A: Laravel Herd (Recommended)
Place the project inside your Herd directory and access it via your local domain (e.g., http://task-flow.test). Make sure the public directory points to public/.

Option B: Built-in PHP Development Server
Navigate to the public directory and run:
php -S localhost:8000

## 🧪 Testing

The `postman/` folder contains a Postman collection covering the `auth`/`guest` route middleware — both unauthenticated (blocked) and authenticated (passthrough) scenarios, with automated test assertions. See `postman/TESTING.md` for setup instructions.

