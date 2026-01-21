
<?PHP 

$username = "root";
$password = "";
$servername = "localhost";
//$database = "TECSAMS";

$conn = new mysqli($servername, $username, $password);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$createdb = "CREATE DATABASE IF NOT EXISTS TECSAMS";

if(mysqli_query($conn, $createdb)){
    echo "DB Created!<br>";
    
    // Select the database
    mysqli_select_db($conn, "TECSAMS");

$createtables = "CREATE TABLE IF NOT EXISTS admin(
        id INT AUTO_INCREMENT,
        uname VARCHAR(20),
        email VARCHAR(50),
        pword VARCHAR(255),
        PRIMARY KEY(id)
    );
    
    -- create department table
    CREATE TABLE IF NOT EXISTS department(
        Dep_ID INT(2),
        Dep_Name VARCHAR(100),
        Dep_Code VARCHAR(10),
        Dep_Status VARCHAR(10),
        PRIMARY KEY(Dep_ID)
    );

    -- create level table
    CREATE TABLE IF NOT EXISTS level(
        level_ID INT(2),
        level_Name VARCHAR(100),
        level_Code VARCHAR(10),
        level_Status VARCHAR(10),
        PRIMARY KEY(level_ID)
    );

    --	 create semester table
    CREATE TABLE IF NOT EXISTS semester(
        Sem_ID INT(2) NOT NULL,
        Level_ID INT(2) NOT NULL,
        Dep_ID INT(2) NOT NULL,
        Sem_Name VARCHAR(50) NOT NULL,
        PRIMARY KEY(Sem_ID, level_ID, Dep_ID),
        FOREIGN KEY(Dep_ID) REFERENCES department(Dep_ID),
        FOREIGN KEY(level_ID) REFERENCES level(level_ID)
    );

    -- 	create course table
    CREATE TABLE IF NOT EXISTS course(
        Course_ID VARCHAR(7) NOT NULL,
        Sem_ID INT(2) ,
        Level_ID INT(2),
        Dep_ID INT(2),
        Course_Name VARCHAR(100) NOT NULL,
        Lecturer_ID VARCHAR(100),
        Credits INT(1),
        Lecture_hours INT(2),
        NoOfLectures INT(2),
        PRIMARY KEY (Course_ID),
        FOREIGN KEY(Sem_ID) REFERENCES semester(Sem_ID),
        FOREIGN KEY(level_ID) REFERENCES level(level_ID),
        FOREIGN KEY(Dep_ID) REFERENCES department(Dep_ID)
    );

    -- create student table
    CREATE TABLE IF NOT EXISTS student(
        S_ID VARCHAR(12),
        fName VARCHAR(20),
        mName VARCHAR(20),
        lName VARCHAR(20),
        S_email VARCHAR(50),
        S_password VARCHAR(255),
        TECMIS_Uname VARCHAR(6),
        TECMIS_Pword VARCHAR(255),
        S_address VARCHAR(150),
        S_NIC VARCHAR(12),
        S_gender VARCHAR(6),
        S_birthday DATE,
        S_AccYear VARCHAR(10),
        S_contact VARCHAR(10),
        S_RegDate DATETIME DEFAULT CURRENT_TIMESTAMP,
        S_Status VARCHAR(10),
        Sem_ID INT(2) ,
        Level_ID INT(2),
        Dep_ID INT(2),
        PRIMARY KEY(S_ID),
        FOREIGN KEY(Sem_ID) REFERENCES semester(Sem_ID),
        FOREIGN KEY(Level_ID) REFERENCES level(level_ID),
        FOREIGN KEY(Dep_ID) REFERENCES department(Dep_ID)
    );

    -- create lecturer table
    CREATE TABLE IF NOT EXISTS lecturer(
        L_ID VARCHAR(12),
        fName VARCHAR(20),
        mName VARCHAR(20),
        lName VARCHAR(20),
        L_NIC VARCHAR(12),
        L_gender VARCHAR(6),
        L_address VARCHAR(150),
        L_birthday DATE,
        L_email VARCHAR(50),
        S_contact VARCHAR(10),
        S_RegDate DATETIME,
        S_Status VARCHAR(10),
        PRIMARY KEY(L_ID)
    );


    -- create medical table
    CREATE TABLE IF NOT EXISTS medical(
        Medical_ID INT AUTO_INCREMENT,
        S_ID VARCHAR(12),
        Absent_Course VARCHAR(7),
        Absent_date DATE,
        Medical_Reason VARCHAR(250),
        Med_Ref_No VARCHAR(10),
        Medical_State VARCHAR(10),
        PRIMARY KEY(Medical_ID),
        FOREIGN KEY(Absent_Course) REFERENCES course(Course_ID),
        FOREIGN KEY(S_ID) REFERENCES student(S_ID)
    );

    -- create complain table
    CREATE TABLE IF NOT EXISTS complain(
        complain_ID INT AUTO_INCREMENT,
        SendAs VARCHAR(12),
        complain_title VARCHAR(50),
        complain_discription VARCHAR(250),
        complain_dateTime DATETIME DEFAULT CURRENT_TIMESTAMP, 
        Complain_State VARCHAR(10),
        PRIMARY KEY(complain_ID)
    );

