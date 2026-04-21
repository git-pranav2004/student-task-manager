# 🚀 Student Task Manager (PHP MVC)

A clean, beginner-friendly **Task Manager Web Application** built using **Core PHP (MVC Architecture)** — designed to demonstrate real-world backend structure without frameworks.

---

## ✨ Features

- 🔐 User Authentication (Login / Register / Logout)
- 📋 Task Management (CRUD)
- 🎯 Session-based Access Control
- 🧠 MVC Architecture (No Framework)
- 🎨 Modern UI with Custom CSS
- ⚡ Lightweight & Fast

---

## 🏗️ Project Architecture


Client (Browser)
↓
public/index.php (Entry Point)
↓
Router
↓
Controller
↓
Model (Database)
↓
View (UI)


---

## 📂 Folder Structure


StudentTaskManager/
│
├── app/
│ ├── controllers/
│ │ ├── AuthController.php
│ │ └── TaskController.php
│ │
│ ├── models/
│ │ ├── User.php
│ │ └── Task.php
│ │
│ └── views/
│ ├── auth/
│ ├── tasks/
│ └── layouts/
│
├── core/
│ ├── database.php
│ └── router.php
│
├── public/
│ ├── index.php
│ └── assets/
│ └── style.css
│
└── database.sql


---

## ⚙️ Installation

### 1️⃣ Clone Repository

git clone https://github.com/your-username/student-task-manager.git


### 2️⃣ Move to XAMPP

C:\xampp\htdocs\


### 3️⃣ Start Server
- Apache ✅
- MySQL ✅

---

### 4️⃣ Database Setup

- Open phpMyAdmin
- Create DB:

task_manager


- Import:

database.sql


---

### 5️⃣ Run Project


http://localhost/StudentTaskManager/public/index.php?url=auth/login


---

## 🔐 Authentication Flow

- Passwords hashed using `password_hash()`
- Verified using `password_verify()`
- Session used for login persistence

---

## 🎨 UI Highlights

- Clean card-based dashboard
- Responsive layout
- Styled forms & alerts
- Smooth hover effects

---

## 🚀 Tech Stack

- PHP (Core)
- MySQL
- HTML5 + CSS3
- MVC Pattern

---

## ⚠️ Notes

- No `.htaccess` used (simplified routing)
- Uses:

index.php?url=controller/method


---

## 🧠 Learning Outcomes

- Understanding MVC without frameworks
- Building routing system
- Authentication handling
- Database interaction using PDO

---

## 🔮 Future Enhancements

- ✅ Task status (Pending / Completed)
- 📅 Due dates
- 🔍 Search & filters
- 🌙 Dark mode
- 📱 Responsive mobile UI
- 🌐 Deployment (Hostinger / Railway)

---

## 👨‍💻 Author

Built for learning and strengthening backend fundamentals.

---

## ⭐ If you like this project

Give it a ⭐ on GitHub!
