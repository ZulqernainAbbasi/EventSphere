<?php
session_start();
if (!isset($_SESSION['admin_id'])) {
    header("Location: ../Admin/login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Campus Events</title>
    <meta name="description" content="Manage the entire campus events system, oversee users, events, and system analytics.">

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
                    <button onclick="location.href='systemSettings.php'" class="btn btn-outline-primary">System Settings</button>
                    <button onclick="location.href='login.php'" class="btn btn-outline-danger">Sign Out</button>
                </div>
            </div>
        </div>
    </nav>

    <!-- Dashboard Header -->
    <section class="py-5" style="background: linear-gradient(135deg, var(--primary), #dc2626); color: white; margin-top: 76px;">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-auto">
                    <div class="bg-white bg-opacity-10 p-3 rounded-3">
                        <i class="bi bi-shield-check display-6"></i>
                    </div>
                </div>
                <div class="col">
                    <h1 class="h2 mb-2">System Administration</h1>
                    <p class="mb-3 text-white-90">Campus Events Information System</p>
                    <div class="d-flex flex-wrap gap-4 small">
                        <div class="d-flex align-items-center">
                            <i class="bi bi-people me-2"></i>
                            <span>1,247 Total Users</span>
                        </div>
                        <div class="d-flex align-items-center">
                            <i class="bi bi-calendar3 me-2"></i>
                            <span>85 Total Events</span>
                        </div>
                        <div class="d-flex align-items-center">
                            <i class="bi bi-exclamation-triangle me-2"></i>
                            <span>5 Pending Approvals</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="container my-5">
        <!-- System Overview -->
        <div class="row g-4 mb-5">
            <div class="col-lg-3 col-md-6">
                <div class="stat-card">
                    <div class="d-flex align-items-center">
                        <div class="stat-icon bg-success bg-opacity-10 text-success me-3">
                            <i class="bi bi-people"></i>
                        </div>
                        <div>
                            <div class="h3 mb-0">1,247</div>
                            <div class="text-muted">Total Users</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="stat-card">
                    <div class="d-flex align-items-center">
                        <div class="stat-icon bg-info bg-opacity-10 text-info me-3">
                            <i class="bi bi-calendar-check"></i>
                        </div>
                        <div>
                            <div class="h3 mb-0">12</div>
                            <div class="text-muted">Active Events</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="stat-card">
                    <div class="d-flex align-items-center">
                        <div class="stat-icon bg-warning bg-opacity-10 text-warning me-3">
                            <i class="bi bi-person-check"></i>
                        </div>
                        <div>
                            <div class="h3 mb-0">23</div>
                            <div class="text-muted">Organizers</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="stat-card">
                    <div class="d-flex align-items-center">
                        <div class="stat-icon bg-primary bg-opacity-10 text-primary me-3">
                            <i class="bi bi-graph-up"></i>
                        </div>
                        <div>
                            <div class="h3 mb-0">45</div>
                            <div class="text-muted">New Registrations</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- System Alerts -->
        <div class="card mb-5">
            <div class="card-header">
                <h5 class="d-flex align-items-center mb-0">
                    <i class="bi bi-exclamation-triangle text-warning me-2"></i>
                    System Alerts
                </h5>
            </div>
            <div class="card-body">
                <div id="systemAlerts">
                    <!-- Alert items will be populated by JavaScript -->
                </div>
            </div>
        </div>

        <!-- Dashboard Tabs -->
        <ul class="nav nav-tabs mb-4" id="adminTabs" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="events-management-tab" data-bs-toggle="tab" data-bs-target="#events-management" type="button" role="tab">
                    Event Management
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="users-management-tab" data-bs-toggle="tab" data-bs-target="#users-management" type="button" role="tab">
                    User Management
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="admin-approvals-tab" data-bs-toggle="tab" data-bs-target="#admin-approvals" type="button" role="tab">
                    Approvals
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="admin-analytics-tab" data-bs-toggle="tab" data-bs-target="#admin-analytics" type="button" role="tab">
                    Analytics
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="system-settings-tab" data-bs-toggle="tab" data-bs-target="#system-settings" type="button" role="tab">
                    System Settings
                </button>
            </li>
        </ul>

        <div class="tab-content" id="adminTabsContent">
            <!-- Event Management Tab -->
            <div class="tab-pane fade show active" id="events-management" role="tabpanel">
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">Recent Events</h5>
                    </div>
                    <div class="card-body">
                        <div id="adminEvents">
                            <!-- Event items will be populated by JavaScript -->
                        </div>
                    </div>
                </div>
            </div>

            <!-- User Management Tab -->
            <div class="tab-pane fade" id="users-management" role="tabpanel">
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">User Statistics</h5>
                    </div>
                    <div class="card-body">
                        <div class="row g-4 text-center">
                            <div class="col-md-4">
                                <div class="border rounded-3 p-4">
                                    <div class="display-4 fw-bold text-info mb-2">1,180</div>
                                    <div class="text-muted">Participants</div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="border rounded-3 p-4">
                                    <div class="display-4 fw-bold text-success mb-2">23</div>
                                    <div class="text-muted">Organizers</div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="border rounded-3 p-4">
                                    <div class="display-4 fw-bold text-primary mb-2">44</div>
                                    <div class="text-muted">New This Week</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Approvals Tab -->
            <div class="tab-pane fade" id="admin-approvals" role="tabpanel">
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">Pending Organizer Requests</h5>
                    </div>
                    <div class="card-body">
                        <div id="adminApprovals">
                            <!-- Approval items will be populated by JavaScript -->
                        </div>
                    </div>
                </div>
            </div>

            <!-- Analytics Tab -->
            <div class="tab-pane fade" id="admin-analytics" role="tabpanel">
                <div class="row g-4">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h6 class="d-flex align-items-center mb-0">
                                    <i class="bi bi-bar-chart me-2"></i>
                                    Platform Usage
                                </h6>
                            </div>
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <span class="text-muted">Daily Active Users</span>
                                    <span class="fw-semibold">342</span>
                                </div>
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <span class="text-muted">Events This Month</span>
                                    <span class="fw-semibold">28</span>
                                </div>
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="text-muted">Total Registrations</span>
                                    <span class="fw-semibold">1,847</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h6 class="d-flex align-items-center mb-0">
                                    <i class="bi bi-activity me-2"></i>
                                    System Health
                                </h6>
                            </div>
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <span class="text-muted">Server Uptime</span>
                                    <span class="badge badge-success-soft">99.9%</span>
                                </div>
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <span class="text-muted">Database Status</span>
                                    <span class="badge badge-success-soft">Healthy</span>
                                </div>
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="text-muted">Email Service</span>
                                    <span class="badge badge-warning-soft">Degraded</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- System Settings Tab -->
            <div class="tab-pane fade" id="system-settings" role="tabpanel">
                <div class="card">
                    <div class="card-header">
                        <h5 class="d-flex align-items-center mb-0">
                            <i class="bi bi-gear me-2"></i>
                            System Configuration
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="row g-4">
                            <div class="col-12">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <h6>Event Approval Required</h6>
                                        <p class="text-muted mb-0">Require admin approval for new events</p>
                                    </div>
                                    <button class="btn btn-outline-primary btn-sm">Configure</button>
                                </div>
                            </div>
                            <div class="col-12">
                                <hr>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <h6>Registration Limits</h6>
                                        <p class="text-muted mb-0">Set maximum participants per event</p>
                                    </div>
                                    <button class="btn btn-outline-primary btn-sm">Manage</button>
                                </div>
                            </div>
                            <div class="col-12">
                                <hr>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <h6>System Notifications</h6>
                                        <p class="text-muted mb-0">Configure admin notification settings</p>
                                    </div>
                                    <button class="btn btn-outline-primary btn-sm">Setup</button>
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
    <script src="assets/js/dashboard.js"></script>
    <script>
        // Initialize admin dashboard
        document.addEventListener('DOMContentLoaded', function() {
            window.Dashboard.initializeAdmin();
        });
    </script>
</body>
</html>