";


$queries = explode(';', $createtables);
    
foreach($queries as $query) {
    if(trim($query) != '') {
        if(mysqli_query($conn, $query)) {
            echo "Table created successfully<br>";
        } else {
            echo "Error creating table: " . mysqli_error($conn) . "<br>";
        }
    }
}

echo "All tables Created (or already exist)!<br>";
}
else{
echo "DB Not Created! " . mysqli_error($conn);
}

mysqli_close($conn);



/*
 this attendence tables are dynamic thats why they will create once the admin create a semester in level in department
 attendance-ICT11 = Sem_ID * Level_ID * Dep_ID
 attendance-ICT12 = Sem_ID * Level_ID * Dep_ID
 attendance-ICT21 = Sem_ID * Level_ID * Dep_ID
 attendance-ICT22 = Sem_ID * Level_ID * Dep_ID

CREATE TABLE IF NOT EXISTS ICT11(
    S_ID VARCHAR(12),
    Course_ID VARCHAR(7),
    Lecture_Day INT(2),
    Date DATE,
    attendance INT(1) NOT NULL,
    PRIMARY KEY(S_ID, Course_ID, Lecture_Day),
    FOREIGN KEY(S_ID) REFERENCES student(S_ID),
    FOREIGN KEY(Course_ID) REFERENCES course(Course_ID)
);


INSERT INTO ICT11
(S_ID, Course_ID, Lecture_Day, Date, attendance)
VALUES
('TG/2022/0001', 'ICT101', 1, '2025-01-08', 1),
('TG/2022/0001', 'ICT101', 2, '2025-01-10', 0),
('TG/2023/1002', 'ICT101', 1, '2025-01-08', 1),
('TG/2023/1002', 'ICT101', 2, '2025-01-10', 1),
('TG/2024/2003', 'ICT101', 1, '2025-01-08', 0),
('TG/2024/2003', 'ICT101', 2, '2025-01-10', 1);


INSERT INTO ICT11
(S_ID, Course_ID, Lecture_Day, Date, attendance)
VALUES
-- TG/2022/0001
('TG/2022/0001', 'ICT101', 3, '2025-01-08', 1),
('TG/2022/0001', 'ICT101', 4, '2025-01-10', 1),
('TG/2022/0001', 'ICT102', 3, '2025-01-09', 1),
('TG/2022/0001', 'ICT102', 4, '2025-01-16', 1),
('TG/2022/0001', 'ICT103', 3, '2025-01-11', 0),
('TG/2022/0001', 'ICT103', 4, '2025-01-18', 1),

-- TG/2023/1002
('TG/2023/1002', 'ICT101', 3, '2025-01-08', 1),
('TG/2023/1002', 'ICT101', 4, '2025-01-10', 1),
('TG/2023/1002', 'ICT102', 3, '2025-01-09', 0),
('TG/2023/1002', 'ICT102', 4, '2025-01-16', 1),
('TG/2023/1002', 'ICT103', 3, '2025-01-11', 1),
('TG/2023/1002', 'ICT103', 4, '2025-01-18', 1),

-- TG/2024/2003
('TG/2024/2003', 'ICT101', 3, '2025-01-08', 0),
('TG/2024/2003', 'ICT101', 4, '2025-01-10', 1),
('TG/2024/2003', 'ICT102', 3, '2025-01-09', 1),
('TG/2024/2003', 'ICT102', 4, '2025-01-16', 1),
('TG/2024/2003', 'ICT103', 3, '2025-01-11', 0),
('TG/2024/2003', 'ICT103', 4, '2025-01-18', 1);

*/


?>
