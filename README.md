# GrowMore - Loan Management System 💰

A complete **Loan Management System** built with **PHP**, **HTML**, **CSS**, and **JavaScript**, designed to manage loan applications, approvals, repayments, and reporting with a clean UI.

---

## 📋 Table of Contents
- [About](https://github.com/Dhruv-V-Patel/GrowMore_Loan_Management_System_Project/tree/main#-about)
- [Tech Stack](https://github.com/Dhruv-V-Patel/GrowMore_Loan_Management_System_Project/tree/main#-tech-stack)
- [Features](https://github.com/Dhruv-V-Patel/GrowMore_Loan_Management_System_Project/tree/main#-#features)
- [Screenshots](https://github.com/Dhruv-V-Patel/GrowMore_Loan_Management_System_Project/tree/main#-#screenshots)
- [Installation](https://github.com/Dhruv-V-Patel/GrowMore_Loan_Management_System_Project/tree/main#-#installation)
- [Usage](https://github.com/Dhruv-V-Patel/GrowMore_Loan_Management_System_Project/tree/main#-#usage)
- [Project Structure](https://github.com/Dhruv-V-Patel/GrowMore_Loan_Management_System_Project/tree/main#-#project-structure)
- [Contributing](https://github.com/Dhruv-V-Patel/GrowMore_Loan_Management_System_Project/tree/main#-#contributing)
- [Contact](https://github.com/Dhruv-V-Patel/GrowMore_Loan_Management_System_Project/tree/main#-#contact)

---

## 🧐 About
The **GrowMore Loan Management System** is a web-based application that enables lenders and administrators to:
- Process loan applications
- Approve or reject loans
- Track repayments
- Generate reports

Built as a **PHP-based web app**, it’s ideal for small financial institutions, startups, or anyone needing an easy-to-use loan tracking solution.

---

## 🧱 Tech Stack
- **Backend**: PHP (Core PHP or with MySQLi / PDO)
- **Frontend**: HTML5, CSS3, JavaScript (vanilla JS)
- **Database**: MySQL
- **Styling**: Custom CSS + basic UI enhancements

---

## 🌟 Features
- User login & registration
- Loan application form
- Admin panel for approvals
- Repayment tracking
- Loan status updates
- Responsive design for desktop & mobile

---

## 📸 Screenshots
*(Add screenshots of your project UI here — e.g., dashboard, loan form, etc.)*

---

## 🛠 Installation

### 1️⃣ Prerequisites
- PHP ≥ 7.4
- MySQL Database
- XAMPP / WAMP / MAMP (for local development)
- Web browser (Chrome, Firefox, etc.)

### 2️⃣ Steps
1. Clone the repository:
   ```bash
   git clone https://github.com/Dhruv-V-Patel/GrowMore_Loan_Management_System_Project.git
2. Move the project folder into your htdocs directory (if using XAMPP):
    ```bash
   C:\xampp\htdocs\GrowMore_Loan_Management_System_Project
3. Import the database:
   - Open phpMyAdmin
   - Create a database (e.g., growmore_db)
   - Import the .sql file from the repository  
4. Configure database connection in Partials/_dbconnect.php:
   ```bash
   $host = "localhost:3306";
   $username = "root";
   $password = "";
   $dbname = "growmore";
5. Start Apache & MySQL in XAMPP.
6. Open in browser: http://localhost/GrowMore_Loan_Management_System_Project
   
---

## 🎯 Usage

- **User**: Register → Apply for loan → View status & repayments
- **Admin**: Login → Review applications → Approve/Reject → Track repayments

---

## 📂 Project Structure

   ```bash
   GrowMore_Loan_Management_System_Project/
   ├── Partials/             # Includes All PHP files such as profile page, login and registration Form, loan application form, EMI calculator page, loan Details and Types Page, etc
   ├── assets/               # CSS, JS, Images, DataBase, Uploads
   ├── index.php             # Landing page
   ```
---

## 🤝 Contributing

- Contributions are welcome!
- Fork the repository
- Create a new branch (feature/your-feature)
- Commit changes
- Push to your branch and create a PR

---

## 📞 Contact

Dhruv Patel \
GitHub: [@Dhruv-V-Patel](https://github.com/Dhruv-V-Patel) \
Email: dhruvpatel7063@gmail.com
