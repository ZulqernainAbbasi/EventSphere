<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Event - Campus Events</title>
    <meta name="description" content="Create and organize campus events with our comprehensive event management system.">
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="../Assets/CSS/create-event.css">
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="index.html">
                <i class="bi bi-calendar3 text-primary me-2 fs-3"></i>
                <span class="fw-bold fs-4">EventSphere</span>
            </a>
            
            <div class="navbar-nav ms-auto">
                <a class="nav-link" href="dashboard.php">
                    <i class="bi bi-arrow-left me-2"></i>
                    Back to Dashboard
                </a>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="main-content">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <!-- Header -->
                    <div class="d-flex justify-content-between align-items-center mb-5">
                        <div>
                            <h1 class="display-5 fw-bold mb-2">Create New Event</h1>
                            <p class="text-muted">Fill in the details to create your event</p>
                        </div>
                        <div class="d-flex gap-2">
                            <button type="button" class="btn btn-outline-primary" id="previewBtn">
                                <i class="bi bi-eye me-2"></i>
                                Preview
                            </button>
                        </div>
                    </div>

                    <!-- Event Form -->
                    <div id="eventForm">
                        <form action="../Logic/create-event.php" id="createEventForm" novalidate>
                            <!-- Basic Information -->
                            <div class="card mb-4 shadow-sm">
                                <div class="card-header bg-primary text-white">
                                    <h5 class="card-title mb-0">
                                        <i class="bi bi-info-circle me-2"></i>
                                        Basic Information
                                    </h5>
                                </div>
                                <div class="card-body">
                                    <div class="row g-3">
                                        <div class="col-12">
                                            <label for="eventTitle" class="form-label fw-semibold">Event Title *</label>
                                            <input name="eventTitle" type="text" class="form-control form-control-lg" id="eventTitle" required>
                                            <div class="invalid-feedback">Please provide a valid event title.</div>
                                        </div>
                                        
                                        <div class="col-12">
                                            <label for="eventDescription" class="form-label fw-semibold">Description *</label>
                                            <textarea name="description" class="form-control" id="eventDescription" rows="4" required 
                                                placeholder="Describe your event in detail"></textarea>
                                            <div class="invalid-feedback">Please provide an event description.</div>
                                        </div>
                                        
                                        <div class="col-md-6">
                                            <label for="eventCategory" class="form-label fw-semibold">Category *</label>
                                            <select name="category" class="form-select" id="eventCategory" required>
                                                <option value="">Select category</option>
                                                <option value="Technology">Technology</option>
                                                <option value="Career">Career</option>
                                                <option value="Cultural">Cultural</option>
                                                <option value="Academic">Academic</option>
                                                <option value="Wellness">Wellness</option>
                                                <option value="Entrepreneurship">Entrepreneurship</option>
                                                <option value="Sports">Sports</option>
                                                <option value="Arts">Arts</option>
                                                <option value="Social">Social</option>
                                                <option value="Workshop">Workshop</option>
                                            </select>
                                            <div class="invalid-feedback">Please select a category.</div>
                                        </div>
                                        
                                        <div class="col-md-6">
                                            <label for="eventCapacity" class="form-label fw-semibold">Expected Capacity</label>
                                            <input name="eventCapacity" type="number" class="form-control" id="eventCapacity" min="1" 
                                                placeholder="Number of attendees">
                                        </div>
                                        
                                        <div class="col-12">
                                            <label class="form-label fw-semibold">Tags</label>
                                            <div class="input-group mb-2">
                                                <input name="tag" type="text" class="form-control" id="tagInput" placeholder="Add a tag">
                                                <button class="btn btn-outline-secondary" type="button" id="addTagBtn">Add</button>
                                            </div>
                                            <div id="tagsContainer" class="d-flex flex-wrap gap-2"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Date & Time -->
                            <div class="card mb-4 shadow-sm">
                                <div class="card-header bg-success text-white">
                                    <h5 class="card-title mb-0">
                                        <i class="bi bi-clock me-2"></i>
                                        Date & Time
                                    </h5>
                                </div>
                                <div class="card-body">
                                    <div class="row g-3">
                                        <div class="col-md-6">
                                            <label for="startDate" class="form-label fw-semibold">Start Date *</label>
                                            <input name="startDate" type="date" class="form-control" id="startDate" required>
                                            <div class="invalid-feedback">Please select a start date.</div>
                                        </div>
                                        
                                        <div class="col-md-6">
                                            <label for="endDate" class="form-label fw-semibold">End Date</label>
                                            <input name="endDate" type="date" class="form-control" id="endDate">
                                            <small class="form-text text-muted">Leave empty if same day</small>
                                        </div>
                                        
                                        <div class="col-md-6">
                                            <label for="startTime" class="form-label fw-semibold">Start Time *</label>
                                            <input name="startTime" type="time" class="form-control" id="startTime" required>
                                            <div class="invalid-feedback">Please select a start time.</div>
                                        </div>
                                        
                                        <div class="col-md-6">
                                            <label for="endTime" class="form-label fw-semibold">End Time *</label>
                                            <input name="endTime" type="time" class="form-control" id="endTime" required>
                                            <div class="invalid-feedback">Please select an end time.</div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Location -->
                            <div class="card mb-4 shadow-sm">
                                <div class="card-header bg-warning text-dark">
                                    <h5 class="card-title mb-0">
                                        <i class="bi bi-geo-alt me-2"></i>
                                        Location Details
                                    </h5>
                                </div>
                                <div class="card-body">
                                    <div class="row g-3">
                                        <div class="col-md-6">
                                            <label for="eventLocation" class="form-label fw-semibold">Location *</label>
                                            <input name="eventLocation" type="text" class="form-control" id="eventLocation" required 
                                                placeholder="e.g., Main Campus">
                                            <div class="invalid-feedback">Please provide a location.</div>
                                        </div>
                                        
                                        <div class="col-md-6">
                                            <label for="eventVenue" class="form-label fw-semibold">Specific Venue</label>
                                            <input name="eventVenue" type="text" class="form-control" id="eventVenue" 
                                                placeholder="e.g., Auditorium A, Room 101">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Registration Settings -->
                            <div class="card mb-4 shadow-sm">
                                <div class="card-header bg-info text-white">
                                    <h5 class="card-title mb-0">
                                        <i class="bi bi-person-check me-2"></i>
                                        Registration Settings
                                    </h5>
                                </div>
                                <div class="card-body">
                                    <div class="row g-3">
                                        <div class="col-12">
                                            <div class="form-check form-switch">
                                                <input name="requireRegistration" class="form-check-input" type="checkbox" id="requireRegistration" checked>
                                                <label class="form-check-label fw-semibold" for="requireRegistration">
                                                    Require Registration
                                                </label>
                                                <div class="form-text text-muted">Users must register to attend this event</div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-6" id="registrationDeadlineGroup">
                                            <label for="registrationDeadline" class="form-label fw-semibold">Registration Deadline</label>
                                            <input name="registrationDeadline" type="date" class="form-control" id="registrationDeadline">
                                        </div>
                                        
                                        <div class="col-12" id="waitlistGroup">
                                            <div class="form-check form-switch">
                                                <input name="allowWaitlist" class="form-check-input" type="checkbox" id="allowWaitlist">
                                                <label class="form-check-label fw-semibold" for="allowWaitlist">
                                                    Allow Waitlist
                                                </label>
                                                <div class="form-text text-muted">Allow users to join waitlist when event is full</div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-12">
                                            <div class="form-check form-switch">
                                                <input name="sendReminders" class="form-check-input" type="checkbox" id="sendReminders" checked>
                                                <label class="form-check-label fw-semibold" for="sendReminders">
                                                    Send Email Reminders
                                                </label>
                                                <div class="form-text text-muted">Automatically send reminders before the event</div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-12">
                                            <div class="form-check form-switch">
                                                <input name="isPublic" class="form-check-input" type="checkbox" id="isPublic" checked>
                                                <label class="form-check-label fw-semibold" for="isPublic">
                                                    Public Event
                                                </label>
                                                <div class="form-text text-muted">Make this event visible to all students</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Contact Information -->
                            <div class="card mb-4 shadow-sm">
                                <div class="card-header bg-secondary text-white">
                                    <h5 class="card-title mb-0">
                                        <i class="bi bi-envelope me-2"></i>
                                        Contact Information
                                    </h5>
                                </div>
                                <div class="card-body">
                                    <div class="row g-3">
                                        <div class="col-md-6">
                                            <label for="contactEmail" class="form-label fw-semibold">Contact Email *</label>
                                            <input name="contactEmail" type="email" class="form-control" id="contactEmail" required 
                                                placeholder="organizer@university.edu">
                                            <div class="invalid-feedback">Please provide a valid email address.</div>
                                        </div>
                                        
                                        <div class="col-md-6">
                                            <label for="contactPhone" class="form-label fw-semibold">Contact Phone</label>
                                            <input name="contactPhone" type="tel" class="form-control" id="contactPhone" 
                                                placeholder="(555) 123-4567">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Submit Buttons -->
                            <div class="d-flex justify-content-end gap-3 mb-5">
                                <button type="button" class="btn btn-outline-secondary btn-lg">
                                    <i class="bi bi-save me-2"></i>
                                    Save as Draft
                                </button>
                                <button name="submit" type="submit" class="btn btn-primary btn-lg">
                                    <i class="bi bi-check-circle me-2"></i>
                                    Create Event
                                </button>
                            </div>
                        </form>
                    </div>

                    <!-- Preview Section (Hidden by default) -->
                    <div id="eventPreview" class="d-none">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h2 class="h3 fw-bold">Event Preview</h2>
                            <button type="button" class="btn btn-outline-secondary" id="backToEditBtn">
                                <i class="bi bi-arrow-left me-2"></i>
                                Back to Edit
                            </button>
                        </div>

                        <div class="card shadow-lg">
                            <div class="event-image-placeholder bg-gradient-primary d-flex align-items-center justify-content-center text-white" 
                                 style="height: 300px;">
                                <div class="text-center">
                                    <i class="bi bi-camera display-4 mb-3"></i>
                                    <h5>Event Image Placeholder</h5>
                                </div>
                            </div>
                            
                            <div class="card-body p-5">
                                <div id="previewTags" class="mb-3"></div>
                                
                                <h1 id="previewTitle" class="display-5 fw-bold mb-4">Event Title</h1>
                                
                                <div class="row mb-4">
                                    <div class="col-md-6">
                                        <div class="d-flex align-items-center text-muted mb-3">
                                            <i class="bi bi-calendar3 me-3 fs-5"></i>
                                            <div>
                                                <div id="previewDate" class="fw-semibold">Date TBD</div>
                                                <div id="previewTime" class="small"></div>
                                            </div>
                                        </div>
                                        
                                        <div class="d-flex align-items-center text-muted mb-3">
                                            <i class="bi bi-geo-alt me-3 fs-5"></i>
                                            <div>
                                                <div id="previewLocation" class="fw-semibold">Location TBD</div>
                                                <div id="previewVenue" class="small"></div>
                                            </div>
                                        </div>
                                        
                                        <div class="d-flex align-items-center text-muted" id="previewCapacityDiv" style="display: none !important;">
                                            <i class="bi bi-people me-3 fs-5"></i>
                                            <span>Capacity: <span id="previewCapacity">0</span> people</span>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <button class="btn btn-primary btn-lg w-100 mb-3">
                                            Register for Event
                                        </button>
                                        
                                        <div id="previewContact" class="text-muted small"></div>
                                    </div>
                                </div>
                                
                                <div>
                                    <h3 class="h4 mb-3">About This Event</h3>
                                    <p id="previewDescription" class="text-muted">Event description will appear here...</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Success Modal -->
    <div class="modal fade" id="successModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-success text-white">
                    <h5 class="modal-title">
                        <i class="bi bi-check-circle me-2"></i>
                        Event Created Successfully!
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body text-center py-4">
                    <i class="bi bi-calendar-check display-4 text-success mb-3"></i>
                    <h4>Your event has been created!</h4>
                    <p class="text-muted">Students can now discover and register for your event.</p>
                </div>
                <div class="modal-footer justify-content-center">
                    <button type="button" class="btn btn-success" onclick="window.location.href='organizer-dashboard.html'">
                        Go to Dashboard
                    </button>
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                        Create Another Event
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Custom JS -->
    <script src="../Assets/JS/create-event.js"></script>
</body>
</html>