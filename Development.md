# Development & Operations Guide (Spice Route Restaurant System)

This document provides technical guidelines, architecture overviews, environment configurations, and deployment instructions for developers and maintainers working on the **Spice Route Restaurant - Staff Attendance & Shift Management System**.

---

## System Architecture & Tech Stack

* **Core Framework:** Laravel 13 (PHP 8.4)
* **Frontend:** Bootstrap 5, Blade Templates, JavaScript (Vanilla/ES6)
* **Database:** SQLite (`database/database.sqlite`)
* **Containerization:** Custom Docker (`php:8.4-fpm` + `nginx` + `libsqlite3-dev`)
* **Cloud Hosting:** Render (Web Service / Docker Runtime)

---

## Environment Configuration Reference

The application relies on specific environment variables for proper execution. Ensure your `.env` file (or cloud provider environment settings) contains the following parameters:

```env
APP_NAME="Spice Route Restaurant"
APP_ENV=production
APP_KEY=base64:YourGeneratedAppKeyHere
APP_DEBUG=false
APP_URL=[https://spicerouterestaurant.onrender.com](https://spicerouterestaurant.onrender.com)

LOG_CHANNEL=stack
LOG_DEPRECATIONS_CHANNEL=null
LOG_LEVEL=debug

DB_CONNECTION=sqlite
# Database path defaults to database/database.sqlite inside the container/local root