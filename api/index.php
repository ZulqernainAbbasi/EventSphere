<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Campus Events - College Event Information System</title>
    <meta name="description" content="Discover and participate in amazing college events. Your central hub for campus activities, workshops, and networking opportunities.">
    <meta name="author" content="Campus Events System">

    <!-- Open Graph Meta Tags -->
    <meta property="og:title" content="Campus Events - College Event Information System">
    <meta property="og:description" content="Discover and participate in amazing college events. Your central hub for campus activities, workshops, and networking opportunities.">
    <meta property="og:type" content="website">
    <meta property="og:image" content="https://lovable.dev/opengraph-image-p98pqg.png">

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
            <a class="navbar-brand d-flex align-items-center" href="index.php">
                <i class="bi bi-calendar3 text-primary me-2 fs-3"></i>
                <span class="fw-bold fs-4">EventSpheres</span>
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="#home">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#events">Events</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#gallery">Gallery</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#about">About</a>
                    </li>
                </ul>
                <div class="d-flex gap-2">
                    <button onclick="location.href='Auth/login.php'" class="btn btn-outline-primary">Login</button>
                    <button onclick="location.href='Auth/signup.php'" class="btn btn-gradient-primary text-white">Register</button>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
<!-- Hero Section -->
<!-- Hero Section -->
    <section id="home" class="hero-section position-relative overflow-hidden">
        <div id="heroCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="hero-background" style="background-image: url('src/assets/hero-campus-events.jpg')">
                        <div class="hero-overlay"></div>
                    </div>
                    <div class="hero-content">
                        <div class="container">
                            <div class="row justify-content-center text-center">
                                <div class="col-lg-10">
                                    <h1 class="display-4 fw-bold mb-4 text-white">
                                        Discover Amazing
                                        <span class="d-block text-gradient">Campus Events</span>
                                    </h1>
                                    <p class="lead mb-4 text-white-75">
                                        Connect, learn, and grow through engaging events designed for college students
                                    </p>
                                    
                                    <!-- Featured Event Card -->
                                    <div class="card bg-white-10 backdrop-blur border-white-20 mb-4 mx-auto" style="max-width: 600px;">
                                        <div class="card-body text-start">
                                            <h3 class="h4 text-white mb-3">Tech Innovation Summit 2024</h3>
                                            <div class="row g-3 mb-3 small">
                                                <div class="col-md-4">
                                                    <i class="bi bi-calendar3 me-2"></i>
                                                    <span class="text-white-80">March 15, 2024</span>
                                                </div>
                                                <div class="col-md-4">
                                                    <i class="bi bi-geo-alt me-2"></i>
                                                    <span class="text-white-80">Main Auditorium</span>
                                                </div>
                                                <div class="col-md-4">
                                                    <i class="bi bi-people me-2"></i>
                                                    <span class="text-white-80">250+ Students</span>
                                                </div>
                                            </div>
                                            <p class="text-white-90 mb-0">Join industry leaders and fellow students for an inspiring day of tech talks, networking, and innovation.</p>
                                        </div>
                                    </div>

                                    <!-- CTA Buttons -->
                                    <div class="d-flex flex-column flex-sm-row gap-3 justify-content-center">
                                        <button class="btn btn-gradient-primary btn-lg px-4">Explore Events</button>
                                        <button class="btn btn-outline-light btn-lg px-4">Create Account</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="carousel-item">
                    <div class="hero-background" style="background-image: url('https://images.unsplash.com/photo-1517048676732-d65bc937f952?w=1920&h=1080&fit=crop&crop=center')">
                        <div class="hero-overlay"></div>
                    </div>
                    <div class="hero-content">
                        <div class="container">
                            <div class="row justify-content-center text-center">
                                <div class="col-lg-10">
                                    <h1 class="display-4 fw-bold mb-4 text-white">
                                        Build Professional
                                        <span class="d-block text-gradient">Networks</span>
                                    </h1>
                                    <p class="lead mb-4 text-white-75">
                                        Connect with industry professionals and expand your career opportunities
                                    </p>
                                    
                                    <!-- Featured Event Card -->
                                    <div class="card bg-white-10 backdrop-blur border-white-20 mb-4 mx-auto" style="max-width: 600px;">
                                        <div class="card-body text-start">
                                            <h3 class="h4 text-white mb-3">Spring Career Fair 2024</h3>
                                            <div class="row g-3 mb-3 small">
                                                <div class="col-md-4">
                                                    <i class="bi bi-calendar3 me-2"></i>
                                                    <span class="text-white-80">March 25, 2024</span>
                                                </div>
                                                <div class="col-md-4">
                                                    <i class="bi bi-geo-alt me-2"></i>
                                                    <span class="text-white-80">Student Union</span>
                                                </div>
                                                <div class="col-md-4">
                                                    <i class="bi bi-people me-2"></i>
                                                    <span class="text-white-80">50+ Companies</span>
                                                </div>
                                            </div>
                                            <p class="text-white-90 mb-0">Meet recruiters from top companies and explore internship and full-time opportunities.</p>
                                        </div>
                                    </div>

                                    <!-- CTA Buttons -->
                                    <div class="d-flex flex-column flex-sm-row gap-3 justify-content-center">
                                        <button class="btn btn-gradient-primary btn-lg px-4">View Career Events</button>
                                        <button class="btn btn-outline-light btn-lg px-4">Register Now</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="carousel-item">
                    <div class="hero-background" style="background-image: url('https://images.unsplash.com/photo-1523580846011-d3a5bc25702b?w=1920&h=1080&fit=crop&crop=center')">
                        <div class="hero-overlay"></div>
                    </div>
                    <div class="hero-content">
                        <div class="container">
                            <div class="row justify-content-center text-center">
                                <div class="col-lg-10">
                                    <h1 class="display-4 fw-bold mb-4 text-white">
                                        Celebrate Culture &
                                        <span class="d-block text-gradient">Diversity</span>
                                    </h1>
                                    <p class="lead mb-4 text-white-75">
                                        Experience the richness of different cultures through exciting campus events
                                    </p>
                                    
                                    <!-- Featured Event Card -->
                                    <div class="card bg-white-10 backdrop-blur border-white-20 mb-4 mx-auto" style="max-width: 600px;">
                                        <div class="card-body text-start">
                                            <h3 class="h4 text-white mb-3">International Food Festival</h3>
                                            <div class="row g-3 mb-3 small">
                                                <div class="col-md-4">
                                                    <i class="bi bi-calendar3 me-2"></i>
                                                    <span class="text-white-80">March 18, 2024</span>
                                                </div>
                                                <div class="col-md-4">
                                                    <i class="bi bi-geo-alt me-2"></i>
                                                    <span class="text-white-80">Campus Quad</span>
                                                </div>
                                                <div class="col-md-4">
                                                    <i class="bi bi-people me-2"></i>
                                                    <span class="text-white-80">15+ Countries</span>
                                                </div>
                                            </div>
                                            <p class="text-white-90 mb-0">Taste authentic cuisines and experience cultural performances from around the world.</p>
                                        </div>
                                    </div>

                                    <!-- CTA Buttons -->
                                    <div class="d-flex flex-column flex-sm-row gap-3 justify-content-center">
                                        <button class="btn btn-gradient-primary btn-lg px-4">Cultural Events</button>
                                        <button class="btn btn-outline-light btn-lg px-4">Join Community</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </section>

    <!-- Search & Filter Section -->
    <section class="py-5 bg-gradient-secondary">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="display-6 fw-bold mb-3">Find Your Perfect Event</h2>
                <p class="text-muted">Use our advanced search and filters to discover events that match your interests</p>
            </div>

            <!-- Search Bar -->
            <div class="row justify-content-center mb-4">
                <div class="col-lg-8">
                    <div class="input-group input-group-lg">
                        <span class="input-group-text bg-white border-end-0">
                            <i class="bi bi-search text-muted"></i>
                        </span>
                        <input type="text" class="form-control border-start-0" placeholder="Search events by title, description, or organizer..." id="searchInput">
                    </div>
                </div>
            </div>

            <!-- Filter Controls -->
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="d-flex flex-column flex-md-row gap-3 align-items-center justify-content-between mb-4">
                        <button class="btn btn-outline-primary d-flex align-items-center gap-2" data-bs-toggle="collapse" data-bs-target="#filterOptions">
                            <i class="bi bi-funnel"></i>
                            Filters
                            <span class="badge bg-secondary ms-2 d-none" id="filterCount">0</span>
                        </button>
                        <button class="btn btn-ghost text-muted d-none" id="clearFilters">
                            <i class="bi bi-x me-1"></i>
                            Clear All Filters
                        </button>
                    </div>

                    <!-- Collapsible Filter Options -->
                    <div class="collapse" id="filterOptions">
                        <div class="card shadow-sm mb-4">
                            <div class="card-body">
                                <div class="row g-3">
                                    <div class="col-md-4">
                                        <label class="form-label fw-medium">
                                            <i class="bi bi-people me-1"></i>
                                            Category
                                        </label>
                                        <select class="form-select" id="categoryFilter">
                                            <option value="">All categories</option>
                                            <option value="Technology">Technology</option>
                                            <option value="Career">Career</option>
                                            <option value="Cultural">Cultural</option>
                                            <option value="Academic">Academic</option>
                                            <option value="Wellness">Wellness</option>
                                            <option value="Entrepreneurship">Entrepreneurship</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label fw-medium">
                                            <i class="bi bi-calendar3 me-1"></i>
                                            Status
                                        </label>
                                        <select class="form-select" id="statusFilter">
                                            <option value="">All events</option>
                                            <option value="upcoming">Upcoming</option>
                                            <option value="ongoing">Ongoing</option>
                                            <option value="past">Past Events</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label fw-medium">
                                            <i class="bi bi-geo-alt me-1"></i>
                                            Location
                                        </label>
                                        <select class="form-select" id="locationFilter">
                                            <option value="">All locations</option>
                                            <option value="Main Auditorium">Main Auditorium</option>
                                            <option value="Computer Science Lab">Computer Science Lab</option>
                                            <option value="Student Union Building">Student Union Building</option>
                                            <option value="Campus Quad">Campus Quad</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Quick Filters -->
                    <div class="d-flex flex-wrap gap-2">
                        <button class="btn btn-sm btn-outline-secondary" data-filter="status" data-value="upcoming">Upcoming Events</button>
                        <button class="btn btn-sm btn-outline-secondary" data-filter="category" data-value="Technology">Tech Events</button>
                        <button class="btn btn-sm btn-outline-secondary" data-filter="category" data-value="Career">Career Events</button>
                        <button class="btn btn-sm btn-outline-secondary" data-filter="category" data-value="Cultural">Cultural Events</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Events Section -->
    <section id="events" class="py-5 bg-gradient-light">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="display-6 fw-bold mb-3">Campus Events</h2>
                <p class="lead text-muted">Discover opportunities to learn, grow, and connect with your fellow students</p>
            </div>

            <div class="row g-4" id="eventsGrid">
                <!-- Event cards will be populated by JavaScript -->
            </div>

            <div class="text-center mt-5">
                <button class="btn btn-gradient-primary btn-lg">View All Events</button>
            </div>
        </div>
    </section>

    <!-- Media Gallery Section -->
    <section id="gallery" class="py-5 bg-light">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="display-6 fw-bold mb-3">Event Gallery</h2>
                <p class="lead text-muted">Relive the best moments from our campus events through photos and videos</p>
            </div>

            <div class="row g-4 mb-5" id="mediaGrid">
                <!-- Media items will be populated by JavaScript -->
            </div>

            <div class="text-center mb-5">
                <button class="btn btn-outline-primary btn-lg">
                    View Full Gallery
                    <i class="bi bi-arrow-right ms-2"></i>
                </button>
            </div>

            <!-- Stats Section -->
            <div class="row g-4 text-center">
                <div class="col-6 col-md-3">
                    <div class="display-4 fw-bold text-primary mb-2">500+</div>
                    <div class="text-muted">Photos Captured</div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="display-4 fw-bold text-success mb-2">50+</div>
                    <div class="text-muted">Videos Recorded</div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="display-4 fw-bold text-warning mb-2">25+</div>
                    <div class="text-muted">Events Covered</div>
                </div>
                <div class="col-6 col-md-3">
                    <div class="display-4 fw-bold text-info mb-2">10k+</div>
                    <div class="text-muted">Total Views</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-primary text-white">
        <!-- Newsletter Section -->
        <div class="bg-gradient-accent py-5">
            <div class="container">
                <div class="row justify-content-center text-center">
                    <div class="col-lg-8">
                        <h3 class="display-6 fw-bold text-white mb-3">Stay Updated with Campus Events</h3>
                        <p class="lead text-white-90 mb-4">Subscribe to our newsletter and never miss out on exciting events, workshops, and opportunities</p>
                        <div class="row g-2 justify-content-center">
                            <div class="col-md-6">
                                <input type="email" class="form-control form-control-lg bg-white-10 border-white-20 text-white" placeholder="Enter your email">
                            </div>
                            <div class="col-md-auto">
                                <button class="btn btn-light btn-lg text-primary fw-semibold">
                                    Subscribe
                                    <i class="bi bi-arrow-right ms-2"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Footer -->
        <div class="py-5">
            <div class="container">
                <div class="row g-4">
                    <!-- Brand Section -->
                    <div class="col-lg-3">
                        <div class="d-flex align-items-center mb-3">
                            <i class="bi bi-calendar3 text-info me-2 fs-3"></i>
                            <span class="fw-bold fs-4">Campus Events</span>
                        </div>
                        <p class="text-white-80 mb-4">Your central hub for discovering, organizing, and participating in amazing campus events and activities.</p>
                        <div class="d-flex gap-2">
                            <a href="#" class="btn btn-outline-light btn-sm">
                                <i class="bi bi-facebook"></i>
                            </a>
                            <a href="#" class="btn btn-outline-light btn-sm">
                                <i class="bi bi-twitter"></i>
                            </a>
                            <a href="#" class="btn btn-outline-light btn-sm">
                                <i class="bi bi-instagram"></i>
                            </a>
                            <a href="#" class="btn btn-outline-light btn-sm">
                                <i class="bi bi-linkedin"></i>
                            </a>
                        </div>
                    </div>

                    <!-- Quick Links -->
                    <div class="col-lg-2 col-md-3">
                        <h5 class="text-info mb-3">Quick Links</h5>
                        <ul class="list-unstyled">
                            <li class="mb-2"><a href="#home" class="text-white-80 text-decoration-none">Home</a></li>
                            <li class="mb-2"><a href="#events" class="text-white-80 text-decoration-none">All Events</a></li>
                            <li class="mb-2"><a href="#gallery" class="text-white-80 text-decoration-none">Media Gallery</a></li>
                            <li class="mb-2"><a href="#about" class="text-white-80 text-decoration-none">About Us</a></li>
                            <li class="mb-2"><a href="#contact" class="text-white-80 text-decoration-none">Contact</a></li>
                        </ul>
                    </div>

                    <!-- User Portal -->
                    <div class="col-lg-2 col-md-3">
                        <h5 class="text-info mb-3">User Portal</h5>
                        <ul class="list-unstyled">
                            <li class="mb-2"><a href="#" class="text-white-80 text-decoration-none">Student Login</a></li>
                            <li class="mb-2"><a href="participant-dashboard.html" class="text-white-80 text-decoration-none">Participant Dashboard</a></li>
                            <li class="mb-2"><a href="organizer-dashboard.html" class="text-white-80 text-decoration-none">Organizer Dashboard</a></li>
                            <li class="mb-2"><a href="admin-dashboard.html" class="text-white-80 text-decoration-none">Admin Dashboard</a></li>
                            <li class="mb-2"><a href="#" class="text-white-80 text-decoration-none">Sitemap</a></li>
                        </ul>
                    </div>

                    <!-- Contact Info -->
                    <div class="col-lg-5 col-md-6">
                        <h5 class="text-info mb-3">Contact Info</h5>
                        <div class="row g-3">
                            <div class="col-12">
                                <div class="d-flex align-items-start">
                                    <i class="bi bi-geo-alt text-info me-3 mt-1"></i>
                                    <div class="text-white-80">
                                        123 University Ave<br>
                                        Campus Center, Building A<br>
                                        City, State 12345
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-telephone text-info me-3"></i>
                                    <span class="text-white-80">(555) 123-4567</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-envelope text-info me-3"></i>
                                    <span class="text-white-80">events@university.edu</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bottom Footer -->
        <div class="border-top border-white-20 py-3">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <small class="text-white-80">© 2024 Campus Events Information System. All rights reserved.</small>
                    </div>
                    <div class="col-md-6 text-md-end">
                        <div class="d-flex flex-column flex-md-row gap-3 justify-content-md-end">
                            <a href="#" class="text-white-80 text-decoration-none small">Privacy Policy</a>
                            <a href="#" class="text-white-80 text-decoration-none small">Terms of Service</a>
                            <a href="#" class="text-white-80 text-decoration-none small">Accessibility</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Custom JS -->
    <script src="../Assets/JS/main.js"></script>
</body>
</html>