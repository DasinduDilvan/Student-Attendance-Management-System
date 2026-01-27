-- Active: 1767470950022@@127.0.0.1@3306@student_attenance_management_system

--admin 
    --department
        --batch
            --level_semseter    
                    --course
                            --lecturer
                                --lecturer_course < M:N
                                    --medical
                                    --complaince
                                    --attendence_n
                                    
CREATE DATABASE Student_Attenance_Management_System ;
USE  Student_Attenance_Management_System ;

--create table admin
CREATE TABLE admin(
    username VARCHAR(50) NOT NULL,
    email VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL
);

--create table  *status ACTIVE < INACTIVE

CREATE TABLE department(
    dep_id INT AUTO_INCREMENT PRIMARY KEY ,
    dep_name VARCHAR(100) NOT NULL,
    status VARCHAR(20) NOT NULL        

);

--create table batch <status = ACTIVE < COMPLETED>
CREATE TABLE batch(
    batch_id INT AUTO_INCREMENT PRIMARY KEY , 
    batch_name VARCHAR(50) NOT NULL,    
    status VARCHAR(20) NOT NULL        
);

--create table level_semester
CREATE TABLE level_semester(
    level_id INT(2) NOT NULL,  
    Level_name VARCHAR(50) NOT NULL,
    sem_id INT(2) NOT NULL , 
    sem_name VARCHAR(50) NOT NULL,
    dep_id INT NOT NULL,
    batch_id INT NOT NULL,
    status VARCHAR(50) NOT NULL,
    PRIMARY KEY(level_id , sem_id),
    FOREIGN KEY(dep_id) REFERENCES department(dep_id),
    FOREIGN KEY(batch_id) REFERENCES batch(batch_id)
);


--create table course
CREATE TABLE course(
    course_id INT(10),
    course_code VARCHAR(50) PRIMARY KEY,  
    course_name VARCHAR(50) NOT NULL,
    credits INT(5) NOT  NULL,
    lecturer_hours INT(5) NOT NULL,
    lecturer_days INT(5) NOT NULL ,
    sem_id INT(2) NOT NULL , 
    level_id  INT(2)NOT NULL,
    dep_id INT NOT NULL,
    FOREIGN KEY (level_id,sem_id) REFERENCES level_semester(level_id , sem_id),
    FOREIGN KEY(dep_id) REFERENCES department(dep_id)
);

--create table lecturer
CREATE TABLE lecturer(
    lec_id INT(5) AUTO_INCREMENT PRIMARY KEY NOT NULL, 
    lec_reg_num VARCHAR(25) NOT NULL,
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
    lec_acc_created_date DATE NOT NULL 
);

--create table lecturer_course
CREATE TABLE lecturer_course(
    lec_id INT(5) NOT NULL ,
    course_code VARCHAR(50) NOT NULL,
    PRIMARY KEY(lec_id , course_code),
    FOREIGN KEY (lec_id) REFERENCES lecturer(lec_id),
    FOREIGN KEY (course_code) REFERENCES course(course_code)

);

--create table student <stu_reg_num=TG/XXXX/XXXX>
CREATE TABLE student(
    stu_id  INT AUTO_INCREMENT PRIMARY KEY UNIQUE,  
    stu_reg_num VARCHAR(25) NOT NULL ,
    stu_fname VARCHAR(50) NOT NULL,
    stu_mname VARCHAR(50) NOT NULL,
    stu_lname VARCHAR(50) NOT NUlL,
    stu_email VARCHAR(50) NOT NULL,
    stu_contact_num VARCHAR(20) NOT NULL,
    stu_gender VARCHAR(10) NOT NULL,
    stu_address VARCHAR(100) NOT NULL,
    stu_nic VARCHAR(50) NOT NULL,
    stu_birthday DATE NOT NULL,
    stu_status VARCHAR(20) NOT NULL, 
    stu_acc_created_date DATE NOT NULL,
    sem_id INT(2) NOT NULL, 
    level_id  INT(2) NOT NULL,
    dep_id INT(5) NOT NULL,
    batch_id INT(5) NOT NULL,
    FOREIGN KEY (level_id , sem_id) REFERENCES level_semester(level_id,sem_id),
    FOREIGN KEY (dep_id) REFERENCES department(dep_id),
    FOREIGN KEY (batch_id) REFERENCES batch(batch_id)
);

--create table medical
CREATE TABLE medical(
    medical_id INT PRIMARY KEY AUTO_INCREMENT,
    medical_reason TEXT NOT NULL,
    medical_ref_no VARCHAR(50) UNIQUE,
    submit_at DATETIME ,
    stu_id INT NOT NULL ,
    course_code VARCHAR(50) NOT NULL,
    FOREIGN KEY (stu_id) REFERENCES student(stu_id),
    FOREIGN KEY (course_code) REFERENCES course(course_code)
);

--create table complains
CREATE TABLE complains(
    complain_id INT AUTO_INCREMENT PRIMARY KEY,  
    subject VARCHAR(50) NOT NULL, 
    complain_type VARCHAR(50), 
    reason TEXT NOT NULL, 
    create_time DATETIME ,
    resolved_time DATETIME ,
    admin_remark TEXT,
    stu_id INT NOT NULL,
    status VARCHAR(20) NOT NULL,
    FOREIGN KEY (stu_id) REFERENCES student(stu_id)
);

--create table attendence_n
CREATE TABLE attendence_n(
    stu_id INT NOT NULL,
    course_code VARCHAR(50) NOT NULL,
    lec_day INT(2) NOT NULL,
    daytime DATETIME NOT NULL,
    attendence VARCHAR(20) NOT NULL,
    PRIMARY KEY(stu_id , course_code , lec_day),
    FOREIGN KEY (stu_id) REFERENCES student(stu_id),
    FOREIGN KEY (course_code) REFERENCES course(course_code)
);


