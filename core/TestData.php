<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "TECSAMS";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

echo "Connected successfully<br>";

/* =======================
   ADMIN (2)
======================= */
$conn->query("
INSERT INTO admin (uname, email, pword) VALUES
('admin1', 'admin1@test.com', 'admin123'),
('admin2', 'admin2@test.com', 'admin123')
");

/* =======================
   DEPARTMENT (3)
======================= */
$conn->query("
INSERT INTO department (Dep_ID, Dep_Name, Dep_Code, Dep_Status) VALUES
(1, 'Information Communication Technology', 'ICT', 'ACTIVE'),
(2, 'Engineering Technology', 'ET', 'ACTIVE'),
(3, 'Bio Systems Technology', 'BST', 'ACTIVE')
");

/* =======================
   LEVEL (2)
======================= */
$conn->query("
INSERT INTO level (level_ID, level_Name, level_Code, level_Status) VALUES
(1, 'Level 1', 'L1', 'ACTIVE'),
(2, 'Level 2', 'L2', 'ACTIVE')
");

/* =======================
   SEMESTER (2)
======================= */
$conn->query("
INSERT INTO semester (Sem_ID, Level_ID, Dep_ID, Sem_Name) VALUES
(1, 1, 1, 'Semester 1'),
(1, 2, 2, 'Semester 1'),
(2, 2, 3, 'Semester 2')
");

/* =======================
   COURSE (3)
======================= */
$conn->query("
INSERT INTO course (Course_ID, Sem_ID, Level_ID, Dep_ID, Course_Name, Credits) VALUES
('ICT101', 1, 1, 1, 'Programming Fundamentals', 3),
('ET201', 1, 2, 2, 'Electronics', 3),
('BST202', 2, 2, 3, 'Microbiology', 3)
");

/* =======================
   STUDENT (5)
======================= */
$conn->query("
INSERT INTO student (
    S_ID, fName, mName, lName, S_email, S_password,
    TECMIS_Uname, TECMIS_Pword, S_gender,
    Sem_ID, Level_ID, Dep_ID, S_Status
) VALUES
('TG/2022/0001','Kamal','N','Perera','kamal@test.com','123','tg0001','123','M',1,1,1,'ACTIVE'),
('TG/2023/1002','Nimal','A','Silva','nimal@test.com','123','tg1002','123','M',1,1,1,'ACTIVE'),
('TG/2024/2003','Saman','K','Fernando','saman@test.com','123','tg2003','123','M',1,1,1,'ACTIVE'),
('TG/2023/3004','Sunil','P','Jayasinghe','sunil@test.com','123','tg3004','123','M',1,2,2,'ACTIVE'),
('TG/2024/4005','Amali','S','Gunasekara','amali@test.com','123','tg4005','123','F',2,2,3,'ACTIVE')
");

/* =======================
   LECTURER (3)
======================= */
$conn->query("
INSERT INTO lecturer (
    L_ID, fName, mName, lName, L_email, S_Status
) VALUES
('ICT25','Nuwan','K','Perera','nuwan@ict.lk','ACTIVE'),
('ET12','Ruwan','M','Silva','ruwan@et.lk','ACTIVE'),
('BST31','Chathura','P','Fernando','chathura@bst.lk','ACTIVE')
");

/* =======================
   MEDICAL (3)
======================= */
$conn->query("
INSERT INTO medical (
    S_ID, Absent_Course, Absent_date,
    Medical_Reason, Med_Ref_No, Medical_State
) VALUES
('TG/2022/0001','ICT101','2025-01-10','Fever','MED001','APPROVED'),
('TG/2023/1002','ET201','2025-01-12','Headache','MED002','PENDING'),
('TG/2024/2003','BST202','2025-01-15','Hospitalized','MED003','APPROVED')
");

/* =======================
   COMPLAIN (3)
======================= */
$conn->query("
INSERT INTO complain (
    SendAs, complain_title, complain_discription, Complain_State
) VALUES
('STUDENT','Attendance Issue','Attendance not updated','OPEN'),
('LECTURER','System Error','Unable to upload marks','OPEN'),
('STUDENT','Medical Approval','Medical still pending','CLOSED')
");

echo "<br>✅ Test data inserted successfully!<br>";

$conn->close();
?>
