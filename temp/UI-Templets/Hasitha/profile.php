<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>University Student Profile</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Roboto:wght@300;400;500&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f8f9fa;
            color: #333;
            line-height: 1.6;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        header {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
            margin-bottom: 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            display: flex;
            align-items: center;
        }

        .logo i {
            font-size: 28px;
            color: #1a73e8;
            margin-right: 10px;
        }

        .logo h1 {
            font-family: 'Poppins', sans-serif;
            font-weight: 600;
            color: #1a73e8;
            font-size: 24px;
        }

        .header-actions {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .search-bar {
            display: flex;
            align-items: center;
            background-color: #f8f9fa;
            padding: 8px 15px;
            border-radius: 50px;
            border: 1px solid #e0e0e0;
        }

        .search-bar input {
            border: none;
            background: transparent;
            padding: 0 10px;
            width: 200px;
            font-size: 14px;
        }

        .search-bar input:focus {
            outline: none;
        }

        .search-bar i {
            color: #777;
        }

        .notification-icon {
            position: relative;
            font-size: 20px;
            color: #555;
            cursor: pointer;
        }

        .notification-icon::after {
            content: '3';
            position: absolute;
            top: -5px;
            right: -5px;
            background-color: #ff4757;
            color: white;
            font-size: 12px;
            width: 18px;
            height: 18px;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .user-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: #1a73e8;
            color: white;
            display: flex;
            justify-content: center;
            align-items: center;
            font-weight: 600;
            cursor: pointer;
        }

        .main-content {
            display: flex;
            flex-wrap: wrap;
            gap: 30px;
        }

        .profile-sidebar {
            flex: 1;
            min-width: 300px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
            padding: 25px;
            text-align: center;
        }

        .profile-image-container {
            margin-bottom: 25px;
        }

        .profile-image {
            width: 160px;
            height: 160px;
            border-radius: 50%;
            object-fit: cover;
            border: 5px solid #f0f7ff;
            margin: 0 auto 15px;
            display: block;
        }

        .upload-photo {
            background-color: #f0f7ff;
            color: #1a73e8;
            border: none;
            padding: 8px 15px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
            font-weight: 500;
            transition: background-color 0.3s;
        }

        .upload-photo:hover {
            background-color: #e1edff;
        }

        .profile-name {
            font-family: 'Poppins', sans-serif;
            font-size: 24px;
            font-weight: 600;
            margin-bottom: 5px;
            color: #333;
        }

        .profile-major {
            color: #1a73e8;
            font-weight: 500;
            margin-bottom: 15px;
            font-size: 18px;
        }

        .profile-id {
            color: #777;
            font-size: 14px;
            margin-bottom: 25px;
        }

        .profile-stats {
            display: flex;
            justify-content: space-around;
            margin-bottom: 30px;
            padding-top: 20px;
            border-top: 1px solid #eee;
        }

        .stat-item {
            text-align: center;
        }

        .stat-value {
            font-size: 24px;
            font-weight: 600;
            color: #1a73e8;
            margin-bottom: 5px;
        }

        .stat-label {
            font-size: 14px;
            color: #777;
        }

        .contact-info {
            text-align: left;
            margin-top: 20px;
        }

        .contact-item {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
        }

        .contact-icon {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            background-color: #f0f7ff;
            display: flex;
            justify-content: center;
            align-items: center;
            margin-right: 15px;
            color: #1a73e8;
        }

        .contact-details h4 {
            font-size: 14px;
            color: #777;
            font-weight: 400;
            margin-bottom: 3px;
        }

        .contact-details p {
            font-weight: 500;
            color: #333;
        }

        .profile-main {
            flex: 2;
            min-width: 300px;
        }

        .section {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
            padding: 25px;
            margin-bottom: 30px;
        }

        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 1px solid #eee;
        }

        .section-title {
            font-family: 'Poppins', sans-serif;
            font-size: 20px;
            font-weight: 600;
            color: #333;
        }

        .edit-btn {
            background-color: #f0f7ff;
            color: #1a73e8;
            border: none;
            padding: 8px 15px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
            font-weight: 500;
            transition: background-color 0.3s;
        }

        .edit-btn:hover {
            background-color: #e1edff;
        }

        .info-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 20px;
        }

        .info-item {
            margin-bottom: 15px;
        }

        .info-label {
            font-size: 14px;
            color: #777;
            margin-bottom: 5px;
        }

        .info-value {
            font-weight: 500;
            color: #333;
        }

        .courses-list {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .course-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px;
            border-radius: 8px;
            background-color: #f8f9fa;
            transition: transform 0.2s;
        }

        .course-item:hover {
            transform: translateY(-2px);
            box-shadow: 0 3px 8px rgba(0, 0, 0, 0.05);
        }

        .course-info h4 {
            font-weight: 600;
            margin-bottom: 5px;
        }

        .course-info p {
            font-size: 14px;
            color: #777;
        }

        .course-grade {
            font-weight: 600;
            font-size: 18px;
            color: #1a73e8;
        }

        .skills-list {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }

        .skill-tag {
            background-color: #f0f7ff;
            color: #1a73e8;
            padding: 8px 15px;
            border-radius: 50px;
            font-size: 14px;
            font-weight: 500;
        }

        .achievements-container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }

        .achievement-item {
            flex: 1;
            min-width: 200px;
            background-color: #f8f9fa;
            padding: 20px;
            border-radius: 8px;
            text-align: center;
        }

        .achievement-icon {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background-color: #e1edff;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0 auto 15px;
            color: #1a73e8;
            font-size: 20px;
        }

        .achievement-item h4 {
            margin-bottom: 5px;
        }

        .achievement-item p {
            font-size: 14px;
            color: #777;
        }

        footer {
            text-align: center;
            padding: 20px;
            color: #777;
            font-size: 14px;
            margin-top: 30px;
            border-top: 1px solid #eee;
        }

        @media (max-width: 768px) {
            .main-content {
                flex-direction: column;
            }
            
            .header-actions {
                display: none;
            }
            
            .info-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <header>
            <div class="logo">
                <i class="fas fa-university"></i>
                <h1>University Portal</h1>
            </div>
            <div class="header-actions">
                <div class="search-bar">
                    <i class="fas fa-search"></i>
                    <input type="text" placeholder="Search students, courses...">
                </div>
                <div class="notification-icon">
                    <i class="far fa-bell"></i>
                </div>
                <div class="user-avatar">JD</div>
            </div>
        </header>

        <div class="main-content">
            <!-- Profile Sidebar -->
            <div class="profile-sidebar">
                <div class="profile-image-container">
                    <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="Student Photo" class="profile-image">
                    <button class="upload-photo">
                        <i class="fas fa-camera"></i> Update Photo
                    </button>
                </div>
                
                <h2 class="profile-name">Alex Johnson</h2>
                <p class="profile-major">Computer Science</p>
                <p class="profile-id">Student ID: STU-2023-8475</p>
                
                <div class="profile-stats">
                    <div class="stat-item">
                        <div class="stat-value">3.82</div>
                        <div class="stat-label">GPA</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-value">4th</div>
                        <div class="stat-label">Year</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-value">128</div>
                        <div class="stat-label">Credits</div>
                    </div>
                </div>
                
                <div class="contact-info">
                    <div class="contact-item">
                        <div class="contact-icon">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <div class="contact-details">
                            <h4>Email</h4>
                            <p>alex.johnson@university.edu</p>
                        </div>
                    </div>
                    
                    <div class="contact-item">
                        <div class="contact-icon">
                            <i class="fas fa-phone"></i>
                        </div>
                        <div class="contact-details">
                            <h4>Phone</h4>
                            <p>+1 (555) 123-4567</p>
                        </div>
                    </div>
                    
                    <div class="contact-item">
                        <div class="contact-icon">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <div class="contact-details">
                            <h4>Address</h4>
                            <p>123 University Ave, Campus Town</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Main Profile Content -->
            <div class="profile-main">
                <!-- Personal Information Section -->
                <div class="section">
                    <div class="section-header">
                        <h3 class="section-title">Personal Information</h3>
                        <button class="edit-btn"><i class="fas fa-edit"></i> Edit Information</button>
                    </div>
                    
                    <div class="info-grid">
                        <div class="info-item">
                            <div class="info-label">Date of Birth</div>
                            <div class="info-value">May 15, 2001</div>
                        </div>
                        
                        <div class="info-item">
                            <div class="info-label">Gender</div>
                            <div class="info-value">Male</div>
                        </div>
                        
                        <div class="info-item">
                            <div class="info-label">Nationality</div>
                            <div class="info-value">United States</div>
                        </div>
                        
                        <div class="info-item">
                            <div class="info-label">Enrollment Date</div>
                            <div class="info-value">August 25, 2020</div>
                        </div>
                        
                        <div class="info-item">
                            <div class="info-label">Expected Graduation</div>
                            <div class="info-value">May 2024</div>
                        </div>
                        
                        <div class="info-item">
                            <div class="info-label">Academic Advisor</div>
                            <div class="info-value">Dr. Sarah Williams</div>
                        </div>
                    </div>
                </div>
                
                <!-- Current Courses Section -->
                <div class="section">
                    <div class="section-header">
                        <h3 class="section-title">Current Courses</h3>
                        <button class="edit-btn"><i class="fas fa-list"></i> View All</button>
                    </div>
                    
                    <div class="courses-list">
                        <div class="course-item">
                            <div class="course-info">
                                <h4>Advanced Algorithms</h4>
                                <p>CS-401 | Prof. Michael Chen</p>
                            </div>
                            <div class="course-grade">A</div>
                        </div>
                        
                        <div class="course-item">
                            <div class="course-info">
                                <h4>Database Systems</h4>
                                <p>CS-350 | Dr. Emily Roberts</p>
                            </div>
                            <div class="course-grade">A-</div>
                        </div>
                        
                        <div class="course-item">
                            <div class="course-info">
                                <h4>Software Engineering</h4>
                                <p>CS-380 | Prof. James Wilson</p>
                            </div>
                            <div class="course-grade">B+</div>
                        </div>
                    </div>
                </div>
                
                <!-- Skills Section -->
                <div class="section">
                    <div class="section-header">
                        <h3 class="section-title">Technical Skills</h3>
                        <button class="edit-btn"><i class="fas fa-plus"></i> Add Skill</button>
                    </div>
                    
                    <div class="skills-list">
                        <div class="skill-tag">Python</div>
                        <div class="skill-tag">Java</div>
                        <div class="skill-tag">JavaScript</div>
                        <div class="skill-tag">React</div>
                        <div class="skill-tag">SQL</div>
                        <div class="skill-tag">Git</div>
                        <div class="skill-tag">Machine Learning</div>
                        <div class="skill-tag">Data Structures</div>
                    </div>
                </div>
                
                <!-- Achievements Section -->
                <div class="section">
                    <div class="section-header">
                        <h3 class="section-title">Achievements & Honors</h3>
                        <button class="edit-btn"><i class="fas fa-trophy"></i> View All</button>
                    </div>
                    
                    <div class="achievements-container">
                        <div class="achievement-item">
                            <div class="achievement-icon">
                                <i class="fas fa-award"></i>
                            </div>
                            <h4>Dean's List</h4>
                            <p>Fall 2021, Spring 2022, Fall 2022</p>
                        </div>
                        
                        <div class="achievement-item">
                            <div class="achievement-icon">
                                <i class="fas fa-medal"></i>
                            </div>
                            <h4>Hackathon Winner</h4>
                            <p>1st Place, University Hackathon 2022</p>
                        </div>
                        
                        <div class="achievement-item">
                            <div class="achievement-icon">
                                <i class="fas fa-graduation-cap"></i>
                            </div>
                            <h4>Research Scholarship</h4>
                            <p>Undergraduate Research Grant 2023</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <footer>
            <p>University Student Profile System &copy; 2023 | All rights reserved</p>
        </footer>
    </div>
    
    <script>
        // Simple interactions for the profile template
        document.querySelectorAll('.edit-btn').forEach(button => {
            button.addEventListener('click', function() {
                const sectionTitle = this.closest('.section-header').querySelector('.section-title').textContent;
                alert(`Edit functionality for "${sectionTitle}" would open here in a real application.`);
            });
        });
        
        document.querySelector('.upload-photo').addEventListener('click', function() {
            alert("Photo upload dialog would open here.");
        });
        
        document.querySelector('.notification-icon').addEventListener('click', function() {
            alert("You have 3 new notifications.");
        });
        
        document.querySelector('.user-avatar').addEventListener('click', function() {
            alert("User menu would open here.");
        });
    </script>
</body>
</html>