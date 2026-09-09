A modern, lightweight Kanban board application built from scratch using custom PHP 8+ MVC architecture, featuring a responsive UI powered by Bootstrap 5 and AdminLTE 4.

## 🚀 Features

* **Custom MVC Architecture:** Clean separation of concerns with a dedicated routing system, controllers, and views.
* **Database Integration:** Secure PDO-powered database wrapper (`Core/Database.php`) for dynamic task management.
* **Interactive Kanban Board:** Drag-and-drop task sorting powered by SortableJS.
* **Modern UI/UX:** Styled using Bootstrap 5 and AdminLTE 4 component layouts with custom CSS overrides.

## 🛠️ Tech Stack

* **Backend:** PHP 8+, PDO (PHP Data Objects)
* **Frontend:** HTML5, CSS3, JavaScript, Bootstrap 5, AdminLTE 4, SortableJS
* **Version Control:** Git & GitHub

## 📁 Project Structure

```text
task-flow/
├── Core/               # Framework core (Container, Database, Router, App)
├── controllers/        # Application controllers
├── public/             # Web root (index.php entry point and assets)
├── views/              # View templates and partials
├── bootstrap.php       # Application container and dependency injection setup
├── config.php          # Database and application configuration
├── routes.php          # Application routing definitions
└── .gitattributes

⚙️ Setup & Installation
Clone the repository:
git clone https://github.com/wdmaledict/task-flow.git

Configure your database settings in config.php.

Choose your preferred local server environment:

Option A: Laravel Herd (Recommended)
Place the project inside your Herd directory and access it via your local domain (e.g., http://task-flow.test). Make sure the public directory points to public/.

Option B: Built-in PHP Development Server
Navigate to the public directory and run:
php -S localhost:8000
