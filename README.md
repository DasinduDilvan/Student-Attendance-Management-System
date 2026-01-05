# Attendance Management System (ERP)

## 📋 Project Overview
A web-based Attendance Management System designed for a single-faculty university with three departments. The system enables accurate attendance recording, real-time access for students and lecturers, centralized administration, student medical requests, and complaint handling.

**Deadline:** 15th January 2026  
**Team:** .EXE

## 🎯 Objectives
- Digitize attendance management processes
- Provide role-based access (Admin, Lecturer, Student)
- Enable year (batch), department, course, and subject management
- Allow students to monitor attendance and academic updates
- Handle student medical requests for absent lectures
- Enable students to submit complaints digitally
- Deploy a functional, real-world web application

## 👥 System Users
| Role | Description |
|------|-------------|
| **Admin** | Manages departments, batches, courses, system settings, users, medical requests, and complaints |
| **Lecturer** | Marks attendance and manages assigned subjects |
| **Student** | Views attendance, submits medical requests, and sends complaints |

## 🏗️ System Architecture
We follow the **MVC (Model-View-Controller)** architecture pattern for clean separation of concerns, maintainability, and scalability.

### Technology Stack
| Layer | Technology |
|-------|------------|
| **Frontend** | HTML, CSS, JavaScript |
| **Backend** | PHP |
| **Database** | MySQL |
| **Architecture** | MVC Pattern |

## 📊 System Modules

### 1. Authentication Module (Login & Registration)
- Student & Lecturer registration
- Secure login/logout with session handling
- Role-based authentication (Admin, Lecturer, Student)
- Password encryption
- Initial profile creation during registration
- All users linked to department and academic year (batch)

### 2. Admin Module
- Enable/disable student and lecturer accounts
- Manage academic structure (Years, Departments, Courses, Subjects)
- Assign subjects to departments, courses, and lecturers
- **Medical request review & approvals** (Samindi)
- **Complaint review and closure** (Samindi)
- System overview dashboard

### 3. Lecturer Module
- Lecturer dashboard
- View assigned subjects
- Mark attendance by subject and date
- Edit attendance (same day only)
- View student lists (year & department-wise)
- Attendance summary per subject

### 4. Student Module (Dasindu)
- Student dashboard
- View attendance by subject with percentage calculation
- Low-attendance warnings (below threshold)
- University news & updates (scraped from TECMIS)
- Submit medical requests for absent lectures
- Send complaints to university management
- Track medical request and complaint status

## 🗃️ Database Overview (High Level)
- Users
- Departments
- Years (Batches)
- Courses
- Subjects
- Student enrollments
- Attendance records
- Attendance sessions
- Medical requests
- Complaints

## 🔄 System Workflow
1. Admin sets up years, departments, courses, subjects, and users
2. Students and lecturers register and authenticate
3. Lecturers mark attendance for assigned subjects
4. Students view attendance and submit medical requests or complaints
5. Admin reviews and responds to medical requests and complaints
6. Approved medical requests are reflected in attendance records

## 👨‍💻 Team Distribution
| Member | Module Responsibility |
|--------|----------------------|
| **Hasitha** | Student & Lecturer registration, sign-in, Authentication, User accounts & profiles |
| **Senitha** | Admin Control Panel (enable/disable users, system configuration) |
| **Maduka** | Lecturer Attendance Panel, add/remove lecturers, assign subjects to lecturers |
| **Dulsha** | Add & remove Years (Batches), Departments, Courses, Subject management |
| **Dasindu** | **Complete Student Module** (dashboard, medical requests, complaints, news & updates) |
| **Samindi** | **Admin Medical & Complaint Module** (medical review & approvals, complaint review and closure) |

## 🚀 Expected Outcome
A fully functional, deployable Attendance Management Mini ERP that reflects real university workflows, includes attendance tracking, medical handling, complaint management, and demonstrates full-stack development and team collaboration skills using MVC architecture.

## 📁 Project Structure (MVC)

attendance-management-system/
├── app/
│ ├── controllers/
│ │ ├── AuthController.php
│ │ ├── AdminController.php
│ │ ├── LecturerController.php
│ │ └── StudentController.php
│ ├── models/
│ │ ├── User.php
│ │ ├── Attendance.php
│ │ ├── MedicalRequest.php
│ │ └── Complaint.php
│ └── views/
│ ├── auth/
│ ├── admin/
│ ├── lecturer/
│ └── student/
├── config/
│ └── database.php
├── public/
│ ├── css/
│ ├── js/
│ └── index.php
├── vendor/
├── .htaccess
└── README.md



## 🔧 Installation & Setup
1. Clone the repository
2. Configure database settings in `config/database.php`
3. Import the SQL schema from `database/schema.sql`
4. Set up web server (Apache recommended with mod_rewrite enabled)
5. Access the application through your web browser

## 📝 Notes
- All team members must follow MVC conventions
- Database credentials should not be committed to version control
- Use prepared statements to prevent SQL injection
- Implement proper input validation and sanitization
- Follow PSR coding standards

## 📄 License
This project is developed for academic purposes by Team .EXE