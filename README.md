# GrowMore - Loan Management System 💰

A complete **Loan Management System** built with **PHP**, **HTML**, **CSS**, and **JavaScript**, designed to manage loan applications, approvals, repayments, and reporting with a clean UI.

---

## 📋 Table of Contents
- [About](https://github.com/Dhruv-V-Patel/GrowMore_Loan_Management_System_Project/tree/main#-about)
- [Tech Stack](https://github.com/Dhruv-V-Patel/GrowMore_Loan_Management_System_Project/tree/main#-tech-stack)
- [Features](https://github.com/Dhruv-V-Patel/GrowMore_Loan_Management_System_Project/tree/main#-features)
- [Screenshots](https://github.com/Dhruv-V-Patel/GrowMore_Loan_Management_System_Project/tree/main#-screenshots)
- [Installation](https://github.com/Dhruv-V-Patel/GrowMore_Loan_Management_System_Project/tree/main#-installation)
- [Usage](https://github.com/Dhruv-V-Patel/GrowMore_Loan_Management_System_Project/tree/main#-usage)
- [Project Structure](https://github.com/Dhruv-V-Patel/GrowMore_Loan_Management_System_Project/tree/main#-project-structure)
- [Contributing](https://github.com/Dhruv-V-Patel/GrowMore_Loan_Management_System_Project/tree/main#-contributing)
- [Contact](https://github.com/Dhruv-V-Patel/GrowMore_Loan_Management_System_Project/tree/main#-contact)

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
<h4>Registraction Form:</h4>
<p align="center">
<img width="750" height="400" alt="Registraction Form" src="https://github.com/user-attachments/assets/a94400b7-48fb-4841-a848-0452bb42c15c" />
</p>

<h4>Login Form:</h4>
<p align="center">
<img width="750" height="400" alt="Login Form" src="https://github.com/user-attachments/assets/5a032556-a748-4ff4-854b-22ce9213a850" />
</p>

<h4>User Dashboard:</h4>
<p align="center">
<img width="750" height="400" alt="User Panel" src="https://github.com/user-attachments/assets/0381fef1-430f-40f7-9b0b-ebb373c32e9a" />
</p>

<h4>Loan Application Form:</h4>
<p align="center">
<img width="750" height="400" alt="Loan Application Form" src="https://github.com/user-attachments/assets/454aeab1-53d9-4c28-8641-495e22c89407" />
</p>

<h4>Document Submission Page:</h4>
<p align="center">
<img width="750" height="400" alt="Document Submission Page" src="https://github.com/user-attachments/assets/9928aa0f-493c-43a4-b582-1e7832e800bb" />
</p>

<h4>Contact US Page:</h4>
<p align="center">
<img width="750" height="400" alt="Contact Us" src="https://github.com/user-attachments/assets/edcf853b-e41d-41ab-b866-aa13d8b50d18" />
</p>

<h4>EMI Calculator Page:</h4>
<p align="center">
<img width="750" height="400" alt="EMI Calculator" src="https://github.com/user-attachments/assets/c7626372-efa2-4158-ba8c-c966a31f2009" />
</p>

<h4>Admin Dashboard</h4>
<p align="center">
<img width="750" height="400" alt="Admin Panel" src="https://github.com/user-attachments/assets/6095019a-30cb-4805-9057-a91d88c549cb" />
</p>

<h4>Loan Applications Dashboard:</h4>
<p align="center">
<img width="750" height="400" alt="Loan Application Dashboard" src="https://github.com/user-attachments/assets/26af64ee-dac7-4a16-b206-65f894395a9b" />
</p>

<h4>User Records:</h4>
<p align="center">
<img width="750" height="400" alt="User Records" src="https://github.com/user-attachments/assets/2cb452f0-13cf-4de5-a897-e7dfd602c48e" />
</p>

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
