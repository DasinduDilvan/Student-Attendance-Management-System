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

 
$conn->query("
INSERT INTO admin (username, email, password)
VALUES ('admin', 'admin@tecsams.lk', 'admin');
");

 
$conn->query("
INSERT INTO department (dep_name, status) VALUES
('Information Communication Technology', 'ACTIVE'),
('Engineering Technology', 'ACTIVE'),
('Bio Systems Technology', 'ACTIVE');
");


$conn->query("
INSERT INTO batch (batch_name, status) VALUES
('2020/2021', 'active'),
('2021/2022', 'active'),
('2022/2023', 'active'),
('2023/2024', 'active');
");


$conn->query("
INSERT INTO level_semester
(level_id, level_name, sem_id, sem_name, dep_id, batch_id, status)
VALUES
-- Level 1
(1, 'Level 1', 1, 'Semester 1', 1, 4, 'active'),
(1, 'Level 1', 2, 'Semester 2', 1, 4, 'active'),

-- Level 2
(2, 'Level 2', 1, 'Semester 1', 1, 4, 'active'),
(2, 'Level 2', 2, 'Semester 2', 1, 4, 'active'),

-- Level 3
(3, 'Level 3', 1, 'Semester 1', 1, 4, 'active'),
(3, 'Level 3', 2, 'Semester 2', 1, 4, 'active'),

-- Level 4
(4, 'Level 4', 1, 'Semester 1', 1, 4, 'active'),
(4, 'Level 4', 2, 'Semester 2', 1, 4, 'active');
");

 
$conn->query("
INSERT INTO course
(course_id, course_code, course_name, lecture_days, credits, lecturer_hours,
 sem_id, level_id, dep_id)
VALUES
-- ICT : Level 1 Semester 1
(1, 'ICT1113', 'ICT Mathematics', 30, 3, 45, 1, 1, 1),
(2, 'ICT1123', 'Programming Fundamentals', 30, 3, 45, 1, 1, 1),
(3, 'ICT1133', 'Computer Systems', 30, 3, 45, 1, 1, 1),
(4, 'ICT1142', 'Communication Skills', 20, 2, 30, 1, 1, 1),

-- Others
(5, 'ICT2213', 'Data Structures', 30, 3, 45, 1, 2, 1),
(6, 'ET1113',  'Basic Electronics', 30, 3, 45, 1, 1, 2),
(7, 'SFT1113', 'Introduction to Software', 30, 3, 45, 1, 1, 3);
");




$conn->query("
INSERT INTO lecturer
(lec_reg_num, lec_fName, lec_mName, lec_lName, lec_email,
 lec_contact_num, lec_gender, lec_address, lec_nic,
 lec_birthday, lec_status, lec_acc_created_date)
VALUES
('LEC001', 'Nimal', 'K', 'Perera', 'nimal@ict.lk', '0771111111', 'Male',
 'Colombo', '901234567V', '1990-05-12', 'active', '2024-01-01'),

('LEC002', 'Kamal', 'S', 'Fernando', 'kamal@ict.lk', '0772222222', 'Male',
 'Gampaha', '891234568V', '1989-07-18', 'active', '2024-01-01'),

('LEC003', 'Sunil', 'M', 'Silva', 'sunil@et.lk', '0773333333', 'Male',
 'Kandy', '881234569V', '1988-03-22', 'active', '2024-01-01'),

('LEC004', 'Anusha', 'P', 'Jayasinghe', 'anusha@sft.lk', '0774444444', 'Female',
 'Matara', '921234560V', '1992-11-10', 'active', '2024-01-01');

");



$conn->query("
INSERT INTO lecturer_course (lec_id, course_code) VALUES
-- ICT lecturers
(1, 'ICT1113'),
(1, 'ICT1123'),
(2, 'ICT1133'),
(2, 'ICT1142'),
(1, 'ICT2213'),

-- ET
(3, 'ET1113'),

-- SFT
(4, 'SFT1113');

");


$conn->query("
INSERT INTO student
(stu_reg_num, stu_fname, stu_mname, stu_lname, stu_email,
 stu_contact_num, stu_gender, stu_address, stu_nic,
 stu_birthday, stu_status, stu_acc_created_date,
 sem_id, level_id, dep_id, batch_id)
VALUES
-- ICT11 (2023/2024)
('TG/2024/0001', 'Amal', 'R', 'Perera', 'amal@student.lk',
 '0711111111', 'Male', 'Colombo', '200012345678', '2000-02-10',
 'active', '2024-01-10', 1, 1, 1, 4),

('TG/2024/0002', 'Saman', 'T', 'Silva', 'saman@student.lk',
 '0712222222', 'Male', 'Galle', '200112345679', '2001-06-15',
 'active', '2024-01-10', 1, 1, 1, 4),

-- Others
('TG/2023/0001', 'Nadeesha', 'P', 'Fernando', 'nadeesha@student.lk',
 '0713333333', 'Female', 'Kandy', '199912345670', '1999-09-09',
 'active', '2023-01-10', 2, 1, 1, 3),

('TG/2022/0001', 'Kasun', 'L', 'Jayawardena', 'kasun@student.lk',
 '0714444444', 'Male', 'Kurunegala', '199812345671', '1998-12-12',
 'active', '2022-01-10', 1, 2, 1, 2);
");


$conn->query("
INSERT INTO medical
(medical_reason, medical_ref_no, submit_at, stu_id, course_code)
VALUES
('Fever', 'MED_TG2023_0001_01.jpg', '2025-01-10 09:30:00', 1, 'ICT1123'),
('Accident', 'MED_TG2023_0002_01.jpg', '2025-01-11 10:00:00', 2, 'ICT1133'),
('Hospitalized', 'MED_TG2022_0001_01.jpg', '2025-01-12 08:45:00', 3, 'ICT2213');
");


$conn->query("
INSERT INTO complains
(subject, complain_type, reason, create_time, resolved_time,
 admin_remark, stu_id, status)
VALUES
('Attendance Issue', 'Attendance', 'Marked absent incorrectly',
 '2025-01-15 09:00:00', NULL, NULL, 1, 'pending'),

('Lecture Clash', 'Schedule', 'Two lectures overlap',
 '2025-01-16 10:30:00', '2025-01-18 14:00:00',
 'Schedule adjusted', 2, 'resolved'),

('Medical Approval', 'Medical', 'Medical not approved yet',
 '2025-01-17 11:15:00', NULL, NULL, 3, 'pending');
");

echo "<br>✅ Test data inserted successfully!<br>";

$conn->close();

/*

INSERT INTO attendance_ICT11
(stu_id, course_code, lecture_no, lecture_date, attendance)
VALUES
-- ===============================
-- Student 1 : TG/2023/0001
-- ===============================

-- ICT1113
(1, 'ICT1113', 1, '2025-01-06', 1),
(1, 'ICT1113', 2, '2025-01-08', 1),

-- ICT1123
(1, 'ICT1123', 1, '2025-01-07', 1),
(1, 'ICT1123', 2, '2025-01-09', 0),

-- ICT1133
(1, 'ICT1133', 1, '2025-01-10', 1),
(1, 'ICT1133', 2, '2025-01-13', 1),

-- ICT1142
(1, 'ICT1142', 1, '2025-01-14', 1),
(1, 'ICT1142', 2, '2025-01-16', 1),

-- ===============================
-- Student 2 : TG/2023/0002
-- ===============================

-- ICT1113
(2, 'ICT1113', 1, '2025-01-06', 1),
(2, 'ICT1113', 2, '2025-01-08', 0),

-- ICT1123
(2, 'ICT1123', 1, '2025-01-07', 1),
(2, 'ICT1123', 2, '2025-01-09', 1),

-- ICT1133
(2, 'ICT1133', 1, '2025-01-10', 0),
(2, 'ICT1133', 2, '2025-01-13', 1),

-- ICT1142
(2, 'ICT1142', 1, '2025-01-14', 1),
(2, 'ICT1142', 2, '2025-01-16', 0);

*/

?>
