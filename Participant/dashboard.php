<?php
session_start();

// Check login & role
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'Participant') {
    header("Location: ../Auth/login.php");
    exit();
}

include("../Database/Database.php");
$db = new Database();
$connection = $db->connection;

// Get user ID from session
$uid = intval($_SESSION['user_id']);

// Fetch user info
$result = $connection->query("SELECT name, profile_picture FROM users WHERE id = $uid LIMIT 1");

// Defaults
$username = "Guest";
$profilePic = "../images/default-avatar.png"; // fallback image

if ($result && $row = $result->fetch_assoc()) {
    $username = $row['name'];

    if (!empty($row['profile_picture'])) {
        $candidatePic = "../images/" . $row['profile_picture'];

        // Check if the file actually exists
        if (file_exists($candidatePic)) {
            $profilePic = $candidatePic;
        }
    }
}

// At this point you have:
// $username → user's name
// $profilePic → path to profile picture
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Participant Dashboard - Campus Events</title>
    <meta name="description" content="Manage your event registrations, track achievements, and discover new opportunities on your participant dashboard.">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="../Assets/CSS/style.css">
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top shadow-sm">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="index.html">
                <i class="bi bi-calendar3 text-primary me-2 fs-3"></i>
                <span class="fw-bold fs-4">Campus Events</span>
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.html">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.html#events">Events</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.html#gallery">Gallery</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Dashboard</a>
                    </li>
                </ul>
                <div class="d-flex gap-2">
                    <button class="btn btn-outline-primary">Settings</button>
                    <button class="btn btn-outline-danger">Sign Out</button>
                </div>
            </div>
        </div>
    </nav>

    <!-- Dashboard Header -->
    <section class="dashboard-header mt-3">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-auto">
                    <img src="<?php echo $profilePic; ?>" alt="Profile" class="dashboard-avatar">
                </div>
                <div class="col">
                    <h1 class="h2 mb-2">Welcome back, <?php echo htmlspecialchars($username); ?></h1>
                    <p class="mb-3 text-white-90">Computer Science Student • Senior Year</p>
                    <div class="d-flex flex-wrap gap-4 small">
                        <div class="d-flex align-items-center">
                            <i class="bi bi-calendar3 me-2"></i>
                            <span>Member since Jan 2022</span>
                        </div>
                        <div class="d-flex align-items-center">
                            <i class="bi bi-trophy me-2"></i>
                            <span>15 Events Attended</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="container my-5">
        <!-- Quick Stats -->
        <div class="row g-4 mb-5">
            <div class="col-lg-3 col-md-6">
                <div class="stat-card">
                    <div class="d-flex align-items-center">
                        <div class="stat-icon bg-success bg-opacity-10 text-success me-3">
                            <i class="bi bi-calendar-check"></i>
                        </div>
                        <div>
                            <div class="h3 mb-0">2</div>
                            <div class="text-muted">Upcoming Events</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="stat-card">
                    <div class="d-flex align-items-center">
                        <div class="stat-icon bg-info bg-opacity-10 text-info me-3">
                            <i class="bi bi-people"></i>
                        </div>
                        <div>
                            <div class="h3 mb-0">47</div>
                            <div class="text-muted">Connections Made</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="stat-card">
                    <div class="d-flex align-items-center">
                        <div class="stat-icon bg-warning bg-opacity-10 text-warning me-3">
                            <i class="bi bi-star"></i>
                        </div>
                        <div>
                            <div class="h3 mb-0">4.8</div>
                            <div class="text-muted">Avg Rating Given</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="stat-card">
                    <div class="d-flex align-items-center">
                        <div class="stat-icon bg-primary bg-opacity-10 text-primary me-3">
                            <i class="bi bi-award"></i>
                        </div>
                        <div>
                            <div class="h3 mb-0">3</div>
                            <div class="text-muted">Certificates Earned</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Dashboard Tabs -->
        <ul class="nav nav-tabs mb-4" id="dashboardTabs" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="events-tab" data-bs-toggle="tab" data-bs-target="#events" type="button" role="tab">
                    My Events
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="achievements-tab" data-bs-toggle="tab" data-bs-target="#achievements" type="button" role="tab">
                    Achievements
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab">
                    Profile
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="settings-tab" data-bs-toggle="tab" data-bs-target="#settings" type="button" role="tab">
                    Settings
                </button>
            </li>
        </ul>

        <div class="tab-content" id="dashboardTabsContent">
            <!-- My Events Tab -->
            <div class="tab-pane fade show active" id="events" role="tabpanel">
                <!-- Upcoming Events -->
                <div class="card mb-4">
                    <div class="card-header">
                        <h5 class="d-flex align-items-center mb-0">
                            <i class="bi bi-calendar-check text-success me-2"></i>
                            Upcoming Events
                        </h5>
                    </div>
                    <div class="card-body">
                        <div id="upcomingEvents">
                            <!-- Event items will be populated by JavaScript -->
                        </div>
                    </div>
                </div>

                <!-- Past Events -->
                <div class="card">
                    <div class="card-header">
                        <h5 class="d-flex align-items-center mb-0">
                            <i class="bi bi-clock-history text-muted me-2"></i>
                            Past Events
                        </h5>
                    </div>
                    <div class="card-body">
                        <div id="pastEvents">
                            <!-- Event items will be populated by JavaScript -->
                        </div>
                    </div>
                </div>
            </div>

            <!-- Achievements Tab -->
            <div class="tab-pane fade" id="achievements" role="tabpanel">
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">Your Achievements</h5>
                    </div>
                    <div class="card-body">
                        <div class="row g-4" id="achievementsGrid">
                            <!-- Achievement items will be populated by JavaScript -->
                        </div>
                    </div>
                </div>
            </div>

            <!-- Profile Tab -->
            <div class="tab-pane fade" id="profile" role="tabpanel">
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">Profile Information</h5>
                    </div>
                    <div class="card-body">
                        <p class="text-muted">Profile management features coming soon...</p>
                    </div>
                </div>
            </div>

            <!-- Settings Tab -->
            <div class="tab-pane fade" id="settings" role="tabpanel">
                <div class="card">
                    <div class="card-header">
                        <h5 class="d-flex align-items-center mb-0">
                            <i class="bi bi-gear me-2"></i>
                            Account Settings
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="row g-4">
                            <div class="col-12">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <h6>Email Notifications</h6>
                                        <p class="text-muted mb-0">Receive updates about new events</p>
                                    </div>
                                    <button class="btn btn-outline-primary btn-sm">Configure</button>
                                </div>
                            </div>
                            <div class="col-12">
                                <hr>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <h6>Privacy Settings</h6>
                                        <p class="text-muted mb-0">Manage your profile visibility</p>
                                    </div>
                                    <button class="btn btn-outline-primary btn-sm">Manage</button>
                                </div>
                            </div>
                            <div class="col-12">
                                <hr>
                                <button class="btn btn-outline-danger">
                                    <i class="bi bi-box-arrow-right me-2"></i>
                                    Sign Out
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Dashboard JS -->
    <script src="../Assets/JS/dashboard.js"></script>
</body>
</html>