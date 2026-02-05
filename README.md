# 🧵 PHPHandiCraft_CraftNest  
### A PHP-Based Handicraft E-Commerce Web Application for Selling Handmade Products

---

## 🛡️ Badges

![PHP](https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white)
![HTML5](https://img.shields.io/badge/HTML5-E34F26?style=for-the-badge&logo=html5&logoColor=white)
![CSS3](https://img.shields.io/badge/CSS3-1572B6?style=for-the-badge&logo=css3&logoColor=white)
![Bootstrap](https://img.shields.io/badge/Bootstrap-7952B3?style=for-the-badge&logo=bootstrap&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-005C84?style=for-the-badge&logo=mysql&logoColor=white)
![License](https://img.shields.io/badge/License-MIT-green?style=for-the-badge)

---

## 🎯 Project Banner

<p align="center">
  <img src="https://raw.githubusercontent.com/devicons/devicon/master/icons/php/php-original.svg" width="70"/>
  &nbsp;&nbsp;&nbsp;
  <img src="https://raw.githubusercontent.com/devicons/devicon/master/icons/mysql/mysql-original.svg" width="70"/>
  &nbsp;&nbsp;&nbsp;
  <img src="https://raw.githubusercontent.com/devicons/devicon/master/icons/bootstrap/bootstrap-original.svg" width="70"/>
</p>

---

## 📌 About the Project

**PHPHandiCraft_CraftNest** is a dynamic **PHP-based handicraft e-commerce web application** designed to promote and sell handmade products online.

The platform allows customers to browse handcrafted items, view product details, add products to cart, and place orders.  
It also includes an **admin panel** to manage products, categories, users, and orders efficiently.

This project focuses on **full-stack web development**, clean UI/UX design, and real-world e-commerce functionality using PHP and MySQL.

---

## 🛠️ Tech Stack

| Technology | Description |
|----------|-------------|
| <img src="https://raw.githubusercontent.com/devicons/devicon/master/icons/php/php-original.svg" width="30"/> **PHP** | Server-side scripting |
| <img src="https://raw.githubusercontent.com/devicons/devicon/master/icons/html5/html5-original.svg" width="30"/> **HTML5** | Page structure |
| <img src="https://raw.githubusercontent.com/devicons/devicon/master/icons/css3/css3-original.svg" width="30"/> **CSS3** | Styling |
| <img src="https://raw.githubusercontent.com/devicons/devicon/master/icons/bootstrap/bootstrap-original.svg" width="30"/> **Bootstrap** | Responsive UI |
| <img src="https://raw.githubusercontent.com/devicons/devicon/master/icons/mysql/mysql-original.svg" width="30"/> **MySQL (XAMPP)** | Database |
| **Apache Server** | Local web server |

---

## ✨ Application Features

### 👤 User Module
- User Registration & Login
- Browse Handicraft Products
- View Product Details
- Add to Cart
- Place Orders
- View Order History
- Contact & Inquiry Form

### 🛒 Shopping Features
- Featured & Best-Selling Products
- Product Categories
- Responsive Product Cards
- Newsletter Subscription

### 🔐 Admin Module
- Admin Login
- Add / Update / Delete Products
- Manage Categories
- View & Manage Orders
- Manage Users
- Product Image Upload

---

## 🗄️ Database Design

- **Database Name:** `phphandicraft_craftnest`
- **Database File:** `phphandicraft_craftnest.sql`
- **Database Engine:** MySQL (XAMPP)

### Key Tables
- `users` – Customer account details
- `admin` – Admin login data
- `products` – Handicraft product details
- `categories` – Product categories
- `orders` – Order information
- `order_items` – Ordered product details
- `cart` – Temporary cart data

### Relationships
- One **user** → many **orders**
- One **order** → many **order_items**
- One **category** → many **products**

Relational integrity is maintained using **primary keys** and **foreign keys**.

---

## 📂 Project Folder Structure

```bash

HandicraftShop/
├── bootstrap/
│   └── (Bootstrap CSS & JS files)
│
├── CSS/
│   └── (Custom stylesheet files)
│
├── fontawesome/
│   └── (Font Awesome icons)
│
├── Images/
│   └── (Product & website images)
│
├── IMP/
│   └── (Important / helper files if any)
│
├── Outputs/
│   └── (Project screenshots / output images)
│
├── Pages/
│   ├── Uploads/
│   │   └── (Uploaded product images)
│   │
│   ├── aboutus.php
│   ├── add_to_cart.php
│   ├── addproduct.php
│   ├── adminadd.php
│   ├── adminlogin.php
│   ├── cart.php
│   ├── checkout.php
│   ├── connection.php
│   ├── contactus.php
│   ├── dashboard.php
│   ├── delete_user.php
│   ├── deleteproduct.php
│   ├── footer.php
│   ├── header.php
│   ├── index.php
│   ├── login.php
│   ├── login_process.php
│   ├── logout.php
│   ├── manageorder.php
│   ├── manageuser.php
│   ├── order_success.php
│   ├── place_order.php
│   ├── product.php
│   ├── productdetails.php
│   ├── remove_cart.php
│   ├── signup.php
│   ├── signup_process.php
│   ├── update_cart.php
│   └── updateproduct.php
│
├── login.js
├── Main.js
├── signup.js
│
└── craftnest.sql

```

---

## ⚙️ Installation & Setup Guide
## 1️⃣ Prerequisites

- XAMPP (Apache + MySQL)

- PHP 8+

- Web Browser
  
- VS Code / Any Code Editor

## 2️⃣ Database Setup

- Start XAMPP
  
- Open phpMyAdmin
  
- Create database:

``` bash
phphandicraft_craftnest
```

- Import:
``` bash
phphandicraft_craftnest.sql
```

## 3️⃣ Project Setup

- Extract project folder

- Move to:

``` bash
htdocs/
```

## 4️⃣ Run the Project

- Open browser and visit:
``` bash
http://localhost/PHPHandiCraft_CraftNest/
```

---

## 📸 Screenshots

## Home Page
![Home Page](https://github.com/19JayPatel/CraftNest/blob/main/Outputs/HandicraftShop-Pages-index-php.png)

## 👨‍💻 Author : Jay Sidapara

[![LinkedIn](https://img.shields.io/badge/LinkedIn-Connect-blue?style=for-the-badge&logo=linkedin)](https://www.linkedin.com/in/jay-sidapara-b5a131298?utm_source=share_via&utm_content=profile&utm_medium=member_android)
