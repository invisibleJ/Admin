<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS and Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />

    <style>
        body {
            margin: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #0d2a4e;
            /* fallback solid blue */
            color: #e0f0ff;
            overflow-x: hidden;
            position: relative;
            min-height: 100vh;
            z-index: 0;
        }

        body::before {
            content: "";
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('bg.jpg') no-repeat center center/cover;
            filter: blur(10px) brightness(0.6);
            z-index: -1;
        }

        /* Top Navbar */
        .navbar-blur {
            background: rgba(0, 44, 89, 0.85);
            /* darker blue with opacity */
            backdrop-filter: blur(10px);
            border-bottom: 1px solid rgba(74, 200, 224, 0.15);
        }

        .navbar-blur .navbar-brand {
            color: #4ac8e0;
            font-weight: 600;
        }

        .navbar-blur .nav-link,
        .navbar-blur .navbar-text {
            color: #cde9fb;
        }

        /* Sidebar */
        .sidebar {
            background: rgba(4, 66, 121, 0.75);
            backdrop-filter: blur(12px);
            height: 100vh;
            width: 240px;
            position: fixed;
            top: 56px;
            left: 0;
            padding-top: 1rem;
            border-right: 1px solid rgba(74, 200, 224, 0.15);
            z-index: 1020;
            display: none;
            flex-direction: column;
        }

        .sidebar a {
            color: #a6d1f7;
            padding: 12px 20px;
            display: flex;
            align-items: center;
            gap: 10px;
            text-decoration: none;
            font-weight: 500;
        }

        .sidebar a:hover,
        .sidebar a.active {
            background-color: rgba(74, 200, 224, 0.25);
            border-left: 4px solid #4ac8e0;
            padding-left: 16px;
            color: #d1f0ff;
        }

        .main-content {
            margin-left: 240px;
            padding: 90px 30px 30px;
            position: relative;
            z-index: 1;
        }

        @media (max-width: 991.98px) {
            .sidebar {
                display: none !important;
            }

            .main-content {
                margin-left: 0;
                padding: 90px 15px 20px;
            }
        }

        .profile-pic {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid #4ac8e0;
        }

        .card-glass {
            background: rgba(74, 200, 224, 0.15);
            border: 1px solid rgba(74, 200, 224, 0.3);
            backdrop-filter: blur(14px);
            border-radius: 20px;
            padding: 20px;
            color: #e0f0ff;
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.3);
            display: flex;
            align-items: center;
            gap: 20px;
            transition: transform 0.2s ease-in-out;
        }

        .card-glass:hover {
            transform: translateY(-4px);
        }

        .metric-icon {
            font-size: 2.8rem;
            flex-shrink: 0;
            color: #4ac8e0;
        }

        .card-title {
            font-weight: 500;
            font-size: 1rem;
            color: #b2d4ec;
        }

        .card-value {
            font-size: 2rem;
            font-weight: bold;
            color: #ffffff;
        }

        .activity-list li {
            background: transparent;
            border-color: rgba(74, 200, 224, 0.25);
            color: #a7cce5;
        }

        #mobileSidebar a {
            color: #a6d1f7;
            text-decoration: none;
        }

        a {
            color: #a6d1f7;
            text-decoration: none;
        }

        #mobileSidebar a:hover,
        #mobileSidebar a:focus {
            color: #d1f0ff;
            text-decoration: none;
        }

        body {
            background-color: #f8f9fa;
            font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
        }

        .main-content {
            min-height: 100vh;
            margin-left: 240px;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 40px 20px;
        }

        .card {
            width: 70%;
            max-width: 850px;
            border: none;
            border-radius: 15px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        }

        .card h4 {
            font-weight: 600;
            color: #333;
        }

        label {
            font-weight: 500;
        }

        .btn-warning {
            background-color: #ffb700;
            border: none;
        }

        .btn-warning:hover {
            background-color: #f0a500;
        }

        @media (max-width: 992px) {
            .main-content {
                margin-left: 0;
            }
        }
    </style>
    </style>
</head>

