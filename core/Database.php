
<?PHP 

$username = "root";
$password = "";
$servername = "localhost";
//$database = "TECSAMS";

$conn = new mysqli($host, $username, $password);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }

$createdb = "CREATE DATABASE IF NOT EXISTS TECSAMS";

$usedb = "USE TECSAMS";

$createtables = "CREATE TABLE IF NOT EXISTS admin(
        id INT AUTO_INCREMENT,
        uname VARCHAR(20),
        email VARCHAR(50),
        pword VARCHAR(20),
    );
    
    -- create department table
    CREATE TABLE IF NOT EXISTS EXISTSdepartment(
        id INT AUTO_INCREMENT,
        Dep_ID INT(2),
        Dep_Name VARCHAR(100),
        Dep_Code VARCHAR(10),
        Dep_Status VARCHAR(10),
        PRIMARY KEY(Dep_ID)
    );

    -- create level table
    CREATE TABLE IF NOT EXISTS level(
        id INT AUTO_INCREMENT,
        level_ID INT(2),
        level_Name VARCHAR(100),
        level_Code VARCHAR(10),
        level_Status VARCHAR(10),
        PRIMARY KEY(level_ID)
    );

    --	 create semester table
    CREATE TABLE IF NOT EXISTS semester(
        id INT AUTO_INCREMENT,
        Sem_ID INT(2) NOT NULL,
        Level_ID INT(2),
        Dep_ID INT(2),
        Sem_Name VARCHAR(),
        PRIMARY KEY(Sem_ID, level_ID, Dep_ID),
        FOREIGN KEY(Dep_ID) REFERENCES department(Dep_ID),
        FOREIGN KEY(level_ID) REFERENCES level(level_ID),
    );

    -- 	create course table
    CREATE TABLE IF NOT EXISTS course(
        id INT AUTO_INCREMENT,
        Course_ID VARCHAR(7) NOT NULL,
        Sem_ID INT(2) ,
        Level_ID INT(2),
        Dep_ID INT(2),
        Course_Name VARCHAR(100) NOT NULL,
        Lecturer_ID VARCHAR(100),
        Credits INT(1),
        Lecture_hours INT(1),
        NoOfLectures INT(2),
        PRIMARY KEY (Course_ID),
        FOREIGN KEY(Sem_ID) REFERENCES semester(Sem_ID),
        FOREIGN KEY(level_ID) REFERENCES level(level_ID),
        FOREIGN KEY(Dep_ID) REFERENCES department(Dep_ID)
    );

    -- create student table
    CREATE TABLE IF NOT EXISTS student(
        id INT AUTO_INCREMENT,
        S_ID VARCHAR(12),
        fName VARCHAR(20),
        mName VARCHAR(20),
        lName VARCHAR(20),
        S_email VARCHAR(50),
        S_password VARCHAR(20),
        TECMIS_Uname VARCHAR(6),
        TECMIS_Pword VARCHAR(20),
        S_address VARCHAR(150),
        S_NIC INT(12),
        S_gender VARCHAR(6),
        S_birthday DATE,
        S_AccYear VARCHAR(10),
        S_contact VARCHAR(10),
        S_RegDate DATETIME,
        S_Status VARCHAR(10),
        Sem_ID INT(2) ,
        Level_ID INT(2),
        Dep_ID INT(2),
        PRIMARY KEY(S_ID),
        FOREIGN KEY(Sem_ID) REFERENCES semester(Sem_ID),
        FOREIGN KEY(level_ID) REFERENCES level(level_ID),
        FOREIGN KEY(Dep_ID) REFERENCES department(Dep_ID)
    );

    -- create lecturer table
    CREATE TABLE IF NOT EXISTS lecturer(
        id INT AUTO_INCREMENT,
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

    -- this attendence tables are dynamic thats why they will create once the admin create a semester in level in department
    -- attendance-ICT11 = Sem_ID * Level_ID * Dep_ID
    -- attendance-ICT12 = Sem_ID * Level_ID * Dep_ID
    -- attendance-ICT21 = Sem_ID * Level_ID * Dep_ID
    -- attendance-ICT22 = Sem_ID * Level_ID * Dep_ID

    --CREATE TABLE IF NOT EXISTS attendance-N(
    --    id INT AUTO_INCREMENT,
    --    S_ID VARCHAR(12),
    --    Course_ID VARCHAR(7),
    --    Lecture_Day INT(2),
    --    Date DATE(),
    --    attendance INT(1) NOT NULL,
    --    PRIMARY KEY(S_ID, Course_ID, Lecture_Day),
    --    FOREIGN KEY(S_ID) REFERENCES student(S_ID),
    --    FOREIGN KEY(Course_ID) REFERENCES course(Course_ID)
    --);

    -- create medical table
    CREATE TABLE IF NOT EXISTS medical(
        id INT AUTO_INCREMENT,
        Medical_ID INT(10),
        Absent_Course VARCHAR(7),
        Absent_date DATE(),
        Medical_Reason VARHAR(250),
        Med_Ref_No VARCHAR(10),
        Medical_State VARCHAR(10),
        PRIMARY KEY(Medical_ID),
        FOREIGN KEY(Absent_Course) REFERENCES course(Course_ID)
    );

    -- create complain table
    CREATE TABLE IF NOT EXISTS complain(
        id INT AUTO_INCREMENT,
        complain_ID INT(10),
        SendAs VARCHAR(12),
        complain_title VARCHAR(50),
        complain_discription VARCHAR(250),
        complain_dateTime DATETIME(), 
        Complain_State VARCHAR(10)
        PRIMARY KEY(complain_ID)
    );

";

if(mysqli_query($conn, $createdb)){
    echo "DB Created !";
    if(mysqli_query($conn, $usedb)){
        echo "DB is Ready ! ";
        if(mysqli_query($conn, $createtables)){
            echo "All tables Created ! ";
        }
        else{
            echo "Table Creation Issue ! ".mysqli_error($conn);
        }
    }
    else{
        echo "DB is not Ready ! ".mysqli_error($conn); 
    }
}
else{
    echo "BD Not Created ! " . mysqli_error($conn);
}


mysqli_close($conn);

?>