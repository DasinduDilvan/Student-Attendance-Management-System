--insert data into table admin
INSERT INTO admin(username , email ,  password ) 
VALUES ("dulsha" ,"dulsha@gmail.com" ,"@1234");

--insert data into table department
INSERT INTO department(dep_id , dep_name , status) 
VALUES ("1" , "Engineering Technology" , "ACTIVE") , ("2" , "Information and Communication Technology" , "ACTIVE");

--insert data into table batch
INSERT INTO batch(batch_name , status) 
VALUES ( "1st batch" , "COMPLETED") ,( "2nd batch" , "COMPLETED") , ( "3rd batch" , "COMPLETED") , ( "4th batch" , "COMPLETED") , ( "5th batch" , "COMPLETED") ,
( "6th batch" , "ACTIVE") , ( "7th batch" , "ACTIVE") , ( "8th batch" , "ACTIVE") , ( "9th batch" , "AVTIVE") ;

--insert data into table level_semester
INSERT INTO level_semester(level_id , Level_name , sem_id , sem_name , dep_id , batch_id , status) 
VALUES ("1" , "level 1" , "1" , "semester 1" , "1" , "9" , "ACTIVE");

--insert data into table course
INSERT INTO course(course_id , course_code , course_name , credits , lecturer_hours , sem_id , level_id , dep_id) 
VALUES ("1" , "ICT1112" , "Fundamentals of ICT and Information Systems" , "2" , "2" , "1" , "1" , "2"),
("2" , "ICT1121" , "Introduction to multimedia Technologies" , "1" , "2" , "1" , "1" , "2");

--insert data into lecturer
INSERT INTO lecturer(lec_id,lec_reg_num,lec_fName,lec_mName,lec_lName,lec_email,lec_contact_num,lec_gender,lec_address,lec_nic,lec_birthday,lec_status,lec_acc_created_date) 
VALUES ("1" , "LEC/2501","Nimal" , "Laksiri" ,"Witharana" , "phpnlaksiri@ictec.ruh.ac.lk" , "0715460438", "Male" ,"No 51,Rathmalana,Colombo" ,"200477202530" , "1994-08-13", "ACTIVE" , "2026-01-03" );

--insert data into lecturer_course
INSERT INTO lecturer_course(lec_reg_num,course_code) 
VALUES ("LEC/2501","ICT1112");

--insert data into student
INSERT INTO student(stu_id,stu_reg_num,stu_fname,stu_mname,stu_lname,stu_email,stu_contact_num,stu_gender,stu_address,stu_nic,stu_birthday,stu_status,stu_acc_created_date,sem_id,level_id,dep_id,batch_id) 
VALUES ("TG/2024/2107","1","Dulsha","Hemini","Hettivitharana","dulshahemini@gmail.com","0772527917","Female","Kekanadura,Matara","200520257730","2004-09-28","ACTIVE","2025-01-03","1","1","2","9");

--insert data into medical
INSERT INTO medical(medical_id, medical_reason,medical_ref_no,submit_at,stu_id,course_code) 
VALUES ("1","Fever","ME123456789","2025-01-03 19:50:00" , "TG/2024/2107","ICT1112");

--insert data into complains
INSERT INTO complains(complain_id,subject,complain_type,reason,create_time,stu_id,status)
VALUES ("1","Attendance issue","Attendance","My attendance for DBMS on 2025-03-12 is marked absent but I was present." ,"2025-01-03 19:50:00" , "TG/2024/2107","PENDING")

--insert data into attendence_n
INSERT INTO attendence_n(stu_id,course_code,lec_day,daytime,attendence)
VALUES ("TG/2024/2107","ICT1112","1","2025-01-01 08:00:00","ABSENT");