<body>

    <!-- Top Navigation -->
    <nav class="navbar navbar-expand-lg navbar-blur fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand d-flex align-items-center gap-2" href="#">
                <i class="bi bi-building"></i>
                Christ the King College
            </a>

            <!-- Toggle Button for Offcanvas -->
            <button class="btn btn-outline-light d-lg-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#mobileSidebar">
                <i class="bi bi-list fs-4"></i>
            </button>

            <div class="ms-auto d-flex align-items-center gap-3">
                <span class="navbar-text d-none d-md-block">jatis@ckcgingoog.edu.ph</span>

                <!-- Notifications Dropdown -->
                <div class="dropdown">
                    <a href="#" class="text-light position-relative" id="notifDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-bell fs-5"></i>
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" id="notifBadge">2</span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end shadow-lg p-2" aria-labelledby="notifDropdown" style="min-width: 320px;">
                        <li class="dropdown-item d-flex justify-content-between align-items-start">
                            <div>
                                <small class="fw-bold">Student Application</small><br>
                                <span>A student wants to join your subject.</span>
                            </div>
                            <div class="ms-2 d-flex gap-1">
                                <button class="btn btn-sm btn-success btn-confirm">Confirm</button>
                                <button class="btn btn-sm btn-danger btn-delete">Delete</button>
                            </div>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li class="dropdown-item d-flex justify-content-between align-items-start">
                            <div>
                                <small class="fw-bold">Admin Update</small><br>
                                <span>Admin confirmed you in the subject.</span>
                            </div>
                        </li>
                    </ul>
                </div>

                <img src="/img/juswa.jpg" class="profile-pic" alt="Prof. Atis" />
            </div>
        </div>
    </nav>

    <!-- Sidebar (Desktop) -->
    <nav class="sidebar d-none d-lg-flex flex-column">
        <a href="/" class="active"><i class="bi bi-house"></i> Dashboard</a>
        <a href="/subjects_available"><i class="bi bi-book"></i> Instructor</a>
        <a href="/my_subjects"><i class="bi bi-person-lines-fill"></i> My Subjects</a>
        <a href="/profile"><i class="bi bi-person-circle"></i> Profile</a>
        <a href="#"><i class="bi bi-gear"></i> Settings</a>
        <a href="#"><i class="bi bi-box-arrow-right"></i> Logout</a>
    </nav>

    <!-- Offcanvas Sidebar -->
    <div class="offcanvas offcanvas-start text-bg-dark" tabindex="-1" id="mobileSidebar" aria-labelledby="mobileSidebarLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="mobileSidebarLabel">Menu</h5>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body d-flex flex-column p-0">
            <a href="/" class="active px-3 py-2 d-flex align-items-center gap-2"><i class="bi bi-house"></i> Dashboard</a>
            <a href="/subjects_available" class="px-3 py-2 d-flex align-items-center gap-2"><i class="bi bi-book"></i> Available Subjects</a>
            <a href="/my_subjects" class="px-3 py-2 d-flex align-items-center gap-2"><i class="bi bi-person-lines-fill"></i> My Subjects</a>
            <a href="/profile" class="px-3 py-2 d-flex align-items-center gap-2"><i class="bi bi-person-circle"></i> Profile</a>
            <a href="#" class="px-3 py-2 d-flex align-items-center gap-2"><i class="bi bi-gear"></i> Settings</a>
            <a href="#" class="px-3 py-2 d-flex align-items-center gap-2"><i class="bi bi-box-arrow-right"></i> Logout</a>
        </div>
    </div>

    <!-- Main Content -->
    <div class="header">
        <h4>Admin</h4>
    </div>

    <div class="main-content d-flex justify-content-center align-items-center">
        <div class="card p-5 bg-white w-50 shadow-lg">
            <h4 class="mb-4 text-center fw-bold text-dark">Add Subject</h4>

            <form action="insert-subject.php" method="POST">

                <div class="mb-3">
                    <label class="form-label">Subject Code</label>
                    <input type="text" name="subject_code" class="form-control" placeholder="e.g. IT101" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Subject Name</label>
                    <input type="text" name="subject_name" class="form-control" placeholder="e.g. Introduction to IT" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Semester</label>
                    <select name="semester" class="form-select" required>
                        <option value="">Select Semester</option>
                        <option>1st Semester</option>
                        <option>2nd Semester</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Year Level</label>
                    <select name="year_level" class="form-select" required>
                        <option value="">Select Year Level</option>
                        <option>1st Year</option>
                        <option>2nd Year</option>
                        <option>3rd Year</option>
                        <option>4th Year</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Credit Units</label>
                    <input type="number" name="units" class="form-control" placeholder="e.g. 3">
                </div>

                <div class="text-center mt-4">
                    <button type="submit" name="save" class="btn btn-warning text-white px-4 me-2">Save</button>
                    <button type="reset" class="btn btn-secondary px-4">Reset</button>
                </div>
            </form>
        </div>
    </div>


    <!-- Bootstrap Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- JS Logic -->
    <script>
        const DB = {
            mySubjects: [{
                code: 'CS101',
                title: 'Intro to CS',
                units: 3
            }],
            pending: [{
                code: 'MATH200',
                title: 'Calculus II',
                units: 4,
                applicants: 2
            }],
            notifications: 2,
            activity: [
                'You approved 2 students for CS101',
                'New application for MATH200'
            ]
        };

        function renderDashboard() {
            document.getElementById('countMySubjects').textContent = DB.mySubjects.length;
            document.getElementById('countPending').textContent = DB.pending.length;
            document.getElementById('countNotifs').textContent = DB.notifications;

            const activityList = document.getElementById('activityList');
            activityList.innerHTML = '';
            DB.activity.forEach(item => {
                const li = document.createElement('li');
                li.className = 'list-group-item';
                li.textContent = item;
                activityList.appendChild(li);
            });
        }

        renderDashboard();

        // Handle notification actions
        document.querySelectorAll(".btn-confirm").forEach(btn => {
            btn.addEventListener("click", () => {
                alert("Student confirmed!");
            });
        });

        document.querySelectorAll(".btn-delete").forEach(btn => {
            btn.addEventListener("click", () => {
                alert("Request deleted!");
            });
        });
    </script>

</body>

</html>