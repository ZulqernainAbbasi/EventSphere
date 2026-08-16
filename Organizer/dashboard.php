<?php
    session_start();
    if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'Organizer') {
        header("Location: ../Auth/login.php");
        exit();
    }
    include("../Database/Database.php");
    $db = new Database();
    $connection = $db->connection;

    // get user info from session
    $uid = intval($_SESSION['user_id']);
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
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Organizer Dashboard - Campus Events</title>
    <meta name="description" content="Manage your events, track registrations, and analyze performance on your organizer dashboard.">

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
            <a class="navbar-brand d-flex align-items-center" href="../index.php">
                <i class="bi bi-calendar3 text-primary me-2 fs-3"></i>
                <span class="fw-bold fs-4">EventSphere</span>
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="../index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../index.php#events">Events</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../index.php#gallery">Gallery</a>
                    </li>
                </ul>
                <div class="d-flex gap-2">
                    <button onclick="location.href='create-event.php'" class="btn btn-gradient-primary">
                        <i class="bi bi-plus me-1"></i>
                        Create Event
                    </button>
                    <button onclick="location.href='../index.php'" class="btn btn-outline-danger">Sign Out</button>
                </div>
            </div>
        </div>
    </nav>

    <!-- Dashboard Header -->
    <section class="py-5" style="background: linear-gradient(135deg, var(--accent), var(--success)); color: white; margin-top: 76px;">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-auto">
                    <img src="<?php echo $profilePic; ?>" alt="Profile" class="dashboard-avatar">
                </div>
                <div class="col">
                    <h1 class="h2 mb-2"><?php echo htmlspecialchars($username); ?>'s Events Dashboard</h1>
                    <p class="mb-3 text-white-90">Event Organizer • CS Department</p>
                    <div class="d-flex flex-wrap gap-4 small">
                        <div class="d-flex align-items-center">
                            <i class="bi bi-calendar3 me-2"></i>
                            <span>12 Events Created</span>
                        </div>
                        <div class="d-flex align-items-center">
                            <i class="bi bi-people me-2"></i>
                            <span>500+ Participants Reached</span>
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
                            <div class="h3 mb-0">3</div>
                            <div class="text-muted">Active Events</div>
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
                            <div class="h3 mb-0">225</div>
                            <div class="text-muted">Total Registrations</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="stat-card">
                    <div class="d-flex align-items-center">
                        <div class="stat-icon bg-warning bg-opacity-10 text-warning me-3">
                            <i class="bi bi-exclamation-triangle"></i>
                        </div>
                        <div>
                            <div class="h3 mb-0">2</div>
                            <div class="text-muted">Pending Approvals</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="stat-card">
                    <div class="d-flex align-items-center">
                        <div class="stat-icon bg-primary bg-opacity-10 text-primary me-3">
                            <i class="bi bi-bar-chart"></i>
                        </div>
                        <div>
                            <div class="h3 mb-0">1.1K</div>
                            <div class="text-muted">Total Views</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Dashboard Tabs -->
        <ul class="nav nav-tabs mb-4" id="organizerTabs" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="my-events-tab" data-bs-toggle="tab" data-bs-target="#my-events" type="button" role="tab">
                    My Events
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="approvals-tab" data-bs-toggle="tab" data-bs-target="#approvals" type="button" role="tab">
                    Approvals
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="analytics-tab" data-bs-toggle="tab" data-bs-target="#analytics" type="button" role="tab">
                    Analytics
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="organizer-settings-tab" data-bs-toggle="tab" data-bs-target="#organizer-settings" type="button" role="tab">
                    Settings
                </button>
            </li>
        </ul>

        <div class="tab-content" id="organizerTabsContent">
            <!-- My Events Tab -->
            <div class="tab-pane fade show active" id="my-events" role="tabpanel">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">My Events</h5>
                        <button class="btn btn-gradient-primary">
                            <i class="bi bi-plus me-1"></i>
                            Create Event
                        </button>
                    </div>
                    <div class="card-body">
                        <div id="organizerEvents">
                            <!-- Event items will be populated by JavaScript -->
                        </div>
                    </div>
                </div>
            </div>

            <!-- Approvals Tab -->
            <div class="tab-pane fade" id="approvals" role="tabpanel">
                <div class="card">
                    <div class="card-header">
                        <h5 class="d-flex align-items-center mb-0">
                            <i class="bi bi-exclamation-triangle text-warning me-2"></i>
                            Pending Approvals
                        </h5>
                    </div>
                    <div class="card-body">
                        <div id="pendingApprovals">
                            <!-- Approval items will be populated by JavaScript -->
                        </div>
                    </div>
                </div>
            </div>

            <!-- Analytics Tab -->
            <div class="tab-pane fade" id="analytics" role="tabpanel">
                <div class="row g-4">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h6 class="mb-0">Event Performance</h6>
                            </div>
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <span class="text-muted">AI Workshop</span>
                                    <span class="fw-semibold">75% capacity</span>
                                </div>
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <span class="text-muted">Innovation Summit</span>
                                    <span class="fw-semibold">90% capacity</span>
                                </div>
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="text-muted">Tech Networking</span>
                                    <span class="fw-semibold">Draft</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h6 class="mb-0">Recent Activity</h6>
                            </div>
                            <div class="card-body">
                                <div class="d-flex align-items-center mb-3 small">
                                    <i class="bi bi-clock text-muted me-2"></i>
                                    <span>5 new registrations for AI Workshop</span>
                                </div>
                                <div class="d-flex align-items-center mb-3 small">
                                    <i class="bi bi-clock text-muted me-2"></i>
                                    <span>Innovation Summit completed successfully</span>
                                </div>
                                <div class="d-flex align-items-center small">
                                    <i class="bi bi-clock text-muted me-2"></i>
                                    <span>2 participants need approval</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Settings Tab -->
            <div class="tab-pane fade" id="organizer-settings" role="tabpanel">
                <div class="card">
                    <div class="card-header">
                        <h5 class="d-flex align-items-center mb-0">
                            <i class="bi bi-gear me-2"></i>
                            Organizer Settings
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="row g-4">
                            <div class="col-12">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <h6>Auto-approve Registrations</h6>
                                        <p class="text-muted mb-0">Automatically approve participant registrations</p>
                                    </div>
                                    <button class="btn btn-outline-primary btn-sm">Configure</button>
                                </div>
                            </div>
                            <div class="col-12">
                                <hr>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <h6>Email Templates</h6>
                                        <p class="text-muted mb-0">Customize notification emails</p>
                                    </div>
                                    <button class="btn btn-outline-primary btn-sm">Manage</button>
                                </div>
                            </div>
                            <div class="col-12">
                                <hr>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <h6>Event Categories</h6>
                                        <p class="text-muted mb-0">Manage your event categories</p>
                                    </div>
                                    <button class="btn btn-outline-primary btn-sm">Edit</button>
                                </div>
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
    <script>
        // Initialize organizer dashboard
        document.addEventListener('DOMContentLoaded', function() {
            window.Dashboard.initializeOrganizer();
        });
    </script>
</body>
</html>