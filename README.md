# Borgaonkar Group — Real Estate Web Application

A full-stack real estate web application built with **HTML5, CSS3, Bootstrap 4, JavaScript, PHP, and MySQL**. The platform showcases residential and commercial real estate projects, provides RERA documentation links, handles client inquiries, and includes a session-authenticated Admin Control Panel.

## Features
- **Project Showcase:** Dedicated landing pages for *Borgaonkar Elegance*, *Heena Ashish*, and *RockMount Residency* with RERA links and location highlights.
- **Interactive Contact & Inquiry System:** Multi-tab contact page featuring office details, an embedded Google Map, and a "Get in Touch" form connected to MySQL.
- **Admin Dashboard:** Secure login system (`login.php`) allowing administrators to view, manage, and delete client inquiries (`admin_panel.php`).
- **Responsive UI:** Built using Bootstrap 4 grid components and custom CSS.

## Tech Stack
- **Frontend:** HTML5, CSS3, Bootstrap 4.5, JavaScript, jQuery, Font Awesome
- **Backend:** PHP 7/8
- **Database:** MySQL

## Local Setup Instructions
1. Clone or extract this repository into your local server directory (e.g., `htdocs/` in XAMPP or `www/` in WAMP).
2. Start **Apache** and **MySQL** in XAMPP/WAMP.
3. Open `http://localhost/phpmyadmin` and import `database.sql` (creates the `constant` database and `subscribers` table).
4. Open your browser and navigate to `http://localhost/borgaonkar-real-estate/index.html`.

### Default Admin Credentials
- **URL:** `http://localhost/borgaonkar-real-estate/login.php`
- **Username:** `admin`
- **Password:** `admin123`
