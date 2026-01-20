<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>System Administration</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
  <style>
    body { background-color: #f8f9fa; }
    .stat-card { min-height: 120px; }
  </style>
</head>
<body>

  <!-- Header -->
  <header class="bg-white shadow-sm p-3 mb-4">
    <div class="container">
      <h2 class="fw-bold">Admin Header</h2>
    </div>
  </header>

  <div class="container mb-5">

    <!-- Page Header -->
    <div class="mb-5">
      <div class="d-flex align-items-center mb-3">
        <i class="bi bi-gear-fill text-primary fs-2 me-2"></i>
        <h1 class="fw-bold">System Administration</h1>
      </div>
      <p class="text-muted fs-5">
        Comprehensive admin panel for managing campus events system, organizers, tasks, and system configuration.
      </p>
    </div>

    <!-- System Stats -->
    <div class="row g-4 mb-5">
      <div class="col-md-3">
        <div class="card stat-card p-3">
          <div class="d-flex justify-content-between">
            <h6>Total Users</h6>
            <i class="bi bi-people-fill text-primary"></i>
          </div>
          <h3 class="fw-bold text-primary">1,247</h3>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card stat-card p-3">
          <div class="d-flex justify-content-between">
            <h6>Active Events</h6>
            <i class="bi bi-calendar-event text-success"></i>
          </div>
          <h3 class="fw-bold text-success">23</h3>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card stat-card p-3">
          <div class="d-flex justify-content-between">
            <h6>Pending Tasks</h6>
            <i class="bi bi-list-task text-warning"></i>
          </div>
          <h3 class="fw-bold text-warning">8</h3>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card stat-card p-3">
          <div class="d-flex justify-content-between">
            <h6>System Health</h6>
            <i class="bi bi-shield-check text-success"></i>
          </div>
          <h3 class="fw-bold text-success">98%</h3>
        </div>
      </div>
    </div>

    <!-- Tabs -->
    <div class="card mb-5">
      <div class="card-body">
        <ul class="nav nav-tabs" id="adminTabs" role="tablist">
          <li class="nav-item"><button class="nav-link active" data-bs-toggle="tab" data-bs-target="#organizers"> <i class="bi bi-person-plus"></i> Organizers</button></li>
          <li class="nav-item"><button class="nav-link" data-bs-toggle="tab" data-bs-target="#tasks"> <i class="bi bi-list-task"></i> Tasks</button></li>
          <li class="nav-item"><button class="nav-link" data-bs-toggle="tab" data-bs-target="#system"> <i class="bi bi-gear"></i> System</button></li>
          <li class="nav-item"><button class="nav-link" data-bs-toggle="tab" data-bs-target="#notifications"> <i class="bi bi-bell"></i> Notifications</button></li>
          <li class="nav-item"><button class="nav-link" data-bs-toggle="tab" data-bs-target="#security"> <i class="bi bi-shield-lock"></i> Security</button></li>
          <li class="nav-item"><button class="nav-link" data-bs-toggle="tab" data-bs-target="#reports"> <i class="bi bi-bar-chart"></i> Reports</button></li>
        </ul>

        <div class="tab-content p-4">
          <div class="tab-pane fade show active" id="organizers">
            <!-- OrganizerManagement content here -->
            <p>Organizer Management Section...</p>
          </div>
          <div class="tab-pane fade" id="tasks">
            <!-- TaskAssignment content here -->
            <p>Task Assignment Section...</p>
          </div>
          <div class="tab-pane fade" id="system">
            <!-- SystemConfiguration content here -->
            <p>System Configuration Section...</p>
          </div>
          <div class="tab-pane fade" id="notifications">
            <!-- NotificationSettings content here -->
            <p>Notification Settings Section...</p>
          </div>
          <div class="tab-pane fade" id="security">
            <!-- SecuritySettings content here -->
            <p>Security Settings Section...</p>
          </div>
          <div class="tab-pane fade" id="reports">
            <!-- ReportsAnalytics content here -->
            <p>Reports & Analytics Section...</p>
          </div>
        </div>
      </div>
    </div>

    <!-- Quick Actions -->
    <div class="card">
      <div class="card-header">
        <h5 class="card-title mb-0">Quick Actions</h5>
        <small class="text-muted">Frequently used administrative actions</small>
      </div>
      <div class="card-body">
        <div class="d-flex flex-wrap gap-3">
          <button class="btn btn-outline-primary"><i class="bi bi-person-plus"></i> Add New Organizer</button>
          <button class="btn btn-outline-primary"><i class="bi bi-list-task"></i> Create Task</button>
          <button class="btn btn-outline-primary"><i class="bi bi-envelope"></i> Send Announcement</button>
          <button class="btn btn-outline-primary"><i class="bi bi-database"></i> Backup System</button>
        </div>
      </div>
    </div>

  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
