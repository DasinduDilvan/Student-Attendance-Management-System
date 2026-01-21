
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
        username VARCHAR(50) NOT NULL,
        email VARCHAR(50) NOT NULL,
        password VARCHAR(255) NOT NULL
    );
    
    CREATE TABLE IF NOT EXISTS department(
        dep_id INT AUTO_INCREMENT PRIMARY KEY,
        dep_code VARCHAR(10) NOT NULL,
        dep_name VARCHAR(100) NOT NULL,
        status VARCHAR(20) NOT NULL
    );
    
    CREATE TABLE IF NOT EXISTS batch(
        batch_id INT AUTO_INCREMENT PRIMARY KEY,
        batch_name VARCHAR(50) NOT NULL,
        status VARCHAR(20) NOT NULL
    );
    
    CREATE TABLE IF NOT EXISTS level_semester(
        level_id INT(2) NOT NULL,
        level_name VARCHAR(50) NOT NULL,
        sem_id INT(2) NOT NULL,
        sem_name VARCHAR(50) NOT NULL,
        dep_id INT NOT NULL,
        batch_id INT NOT NULL,
        status VARCHAR(50) NOT NULL,
        PRIMARY KEY(level_id, sem_id),
        FOREIGN KEY(dep_id) REFERENCES department(dep_id),
        FOREIGN KEY(batch_id) REFERENCES batch(batch_id)
    );
    
    CREATE TABLE IF NOT EXISTS course(
        course_id INT,
        course_code VARCHAR(50) PRIMARY KEY,
        course_name VARCHAR(50) NOT NULL,
        lecture_days INT NOT NULL,
        credits INT NOT NULL,
        lecturer_hours INT NOT NULL,
        sem_id INT(2) NOT NULL,
        level_id INT(2) NOT NULL,
        dep_id INT NOT NULL,
        FOREIGN KEY (level_id, sem_id) REFERENCES level_semester(level_id, sem_id),
        FOREIGN KEY (dep_id) REFERENCES department(dep_id)
    );
    
    CREATE TABLE IF NOT EXISTS lecturer(
        lec_id INT AUTO_INCREMENT PRIMARY KEY,
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
        lec_acc_created_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    );
    
    CREATE TABLE IF NOT EXISTS lecturer_course(
        lec_id INT NOT NULL,
        course_code VARCHAR(50) NOT NULL,
        PRIMARY KEY(lec_id, course_code),
        FOREIGN KEY (lec_id) REFERENCES lecturer(lec_id),
        FOREIGN KEY (course_code) REFERENCES course(course_code)
    );
    
    CREATE TABLE IF NOT EXISTS student(
        stu_id INT AUTO_INCREMENT PRIMARY KEY,
        stu_reg_num VARCHAR(25) NOT NULL,   
        stu_fname VARCHAR(50) NOT NULL,
        stu_mname VARCHAR(50) NOT NULL,
        stu_lname VARCHAR(50) NOT NULL,
        stu_email VARCHAR(50) NOT NULL,
        stu_contact_num VARCHAR(20) NOT NULL,
        stu_gender VARCHAR(10) NOT NULL,
        stu_address VARCHAR(100) NOT NULL,
        stu_nic VARCHAR(50) NOT NULL,
        stu_birthday DATE NOT NULL,
        stu_status VARCHAR(20) NOT NULL,
        stu_acc_created_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        sem_id INT(2) NOT NULL,
        level_id INT(2) NOT NULL,
        dep_id INT NOT NULL,
        batch_id INT NOT NULL,
        FOREIGN KEY (level_id, sem_id) REFERENCES level_semester(level_id, sem_id),
        FOREIGN KEY (dep_id) REFERENCES department(dep_id),
        FOREIGN KEY (batch_id) REFERENCES batch(batch_id)
    );
    
    CREATE TABLE IF NOT EXISTS medical(
        medical_id INT AUTO_INCREMENT PRIMARY KEY,
        medical_reason TEXT NOT NULL,
        medical_ref_no VARCHAR(50) UNIQUE,
        submit_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        stu_id INT NOT NULL,
        lec_day DATE NOT NULL,
        course_code VARCHAR(50) NOT NULL,
        FOREIGN KEY (stu_id) REFERENCES student(stu_id),
        FOREIGN KEY (course_code) REFERENCES course(course_code)
    );
    
    CREATE TABLE IF NOT EXISTS complains(
        complain_id INT AUTO_INCREMENT PRIMARY KEY,
        subject VARCHAR(50) NOT NULL,
        complain_type VARCHAR(50),
        reason TEXT NOT NULL,
        create_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        resolved_time DATETIME,
        admin_remark TEXT,
        stu_id INT NOT NULL,
        status VARCHAR(20) NOT NULL,
        FOREIGN KEY (stu_id) REFERENCES student(stu_id)
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
*//*

CREATE TABLE IF NOT EXISTS attendance_ICT11 (
    stu_id INT NOT NULL,
    course_code VARCHAR(50) NOT NULL,
    lecture_no INT NOT NULL,
    lecture_date DATE NOT NULL,
    attendance INT(1) NOT NULL,
    PRIMARY KEY (stu_id, course_code, lecture_no),
    FOREIGN KEY (stu_id) REFERENCES student(stu_id),
    FOREIGN KEY (course_code) REFERENCES course(course_code)
);

*/



?>
