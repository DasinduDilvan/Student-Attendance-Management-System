-- Active: 1767348253107@@127.0.0.1@3306@student_attenance_management_system

--admin 
    --department
        --batch
            --level
                --semester
                    --course
                        --semster_course  < M:N
                            --lecturer
                                --lecturer_course < M:N
                                    --medical
                                    --complaince
                                    
CREATE DATABASE Student_Attenance_Management_System;
USE  Student_Attenance_Management_System ;

--create table admin
CREATE TABLE admin(
    admin_id INT AUTO_INCREMENT PRIMARY KEY ,
    username VARCHAR(50) PRIMARY KEY,
    email VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL
);

--create table department
CREATE TABLE department(
    dep_id INT AUTO_INCREMENT PRIMARY KEY ,
    dep_name VARCHAR(100) NOT NULL,
    status VARCHAR(20) NOT NULL   --ACTIVE < INACTIVE

);

--create table batch
CREATE TABLE batch(
    batch_id INT AUTO_INCREMENT PRIMARY KEY , 
    batch_name VARCHAR(50) NOT NULL,    
    status VARCHAR(20) NOT NULL        --ACTIVE < COMPLETED
);

--create table level
CREATE TABLE level(
    level_id INT AUTO_INCREMENT  PRIMARY KEY ,  --given by system
    Level_name VARCHAR(50) NOT NULL, --level 1 / level 2
    level_code VARCHAR(5) NOT NULL -- 1 / 2
);

--create table semester
CREATE TABLE semester(
    sem_id INT AUTO_INCREMENT PRIMARY KEY ,  --
    sem_name VARCHAR(50) NOT NULL, --semester 1
    level_id  INT NOT NULL,
    dep_id INT NOT NULL,
    status VARCHAR(50) NOT NULL,
    FOREIGN KEY (level_id) REFERENCES level(level_id),
    FOREIGN KEY (dep_id) REFERENCES department(dep_id)
   
);

--create table course
CREATE TABLE course(
    course_id INT AUTO_INCREMENT , --given by sytem
    course_code VARCHAR(50) PRIMARY KEY,     --ICT11
    course_name VARCHAR(50) NOT NULL,
    credits INT(5) NOT  NULL,
    lecturer_hours INT(5) NOT NULL,
    sem_id INT NOT NULL , 
    level_id  INT NOT NULL,
    FOREIGN KEY (sem_id) REFERENCES semester(sem_id),
    FOREIGN KEY (level_id) REFERENCES level(level_id),
);

--create semester_course
CREATE TABLE semester_course(
    sem_id INT NOT NULL,
    course_code VARCHAR(50) NOT NULL,
    PRIMARY KEY (sem_id , course_id),
    FOREIGN KEY (sem_id) REFERENCES semester(sem_id),
    FOREIGN KEY (course_code) REFERENCES course(course_code)
);

--create table lecturer
CREATE TABLE lecturer(
    lec_id INT PRIMARY KEY , 
    lec_reg_num INT AUTO_INCREMENT UNIQUE,    --inccrement by system
    lec_fName VARCHAR(50) NOT NULL,
    lec_mName VARCHAR(50) NOT NULL,
    lec_lName VARCHAR(50) NOT NULL,
    lec_email VARCHAR(50) NOT NULL,
    lec_contact_num VARCHAR(20) NOT NULL,
    lec_gender VARCHAR(10) NOT NULL,
    lec_address VARCHAR(100) NOT NULL,
    lec_nic VARCHAR(50) NOT NULL,
    lec_birthday DATE NOT NULL,
    lec_status VARCHAR(20) NOT NULL,
    lec_acc_created_date DATE NOT NULL, 
);

--create table lecturer_course
CREATE TABLE lecturer_course(
    lec_id INT NOT NULL,
    course_code VARCHAR(50) NOT NULL,
    PRIMARY KEY(lec_id , course_id),
    FOREIGN KEY (lec_id) REFERENCES lecturer(lec_id),
    FOREIGN KEY (course_code) REFERENCES course(course_code)

);

--create table student
CREATE TABLE student(
    stu_id VARCHAR(25) PRIMARY KEY UNIQUE,    --TG/XXXX/XXXX
    stu_reg_num INT AUTO_INCREMENT UNIQUE ,  --inccrement by system
    stu_fname VARCHAR(5 PRIMA0) NOT NULL,
    stu_mname VARCHAR(50) NOT NULL,
    stu_lname VARCHAR(50) NOT NUlL,
    stu_email VARCHAR(50) NOT NULL,
    stu_contact_num VARCHAR(20) NOT NULL,
    stu_gender VARCHAR(10) NOT NULL,
    stu_address VARCHAR(100) NOT NULL,
    stu_nic VARCHAR(50) NOT NULL,
    stu_birthday DATE NOT NULL,
    stu_status VARCHAR(20) NOT NULL,    --ACTIVE < INACTIVE
    stu_acc_created_date DATE NOT NULL,
    sem_id INT(5) NOT NULL, 
    level_id  INT(5) NOT NULL,
    dep_id INT(5) NOT NULL,
    batch_id INT(5) NOT NULL,
    FOREIGN KEY (sem_id) REFERENCES semester(sem_id),
    FOREIGN KEY (level_id) REFERENCES level(level_id),
    FOREIGN KEY (dep_id) REFERENCES department(dep_id),
    FOREIGN KEY (batch_id) REFERENCES batch(batch_id)

);

--create table medical
CREATE TABLE medical(
    medical_id INT PRIMARY KEY AUTO_INCREMENT,  --Given by sytem
    medical_course VARCHAR(25) NOT NULL,
    medical_reason TEXT NOT NULL,
    medical_ref_no VARCHAR(50) UNIQUE,
    submit_at DATETIME ,
    stu_id VARCHAR(25) NOT NULL ,
    course_code VARCHAR(50) NOT NULL,
    FOREIGN KEY (stu_id) REFERENCES student(stu_id),
    FOREIGN KEY (course_code) REFERENCES course(course_code)
);

--create table complains
CREATE TABLE complain(
    complain_id INT PRIMARY KEY AUTO_INCREMENT,  --given by system
    subject VARCHAR(50) NOT NULL, --title/topic
    complain_type VARCHAR(50);  --attendence/medical/exam/other
    reason TEXT NOT NULL,  --description
    status VARCHAR(20) NOT NULL, --Pending< in_progress< rejected
    create_time DATETIME ,
    resolved_time DATETIME ,
    admin_remark TEXT,  --admin response
    stu_id VARCHAR(25) NOT NULL,
    FOREIGN KEY (stu_id) REFERENCES student(stu_id)
);

--create table attendence_n
CREATE TABLE attendence_n(
    stu_id VARCHAR(25) NOT NULL,
    course_code VARCHAR(50) NOT NULL,
    lec_day INT(2) NOT NULL,
    day_ DATE NOT NULL,
    time_ TIME NOT NULL,
    attendence INT(1) NOT NULL,
    PRIMARY KEY(stu_id , course_code , lec_day),
    FOREIGN KEY (stu_id) REFERENCES student(stu_id),
    FOREIGN KEY (course_code) REFERENCES course(course_code)
);


